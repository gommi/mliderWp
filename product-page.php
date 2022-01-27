<?php 
//Template Name: More about product

get_header(); 

$product = single_product($_GET["product"]);
?>

    <section>
        <div class="container pt-md-3 pt-lg-5">
            <div class="row">
                <div class="col-12 col-md-6 order-2 order-md-1 p-sm-0 d-flex justify-content-sm-start align-items-sm-start justify-content-md-start align-items-center">
                    <div class="big-image-product d-flex justify-content-center align-items-center">
                        <?php echo $product["product_image"]; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2 short-description-custom p-sm-0 pb-3">
                    <p class="text-start m-0 ps-3"><?php echo $product["product_title"]; ?></p>
                    <?php if(!empty($product["product_short_description"])){ ?>
                    <p class="text-start m-0 ps-3"><?php echo $product["product_short_description"]; ?></p>
                    <?php }?>
                    <?php if(!empty($product["sifra_artikla"])){ ?>
                    <p class="text-start m-0 ps-3">Jedinstvena šifra artikla: <?php echo $product["sifra_artikla"]; ?></p>
                    <?php }?>
                    <a href="https://www.facebook.com/mlider111" class="btn social-btn-fb ms-3 mt-3" target="_blank">Facebook</a>
                    <a href="https://www.instagram.com/mlider4/" class="btn social-btn-ins mt-3" target="_blank">instagram</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 p-0 product-gallery d-flex flex-row">
                    <!--<div class="row p-sm-0">-->
                        <?php foreach ($product["product_galery_image"] as $img){?>
                        <div class="col-4 p-sm-0 mt-1 me-1 small-product-image">
                            <img src="<?php echo $img; ?>" alt="">
                        </div>
                        <?php } ?>
                    <!--</div>-->
                </div>
            </div>

            <?php if(!empty($product["product_description"])){ ?>
            <div class="row">
              <div class="col-12">
                <p class="deskripcija">Opis</p>
                <p class="text-start ps-md-2 m-0"><?php echo $product["product_description"]; ?></p>
              </div>
            </div>

            <?php } ?>

            <div class="row">
                <?php if(!empty($product["karakteristika_title"]) && !empty($product["karakteristika_text"])){ ?>
                <div class="col-12 col-md-6 characteristic">
                    <p><?php echo strip_tags($product["karakteristika_title"]); ?></p>
                    <?php echo $product["karakteristika_text"]; ?>
                </div>
                <?php }else{
                    ?>
                    <p class="pb-lg-5"></p>
                    <?php
                }
                    ?>
                <?php if(!empty($product["kvalitet_proizvoda_title"]) && !empty($product["kvalitet_proizvoda_text"])){ ?>
                <div class="col-12 col-md-6 product-quality">
                    <p><?php echo strip_tags($product["kvalitet_proizvoda_title"]); ?></p>
                        <?php echo $product["kvalitet_proizvoda_text"]; ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="container-fluid  maybe-like-product-container">
            <div class="container">
                <div class="row">
                    <div class="col-12 maybe-like-product-title d-flex justify-content-start align-items-center">
                        <p class="m-0">Možda ti se takođe sviđa</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-3 pb-3">
            <div class="row">
                <?php
                    $j = 1;
                    $list = random_product_product_page();
                    foreach ($list["list"] as $i) {
                        if($j <= 4){ 

                        ?>
                <div class="col-12 col-md-6 col-lg-3 pb-2">
                    <a href="<?php echo get_permalink(get_page_by_path('more-about-product'))."?product=".$i["product_url"] ; ?>" style="text-decoration: none;">
                        <div class="proizvod-jedan">
                            <div class="proizvod-image d-flex justify-content-center">
                                <?php echo $i["product_image"]; ?>
                            </div>
                            <div class="proizvod-body">
                                <p class="m-0"><?php echo $i["product_title"]; ?></p>
                                <p class="m-0"><?php echo $i["product_short_description"]; ?></p>
                            </div>
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

<?php get_footer(); ?>