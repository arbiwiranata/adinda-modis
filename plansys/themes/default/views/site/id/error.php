<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Plansys 2.0 | Error <?php echo $code; ?></title>	

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="plansys/themes/default/views/site/id/style.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>:(</h1>
			</div>
            <h2 style="color: red;">Error <?php echo $code; ?></h2>
            <h2><?php echo $message; ?></h2>
            <h4><?php echo $file . ' - Line '.$line; ?></h4>
            <pre style="max-height: 400px;"><?php echo $trace; ?></pre>
            <i>Plansys 2.0</i>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
