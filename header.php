<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>Unit13 Shop</title>
        <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="utility-header">
			<div class="container">
				<div class="row">
					<div class="usps">
						<ul>
							<li>Voor 12:00 uur besteld, meteen verzonden!</li>
							<li>Gratis verzending vanaf €99,-</li>
							<li>Reparaties, upgrades &amp; technische vragen</li>
						</ul>
					</div>
					<div class="user-nav">
						<ul>
							<li class="account-dd">
								<span>Mijn account</span>
								<ul>
									<li>
										<a href="#">Bewerken</a>
									</li>
									<li>
										<a href="#">Uitloggen</a>
									</li>
								</ul>
							</li>
							<li class="cart">
								<a href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="cart"></i><span class="amount"><?php echo (WC()->cart->cart_contents_count); ?></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<header class="branding-header">
			<div class="container">
				<div class="row">
					<a href="index.php" class="logo"><img src="<?php echo THEME_DIR; ?>/assets/img/min/logo.png" alt="Unit13 Shop" /></a>
					<div class="contact"><img src="<?php echo THEME_DIR; ?>/assets/img/min/lowestprice.png" alt="Guaranteed lowert price" /><p><strong>Bezoek ook onze winkel:</strong><br />Pannestraat 182 in Lanaken</p></div>
					<div class="search"><form><input type="text" /><input type="submit" value="Zoeken" /></form></div>
				</div>
				<div class="row">
					<div class="categories">
				        <button>Kies categorie</button>
                        <?php dynamic_sidebar('categoriemenu'); ?>
					</div>
					<nav class="servicemenu">
						<?php
                            $defaults = array(
                                'theme_location'  => 'main-nav'
                            );
                            wp_nav_menu($defaults);
                        ?>
					</nav>
				</div>
			</div>
		</header>