<?php 

//Template Name: Katalog Page

get_header(); 

?>

<?php $katalog = get_field('katalozi'); ?>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-start align-items-center pt-5 pb-5">
            <img class="katalog-ukras" src="<?php bloginfo('template_directory');?>/img/ukras.png" alt="">
            <p class="katalog-page-title m-0 ms-2"><?php echo $katalog['katalog_title_page']; ?></p>
        </div>
        <div class="col-12 pb-5 p-0">
            <?php echo $katalog['dodaj_katalog']; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>