<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_produk".
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
 * @property string $nama_kategori
 */
class VProduk extends \yii\db\ActiveRecord
{
	public static function primaryKey()
	{
		return ['id'];
	}
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kategori', 'length', 'fps_range', 'price'], 'integer'],
            [['id_kategori', 'nama_produk', 'deskripsi', 'manufacturer', 'length', 'type', 'round', 'fps_range', 'price', 'foto', 'nama_kategori'], 'required'],
            [['deskripsi'], 'string'],
            [['nama_produk', 'manufacturer', 'type', 'round', 'nama_kategori'], 'string', 'max' => 100],
            [['foto'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Id Kategori',
            'nama_produk' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'manufacturer' => 'Manufacturer',
            'length' => 'Length',
            'type' => 'Type',
            'round' => 'Round',
            'fps_range' => 'Fps Range',
            'price' => 'Price',
            'foto' => 'Foto',
            'nama_kategori' => 'Nama Kategori',
        ];
    }
}
