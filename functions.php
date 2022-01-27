<?php
function register_my_session(){
    if( ! session_id() ) {
        session_start();
    }
}

add_action('init', 'register_my_session');
function load_stylesheets()
    {
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');

        wp_register_style('styles', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
        wp_enqueue_style('styles');

        //wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '5.8.1', 'all');
        //wp_enqueue_style('main');

        //wp_register_style('swipper', get_template_directory_uri() . '/css/swiper.min.css', array(), '5.2.0', 'all');
        //wp_enqueue_style('swipper');

        //wp_register_style('easyzoom', get_template_directory_uri() . '/css/easyzoom.css', array(), '1.0.0', 'all');
        //wp_enqueue_style('easyzoom');

        wp_enqueue_style('fontawsome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css');
        wp_enqueue_style('mdb', get_template_directory_uri() . '/mdb/css/mdb.min.css');
    }

    add_action('wp_enqueue_scripts', 'load_stylesheets');
    
function addjs()
    {
        wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js');
        wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js' );
        //wp_enqueue_script( 'MDB', get_template_directory_uri() . '/mdb/js/mdb.min.js', array('jquery'), false, true);
        //wp_enqueue_script( 'easyzoom', get_template_directory_uri() . '/js/easyzoom.js', array('jquery'), false, true);
        //wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
        //wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array(), false, true);
    }

    add_action('wp_enqueue_scripts', 'addjs');

function category_list(){
    $orderby = 'name';
    $order = 'asc';
    $hide_empty = false ;
    $cat_args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'hide_empty' => $hide_empty,
    );

    $cat = array();
    
    $product_categories = get_terms( 'product_cat', $cat_args );
    
    if( !empty($product_categories) ){
        foreach ($product_categories as $key => $category) {

            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );

            $term = get_term( $category->term_id );
            $slug = $term->slug;

            $cat[]= array(
                    "category_name" =>$category->name, 
                    "category_image" =>$image, 
                    "category_URL" => $slug
                );
        }
    
    }

    return $cat;
}

function product_list($search = null, $category = null, $multi_category = null, $page = null){
    if(is_null($page)){
        $page = 1; 
    }

    if(is_null($search)){
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 18,
            'paged' => $page
        );
        $args_pagination = array(
            'post_type' => 'product',
            'posts_per_page' => -1
        );
    }else{
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 18,
            'paged' => $page,
            's' => $search
        );
        $args_pagination = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            's' => $search
        );
    }

    //return $args;

    if(is_null($category) && is_null($search)){
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 18,
            'paged' => $page
        );
        $args_pagination = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );
    }else{
        if($category && is_null($search)){
            //$category = get_term_by( 'slug', $category, 'product_cat' );
            //$cat_id = $category->term_id;

            $args = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 18,
                'paged' => $page,
                'product_cat' => $category
            );
            $args_pagination = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'product_cat' => $category
            );
        }
    }

    if(!is_null($multi_category)){
    //S $help_niz = array();
            foreach($multi_category as $selected){
                $help_niz[] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $selected
                );
            }
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 18,
            'paged' => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $multi_category
                )
            )
        );
        $args_pagination = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $multi_category
                )
            )
        );
        
    }

    if(is_null($search) && is_null($category) && is_null($multi_category)){
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 18,
            'paged' => $page
        );
        $args_pagination = array(
            'post_type' => 'product',
            'posts_per_page' => -1
        );
    }
