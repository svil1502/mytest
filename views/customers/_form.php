<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Locations;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'zip_code')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\Locations::find()->all(), 'location_id','zip_code'),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбор Zip Code','id'=>'zipCode', 'data-url'=>Url::to(['locations/prov'])],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>


    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script= <<< JS

$('#zipCode').change(function(){
  $.ajax({
url: $(this).data("url"),
dataType: 'json',
method: 'GET',
data: {id: $(this).val()},
success: function (data, textStatus, jqXHR) {
$('#customers-city').val(data.city);
$('#customers-province').val(data.province);
},
beforeSend: function (xhr) {
alert('Готово!');
},
error: function (jqXHR, textStatus, errorThrown) {
console.log('An error occured!');
alert('Ошибка ajax');
}
});
});
JS;
$this->registerJs($script);

?>

