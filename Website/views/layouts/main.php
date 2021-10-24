<?php /* @var $this Controller */ 
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\assets\AppAsset;

$level = Yii::$app->user->identity->level;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<?php $this->head() ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<?= Html::csrfMetaTags() ?>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>	
	<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
	
	<title><?php echo Yii::$app->name . ' - ' . Yii::$app->controller->selected ?></title>
	<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.min.js" type="text/javascript"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>-->
	
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"/>
	<style>
	.page-sidebar .page-sidebar-menu .sub-menu li > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu li > a
	{
		font-size:13px !important;
	}
	</style>
	
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<!--<img src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/img/logo.png" alt="logo" class="logo-default"/>-->
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">								
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->			
				<?php if (!\Yii::$app->user->isGuest) { ?>
						
				<li class="dropdown dropdown-user">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username username-hide-on-mobile">
					<?php echo Yii::$app->user->identity->username; ?></span>
					<!--<i class="fa fa-angle-down"></i>-->
					</a>
					<ul class="dropdown-menu dropdown-menu-default">			

						<li>
							<a href="<?php echo Yii::$app->urlManager->createUrl('site/password'); ?>">
							<i class="icon-user"></i> Ganti Password </a>
						</li>					
						<li>
							<a href="<?php echo Yii::$app->urlManager->createUrl('site/logout'); ?>">
							<i class="icon-key"></i> Log Out </a>
						</li>	
							
					</ul>
				</li>
				
				<?php }?>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="<?php echo Yii::$app->urlManager->createUrl('site/logout'); ?>" class="dropdown-toggle">
					<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">	
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					&nbsp;
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>						
				
				
				
				<?php if (!\Yii::$app->user->isGuest) { ?>
				
				
					<li class="start <?php if(Yii::$app->controller->selected == 'Dashboard') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('site/index');?>">
						<i class="icon-home"></i>
						<span class="title">Beranda</span>					
							<?php if(Yii::$app->controller->selected == "Dashboard") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
				
				
					
					
					
				
					<li class="start <?php if(Yii::$app->controller->selected == 'Kategori') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('kategori/index');?>">
						<i class="icon-envelope"></i>
						<span class="title">Kategori</span>					
							<?php if(Yii::$app->controller->selected == "Kategori") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
				
					<li class="start <?php if(Yii::$app->controller->selected == 'Produk') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('produk/index');?>">
						<i class="icon-globe"></i>
						<span class="title">Produk</span>					
							<?php if(Yii::$app->controller->selected == "Produk") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>	
					
					
				
					
					
			
					
					<li class="start <?php if(Yii::$app->controller->selected == 'Ganti Password') { echo 'active'; } ?> open">
						<a href="<?php echo Yii::$app->urlManager->createUrl('site/password');?>">
						<i class="icon-volume-2"></i>
						<span class="title">Ganti Password</span>					
							<?php if(Yii::$app->controller->selected == "Ganti Password") { ?>
							<span class="selected"></span>					
						<?php } ?>			
						</a>					
					</li>
				
			<?php } ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
				<!--<div class="page-breadcrumb">
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
				</div>-->
			
			
			
			
			<?php echo $content; ?>			
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">		 
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/scripts/components-pickers.js"></script>

<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jquery.numeric.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jshashtable-3.0.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/jquery.numberformatter-1.2.4.jsmin.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script src="http://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
	jQuery(document).ready(function() {  	   		
	   Metronic.init(); // init metronic core componets
	   Layout.init(); // init layout
	   QuickSidebar.init(); // init quick sidebar   
	   ComponentsPickers.init();
	   $("select").not("#barang").select2();
	   $("#barang").select2({
		  minimumInputLength: 2,
          allowClear: true, 
		  ajax: {
			dataType:"json",
			
			url: "<?php echo Yii::$app->urlManager->createUrl('site/inventory'); ?>",
			 processResults: function (data) {
			  // Transforms the top-level key of the response object from 'items' to 'results'
			  console.log(data);
			  return {
				results: data
			  };
			}
		  }
		});
	   $(".datepicker").datepicker({
		   format:'dd-mm-yyyy',
		   autoclose: true
	   });
	  
	   $('input.number').keyup(function(event) {

		  // skip for arrow keys
		  if(event.which >= 37 && event.which <= 40) return;

		  // format number
		  $(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			;
		  });
		});
	});
</script>

<!-- END JAVASCRIPTS -->
<?php $this->endBody() ?>
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>