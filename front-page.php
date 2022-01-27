 <?php get_header(); ?> 

<?php $hero = get_field('hero'); ?>
<?php $o_nama = get_field('o_nama'); ?>
<?php $kategorije = get_field('kategorije'); ?>
<?php $proizvodi = get_field('proizvodi'); ?>
<?php $katalozi = get_field('katalozi'); ?>



    <section class="banner">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <!--<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>-->
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000" style="background-image: url('<?php bloginfo('template_directory');?>/img/poster01.jpg" alt="m-lider poster"></div>
                <div class="carousel-item" data-bs-interval="2000" style="background: url('<?php bloginfo('template_directory');?>/img/poster02.jpg" alt="m-lider poster dva"></div>
                <!--<div class="carousel-item" style="background: url('<?php //bloginfo('template_directory');?>/img/poster03.jpg"></div>-->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        <!--<div id="banner-image" class="container-fluid" style="background: linear-gradient(to bottom, rgba(49, 44, 41,0.6) 0%,rgba(49, 44, 41,0.6) 100%),  url(<?php //bloginfo('template_directory');?>/img/banner_image.jpg);">
        <div id="banner-image" class="container-fluid">
            <div class="row">
                <div class="col-12 banner-logo d-flex justify-content-start align-items-center p-0">
                    <img src="<?php //bloginfo('template_directory');?>/img/banner-logo.png" alt="M-Lider logo">
                </div>
                <div class="col-12 banner-slogan d-flex justify-content-start align-items-end p-0">
                    <p><?php //echo $hero['main_title']; ?></p>
                </div>
            </div>
        </div>-->
    </section>

    <section class="pretrazivanje-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 pretrazivanje-txt d-none d-md-block d-md-flex justify-content-md-center align-items-md-center">
                    <p class="m-0">Pretražite naše proizvode</p>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <form class="d-flex" action="<?php echo get_permalink(get_page_by_path('search')); ?>" method="POST">
                        <input id="search-input" name="search-input" class="form-control" type="search" placeholder="Naziv proizvoda" aria-label="Search">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="o-nama-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 order-2 order-sm-1 order-md-1 p-0 d-flex justify-content-center align-items-center justify-content-md-start">
                    <div class="o-nama-img" style="background-image: url(<?php bloginfo('template_directory');?>/img/o-nama-image.jpg);" alt="m-lider o nama"></div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 order-1 order-sm-2 order-md-2 text-end">
                    <p><?php echo $o_nama['o_nama_title']; ?></p>
                    <?php echo $o_nama['o_nama_paragraph']; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="break-image-section" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 red-break"></div>
                <div class="col-6"></div>
                <div class="col-12 break-section-col d-flex flex-column justify-content-center align-items-center">
                    <p>Prijatelj vašeg biznisa!</p>
                    <img src="<?php bloginfo('template_directory');?>/img/logoMliderDva.png" alt="M-Lider logo">
                </div>
                <div class="col-6"></div>
                <div class="col-6 red-break-two"></div>
            </div>
        </div>
    </section>

    <section class="kategorije-section">
        <div class="container">
            <div class="row">
                <div id="kategorije-title" class="col-12 d-flex justify-content-start align-items-center">
                    <img src="<?php bloginfo('template_directory');?>/img/ukras.png" alt="ukras">
                    <p><?php echo $kategorije['kategorije_title']; ?></p>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <?php
                $j = 1;
                foreach (category_list() as $i) {
                    if($j <= 6){ 
                ?>
                <div class="kategorija-cont col-12 col-sm-6 col-md-6 col-lg-4 mb-2 d-flex justify-content-center align-items-center text-center">
                    <a href="<?php echo get_permalink(get_page_by_path('search'))."?category=".$i["category_URL"] ; ?>">
                        <div class="kategorije-jedan d-flex justify-content-center align-items-center" style="background: linear-gradient(to bottom, rgba(49, 44, 41,0.6) 0%,rgba(49, 44, 41,0.6) 100%),  url(<?php echo $i["category_image"]; ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
                            <p class="text-center m-0">
                                <?php
                                    echo $i["category_name"];
                               ?> 
                            </p>
                        </div>
                    </a>
                </div>
                <?php
                        }
                        $j++;
                    } 
                ?>
            </div>
        </div>
    </section>

    <section class="proizvodi-section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div id="proizvodi-title" class="col-12 d-flex justify-content-start align-items-center">
                    <img src="<?php bloginfo('template_directory');?>/img/ukras.png" alt="ukras">
                    <p><?php echo $proizvodi['proizvodi_title']; ?></p>
                </div>
            </div>
            <div class="row">
                <?php 
                    $m = 1;
                    $list = random_product_front_page();
                    foreach ($list["list"] as $i) {
                        if($m <= 8){ 
                ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-2 mb-md-4">
                        <a href="<?php echo get_permalink(get_page_by_path('more-about-product'))."?product=".$i["product_url"] ; ?>" style="text-decoration: none;">
                            <div class="proizvod-jedan">
                                <div class="proizvod-image d-flex justify-content-center">
                                    <?php echo $i["product_image"]; ?>
                                </div>
                                <div class="proizvod-body">
                                    <p class="m-0"><?php echo $i["product_title"]; ?></p>
                                    <?php if(!empty($i["product_short_description"])){ ?>
                                    <p class="m-0"><?php echo $i["product_short_description"]; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                            }
                        $m++;
                    }
                ?>
        </div>
    </section>

    <section class="break-image-section" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 grey-break"></div>
                <div class="col-6"></div>
                <div class="col-12 break-section-col-dva d-flex flex-column justify-content-center align-items-center">
                    <p class="text-center m-0">Sve za vašu kancelariju <br> pod jednim krovom!</p>
                    <img src="<?php bloginfo('template_directory');?>/img/logoMliderDva.png" alt="M-Lider logo">
                </div>
                <div class="col-6"></div>
                <div class="col-6 grey-break-two"></div>
            </div>
        </div>
    </section>

    <section class="katalozi-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="m-0 text-end">
                        <?php echo $katalozi['katalozi_title']; ?>
                    </p>
                </div>
                <div class="col-md-4 d-none d-lg-block p-0 katalozi-subtitle">
                    <img src="<?php bloginfo('template_directory');?>/img/ukras.png" alt="ukras">
                    <p class="m-0 text-start">
                        <?php echo $katalozi['katalozi_subtitle']; ?>
                    </p>
                </div>
                <div class="col-12 col-lg-8 d-flex justify-content-center justify-content-sm-end align-items-center">
                    <a href="<?php echo get_permalink(get_page_by_path('katalog-page')); ?>" style="text-decoration: none;">
                        <div class="katalog-image d-flex justify-content-end align-items-end" style="background: url(<?php bloginfo('template_directory');?>/img/katalozi.jpg);" alt="m-lider katalog">
                            <p class="m-0 text-end">
                                <?php echo $katalozi['katalozi_download']; ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>