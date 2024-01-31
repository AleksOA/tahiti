$( document ).ready(function() {
// =================================================================================
// Discover select
// =================================================================================
    var select = $(".discover__select-select"),
        btn = $(".discover__select-button");

    select.on("change", function (){
        var url_option  = "";
        $("select option:selected").each(function (){
            url_option += $(this).attr('data-link');
        });
        btn.attr('href', url_option);
    });

// =================================================================================

} );