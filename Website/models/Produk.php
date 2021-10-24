<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property integer $id
 * @property integer $id_kategori
 * @property string $nama_produk
 * @property string $deskripsi
 * @property string $manufacturer
 * @property integer $length
 * @property string $type
 * @property string $round
 * @property integer $fps_range
 * @property integer $price
 * @property string $foto
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kategori', 'nama_produk', 'deskripsi', 'manufacturer', 'length', 'type', 'round', 'fps_range', 'price'], 'required'],
            [['id_kategori', 'length', 'fps_range', 'price'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama_produk', 'manufacturer', 'type', 'round'], 'string', 'max' => 100],
            [['foto'], 'string', 'max' => 255]
        ];
    }
	
	public function upload()
    {
		if ($this->foto != NULL) {
			$x = $this->foto->saveAs('../images/' . $this->foto->baseName . '.' . $this->foto->extension);
			return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Kategori',
            'nama_produk' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'manufacturer' => 'Manufacturer',
            'length' => 'Length',
            'type' => 'Type',
            'round' => 'Round',
            'fps_range' => 'FPS Range',
            'price' => 'Price',
            'foto' => 'Foto',
        ];
    }
}
