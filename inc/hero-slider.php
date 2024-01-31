<?php
function hero_slider() { ?>
    <?php $arg = array(
        'post_type' => 'slider',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => - 1
    );
    $hero_slider    = new WP_Query( $arg );
    if ( $hero_slider->have_posts() ) : ?>

        <div id="hero-slider" class="hero-slider__wrapper slick-slider grid-x">
            <?php while ( $hero_slider->have_posts() ) : $hero_slider->the_post();?>
                <div class="slick-slide hero-slider__item cell" style='background-image: url("<?php echo get_the_post_thumbnail_url( '', 'full' ); ?>")'>

                <?php $slider_content_hero = get_field('slider_content_hero');
                if($slider_content_hero):?>
                    <div class="hero-slider__inner">
                        <div class="hero-slider__content">
                            <?php echo $slider_content_hero;?>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_query(); ?>
<?php }