//return $args;
    $prod = array();

    $wc_query_pagination = new WP_Query($args_pagination);
    $number = $wc_query_pagination -> found_posts;

    $prod["number"] = $number;
    $prod["current_page"] = $page;

    $wc_query = new WP_Query($args);

    if ($wc_query->have_posts()) :
        while ($wc_query->have_posts()) : $wc_query->the_post();

            global $product;
            $id = $product->id;
            $prod_title = $product->get_name();
            $prod_short_desc = $product->get_short_description();
            $prod_description = $product->get_description();
            $prod_image = $product->get_image();
            $prod_galery_image = $product->get_gallery_image_ids();
            $url = $product -> get_slug();

            $price = $product->get_price();

            $karakteristika_title = get_post_meta( $id, 'karakteristika_karakteristika_title', true );
            $karakteristika_text = get_post_meta( $id, 'karakteristika_karakteristika_text', true );

            $kvalitet_title = get_post_meta( $id, 'kvalitet_kvalitet_proizvoda', true );
            $kvalitet_text = get_post_meta( $id, 'kvalitet_kvalitet_tekst', true );

            $sifra_artikla = get_post_meta( $id, 'broj_artikla_sifra_artikla', true );

            $limit = 10;

            if (str_word_count($prod_short_desc, 0) > $limit) {
                $words = str_word_count($prod_short_desc, 2);
                $pos   = array_keys($words);
                $prod_short_desc  = substr($prod_short_desc, 0, $pos[$limit]) . '...';
            }

            $image_arr = array();
            
            foreach($prod_galery_image as $img_id){
                $image = wp_get_attachment_url( $img_id );
                $image_arr[] = $image;
            }
            $prod["list"][] = array("product_id" => $id, 
                            "product_image" => $prod_image,
                            "product_galery_image" => $image_arr,
                            "product_title" => $prod_title, 
                            "product_short_description" => $prod_short_desc, 
                            "product_description" => $prod_description, 
                            "karakteristika_title" => $karakteristika_title,
                            "karakteristika_text" => $karakteristika_text,
                            "kvalitet_proizvoda_title" => $kvalitet_title,
                            "kvalitet_proizvoda_text" => $kvalitet_text,
                            "sifra_artikla" => $sifra_artikla,
                            "product_url" => $url,
                            "product_price" => $price
                        );
        endwhile;
            return $prod;
            wp_reset_postdata();
    
    endif; 

}

function single_product($product_slug){
    $product_obj = get_page_by_path( $product_slug, OBJECT, 'product' );
    
            $id = $product_obj->ID;
            $product = new WC_Product($id);
            $prod_title = $product->get_name();
            $prod_short_desc = $product->get_short_description();
            $prod_description = $product->get_description();
            $prod_image = $product->get_image();
            $prod_galery_image = $product->get_gallery_image_ids();
            $url = $product -> get_slug();

            $price = $product->get_price();

            $karakteristika_title = get_post_meta( $id, 'karakteristika_karakteristika_title', true );
            $karakteristika_text = get_post_meta( $id, 'karakteristika_karakteristika_text', true );

            $kvalitet_title = get_post_meta( $id, 'kvalitet_kvalitet_proizvoda', true );
            $kvalitet_text = get_post_meta( $id, 'kvalitet_kvalitet_tekst', true );

            $sifra_artikla = get_post_meta( $id, 'broj_artikla_sifra_artikla', true );

            $image_arr = array();
            
            foreach($prod_galery_image as $img_id){
                $image = wp_get_attachment_url( $img_id );
                $image_arr[] = $image;
            }
        
            $prod = array("product_id" => $id, 
                            "product_image" => $prod_image,
                            "product_galery_image" => $image_arr,
                            "product_title" => $prod_title, 
                            "product_short_description" => $prod_short_desc, 
                            "product_description" => $prod_description, 
                            "karakteristika_title" => $karakteristika_title,
                            "karakteristika_text" => $karakteristika_text,
                            "kvalitet_proizvoda_title" => $kvalitet_title,
                            "kvalitet_proizvoda_text" => $kvalitet_text,
                            "sifra_artikla" => $sifra_artikla,
                            "product_url" => $url,
                            "product_price" => $price
                        );   
             return $prod; 
}


