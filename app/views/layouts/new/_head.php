<head>
     <?php Asset::registerCSS('application.themes.default.views.css.fonts'); ?>
     <?php Asset::registerCSS('application.themes.default.views.css.ui'); ?>
     <?php Asset::registerCSS('application.themes.default.views.css.component'); ?>
     <?php Asset::registerCSS('application.static.calendar.calendar'); ?>
     <?php
        if(file_exists(Setting::getRootPath() . '/app/static/custom.css')){
          Asset::registerCSS('app.static.custom');
        }
     ?>
     <?php Asset::registerCSS('application.themes.default.views.css.style', time()); ?>

     <!-- Custom -->
     <link rel="stylesheet" href="<?= Yii::app()->controller->url('/app/static/bootstrap/css/bootstrap.min.css'); ?>" type="text/css" />
     <?php Asset::registerCSS('app.static.bootstrap.self', time()); ?>
     <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
     <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js"></script>
     
     <title><?php echo CHtml::encode(Yii::app()->controller->pageTitle); ?></title>
     <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <?php ThemeManager::registerCoreScript(['/js/index.ctrl.js']); ?> 
     <link rel="icon" type="image/png" href="<?= Yii::app()->controller->url('app/static/gambar/title.png') ?>"/>
     
     <?php Asset::registerJS('application.themes.default.views.js.modernizr'); ?>
     <?php Asset::registerJS('application.themes.default.views.js.dlmenu'); ?>
     <script>
          paceOptions = {
            ajax: false, // disabled
            document: true, // disabled
            eventLag: true // disabled
          };
     </script>
     
     <?php Asset::registerJS('application.themes.default.views.js.mainctrl'); ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <?php Asset::registerJS('application.static.calendar.calendar-tpls'); ?>
     <script src="app/static/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>