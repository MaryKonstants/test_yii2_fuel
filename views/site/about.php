<?php

/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Задача 2';
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    @media (min-width: 768px) {
        .navbar-container {
            position: sticky;
            top: 0;
            overflow-y: auto;
            height: 100vh;
        }
        .navbar-container .navbar {
            align-items: flex-start;
            justify-content: flex-start;
            flex-wrap: nowrap;
            flex-direction: column;
            height: 100%;
        }
        .navbar-container .navbar-collapse {
            align-items: flex-start;
        }
        .navbar-container .nav {
            flex-direction: column;
            flex-wrap: nowrap;
        }
        .navbar-container .navbar-nav {
            flex-direction: column !important;
        }
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-3 navbar-container bg-light">
            <!-- Вертикальное меню -->
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <!-- Пункты вертикального меню -->
                  <?php foreach ($result as $key => $val) { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#link-1"><?= $key ?></a>
                        </li>
                        <ul class="navbar-nav">
                            <?php foreach ($val as $k => $v) { ?>
                            <li class="nav-item" style="margin-left: 15px;">
                                <a class="nav-link" href="<?= Url::to(['site/about', 'year' => $key, 'month' => $k]) ?>"><?= date("F", strtotime("0.".$k.".".$key)) ?>  <?= $v ?></a>
                            </li>
                            <?php } ?>
                        </ul>

                    </ul>
                    <?php } ?>

                </div>
            </nav>
        </div>
        <div class="col-md-8 col-lg-9 content-container" style="background-color: #ffe0b2">
            <!-- Основной контент страницы  -->
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'card_number',
                    'date',
                    'volume',
                    'service',
                    'address_id',
                ],
            ]); ?>
        </div>
    </div>
</div>