function getCurrentUrl() {
    $protocol = is_ssl() ? 'https://' : 'http://';
    return ($protocol) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function random_product_product_page(){
    $args = array(
        'posts_per_page'   => 4,
        'orderby'          => 'rand',
        'post_type'        => 'product'
    ); 

    $prod = array();

    $wc_query = new WP_Query($args);

    if ($wc_query->have_posts()) :
        while ($wc_query->have_posts()) : $wc_query->the_post();

            global $product;
            $id = $product->id;
            $prod_title = $product->get_name();
            $prod_short_desc = $product->get_short_description();
            $prod_description = $product->get_description();
            $prod_image = $product->get_image();
            $prod_galery_image = $product->get_gallery_image_ids();
            $url = $product -> get_slug();

            $karakteristika_title = get_post_meta( $id, 'karakteristika_karakteristika_title', true );
            $karakteristika_text = get_post_meta( $id, 'karakteristika_karakteristika_text', true );

            $kvalitet_title = get_post_meta( $id, 'kvalitet_kvalitet_proizvoda', true );
            $kvalitet_text = get_post_meta( $id, 'kvalitet_kvalitet_tekst', true );

            $sifra_artikla = get_post_meta( $id, 'broj_artikla_sifra_artikla', true );

            $limit = 10;

            if (str_word_count($prod_short_desc, 0) > $limit) {
                $words = str_word_count($prod_short_desc, 2);
                $pos   = array_keys($words);
                $prod_short_desc  = substr($prod_short_desc, 0, $pos[$limit]) . '...';
            }

            $image_arr = array();
            
            foreach($prod_galery_image as $img_id){
                $image = wp_get_attachment_url( $img_id );
                $image_arr[] = $image;
            }
            $prod["list"][] = array("product_id" => $id, 
                            "product_image" => $prod_image,
                            "product_galery_image" => $image_arr,
                            "product_title" => $prod_title, 
                            "product_short_description" => $prod_short_desc, 
                            "product_description" => $prod_description, 
                            "karakteristika_title" => $karakteristika_title,
                            "karakteristika_text" => $karakteristika_text,
                            "kvalitet_proizvoda_title" => $kvalitet_title,
                            "kvalitet_proizvoda_text" => $kvalitet_text,
                            "sifra_artikla" => $sifra_artikla,
                            "product_url" => $url
                        );
        endwhile;
            return $prod;
            wp_reset_postdata();
    
    endif;
}

function random_product_front_page(){
    $args = array(
        'posts_per_page'   => 8,
        'orderby'          => 'rand',
        'post_type'        => 'product',
    ); 

    $prod = array();

    $wc_query = new WP_Query($args);

    if ($wc_query->have_posts()) :
        while ($wc_query->have_posts()) : $wc_query->the_post();

            global $product;
            $id = $product->id;
            $prod_title = $product->get_name();
            $prod_short_desc = $product->get_short_description();
            $prod_description = $product->get_description();
            $prod_image = $product->get_image();
            $prod_galery_image = $product->get_gallery_image_ids();
            $url = $product -> get_slug();

            $karakteristika_title = get_post_meta( $id, 'karakteristika_karakteristika_title', true );
            $karakteristika_text = get_post_meta( $id, 'karakteristika_karakteristika_text', true );

            $kvalitet_title = get_post_meta( $id, 'kvalitet_kvalitet_proizvoda', true );
            $kvalitet_text = get_post_meta( $id, 'kvalitet_kvalitet_tekst', true );

            $sifra_artikla = get_post_meta( $id, 'broj_artikla_sifra_artikla', true );

            $limit = 10;

            if (str_word_count($prod_short_desc, 0) > $limit) {
                $words = str_word_count($prod_short_desc, 2);
                $pos   = array_keys($words);
                $prod_short_desc  = substr($prod_short_desc, 0, $pos[$limit]) . '...';
            }

            $image_arr = array();
            
            foreach($prod_galery_image as $img_id){
                $image = wp_get_attachment_url( $img_id );
                $image_arr[] = $image;
            }
            $prod["list"][] = array("product_id" => $id, 
                            "product_image" => $prod_image,
                            "product_galery_image" => $image_arr,
                            "product_title" => $prod_title, 
                            "product_short_description" => $prod_short_desc, 
                            "product_description" => $prod_description, 
                            "karakteristika_title" => $karakteristika_title,
                            "karakteristika_text" => $karakteristika_text,
                            "kvalitet_proizvoda_title" => $kvalitet_title,
                            "kvalitet_proizvoda_text" => $kvalitet_text,
                            "sifra_artikla" => $sifra_artikla,
                            "product_url" => $url
                        );
        endwhile;
            return $prod;
            wp_reset_postdata();
    
    endif;
}

 