<?php
/**
 * Footer
 */
?>

<footer class="footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell large-3 medium-12 small-12">
                <div class="footer__logo">
                    <?php
                    $logo_img = '';
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    if( $custom_logo_id ){
                        $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                            'class'    => 'custom-logo',
                            'itemprop' => 'logo',
                        ) );
                    }
                    ?>
                    <?php echo $logo_img;  ?>
                </div>
            </div>
            <div class="cell large-6">
                <nav class="footer-menu" id="footerMenu">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer_menu',
                        'container' => null,
                        'menu_class' => 'dropdown menu align-justify',
                        'menu_id' => 'navMenu'
                    ]); ?>
                </nav>
            </div>
            <div class="cell large-3 footer__social">
                <?php get_template_part('parts/social-network'); ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

