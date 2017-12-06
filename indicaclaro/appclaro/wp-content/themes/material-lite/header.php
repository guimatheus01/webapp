<?php
/**
 * @version    1.0
 * @package    Material Lite
 * @author     Ghuwad Team <contact@ghuwad.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.ghuwad.com
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	 <!-- 
        DESENVOLVIMENTO : MEOAPP
        PROGRAMAÇÃO : GUILHERME MATHEUS 
    -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<meta name="mobile-web-app-capable" content="yes">
	<title><?php wp_title( ' ', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- Bootstrap core CSS     -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo get_template_directory_uri() ?>/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
    <?php material_lite_theme_favicon(); ?>
</head>

<?php if (is_page() == "login" || is_page() == "cadastro-de-parceiro"): ?>
<div class="container">
    <ul class="nav navbar-nav">
        <li style="display: inline-block !important;">
            <a style="color:#fff;" href="./">
                <i class="material-icons">dashboard</i> Voltar
            <div class="ripple-container"></div></a>
        </li>
        <?php if (is_user_logged_in()): ?>
        <li style="display: inline-block !important;" class="">
            <a style="color:#fff;" href="<?php echo home_url() ?>/backoffice">
                <i class="material-icons">line_weight</i> Backoffice
            </a>
        </li>
        <li style="display: inline-block !important;" class="">
            <a style="color:#fff;" href="<?php echo wp_logout_url(); ?>">
                <i class="material-icons">person_add</i> Sair
            </a>
        </li>
        <?php endif ?>
    </ul>
</div>
<?php endif ?>

<body style="background: #F44336;">
