<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header grid-x align-middle">
    <div class="grid-container">
        <div class="grid-x align-middle align-justify">
            <div class="large-6 small-4 cell">
                <div class="header__logo text-center medium-text-left">
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
                    <h1><?php echo $logo_img;  ?><span class="header__logo-name invisible"><?php echo get_bloginfo( 'name' ); ?></span></h1>
                </div>
            </div>
            <div class="header__menu-btn-wrapper  small-2 cell hide-for-large">
                <div class="menu-btn" id="headerMenuBtn">
                    <button class="btn-menu" id="btnMenu" type="button">
                            <span class="menu-box">
                                <span class="menu-line">line</span>
                                <span class="menu-line">line</span>
                                <span class="menu-line">line</span>
                            </span>
                    </button>
                </div>
            </div>
            <div class="header__nav-wrapper large-6 small-12 cell">
                <nav class="header-menu" id="headerMenu">
                    <button class="side-menu__close  hide-for-large" id="closeSideMenu" type="button"></button>
                    <?php wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'container' => null,
                        'menu_class' => 'dropdown menu align-justify',
                        'menu_id' => 'navMenu'
                    ]); ?>
                </nav>
            </div>
        </div>
    </div>
</header>
