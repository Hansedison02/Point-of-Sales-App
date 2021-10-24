<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kategori') ?>

    <?= $form->field($model, 'nama_produk') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'manufacturer') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'round') ?>

    <?php // echo $form->field($model, 'fps_range') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
