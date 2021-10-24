<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_user".
 *
 * @property integer $id_user
 * @property string $username
 * @property string $nama_user
 * @property string $hp
 * @property string $password
 * @property string $level
 * @property integer $id_daerah
 * @property string $kode_daerah
 * @property string $nama_daerah
 */
class VUser extends \yii\db\ActiveRecord
{
	public static function primaryKey()
	{
		return ['id_user'];
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_daerah'], 'integer'],
            [['username', 'nama_user', 'password', 'level'], 'required'],
            [['username', 'nama_user', 'hp', 'password', 'level', 'kode_daerah', 'nama_daerah'], 'string', 'max' => 100]
        ];
    }
	
	public function getLookup()
	{
		return $this->nama_user . " (" . $this->nama_daerah . ")";
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'nama_user' => 'Nama User',
            'hp' => 'Hp',
            'password' => 'Password',
            'level' => 'Level',
            'id_daerah' => 'Id Daerah',
            'kode_daerah' => 'Kode Daerah',
            'nama_daerah' => 'Nama Daerah',
        ];
    }
}
