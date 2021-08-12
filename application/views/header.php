<?php 
/**** header ****/
?>

<!DOCTYPE HTML>
<?php 
/**** header ****/
?>
<html>
<title>Xecute</title>
<head>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/include/css/style.css" />

<!--dashboard page load-->
	<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>/include/js/jquery-1-8-2.js"></script>

<!--fullcalendar-->	
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>/include/css/fullcalendar.css' />
<script type='text/javascript' src='<?php echo base_url();?>/include/js/fullcalendar/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/include/js/fullcalendar/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>/include/js/fullcalendar/fullcalendar.min.js'></script>

<!--jquery form-->
<script type="text/javascript" src='<?php echo base_url();?>/include/js/jquery.form.js'></script>

<!--lightbox-->
<script type='text/javascript' src='<?php echo base_url();?>/include/js/lightbox-form.js'></script>
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>/include/css/lightbox-form.css' />

<!--dashboard page load-->
	<script language="JavaScript" type="text/javascript">
		$(document).ready(function(){

			$('#home-nav').click(function(){
				$('#load-page').load('<?php echo base_url();?>index.php/todo/view_dashboard_subpages #home-content',function(){$('#load-page').fadeIn(1000);

					document.getElementById('home-nav').className = 'nav-items-selected';
					document.getElementById('todo-nav').className = 'nav-items'; 
					document.getElementById('gal-nav').className = 'nav-items';              
					document.getElementById('arch-nav').className = 'nav-items'; 
					document.getElementById('set-nav').className = 'nav-items'; 

				});
			});

			$('#todo-nav').click(function(){
				$('#load-page').load('<?php echo base_url();?>index.php/todo/view_dashboard_calendar',function(){$('#load-page').fadeIn(1000);});
				
					document.getElementById('home-nav').className = 'nav-items';
					document.getElementById('todo-nav').className = 'nav-items-selected'; 
					document.getElementById('gal-nav').className = 'nav-items';              
					document.getElementById('arch-nav').className = 'nav-items'; 
					document.getElementById('set-nav').className = 'nav-items'; 

			});

			$('#gal-nav').click(function(){
				$('#load-page').load('<?php echo base_url();?>index.php/todo/view_dashboard_subpages #gallery-content',function(){$('#load-page').fadeIn(1000);});

					document.getElementById('home-nav').className = 'nav-items';
					document.getElementById('todo-nav').className = 'nav-items'; 
					document.getElementById('gal-nav').className = 'nav-items-selected';              
					document.getElementById('arch-nav').className = 'nav-items'; 
					document.getElementById('set-nav').className = 'nav-items';

			});

			$('#arch-nav').click(function(){
				$('#load-page').load('<?php echo base_url();?>index.php/todo/view_dashboard_subpages #archives-content',function(){$('#load-page').fadeIn(1000);});

					document.getElementById('home-nav').className = 'nav-items';
					document.getElementById('todo-nav').className = 'nav-items'; 
					document.getElementById('gal-nav').className = 'nav-items';              
					document.getElementById('arch-nav').className = 'nav-items-selected'; 
					document.getElementById('set-nav').className = 'nav-items';

			});

			$('#set-nav').click(function(){
				$('#load-page').load('<?php echo base_url();?>index.php/todo/view_dashboard_subpages #settings-content',function(){$('#load-page').fadeIn(1000);});

					document.getElementById('home-nav').className = 'nav-items';
					document.getElementById('todo-nav').className = 'nav-items'; 
					document.getElementById('gal-nav').className = 'nav-items';              
					document.getElementById('arch-nav').className = 'nav-items'; 
					document.getElementById('set-nav').className = 'nav-items-selected';

			});
		});
	</script>

</head>
<body>

<header>
	<div id="head-nav">

		<section id="sect-1">
			<ul id="logo-cont">
				<li> <a href="#"><img src="<?php echo base_url();?>/include/images/xecute_logo.png"></a></li>
			</ul>
		</section>

		<nav id="nav-1">
			<ul id="menu-1">
				<li class="select-1"><a href=""><img src="<?php echo base_url();?>/include/images/ppic_thumbnail.png"> Damon Salvatore&nbsp;&nbsp;</a></li>
				<li class="select-1" id="home"><a href="">&nbsp;&nbsp;Home&nbsp;&nbsp;</a></li>
				<li class="select-1"><a href="">&nbsp;&nbsp;<img src="<?php echo base_url();?>/include/images/notify_icon.png">&nbsp;&nbsp;</a></li>
				<li id="logout"><a href="">&nbsp;&nbsp;Logout</a></li>
			</ul>
		</nav>

	</div>
</header>