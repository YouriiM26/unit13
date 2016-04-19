		<footer class="nav-footer">
			<div class="container">
				<div class="row">
					<nav class="nav-box">
                        <h5>
                            <?php
                                $menu_location = 'footermenu1-nav';
                                $menu_locations = get_nav_menu_locations();
                                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                                echo esc_html($menu_name);
                                ?>
                        </h5>
						<?php
                            $defaults = array(
                                'theme_location'  => 'footermenu1-nav',
                                'menu_class'      => 'menu'
                            );
                            wp_nav_menu($defaults);
                        ?>
					</nav>
					<nav class="nav-box">
						<h5>
                            <?php
                                $menu_location = 'footermenu2-nav';
                                $menu_locations = get_nav_menu_locations();
                                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                                echo esc_html($menu_name);
                                ?>
                        </h5>
						<?php
                            $defaults = array(
                                'theme_location'  => 'footermenu2-nav',
                                'menu_class'      => 'menu'
                            );
                            wp_nav_menu($defaults);
                        ?>
					</nav>
					<nav class="nav-box">
						<h5>
                            <?php
                                $menu_location = 'footermenu3-nav';
                                $menu_locations = get_nav_menu_locations();
                                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                                echo esc_html($menu_name);
                                ?>
                        </h5>
						<?php
                            $defaults = array(
                                'theme_location'  => 'footermenu3-nav',
                                'menu_class'      => 'menu'
                            );
                            wp_nav_menu($defaults);
                        ?>
					</nav>
					<nav class="nav-box">
						<h5>
                            <?php
                                $menu_location = 'footermenu4-nav';
                                $menu_locations = get_nav_menu_locations();
                                $menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
                                $menu_name = (isset($menu_object->name) ? $menu_object->name : '');

                                echo esc_html($menu_name);
                                ?>
                        </h5>
						<?php
                            $defaults = array(
                                'theme_location'  => 'footermenu4-nav',
                                'menu_class'      => 'menu'
                            );
                            wp_nav_menu($defaults);
                        ?>
					</nav>
					<nav class="nav-box social">
						<h5>Volg Unit13</h5>
						<ul class="menu social">
							<li class="facebook">
								<a href="#" title="Facebook"></a>
							</li>
							<li class="twitter">
								<a href="#" title="Twitter"></a>
							</li>
							<li class="instagram">
								<a href="#" title="Instagram"></a>
							</li>
							<li class="youtube">
								<a href="#" title="Youtube"></a>
							</li>
							<li class="flickr">
								<a href="#" title="Flickr"></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
		<footer class="corp-footer">
			<div class="container">
				<div class="row">
					<div class="copyright">
						<span>Copyright Unit13 <?php echo date('Y'); ?></span>
					</div>
					<nav class="corp-nav">
						<ul class="menu">
							<li><a href="#">Klantenservice</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</footer>
        <?php wp_footer() ?>
		<script type="text/javascript">
			WebFontConfig = {
				google: {families: ['Source+Sans+Pro:400,300,600,700:latin', 'Russo+One::latin']}
			};
			(function () {
				var wf = document.createElement('script');
				wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
						'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
		</script>
	</body>
</html>