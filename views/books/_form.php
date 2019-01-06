<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Auth;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
use app\models\TestDateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'auth_id')->widget(Select2::classname(), [
        'data' => $data,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбор автора ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

<?=$form->field($model, 'date_at')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATETIME,
    'displayFormat' => 'php:d-m-Y H:i:s',
]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
