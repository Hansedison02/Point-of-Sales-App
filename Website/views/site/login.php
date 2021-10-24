<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="content" style="background:white;">
<br/>
<center><img class="img-responsive" style="height:65px" src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo.png" alt=""/></center>
<p>&nbsp;</p>

	
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'login-form'],
        'fieldConfig' => [
           
            'labelOptions' => ['class' => 'form-control form-control-solid placeholder-no-fix'],
        ],
    ]); ?>
		<?php if($model->hasErrors()) { ?>
		<div class="alert alert-danger display">
			<button class="close" data-close="alert"></button>
			<?php echo $form->errorSummary($model); ?>
		</div>
		<?php } ?>	  
	
		 <div class="form-group">
			<?= $form->field($model, 'username')->textInput(['required' => 'required', 'autofocus'=>'autofocus', 'class'=>'form-control', 'placeholder'=>'Username'])->label(false) ?>
		</div>

		<div class="form-group">
			<?= $form->field($model, 'password')->passwordInput(['required' => 'required', 'class'=>'form-control', 'placeholder'=>'Password'])->label(false) ?>
		</div>
		
	
            
                <?= Html::submitButton('Login', ['class' => 'btn btn-success uppercase', 'name' => 'login-button']) ?>
				
     

    <?php ActiveForm::end(); ?>

</div>   
