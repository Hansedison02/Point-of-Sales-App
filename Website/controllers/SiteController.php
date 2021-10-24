<?php

namespace app\controllers;

use app\models\Customer;
use Yii;
use app\models\VQuotationDetail;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\VInventory;
use app\models\Inventory;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\PasswordForm;
use app\models\User;
use yii\web\Response;
use app\models\Laporan;
use app\models\LaporanSearch;
use app\models\Quotation;

class SiteController extends Controller
{
	public $selected = 'Dashboard';	
	

	public function actionDetailInv()
	{
		
		$id = $_GET['barang'];
		$qty = $_GET['qty'];
		
		
		$t = Inventory::findOne($id);
		$tr = "<tr id='tr_' . $t->id_inventory>";
		$tr.="<td>" . $t->kode_inventory . "</td>";
		$tr.="<td>" . $t->nama_barang . "</td>";		
		$tr.="<td>
		<input type='hidden' name='id[]' value='" . $t->id_inventory . "'/>
		<input type='number' required name='qty_" . $t->id_inventory . "' value='" . $qty . "' class='form-control'/></td>";
		
		$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
		$tr .="</tr>";
		/* echo */ return $tr;
	}
	
	public function actionInventory()
	{
		$connection = Yii::$app->getDb();
		$id = $_GET['term'];
		$command = $connection->createCommand("
			SELECT id_inventory as id, concat(kode_inventory, ' - ', nama_barang) as text from inventory where nama_barang like '%$id%' or kode_inventory like '%$id%'");

		$result = $command->queryAll();
			
		//$t = Inventory::find()->where("nama_barang like '%$id%' or kode_inventory like '%$id%'")->select("id_inventory as id, concat(kode_inventory,  , nama_barang) as `text`")->asArray()->all();
		$t = $command->queryAll();
		$list = array();
		$key = 0;
		
		echo json_encode($t);
	}
	
	public function actionCustomer()
	{
		
		$id = $_GET['customer'];
		$model = Customer::findOne($id);
		/* echo */ return $model->email;
	}
	
	public function actionDetailInv2()
	{
		
		$id = $_GET['barang'];
		$harga = str_replace(",", "",$_GET['harga']);
		$qty = $_GET['qty'];
		$brand = $_GET['brand'];
		$diskon = $_GET['diskon'];
		$total = $harga * $qty - ($harga * $qty * $diskon / 100);
		
		
		$t = Inventory::findOne($id);
		$tr = "<tr id='tr_' . $t->id_inventory>";
		if(!$t)
		{
			$t = Inventory::find()->where(["kode_inventory"=>$id])->one();
		}
		
		$tr.="<td>" . $t->kode_inventory . "</td>";
		$tr.="<td>" . $t->nama_barang . "</td>";		
		$tr.="<td>" . $brand . "</td>";	
		$tr.="<td>
		<input type='hidden' name='id[]' value='" . $t->id_inventory . "'/>
		<input type='hidden' name='brand_" . $t->id_inventory . "' value='" . $brand . "'/>
		<input type='hidden' name='harga_" . $t->id_inventory . "' value='" . $harga . "'/>
		<input type='text' disabled name='harga_" . $t->id_inventory . "' value='" . number_format($harga) . "' class='form-control'/></td>";
		$tr.="<td>
		<input type='hidden' name='qty_" . $t->id_inventory . "' value='" . $qty . "'/>
		<input type='text' disabled name='qty_" . $t->id_inventory . "' value='" . number_format($qty) . "' class='form-control'/></td>";
		$tr.="<td>
		<input type='hidden' name='diskon_" . $t->id_inventory . "' value='" . $diskon . "'/>
		<input type='text' disabled name='diskon_" . $t->id_inventory . "' value='" . $diskon . "' class='form-control'/></td>";
		$tr.="<td>
		<input type='hidden' name='total_" . $t->id_inventory . "' value='" . $total . "'/>
		<input type='text' disabled name='total_" . $t->id_inventory . "' value='" . number_format($total) . "' class='form-control'/></td>";
		
		$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
		$tr .="</tr>";
		/* echo */ return $tr;
	}
	
	public function actionDetailInv3()
	{
		
		$id = $_GET['barang'];
		$harga = $_GET['harga'];
		$qty = $_GET['qty'];
		
		$diskon = $_GET['diskon'];
		$total = $harga * $qty - ($harga * $qty * $diskon / 100);
		
		
		$t = Inventory::find()->where(["kode_inventory"=>$id])->one();
		$tr = "<tr id='tr_' . $t->id_inventory>";
		$tr.="<td>" . $t->kode_inventory . "</td>";
		$tr.="<td>" . $t->nama_barang . "</td>";		
	
		$tr.="<td>
		<input type='hidden' name='id[]' value='" . $t->kode_inventory . "'/>
		<input type='hidden' name='nama_" . $t->kode_inventory . "' value='" . $t->nama_barang . "'/>
		<input type='hidden' name='harga_" . $t->kode_inventory . "' value='" . $harga . "'/>
		<input type='text' disabled name='harga_" . $t->kode_inventory . "' value='" . number_format($harga) . "' class='form-control harga'/></td>";
		$tr.="<td>
		<input class='form-control' type='text' disabled name='qqty_" . $t->kode_inventory . "' value='" . 0 . "'/></td><td>
		<input type='text' name='qty_" . $t->kode_inventory . "' value='" . number_format($qty) . "' class='form-control qty'/></td>";
		$tr.="<td>
		<input type='hidden' name='diskon_" . $t->kode_inventory . "' value='" . $diskon . "'/>
		<input type='text' disabled name='diskon_" . $t->kode_inventory . "' value='" . $diskon . "' class='form-control diskon'/></td>";
		$tr.="<td>
		<input type='hidden' name='total_" . $t->kode_inventory . "' value='" . $total . "'/>
		<input type='text' disabled name='total_" . $t->kode_inventory . "' value='" . number_format($total) . "' class='form-control total'/></td>";
		
		$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
		$tr .="</tr>";
		/* echo */ return $tr;
	}
	
	public function actionDetailInv5()
	{
		
		$id = $_GET['barang'];
		$harga = $_GET['harga'];
		$qty = $_GET['qty'];
		$brand = $_GET['brand'];
		
		$diskon = $_GET['diskon'];
		$total = $harga * $qty - ($harga * $qty * $diskon / 100);
		
		
		$t = Inventory::find()->where(["kode_inventory"=>$id])->one();		
		if(!$t)
		{
			$t = Inventory::find()->where(["id_inventory"=>$id])->one();
		}
		$tr = "<tr id='tr_' . $t->id_inventory>";
		$tr.="<td>" . $t->kode_inventory . "</td>";
		$tr.="<td>" . $t->nama_barang . "</td>";		
		$tr.="<Td><input type='text'  name='brand_" . $t->id_inventory . "' value='" . $brand . "' class='form-control brand'/></td>";
		$tr.="<td>
		<input type='hidden' name='id[]' value='" . $t->id_inventory . "'/>
		<input type='hidden' name='nama_" . $t->id_inventory . "' value='" . $t->nama_barang . "'/>
		<input type='hidden' name='harga_" . $t->id_inventory . "' value='" . $harga . "'/>
		<input type='text' disabled name='harga_" . $t->id_inventory . "' value='" . number_format($harga) . "' class='form-control harga'/></td>";
		$tr.="<td>
		<input type='text' name='qty_" . $t->id_inventory . "' value='" . number_format($qty) . "' class='form-control qty'/></td>";
		$tr.="<td>
		<input type='hidden' name='diskon_" . $t->id_inventory . "' value='" . $diskon . "'/>
		<input type='text' disabled name='diskon_" . $t->id_inventory . "' value='" . $diskon . "' class='form-control diskon'/></td>";
		$tr.="<td>
		<input type='hidden' name='total_" . $t->id_inventory . "' value='" . $total . "'/>
		<input type='text' disabled name='total_" . $t->id_inventory . "' value='" . number_format($total) . "' class='form-control total'/></td>";
		
		$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
		$tr .="</tr>";
		/* echo */ return $tr;
	}
	
	public function actionDetailInv4()
	{
		$brand = $_GET['brand'];
		$id = $_GET['barang'];
		$harga = $_GET['harga'];
		$qty = $_GET['qty'];
		
		$diskon = $_GET['diskon'];
		$total = $harga * $qty - ($harga * $qty * $diskon / 100);
		
		
		$t = Inventory::find()->where(["kode_inventory"=>$id])->one();
		if(!$t)
		{
			$t = Inventory::find()->where(["id_inventory"=>$id])->one();
		}
		$tr = "<tr id='tr_' . $t->id_inventory>";
		$tr.="<td>" . $t->kode_inventory . "</td>";
		$tr.="<td>" . $t->nama_barang . "</td>";		
		$tr.="<td><input type='text' name='brand_" . $t->id_inventory . "' value='" . $brand . "' class='form-control brand'/></td>";
	
		$tr.="<td>
		<input type='hidden' name='id[]' value='" . $t->id_inventory . "'/>
		<input type='hidden' name='nama_" . $t->id_inventory . "' value='" . $t->nama_barang . "'/>
		<input type='hidden' name='harga_" . $t->id_inventory . "' value='" . $harga . "'/>
		<input type='text' disabled name='harga_" . $t->id_inventory . "' value='" . number_format($harga) . "' class='form-control harga'/></td>";
		$tr.="<td>
		<input class='form-control' type='text' disabled name='qqty_" . $t->id_inventory . "' value='" . 0 . "'/></td><td>
		<input class='form-control' type='text' disabled name='qqqty_" . $t->id_inventory . "' value='" . 0 . "'/></td><td>
		<input type='text' name='qty_" . $t->id_inventory . "' value='" . number_format($qty) . "' class='form-control qty'/></td>";
		$tr.="<td>
		<input type='hidden' name='diskon_" . $t->id_inventory . "' value='" . $diskon . "'/>
		<input type='text' disabled name='diskon_" . $t->id_inventory . "' value='" . $diskon . "' class='form-control diskon'/></td>";
		$tr.="<td>
		<input type='hidden' name='total_" . $t->id_inventory . "' value='" . $total . "'/>
		<input type='text' disabled name='total_" . $t->id_inventory . "' value='" . number_format($total) . "' class='form-control total'/></td>";
		
		$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
		$tr .="</tr>";
		/* echo */ return $tr;
	}
	
	public function actionDetailQ()
	{
		
		$idq = $_GET['id'];
		$r = array();
		$detail = VQuotationDetail::find()->where(["id_quotation"=>$idq])->all();
		$tr = "";
		
		$connection = Yii::$app->getDb();				
		foreach($detail as $t)
		{
			$sql = "select coalesce(sum(qty), 0)
			from order_detail a join order_header b on a.id_order_header = b.id_order join inventory c on c.kode_inventory = a.kode_inventory where 
			id_quotation = $idq and id_inventory = $t->id_inventory";
			$command = $connection->createCommand($sql);
			$ordered = $command->queryScalar();
			
			$harga = $t->harga;
			$qty = $t->qty;
			$diskon = $t->diskon;
			$total = $harga * ($qty - $ordered) - ($harga * ($qty - $ordered) * $diskon / 100);
			
			$id = $t->id_inventory;
			$tr .= "<tr id='tr_$id'>";
			$t = Inventory::find()->where(["id_inventory"=>$id])->one();
			$tr.="<td>" . $t->kode_inventory . "</td>";
			$tr.="<td>" . $t->nama_barang . "</td>";		
			
		
			$tr.="<td>
			<input type='hidden' name='id[]' value='" . $t->kode_inventory . "'/>
			<input type='hidden' name='nama_" . $t->kode_inventory . "' value='" . $t->nama_barang . "'/>
			<input type='hidden' name='harga_" . $t->kode_inventory . "' value='" . $harga . "'/>
			<input type='text' disabled name='harga_" . $t->kode_inventory . "' value='" . number_format($harga) . "' class='form-control harga'/></td>";
			$tr.="<td>
			<input type='text' disabled class='form-control' name='qqty_" . $t->kode_inventory . "' value='" . $qty . "'/>
			</td><td>
			<input type='text' disabled class='form-control' name='qqqty_" . $t->kode_inventory . "' value='" . $ordered . "'/>
			</td><td><input type='number' max='" . ($qty - $ordered) . "'  name='qty_" . $t->kode_inventory . "' value='" . ($qty - $ordered) . "' class='form-control qty'/></td>";
			$tr.="<td>
			<input type='hidden' name='qdiskon_" . $t->kode_inventory . "' value='" . $diskon . "'/>
			<input type='text'  name='diskon_" . $t->kode_inventory . "' value='" . $diskon . "' class='form-control diskon'/></td>";
			$tr.="<td>
			<input type='hidden' name='total_" . $t->kode_inventory . "' value='" . $total . "'/>
			<input type='text' disabled name='total_" . $t->kode_inventory . "' value='" . number_format($total) . "' class='form-control total'/></td>";
			
			$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
			$tr .="</tr>";
		}
		
		$r['deliver_to'] = '';
		$r['id_customer'] = '';
		$id = $_GET['id'];
		$q = Quotation::findOne($id);
		
		if($q)
		{
			$r['deliver_to'] = $q->deliver_to;
			$r['id_customer'] = $q->id_customer;
		}
		else 
			$r['deliver_to'] = '';
		
		$r['data'] = $tr;
		/* echo */ return json_encode($r);
	}
	
	public function actionDetailQ2()
	{
		
		$idq = $_GET['id'];
		$r = array();
		$detail = VQuotationDetail::find()->where(["id_quotation"=>$idq])->all();
		$tr = "";
		
		$connection = Yii::$app->getDb();				
		foreach($detail as $t2)
		{
			$sql = "select coalesce(sum(qty), 0)
			from order_detail a join order_header b on a.id_order_header = b.id_order join inventory c on c.kode_inventory = a.kode_inventory where 
			id_quotation = $idq and id_inventory = $t2->id_inventory";
			$command = $connection->createCommand($sql);
			$ordered = $command->queryScalar();
			
			$harga = $t2->harga;
			$qty = $t2->qty;
			$diskon = $t2->diskon;
			$total = $harga * ($qty - $ordered) - ($harga * ($qty - $ordered) * $diskon / 100);
			
			$id = $t2->id_inventory;
			$tr .= "<tr id='tr_$id'>";
			$t = Inventory::find()->where(["id_inventory"=>$id])->one();
			$tr.="<td>" . $t->kode_inventory . "</td>";
			$tr.="<td>" . $t->nama_barang . "</td>";		
			$tr.="<td><input type='text' name='brand_" . $t->id_inventory . "' value='" . $t2->brand . "' class='form-control brand'/></td>";
			$tr.="<td>
			<input type='hidden' name='id[]' value='" . $t->id_inventory . "'/>
			<input type='hidden' name='nama_" . $t->id_inventory . "' value='" . $t->nama_barang . "'/>
			<input type='hidden' name='harga_" . $t->id_inventory . "' value='" . $harga . "'/>
			<input type='text' disabled name='harga_" . $t->id_inventory . "' value='" . number_format($harga) . "' class='form-control harga'/></td>";
			$tr.="<td>
			<input type='text' disabled class='form-control' name='qqty_" . $t->id_inventory . "' value='" . $qty . "'/>
			</td><td>
			<input type='text' disabled class='form-control' name='qqqty_" . $t->id_inventory . "' value='" . $ordered . "'/>
			</td><td><input type='number' max='" . ($qty - $ordered) . "'  name='qty_" . $t->id_inventory . "' value='" . ($qty - $ordered) . "' class='form-control qty'/></td>";
			$tr.="<td>
			<input type='hidden' name='qdiskon_" . $t->id_inventory . "' value='" . $diskon . "'/>
			<input type='text'  name='diskon_" . $t->id_inventory . "' value='" . $diskon . "' class='form-control diskon'/></td>";
			$tr.="<td>
			<input type='hidden' name='total_" . $t->id_inventory . "' value='" . $total . "'/>
			<input type='text' disabled name='total_" . $t->id_inventory . "' value='" . number_format($total) . "' class='form-control total'/></td>";
			
			$tr.="<td><a href='' class='remove'><span class='fa fa-trash'></span></a></td>";
			$tr .="</tr>";
		}
		
		$r['deliver_to'] = '';
		$r['id_customer'] = '';
		$id = $_GET['id'];
		$q = Quotation::findOne($id);
		
		if($q)
		{
			$r['deliver_to'] = $q->deliver_to;
			$r['id_customer'] = $q->id_customer;
		}
		else 
			$r['deliver_to'] = '';
		
		$r['data'] = $tr;
		/* echo */ return json_encode($r);
	}
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'logout'],
                'rules' => [
     				[
						'allow' => true,
						'actions' => ['index'],
						'roles' => ['@'],
					],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'logout' => ['post'],
                ],
            ],
        ];
    }
	
	public function actionPrint()
	{
	}

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	public function actionGrafikDelivery($company)
	{
		
		$sql = "SELECT 'Januari' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 1 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Februari' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 2 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Maret' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 3 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'April' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 4 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Mei' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 5 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Juni' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 6 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Juli' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 7 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Agustus' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 8 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'September' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 9 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Oktober' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 10 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'November' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 11 and a.order_id in (select id_order from order_header where id_company = '$company')
		union
		SELECT 'Desember' as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		where month(tgl_delivery) = 12 and a.order_id in (select id_order from order_header where id_company = '$company')		
				";
				
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
	
		Yii::$app->response->format = Response::FORMAT_JSON;		
		$result = ['data'=>$result];
		return $result;
	}
	
	public function actionGrafikDeliveryPerSales($company)
	{
		
		$sql = "SELECT 'Januari' as jenis, nama_user, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header 
		join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 1 
		group by nama_user		
		union
		SELECT 'Februari' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 2 
		group by nama_user		
		union
		SELECT 'Maret' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 3 
		group by nama_user		
		union
		SELECT 'April' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 4 
		group by nama_user		
		union
		SELECT 'Mei' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 5 
		group by nama_user		
		union
		SELECT 'Juni' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 6 
		group by nama_user		
		union
		SELECT 'Juli' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 7 
		group by nama_user		
		union
		SELECT 'Agustus' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 8 
		group by nama_user		
		union
		SELECT 'September' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 9 
		group by nama_user		
		union
		SELECT 'Oktober' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 10 
		group by nama_user		
		union
		SELECT 'November' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 11 
		group by nama_user		
		union
		SELECT 'Desember' as jenis, nama_user,coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header join order_header o on o.id_order = a.order_id and o.id_company = '$company'
		join `user` u on o.id_sales = u.id_user
		where month(tgl_delivery) = 12 
		group by nama_user		
				";
				
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
	
		Yii::$app->response->format = Response::FORMAT_JSON;		
		$result = ['data'=>$result];
		return $result;
	}
	
	public function actionGrafikOrder($company)
	{
		
		$sql = "SELECT 'Januari' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 1 and a.id_company = $company
		union
		SELECT 'Februari' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 2 and a.id_company = $company
		union
		SELECT 'Maret' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 3 and a.id_company = $company
		union
		SELECT 'April' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 4 and a.id_company = $company
		union
		SELECT 'Mei' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 5 and a.id_company = $company
		union
		SELECT 'Juni' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 6 and a.id_company = $company
		union
		SELECT 'Juli' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 7 and a.id_company = $company
		union
		SELECT 'Agustus' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 8 and a.id_company = $company
		union
		SELECT 'September' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 9 and a.id_company = $company
		union
		SELECT 'Oktober' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 10 and a.id_company = $company
		union
		SELECT 'November' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 11 and a.id_company = $company
		union
		SELECT 'Desember' as jenis, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		where month(tgl_order) = 12 and a.id_company = $company		
				";
				
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
	
		Yii::$app->response->format = Response::FORMAT_JSON;		
		$result = ['data'=>$result];
		return $result;
	}
	
	public function actionGrafikOrderPerSales($company)
	{
		
		$sql = "SELECT 'Januari' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 1 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Februari' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 2 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Maret' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 3 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'April' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 4 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Mei' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 5 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Juni' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 6 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Juli' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 7 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Agustus' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 8 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'September' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 9 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Oktober' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 10 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'November' as jenis, coalesce(x.nama_user, '') as nama_user,coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 11 and a.id_company = $company
		group by x.nama_user
		union
		SELECT 'Desember' as jenis, coalesce(x.nama_user, '') as nama_user, coalesce(sum(price * qty - (price * qty * coalesce(discount,0) / 100)), 0) as jml
		from order_header a join order_detail b on a.id_order = b.id_order_header
		right join `user` x on x.id_user = a.id_sales
		where month(tgl_order) = 12 and a.id_company = $company		
		group by x.nama_user
				";
				
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
	
		Yii::$app->response->format = Response::FORMAT_JSON;		
		$result = ['data'=>$result];
		return $result;
	}
	
	public function actionGrafikTop10Customer($company)
	{
		$first = date("Y") . "-" . date("m") . "-01";
		$sql = "SELECT nama_customer as jenis, coalesce(sum(price * jml_kirim - (price * jml_kirim * coalesce(discount,0) / 100)), 0) as jml
		from delivery_header a join delivery_detail b on a.delivery_order_id = b.id_delivery_header
		join order_header c on c.id_order = a.order_id 
		join customer d on d.id_customer = c.id_customer
		where tgl_delivery between '$first' and current_date
		order by 2 desc
		limit 10
				
				";
				
		
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand($sql);
		$result = $command->queryAll();
		
	
		Yii::$app->response->format = Response::FORMAT_JSON;		
		$result = ['data'=>$result];
		return $result;
	}
	
	
    public function actionIndex()
    {
		
		return $this->render('index', [
				
        ]);
    }

    public function actionLogin()
    {
		$this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {											
			return $this->goBack();			
        }		
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }   
	
	  public function actionPassword(){
		  $this->selected = 'Ganti Password';
        $model = new PasswordForm;
		$model->username = Yii::$app->user->identity->username;
        $modeluser = User::find()->where([
            'username'=>Yii::$app->user->identity->username
        ])->one();
      
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{					
                    $modeluser->password = md5($_POST['PasswordForm']['newpass']);
                    if($modeluser->save(false)){
                        Yii::$app->getSession()->setFlash(
                            'password_success','Password berhasil diubah'
                        );						
                        return $this->redirect(['password']);
                    }else{
						
                        Yii::$app->getSession()->setFlash(
                            'password_error','Password gagal diubah'
                        );
                        return $this->redirect(['password']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'password_error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }
} 
