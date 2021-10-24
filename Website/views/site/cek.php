<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cek Surat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content" style="width:100%">
<br/>
<center><img style="width:150px;height:150px;" src="<?php echo Yii::$app->request->baseUrl; ?>/images/logo.png" alt=""/></center>
	<h3 class="form-title"><?php echo Yii::$app->name; ?></h3>
	
   

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>



   <div class="col-md-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

        	
			             
            'no_surat',
            'tgl_surat:date',
			// 'id_skpd_2',
            // 'id_ukpd_2',
             'isi_ringkas:ntext',
            
            'status',
			 
             'jumlah_lampiran',
             'lampiran',
            // 'tgl_input',
            // 'id_pengirim',
            // 'id_skpd_1',
            // 'id_ukpd_1',
			
        ],
    ]); ?>
</div>  
