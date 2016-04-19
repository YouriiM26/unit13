<?php include('header.php') ?>

<section id="content" class="module module-page">
	<div class="container">
		<div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="leftbar">
                <div class="leftbar_content"></div>
            </div>
            <div class="page_content">
                <div class="content_box">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
		</div>
	</div><!-- end container -->
</section>
    

<?php get_footer(); ?>
