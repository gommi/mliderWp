    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 d-flex flex-column justify-content-start align-items-start justify-content-md-start align-items-md-start">
                    <div class="cont-title d-flex justify-content-start align-items-center">
                        <img src="<?php bloginfo('template_directory');?>/img/ukrasSesdesetxSesdeset.png" alt="ukras">
                        <p class="ms-1 m-0">Kontakt informacije</p>
                    </div>
                    <div class="cont-content d-flex flex-column">
                        <p class="m-0">M-Lider, Derventa</p>
                        <p>Njegoševa 60, 74400</p>
                        <p class="m-0">Tel: +387 66/064-092</p>
                        <p>E-mail: m_lider@outlook.com</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column justify-content-start align-items-start justify-content-md-start align-items-md-start">
                    <div class="cont-title d-flex justify-content-start align-items-center">
                        <img src="<?php bloginfo('template_directory');?>/img/ukrasSesdesetxSesdeset.png" alt="ukras">
                        <p class="ms-1 m-0">Naše kategorije</p>
                    </div>
                    <div class="cont-content d-flex flex-column">
                        <?php 
                            foreach (category_list() as $i) {
                        ?>
                        <a href="<?php echo get_permalink(get_page_by_path('search'))."?category=".$i["category_URL"];?>">
                            <?php
                                echo $i["category_name"];
                            ?> 
                        </a>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-start justify-content-md-start align-items-md-start">
                    <div class="cont-title d-flex justify-content-start align-items-center">
                        <img src="<?php bloginfo('template_directory');?>/img/ukrasSesdesetxSesdeset.png" alt="ukras">
                        <p class="ms-1 m-0">Korisnikčki kutak</p>
                    </div>
                    <div class="cont-content d-flex flex-column">
                        <a href="<?php echo get_permalink(get_page_by_path('uslovi-koriscenja'));?>">Uslovi korišćenja</a>
                        <a href="<?php echo get_permalink(get_page_by_path('contact-page'));?>">Kontakt</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- cookies 

    <div class="container-fluid p-0 m-0" style="position: sticky; z-index: 99; background-color: #4f4f4f; bottom: 0px;">
        <div class="container p-2">
            <div class="row">
                <div class="col-10">
                    <p class="p-0 m-0" style="color: #fff;">Obavještenje: mlider.ba koristi kolačiće za pružanje potrebne funkcionalnosti web stranice, poboljšanje vašeg iskustva i analizu našeg prometa. Korištenjem naše web stranice prihvaćate našu Politiku privatnosti i korištenje naših kolačića.</p>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    <a href="#" class="btn btn-success">Prihvatam</a>
                </div>
            </div>
        </div>
    </div>-->

    <?php wp_footer(); ?>
</body>
</html>