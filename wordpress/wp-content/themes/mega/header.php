<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mega
 */
$get_template_directory_uri=get_template_directory_uri();
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="viewport"
		content="width=device-width, shrink-to-fit=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta charset="<?php bloginfo( 'charset' ); ?>">


	<?php wp_head(); ?>

	<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>
<?php  // $tel = get_field('телефон', 'option');
					// 	$tel_str = str_replace(" ","", $tel);  
    ?>
<!-- <body  > -->

<body>
	<div class="main-wrapper">
		<!-- start header-->
		<header class="header" id="header">
			<!-- start top-nav-->
			<div class="top-nav block-with-lazy">
				<div class="container">
					<div class="top-nav__row row align-items-center gy-3">
						<div class="col"><a class="top-nav__logo" href="/"><img loading="lazy" src="<?php echo $get_template_directory_uri;?>/public/img/svg/logo.svg" alt=""/></a>
						</div>
						<div class="col-auto d-lg-none"><a class="top-nav__number d-block mb-2" href="tel:88129856005">8 (812) 985-60-05</a>
							<div class="top-nav__sub-row row justify-content-end justify-content-sm-start">
								<div class="col-auto"><a class="top-nav__soc" href="#"><img loading="lazy" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/wa.png" alt=""/></a>
								</div>
								<div class="col-auto"><a class="top-nav__soc" href="#"><img loading="lazy" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/tg.png" alt=""/></a>
								</div>
							</div>
						</div>
						<div class="col-auto d-none d-lg-block">
							<div class="top-nav__gray">Мы онлайн
							</div>
							<div class="top-nav__sub-row row">
								<div class="col-auto"><a class="top-nav__soc" href="#"><img loading="lazy" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/wa.png" alt=""/></a>
								</div>
								<div class="col-auto"><a class="top-nav__soc" href="#"><img loading="lazy" src="<?php echo $get_template_directory_uri;?>/public/img/@2x/tg.png" alt=""/></a>
								</div>
							</div>
						</div>
						<div class="col-auto d-none d-lg-block">
							<div class="top-nav__gray">Бесплатная консультация
							</div><a class="top-nav__number" href="tel:88129856005">8 (812) 985-60-05</a>
						</div>
						<div class="col-auto d-none d-sm-block"><a class="top-nav__callback-btn link-modal-js" href="#modal-call">Заказать звонок</a>
						</div>
						<div class="col-auto d-none d-md-block"> 
							<?php echo do_shortcode( '[bvi]' ); ?>
							
							<!-- <a class="top-nav__ver" href="?special_version=Y" >
							</a> -->
						</div>
					</div>
				</div>
			</div>
			<!-- end top-nav-->
		</header>
		<!-- end header-->