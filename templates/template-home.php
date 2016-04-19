<?php
/* ---------------------------------------------------------------------------------------------------
	Template Name: Home
--------------------------------------------------------------------------------------------------- */
?>

<?php get_header(); ?>

<div class="module-slider container">
    <div class="cycle-slideshow" data-slides=".slide">
        <?php
        $args = array( 'posts_per_page' => -1, 'post_type' => 'post_type_slider');
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            ?>

            <div class="slide">
                <?php
                // If thumbnail added - display image
                if ( has_post_thumbnail() ) {
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider' );
                    $url = $thumb['0']; ?>
                    <div class="img">
                        <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
                    </div>
                <?php
                }
                ?>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
            <div class="cycle-prev"></div>
            <div class="cycle-pager"></div>
            <div class="cycle-next"></div>
    </div>
	<span class="accent"></span>
    <a class="scrollTo" href="#"><i class="fa fa-arrow-down"></i></a>
</div> <!-- end module slider -->

<div id="services" class="module module-services featured bg-color blue center">
    <div class="container">
        <h2>Diensten</h2>
        <div class="row">


            <?php
                $args = array( 'posts_per_page' => 4, 'post_type' => 'post_type_services');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>

                    <?php
                    $values = get_field('icoon_homepage');
                    ?>

                    <div class="col-md-3 col-sm-6">
                        <div class="icon" data-icon="<?php echo $values['url'] ?>"></div>
                        <h3><?php the_title(); ?></h3>
                    </div>

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>

        <?php if(get_field('diensten_pagina_link')) { ?>
            <div class="action">
                <a class="btn" href="<?php the_field('diensten_pagina_link') ?>">Bekijk onze diensten</a>
            </div>
        <?php } ?>
    </div>
</div> <!-- end module services -->

<div class="module module-about featured bg-color yellow">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <?php
                // If thumbnail added - display image
                if ( has_post_thumbnail() ) {
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home_about' );
                    $url = $thumb['0']; ?>
                    <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
                <?php
                }
                ?>
            </div>
            <div class="col-md-6 col-sm-6">
                <?php the_content(); ?>

                <?php if(get_field('over_leesbeest_pagina_link')) { ?>
                    <a class="btn" href="<?php the_field('over_leesbeest_pagina_link') ?>">Lees verder</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="module module-testimonials featured bg-color darkblue center">
    <div class="container">
        <h2>Referenties</h2>

        <?php
            $refLink = get_field('referenties_pagina_link');
            $args = array( 'posts_per_page' => 1, 'post_type' => 'pt_testimonials');
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
        ?>

                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="img">
                            <?php
                            // If thumbnail added - display image
                            if ( has_post_thumbnail() ) {
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'testimonial_single' );
                                $url = $thumb['0']; ?>
                                <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <blockquote>
                            <p><?php the_excerpt(); ?></p>
                            <footer><?php the_title(); ?></footer>
                        </blockquote>

                        <?php if($refLink) { ?>
                            <a class="more" href="<?php echo $refLink ?>">Meer referenties</a>
                        <?php } ?>
                    </div>
                </div>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>

    <footer>
        <div class="container">
            <div class="container">
                <div class="widget col-md-4 col-sm-4">
                    <h2><span>Locaties</span></h2>
                    <div class="textwidget">
                        <a class="btn" href="<?php echo get_page_link(20); ?>">Waar zit het Leesbeest? <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="widget col-md-4 col-sm-4"><h2><span>Contact</span></h2>
                    <div class="textwidget">
                        <ul>
                            <?php if(get_field('telefoonnummer', 20)) { ?>
                                <li><i class="fa fa-phone"></i><a href="tel:<?php the_field('telefoonnummer', 20); ?>"><?php the_field('telefoonnummer', 20); ?></a></li>
                            <?php } ?>
                            <?php if(get_field('emailadres', 20)) { ?>
                                <li><i class="fa fa-envelope"></i><a href="<?php the_field('emailadres', 20); ?>"><?php the_field('emailadres', 20); ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="widget col-md-4 col-sm-4">
                    <h2><span>Volg het leesbeest</span></h2>
                    <div class="textwidget">
                        <ul>
                            <?php if(get_field('facebook_url', 20)) { ?>
                                <li><a href="<?php the_field('facebook_url', 20); ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if(get_field('linkedin_url', 20)) { ?>
                                <li><a href="<?php the_field('linkedin_url', 20); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php get_footer(); ?>