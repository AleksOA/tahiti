<?php
function discover_slider($query_posts = null) {
    $discover_slider = '';
    if(!empty($query_posts)) {
        $discover_slider = $query_posts;
    }else{
        $arg = array(
            'post_type' => 'islands',
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $discover_slider = new WP_Query($arg);
    }
    if ( $discover_slider->have_posts() ) : ?>
        <div id="discover-slider" class="discover-slider__wrapper slick-slider grid-x">
            <?php while ( $discover_slider->have_posts() ) : $discover_slider->the_post();?>
                <div class="slick-slide discover-slider__item cell">
                    <div class="discover-slider__inner">
                        <div class="discover-slider__top">
                            <?php
                            $image = get_the_post_thumbnail( null, 'full', [ 'alt' => esc_attr( get_the_title() ), 'title' => '' ] );
                            echo $image;
                            ?>
                        </div>
                        <div class="discover-slider__center">
                            <h3 class="discover-slider__title"><?php the_title();?></h3>
                            <p class="discover-slider__text"><?php echo get_the_excerpt(); ?></p>
                        </div>
                        <div class="discover-slider__bottom">
                            <?php $link_island = get_field('link_island');?>
                            <a class="discover-slider__link" href="<?php echo ($link_island) ? $link_island : '#'?>" target="_blank">
                                <?php $price_island = get_field('price_island');
                                if($price_island): ?>
                                    <div class="discover-slider__price">
                                        <?php echo $price_island;?>
                                    </div>
                                <?php endif; ?>
                                <div class="discover-slider__arrow">
                                    <svg class="discover-slider__arrow-icon" width="23" height="20">
                                        <use href="<?php echo get_template_directory_uri();?>/assets/images/icons.svg#icon-arrow"></use>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_query(); ?>
<?php }
