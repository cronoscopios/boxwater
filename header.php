<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">

    <?php wp_head(); ?>

    <title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>
</head>


<body>
<!-- main-content -->
<div class="main-content" id="home">
    <!-- header -->
    <header class="header">
        <div class="container-fluid">
            <!-- nav -->
            <nav class="py-2">
                <div id="logo">
                    <h1>
                        <a class="navbar-brand" href="<?php echo site_url(); ?>">box<span>water</span></a>
                    </h1>
                   <!--  <div id="logo-img">
                        <a href="<?php //echo site_url(); ?>">
                            <img src="<?php //echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
                        </a>
                    </div> -->
                </div>

                <label for="drop" class="toggle">Menu</label>
                <input type="checkbox" id="drop"/>
                <ul class="menu">
                    <li class="active"><a href="<?php echo site_url(); ?>">Inicio</a></li>
                    <li><a href="<?php echo site_url( '/about'); ?>">El equipo</a></li>
                    <li><a href="<?php echo site_url( '/services'); ?>">Trabajos</a></li>
                    <li><a href="<?php echo site_url( '/blog'); ?>">Blog</a></li>
                    <li><a href="<?php echo site_url( '/contact'); ?>">Hablemos</a></li>
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->


<?php if( !is_front_page() ) { ?>
    <main>
<?php } ?>
