<?php
$treee = get_field('social_footer', 'options' );

if ( have_rows( 'social_footer', 'options' ) ): ?>
    <ul class="social">
        <?php while ( have_rows( 'social_footer', 'options' ) ): the_row();
            $social_name_data = get_sub_field('social_name');
            $social_name = $social_name_data['value'];
            $social_url = get_sub_field('social_url');
            $social_icon_color = get_sub_field('social_icon_color');
            ?>
            <li class="social__item">
                <a class="social__link"
                   href="<?php echo $social_url;?>"
                   target="_blank"><span class="fa-brands fa-<?php echo $social_name; ?>" style="color: <?php echo $social_icon_color; ?>"></span>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
