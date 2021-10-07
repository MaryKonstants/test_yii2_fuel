<p class="Standard"><span class="T1">Описание</span></p><p class="Standard">В компании работают водители, которые совершают поездки на корпоративных автомобилях. В течение рабочего времени, они совершают расходы, приобретая услуги (заправка топливом, мойка, шиномонтаж) на различных автозаправках, которые оплачивают топливными картами компании.</p><p class="Standard">В некоторых случаях происходят возвраты средств по приобретенным услугам. Например, водитель попросил оператора заправочной станции заправить автомобиль 50 литрами топлива. При этом оператор совершает списание по топливной карте ДО начала заправки. По окончании заправки выясняется, что в топливный бак вместилось только 48 литров. В этом случае, оператор оформляет возврат средств (2 литра, которые не вместились) на топливную карту.</p><p class="Standard">Данные о приобретенных услугах по топливным картам передаются (в реальном времени) и хранятся в БД.</p><p class="Standard">Таким образом таблица с данным о расходах по топливным картам содержит данные по списанию и возвратам.</p><p class="Standard"><span class="T1">Задание 1. Должно выполняться с использованием </span><span class="T3">MySQL</span><span class="T1"> (и при желании с </span><span class="T3">PHP</span><span class="T1">)</span></p><p class="Standard">Преобразовать данные таблицы таким образом, чтобы в ней содержались ТОЛЬКО транзакции-расходы. То есть, все транзакции-возвраты должны быть учтены в предшествующих им транзакциях-расходах.</p><p class="Standard">Пример. Дамп данных содержит две следующие транзакции.</p><table border="0" cellspacing="0" cellpadding="0" class="Table1"><colgroup><col width="65"/><col width="120"/><col width="142"/><col width="87"/><col width="109"/><col width="200"/></colgroup><tr class="Table11"><td style="text-align:left;width:0.5868in; " class="Table1_A1"><p class="P3">ID</p></td><td style="text-align:left;width:1.0826in; " class="Table1_A1"><p class="P4">Номер карты</p></td><td style="text-align:left;width:1.2806in; " class="Table1_A1"><p class="P4">Дата/время</p></td><td style="text-align:left;width:0.7868in; " class="Table1_A1"><p class="P4">Объем</p></td><td style="text-align:left;width:0.984in; " class="Table1_A1"><p class="P4">Услуга</p></td><td style="text-align:left;width:1.8042in; " class="Table1_A1"><p class="P5"><span class="T2">ID </span><span class="T6">заправочной станции</span></p></td></tr><tr class="Table11"><td style="text-align:left;width:0.5868in; " class="Table1_A1"><p class="P3">31769</p></td><td style="text-align:left;width:1.0826in; " class="Table1_A1"><p class="P4">257473011</p></td><td style="text-align:left;width:1.2806in; " class="Table1_A1"><p class="P4">2015-10-18 11:10:36</p></td><td style="text-align:left;width:0.7868in; " class="Table1_A1"><p class="P4">-68</p></td><td style="text-align:left;width:0.984in; " class="Table1_A1"><p class="P4">ДТ</p></td><td style="text-align:left;width:1.8042in; " class="Table1_A1"><p class="P3">41</p></td></tr><tr class="Table11"><td style="text-align:left;width:0.5868in; " class="Table1_A1"><p class="P3">31768</p></td><td style="text-align:left;width:1.0826in; " class="Table1_A1"><p class="P4">257473011</p></td><td style="text-align:left;width:1.2806in; " class="Table1_A1"><p class="P4">2015-10-18 11:21:15</p></td><td style="text-align:left;width:0.7868in; " class="Table1_A1"><p class="P5"><span class="T6">2</span><span class="T2">,</span><span class="T6">44</span></p></td><td style="text-align:left;width:0.984in; " class="Table1_A1"><p class="P4">ДТ</p></td><td style="text-align:left;width:1.8042in; " class="Table1_A1"><p class="P3">41</p></td></tr></table><p class="Standard"> </p><p class="Standard">Где транзакция <span class="T2">ID</span> 31769 – расход, а <span class="T2">ID</span> 31768 возврат по этой транзакции.</p><p class="Standard">В результате преобразования, транзакция <span class="T2">ID</span> 31769 должна иметь объем 65,56, а транзакция <span class="T2">ID</span> 31768 должна быть удалена.</p><p class="Standard"><span class="T1">Цель выполнения задания</span></p><p class="Standard"><span class="T7">Исполнитель должен продемонстрировать высокий уровень знаний языка </span><span class="T4">SQL</span><span class="T7">.</span></p><p class="P1"> </p><p class="Standard"><span class="T8">Задание 2. Должно выполняться на </span><span class="T5">Yii</span><span class="T8">2 (</span><span class="T5">PHP</span><span class="T8"> и </span><span class="T5">MySQL</span><span class="T8">)</span></p><p class="Standard">Создать страницу со списком транзакций по топливным картам. Слева должна располагаться панель, где будет отображены информация о количестве транзакций по месяцам и по годам.</p><p class="Standard"><span class="T9">Пример:</span></p><p class="P2">2010 (27)</p><p class="P2">  сентябрь (1)</p><p class="P2">  июль (4)</p><p class="P2">  июнь (7)</p><p class="P2">  март (12)</p><p class="P2">  февраль (3)</p><p class="P2">2009 (1)</p><p class="P2">  июнь (1)<a id="_GoBack"/></p><p class="P2"> </p><p class="P2">Создать фильтры по номеру карты, по году, по месяцу</p><p class="P2"/><p class="Standard"><span class="T1">Цель выполнения задания</span></p><p class="Standard"><span class="T7">Исполнитель должен продемонстрировать понимание построения запросов к БД и умение работать с платформой </span><span class="T4">Yii</span><span class="T7">2.</span></p>
<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for rapidly creating
small projects.

The template contains the basic features including user login/logout and a contact page. It includes all commonly used
configurations that would allow you to focus on adding new features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory directly
under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to a directory
named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~

### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist

Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    

Start the container

    docker-compose up -d

You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:**

- Minimum required Docker engine version `17.04` for development (
  see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**

- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.

TESTING
-------

Tests are located in `tests` directory. They are developed
with [Codeception PHP Testing Framework](http://codeception.com/). By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser.

### Running  acceptance tests

To execute acceptance tests do the following:

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full-featured version
   of Codeception

3. Update dependencies with Composer

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

   In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must
   download [GeckoDriver](https://github.com/mozilla/geckodriver/releases)
   or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 

   As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:

    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2basic_test` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be
able to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
