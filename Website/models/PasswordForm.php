<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

class PasswordForm extends Model{
	public $oldpass;
	public $newpass;
	public $repeatnewpass;
	public $username;
    
	public function rules(){
		return [
			[['oldpass','newpass','repeatnewpass'],'required'],
			['oldpass','findPasswords'],
			['repeatnewpass','compare','compareAttribute'=>'newpass', 'message'=>'Ulangi Password harus sama dengan Password Baru'],
		];
	}
   
	public function findPasswords($attribute, $params){
		$user = User::find()->where([
			'username'=>Yii::$app->user->identity->username
		])->one();
		$password = ($user->password);
		if($password!=md5($this->oldpass))
			$this->addError($attribute,'Password Lama salah');
	}
   
	public function attributeLabels(){
		return [
			'oldpass'=>'Password Lama',
			'newpass'=>'Password Baru',
			'repeatnewpass'=>'Ulangi Password Baru',
		];
	}
} 

?>