<?php
require_once("inc/header.php");
require_once("inc/navbar.php");

$category_ = $db->FetchAll("`id`,`name`", "category", null, "`id` ASC");
foreach ($category_ as $cat) {
    $count = 0;
    $catID = $cat['id'];
    $product_ = $db->FetchAll("*", "product", "category_id='$catID'", "`id` DESC");
    foreach ($product_ as $prod) {
        if ($count == 4)
            break;
        $list_[$catID][] = $prod;
        $count++;
    }
    unset($product_);
}
$offer = $db->FetchAll("image,link", "offer", null, " RAND()");

?>
<div class="slide-custom container width-100">
    <div id="myCarousel" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active dots"></li>
            <li data-target="#myCarousel" data-slide-to="1"class="dots"></li>
            <li data-target="#myCarousel" data-slide-to="2"class="dots"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active height-600px">
                <img class="first-slide" class="hk-feature-slider-img" src="<?php echo $offer[0]['image']; ?>" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <p><a class="btn btn-custom btn-lg btn-primary" href="<?php echo $offer[0]['link']; ?>" role="button">Order Now</a></p>
                    </div>
                </div>
            </div>
            <div class="item height-600px">
                <img class="second-slide" class="hk-feature-slider-img" src="<?php echo $offer[1]['image']; ?>" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <p><a class="btn btn-custom btn-lg btn-primary" href="<?php echo $offer[1]['link']; ?>" role="button">Order Now</a></p>
                    </div>
                </div>
            </div>
            <div class="item height-600px">
                <img class="third-slide" src="<?php echo $offer[2]['image']; ?>">
                <div class="container">
                    <div class="carousel-caption">
                        <p><a class="btn btn-custom btn-lg btn-primary" href="<?php echo $offer[2]['link']; ?>" role="button">Order Now</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="left-arrow arrow" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="right-arrow arrow" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php foreach ($category_ as $cat): ?>
    <div class="container padding-10 ">
        <h1 class="text-bs-primary custom-text text-center text-upper font-primary"><?= $cat['name'] ?></h1>
        <hr>
        <div class="tr-row">
            <?php foreach ($list_[$cat['id']] as $product) : ?>
                <div class="col-sm-3 col-md-3">
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="thumbnail w-prod">
                        <img src="<?php echo $product['image']; ?>">
                        <div class="product-items">
                            <p class="text-center"><?php echo $product['name']; ?></p>
                            <?php
                                if ($product['stock'] > 0) {
                                    echo '<span class="text-bs-primary text-bold custom-price">' . $product['sp'] . '</span>';
                                }
                                else {
                                    echo '<p class="text-red text-center">Out of Stock</p>';
                                }
                            ?>
                        </div>

                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once("inc/footer.php"); ?>
