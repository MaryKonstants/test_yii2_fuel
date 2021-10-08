<?php

namespace app\controllers;

use app\models\search\DataSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $db = Yii::$app->db;

        $sql = "
             SELECT CONCAT('UPDATE data SET volume = (volume + ', ROUND(SUM(volume), 2),
                           ') WHERE card_number = ', card_number,
                           \" AND service = '\", service,
                           \"' AND address_id = \", address_id,
                           ' AND ABS(volume) > ', ROUND(SUM(volume), 2), ' LIMIT 1; ',
                           'DELETE FROM data WHERE id IN (', GROUP_CONCAT(id), ');'
                        ) as up_query
             FROM data
             WHERE volume > 0
             GROUP BY card_number, service, address_id
        ";

        $rows = $db->createCommand($sql)->queryAll();
        foreach ($rows as $row) {
            $db->createCommand($row['up_query'])->execute();
        }

        return $this->render('index', []);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout($year = null, $month = null)
    {
        $db = Yii::$app->db;
        $sql = "
        SELECT
        Year(`date`) as Year,
        Month(`date`) as Month,
        Count(*) As Total_Rows
        FROM data
        GROUP BY Year(`date`), Month(`date`)
        ";

        $rows = $db->createCommand($sql)->queryAll();
        $result = ArrayHelper::map($rows, 'Month', 'Total_Rows', 'Year');

        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(ArrayHelper::merge(
            Yii::$app->request->queryParams,
            [$searchModel->formName() => ['year' => $year, 'month' => $month]]
        ));

        return $this->render('about', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'result' => $result
        ]);
    }
}
