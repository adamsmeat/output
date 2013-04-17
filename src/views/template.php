<!doctype html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title><?=g('page_title').' | '.g('site_name')?></title>
	<?=$head_assets?>
</head>
<body>
	<div id="wrapAll">
		<div class="container-fluid">

			<div id="navbar"><?=$navbar?></div>
			<div id="breadcrumb"><?=$breadcrumb?></div>
			<?=$alerts?>
			
			<div class="row-fluid">
				<div id="sidebar" class="span3"><?=$sidebar?></div>
				<div id="content" class="span9">
					<h1 class="page-header"><?=g('page_title')?></h1>
					<?=$content?>
				</div>
			</div>

			<div id="footer"><?=$footer?></div>
		</div>		
	</div>
	<?=$footer_assets?>
</body>
</html>