$( document ).ready(function() {
// ===============================================
// Hero slider
// ===============================================
    var $slider = $( '#hero-slider' );

    $slider.slick( {
        fade: false,
        arrows: false,
        dots: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    } );
// ===============================================


// ===============================================
// Discover slider
// ===============================================
    var $discoverSlider = $( '#discover-slider' );

    $discoverSlider.slick( {
        // cssEase: 'ease',
        arrows: false,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1560,
                settings: {
                    slidesToShow: 3,

                }
            },

            {
                breakpoint: 1140,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    } );
// ===============================================


} );
