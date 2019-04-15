<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Acts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_contract')->widget(Select2::classname(), [
        'data' => $data,
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбор номера договора ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
