<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Kategori;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

     <?php $form = ActiveForm::begin(['options'=>[ 'enctype' => 'multipart/form-data'],		
		]); ?>


    <?php
	$a = ArrayHelper::map(Kategori::find()->orderBy('nama_kategori')->all(), 'id', 'nama_kategori');
    echo $form->field($model, 'id_kategori', 
	[])->dropDownList
	($a,[]);
	


	
	?>


    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'round')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fps_range')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

     <?= $form->field($model, 'foto')->fileInput (['accept'=>'image/*','maxlength' => true, 'style'=>'width:350px' ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
