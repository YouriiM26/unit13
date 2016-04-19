<?php include('header.php') ?>

<section id="content" class="module module-page">
	<div class="container">
        <?php  ?>
        <div class="filter_button">Filters</div>
		<div class="row">
            <div class="filters">
                <div class="filter_content"><?php dynamic_sidebar('filters'); ?></div>
            </div>
            <div class="content_shop">
				<?php woocommerce_content(); ?>
            </div>
		</div>
	</div><!-- end container -->
</section>

<?php get_footer(); ?>
