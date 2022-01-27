jQuery(document).ready(function() {
    jQuery('#category-button').click(function() {
        jQuery('.kategorije-filter').slideToggle( "slow" );
    });
     jQuery('#brand-button').click(function() {
            jQuery('.brendovi-filter-content').slideToggle( "slow" );
    });

    /*jQuery(".srce").click(function(){
        jQuery(this).toggleClass('clicked');
        jQuery("i").toggleClass('fas');
    });*/

    jQuery(".small-product-image").click(function(){
        imgSrc = jQuery(this).find('img').attr("src");
        jQuery(".big-image-product").html("<img src=" + imgSrc +">");
    })
    
});
