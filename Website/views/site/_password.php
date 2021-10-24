<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Distributor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form">

	
    <?php $form = ActiveForm::begin(['fieldConfig' => [
			'inputOptions' => ['class' => 'form-control'],
            'labelOptions' => ['class' => 'col-md-3 control-label'],
        ],'options'=>['class'=>'form-horizontal'],		
		]); ?>
		
	
		
		<div class="form-body">
			
		<?php if($model->hasErrors()) { ?>
			<div class="alert alert-danger display">
				<button class="close" data-close="alert"></button>
				<?php echo $form->errorSummary($model); ?>
			</div>
		<?php } ?>
		
			
		<?php if(Yii::$app->session->hasFlash('password_success')) { ?>
			<div class="alert alert-info display">
				<button class="close" data-close="alert"></button>
				<?= Yii::$app->session->getFlash('password_success') ?>
			</div>
		<?php } ?>

		<?php if(Yii::$app->session->hasFlash('password_error')) { ?>
			<div class="alert alert-danger display">
				<button class="close" data-close="alert"></button>
				<?= Yii::$app->session->getFlash('password_error') ?>
			</div>
		<?php } ?>
		
		
			<p class="note">Kotak dengan <span class="required">*</span> wajib diisi.</p>

			<?= $form->field($model, 'username', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->textInput(['maxlength' => true, 'style'=>'width:350px', 'disabled'=>'disabled', 'autofocus'=>'autofocus']) ?>

			
			<?= $form->field($model, 'oldpass', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->passwordInput(['maxlength' => true, 'style'=>'width:350px', 'required'=>'required', 'autofocus'=>'autofocus']) ?>

			<?= $form->field($model, 'newpass', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->passwordInput(['maxlength' => true, 'style'=>'width:350px', 'required'=>'required']) ?>

			<?= $form->field($model, 'repeatnewpass', ['template'=>'<div class="form-group">{label}<div class="col-md-4">{input}</div></div>'])->passwordInput(['maxlength' => true, 'style'=>'width:350px', 'required'=>'required']) ?>

		

		   
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<?= Html::submitButton('Ubah', ['class' => 'btn btn-success' ]) ?>
					</div>
				</div>
			</div>

		</div>
		
	<?php ActiveForm::end(); ?>
	
</div>
