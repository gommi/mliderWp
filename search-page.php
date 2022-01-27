<?php 

//Template Name: Search Page

get_header();

$search = null;
$category = null;
$page=$_GET["stranica"];
$list = product_list($search=null, $category=null,null,$page);

if($_POST["search-input"]){
    $page=$_GET["stranica"];
    $search = $_POST['search-input'];
    $_SESSION['search-input']=$search;
    $list = product_list($search,null,null,$page);
    unset($_SESSION['search_category']);
}



if($_SESSION['search-input']){
    $page=$_GET["stranica"];
    $_POST['search-input']=$_SESSION['search-input'];
    $search = $_POST['search-input'];
    $list = product_list($_SESSION['search-input'],null,null,$page);
    unset($_SESSION['search_category']);
    unset($_POST['category']);
}



if($_GET["category"]){
    //$getvar=explode('|',$_GET["category"]);
    $page=$_GET["stranica"];
    $category = $_GET["category"];
    $list = product_list($search, $category,null,$page);
    unset($_SESSION['search_category']);
    unset($_SESSION['search-input']);
    unset($_POST['search-input']);
    $search = '';
}



if(isset($_POST['submit'])){
    $page=$_GET["stranica"];
    if(!empty($_POST['category'])){
        $list = product_list($search, $category, $_POST['category'],$page);
        $_SESSION['search_category']=$_POST['category'];
        unset($_SESSION['search-input']);
        unset($_POST['search-input']);
        $search = '';
    }else{
        $list = product_list($search=null, $category=null,null,$page);
        unset($_SESSION['search_category']);
        unset($_SESSION['search-input']);
        unset($_POST['search-input']);
        $search = '';
    }
}

if($_SESSION['search_category']){
    $page=$_GET["stranica"];
    $_POST['category']=$_SESSION['search_category'];
    $list = product_list($search, $category, $_SESSION['search_category'],$page);
    unset($_SESSION['search-input']);
    unset($_POST['search-input']);
    $search = '';
}
?>

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

    <div class="container search-container">
        <div class="row">
            <div class="col-12 col-lg-3 filter-container p-0">
                <!--<div id="content-filter-one" class="col-12 filter-title d-flex justify-content-lg-start justify-content-center align-items-center ps-xl-5">
                    <img src="<?php //bloginfo('template_directory');?>/img/filterIcon.png" alt="">
                    <p class="d-none d-md-block">Filter</p>
                </div>-->
                <div class="col-12">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button kategorije-filter-title" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <img src="<?php bloginfo('template_directory');?>/img/categoryImage.png" alt="">
                                <p class="m-0 d-none d-md-block">Kategorije</p>
                            </button>

                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <form action="<?php echo get_permalink(get_page_by_path('search')) ?>" method="post">
                                        <?php 

                                            foreach (category_list() as $i) {
                                                $cheked = "";
                                                if(!empty($_POST["category"])){
                                                    if(in_array($i["category_URL"], $_POST["category"])){
                                                        $cheked = "checked";
                                                    }
                                                }

                                                if($_GET["category"] && $_GET["category"] == $i["category_URL"]){
                                                    $cheked = "checked";
                                                }

                                        ?>

                                        <div class="form-check d-flex justify-content-center align-items-center justify-content-lg-start align-items-lg-start">
                                            <input class="form-check-input me-1" type="checkbox" name="category[]" <?php echo $cheked; ?> value="<?php echo $i["category_URL"]; ?>" id="<?php echo $i["category_URL"]; ?>">
                                            <label class="form-check-label" for="<?php echo $i["category_URL"]; ?>">
                                                <?php echo $i["category_name"]; ?>
                                            </label>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <button class="btn" type="submit" name="submit">Pretraži <i class='fas fa-search'></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-9 pt-3">
                <div class="row">
                    <div class="col-12 search-title">
                        <?php 
                            if(!empty($_POST['search-input'])){
                                ?>
                                <p class="m-0">Rezultati pretrazivanja: <span>"
                                    <?php
                                    echo $search;
                                    ?>
                                "</span></p>
                                <?php
                            }
                            ?>
                    </div>

                    <?php 
                        if(!empty($list["list"])){
                            foreach ($list["list"] as $i) {
                    ?>

                    <div class="col-6 col-md-6 col-lg-4 pb-2 ps-1 ps-sm-2 pe-1 pe-sm-2">
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
                        }else{
                            ?>
                            <div class="not-found d-flex flex-column justify-content-center align-items-center">
                                <img src="<?=bloginfo('template_directory')?>/img/not_found_tri.png" alt="Fot found any product" style="width: 350px;" />
                                <p class='fs-1 fw-bolder pt-3'>Nije pronađeno ništa za vašu pretragu!</p>
                            </div>

                            <?php
                        }
                        $currurl=getCurrentUrl();
                        $params = $_GET;
                        unset( $params['stranica'] );

                        if(empty($_GET)){
                            $currurl=$currurl.'?stranica=1';
                        }else{
                            $params['stranica']   = '1';
                            $params['category']   = $params['category'];
                            $new_query_string = http_build_query( $params );
                            $currurl='?'.$new_query_string;
                        }
                    ?>

                    <div class="col-12 pb-3">

                        <?php
                        if($list["number"]>0){
                        ?>

                        <div class="pagination d-flex justify-content-end align-items-center ">
                            <a href="<?php echo $currurl;?>">&laquo;</a>
                            <?php 
                                $k=ceil($list["number"]/18);
                                //echo $k;
                                for($p=1;$p<=$k;$p++){
                                    $active= $list['current_page']==$p ? 'active':'';
                                    $currurl=getCurrentUrl();
                                    if(empty($_GET)){
                                        $currurl=$currurl.'?stranica='.$p;
                                    } else{
                                        $params['stranica']   = $p;
                                        $params['category']   = $params['category'];
                                        $new_query_string = http_build_query( $params );
                                        $currurl='?'.$new_query_string;
                                    }

                                   // $left_limit = $list['current_page'] - 2;
                                    //$right_limit = $list['current_page'] + 2;

                                    if($list['current_page'] < $left_limit){
                                        echo "...";
                                    }

                                    ?>

                                    <a href="<?php echo $currurl;?>" class="<?php echo $active;?>"><?php echo $p;?></a>
                                    <?php
                                }   

                                    $currurl=getCurrentUrl();
                                    if(empty($_GET)){
                                        $currurl=$currurl.'?stranica='.$k;
                                    }else{
                                        $params['stranica']   = $k;
                                        $params['category']   = $params['category'];
                                        $new_query_string = http_build_query( $params );
                                        $currurl='?'.$new_query_string;
                                    //$currurl=$currurl.'&stranica='.$k;
                                    }
                            ?>

                            <a href="<?php echo $currurl;?>">&raquo;</a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>