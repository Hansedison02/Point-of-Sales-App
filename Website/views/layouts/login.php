
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo Yii::$app->name . ' - Sign In'; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>


</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" style="background-attachment: fixed;background-size:cover; background-repeat: no-repeat;background-image:url('<?php echo Yii::$app->request->baseUrl?>/images/background.jpg');">


<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<!--<div class="logo">
	<a href="#">
	<img src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/img/logo-big.png" alt=""/>
	</a>
</div>
-->
<!-- END LOGO -->
<!-- BEGIN LOGIN -->


<?php echo $content; ?>

<div class="copyright">
	 2020 © <?php echo Yii::$app->name; ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/respond.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/css/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
