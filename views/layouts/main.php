<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Авторы', 'url' => ['/auth/index']],
            ['label' => 'Добавить автора', 'url' => ['/auth/create']],
            ['label' => 'Книги', 'url' => ['/books/index']],
            ['label' => 'Добавить книгу', 'url' => ['/books/create']],

            ['label' => 'Проект на github', 'url' => 'https://github.com/svil1502/mytest/'],
            ['label' => 'Резюме', 'url' => ['/site/rezume']],
        ],
    ]);




    NavBar::end();
    ?>

    <div class="container">


        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">

                                <li><a href="<?= \yii\helpers\Url::to(['companies/index']) ?>">Компании</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['requisites/index']) ?>">Реквизиты</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['contracts/index']) ?>">Договоры</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['acts/index']) ?>">Акты</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['bills/index']) ?>">Счета</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
        </header><!--/header-->
        <div class="container">
            <?= $content ?>
        </div>


    </div>




</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Тестовое задание <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
