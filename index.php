<?php
/* ---------------------------------------------------------------------------------------------------

	Starting page

--------------------------------------------------------------------------------------------------- */
?>

<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="banners">
                <div class="left_banner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/min/uitgelicht.jpg">
                </div>
                <div class="right_banner">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/min/homepage-slideshow.jpg">
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="featured">
                <h3 class="prod_heading">Best verkocht</h3>
                <?php dynamic_sidebar("featured"); ?>
            </div>
        </div>
        <div class="row">
            <div class="contact_block">
                <div class="newsletter_signup">
                    <form class="form_newsletter">
                        <h3>Schrijf je in voor onze nieuwsbrief</h3>
                        <div class="row">
                            <div class="first_name">
                                <label for="form_firstname">Voornaam:</label>
                                <input id="form-firstname" class="form-control" type="text">
                            </div>
                            <div class="last_name">
                                <label for="form_last-name">Achternaam:</label>
                                <input id="form-last-name" class="form-control" type="text">
                            </div>
                            <div class="email_address">
                                <label for="form-emailaddress">E-mail adres:</label>
                                <input id="form-emailaddress" class="form-control" type="text">
                            </div>
                            <div class="form_submit">
                                <label for="form-submit">Verzenden:</label>
                                <button id="form-submit" class="newsletter_confirm">Verzenden</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="visiting_address">
                    <div class="wrapper">
                        <h3>Bezoek onze winkel</h3>
                        <address>
                            Nusterweg 66
                            <br>
                            6136 XB Sittard
                            <br>
                            Nederland
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="featured">
                <h3 class="prod_heading">Nieuw op vooraad</h3>
                <?php dynamic_sidebar("featured"); ?>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <h2>Unit13 Shop</h2>
                    <div class="about-us left">
                        <h3>Bezoek onze winkel</h3>
                        <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis. Donec sed odio dui. Maecenas faucibus mollis interdum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    </div>
                    <div class="about-us right">
                        <h3>Bezoek onze winkel</h3>
                        <p>Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis. Donec sed odio dui. Maecenas faucibus mollis interdum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="brands">
                <h3>Official dealer of</h3>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/condor.png"></div>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/hqdefault.png"></div>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/ics-airsoft-logo.png"></div>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/mechanix-1.png"></div>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/ultimate-series-asg.png"></div>
                <div class="brand"><img src="<?php bloginfo('template_url'); ?>/assets/img/min/brands/voodoo-tactical.png"></div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
