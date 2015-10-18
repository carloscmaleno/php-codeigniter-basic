<?php
 /**
  * File: header.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     26/08/15 10:53
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */

?>
<!DOCTYPE html>
<html class="ltr" dir="ltr" lang="es-ES">
<head>
    <title><?php echo $meta_title ?></title>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type"/>
    <meta name="description" content="">
    <meta name="distribution" content="global">
    <meta content="" name="origen">
    <meta content="" name="author">
    <meta content="" name="organization">
    <meta content="Barcelona, Espa&ntilde;a" name="locality">
    <meta content="es" name="lang">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    foreach ($css_files as $css) {
        if (stripos($css, 'http') !== false) {
            echo '<link href="'.$css.'" rel="stylesheet" media="screen">';
        } else {
            echo '<link href="'.getTemplateCssUrl($css).'" rel="stylesheet" media="screen">';
        }
    }
    ?>
</head>
<body dir="ltr">

        <!-- HEADER -->
        <header class="main_header">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo site_url()?>" class="navbar-brand">PHP-Codeigniter-base</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo site_url('contacto')?>">Contacto</a></li>
                            <?php if ($is_logged): ?>
                            <li><a href="<?php echo site_url('salir')?>">Salir</a></li>
                            <?php else: ?>
                            <li><a href="<?php echo site_url('registro')?>">Registrate</a></li>
                            <?php endif ?>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </header>

        <!-- MAIN CONTENT -->
        <main>
            <div class="container-fluid">
