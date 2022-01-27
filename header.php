<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="Mh40l249SD_RzgoE3fB4s3-6RaOQsJcneHUuqp_IDf4" />
    <meta name="title" content="m-lider">
    <meta name="description" content="Firma m-lider osnovana 2016 godine, bavimo se prodajom kancelarijskog materijala, proizvodnjom i prodajom kancelarijskog namještaja, reklamno poslovne galanterije, proizvoda za pakovanje, profesionalne hemije, papirne galanterije, štampači, toneri, računari i računarska periferija, školski pribor, reklamne majice, tekstilni proizvodi!">
    <meta name="keywords" content="MLider, m lider, lider, Lider M-Lider, derventa, brod, Brod, Knjizara, Knjižara, Kancelarija, Namjestaj, Derventa, Materijal, Galanterije, Proizvodi, Pakovanja, Reklame, Štampači, Toneri, Papiri, Majice, Tekstil">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T6HM3WC');</script>
<!-- End Google Tag Manager -->

    <title><?php echo get_the_title() ?></title>

    <?php 
        wp_head();
    ?>
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6HM3WC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <section class="top-navbar d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="top-nav-brand">
                        <a href="<?php echo get_permalink(get_page_by_path('home')); ?>">
                            <img src="<?php bloginfo('template_directory');?>/img/logoMliderTri.png" alt="M-lider logo">
                        </a>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <i class="fas fa-phone-alt me-1"></i><p class="m-0">066/064-092</p>
                </div>
                <div class="col-3 d-flex justify-content-end align-items-center">
                    <i class="fas fa-envelope me-1"></i><p class="m-0">m_lider@outlook.com</p>
                </div>
            </div>
        </div>
    </section>

    <section class="navbar-section">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="top-nav-brand d-block d-lg-none">
                    <a href="<?php echo get_permalink(get_page_by_path('home')); ?>">
                        <img src="<?php bloginfo('template_directory');?>/img/logoMliderTri.png" alt="M-lider logo">
                    </a>
                </div>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="top-menu" class="navbar-nav mb-2 mb-lg-0 mx-auto">
                        <?php
                        $j = 1;
                            foreach (category_list() as $i) {
                                if($j <= 6){
                        ?>
                        <li class="nav-item dropdown text-center pe-lg-2">
                            <a class="nav-link" href="<?php echo get_permalink(get_page_by_path('search'))."?category=".$i["category_URL"] ; ?>" id="navbarDropdown" role="button" aria-expanded="false">
                               <?php
                                    echo $i["category_name"];
                               ?> 
                            </a>
                        </li>
                        <?php
                            }
                            $j++;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>