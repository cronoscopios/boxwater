<?php get_header(); ?>


<div class="banner-w3pvt-info">
        <div class="overlay-w3ls">
            <div class="banner-content text-center animate__animated animate__bounceInUp">
                <h3>eCommerce. Community Manager. Audiovisual. </h3>
            </div>
        </div>
    </div>
</div>

<main>

<!--//team -->
<section  class="banner-bottom py-lg-5 py-4">
    <div id="about" class="container py-lg-5">
        <h3 class="title-w3ls text-center"> El equipo</h3>
        <div class="row mt-lg-5 mt-4">
            <div class="col-md-4 team-gd text-center">
                <div class="team-img mb-4">
                    <img src="http://box-water.local/wp-content/themes/boxwater/images/team1.jpg" class="img-fluid" alt="user-image">
                </div>
                <div class="team-info">
                    <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">eCommerce</span> Adrián</h3>
                    <p>WordPress & WooCommerce</p>
                </div>
            </div>

            <div class="col-md-4 team-gd second text-center">
                <div class="team-img mb-4">
                    <img src="http://box-water.local/wp-content/themes/boxwater/images/team2.jpg" class="img-fluid" alt="user-image">
                </div>
                <div class="team-info">
                    <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Community Manager</span>  Yamila</h3>
                    <p>Redes sociales & Marketing digital</p>
                </div>
            </div>
            <div class="col-md-4 team-gd text-center">
                <div class="team-img mb-4">
                    <img src="http://box-water.local/wp-content/themes/boxwater/images/team3.jpg" class="img-fluid" alt="user-image">
                </div>
                <div class="team-info">
                    <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Audiovisual</span>  Josi</h3>
                    <p>Dirección de arte & creatividad </p>
                </div>
            </div>
        </div>

    </div>
</section>
<!--//team -->


<!--/services -->
<section id="services" class="testimonials-content">
    <div class="container-fluid">
        <div class="row">
<?php
$args = array(
'post_type' => 'project',
'posts_per_page' => 4
);

$project = new WP_Query($args);

while ( $project -> have_posts() ){
$project -> the_post();
?>
            <div class="col-md-6 test-grid test-grid-two text-center p-0">
                <a href="<?php the_permalink(); ?>" target="_blank" rel="">
                    <div class="overlay-ser1">
                        <div class="testi-info">
                            <p><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
                            <h4 class="mt-md-4 mt-3"><?php the_title(); ?></h4>
                        </div>
                    </div>
                </a>
            </div>
<?php 
} 
wp_reset_query(); 
?>         
        </div>
    </div>
</section>
<!--/services -->



       <!--  <a href="<?php //echo site_url( '/blog' ); ?>">
            <h2 class="section-heading">All Blogs</h2>
        </a> -->
<!-- 
        <section>
        
        <?php
          /*   $args = array(
                'post_type' => 'post',
                'posts_per_page' => 2
            );

            $blogPost = new WP_Query($args);

            while ( $blogPost -> have_posts() ){
                $blogPost -> the_post(); */
            
        ?>

            <div class="card">
                <div class="card-image">
                    <a href="<?php //the_permalink(); ?>">
                        <img src="<?php //echo get_the_post_thumbnail_url( get_the_ID() ); ?>" alt="Card Image">
                    </a>
                </div>

                <div class="card-description">
                    <a href="<?php //the_permalink(); ?>">
                        <h3><?php //the_title(); ?></h3>
                    </a>
                    <p><?php //echo wp_trim_words( get_the_excerpt(), 30 ) ; ?></p>
                    <a href="<?php //the_permalink(); ?>" class="btn-readmore">Read more</a>
                </div>
            </div>

        <?php 
        //} 
            //wp_reset_query(); 
        ?>

        </section> -->
<?php get_footer(); ?>