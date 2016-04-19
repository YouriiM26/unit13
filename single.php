<?php include('header.php') ?>

<section id="content" class="module module-news single bg-color blue">
    <div class="container">
        <div class="row">
            <div class="content">

                <article>
                <?php while (have_posts()) : the_post(); ?>

                        <h1 class="col-md-12"><?php the_title(); ?></h1>
                        <?php
                        // If thumbnail added - display image
                        if ( has_post_thumbnail() ) {
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'news_overview' );
                            $url = $thumb['0']; ?>
                            <div class="img">
                                <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <?php
                            $thumb_added = "thumb_added";
                        } else {
                            $thumb_added = "";
                        }
                        ?>
                        <div class="intro <?php echo $thumb_added; ?>">
                            <p><?php the_content(); ?></p>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    <a class="pull-right" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">&larr; Terug naar het overzicht</a>
                </article>

            </div>
        </div>
    </div><!-- end container -->
</section>

<?php get_footer(); ?>
