<?php
require_once("inc/header.php");
require_once("inc/navbar.php");

if (isset($_GET['id'])) {
    $product_id = escape($_GET['id']);

    $product = $db->Fetch("*", "product", "id='$product_id'");

    $count = 0;
    $catID = $product['category_id'];
    $product_ = $db->FetchAll("*", "product", "category_id='$catID'", "`id` DESC");
    foreach ($product_ as $prod) {
        if ($count == 4)
            break;
        $list_[] = $prod;
        $count++;
    }

    if (!$product) {
        redirect("404.php");
    }
} else {
    redirect("404.php");
}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-10 box-sizing">
                <div class="product-desc-container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-img-area">
                                <img src="<?php echo $product['image']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h1 class="text-upper custom-product text-25 text-bs-primary"><?php echo $product['name']; ?></h1>
                            <p><?php echo $product['description']; ?></p>
                            <?php
                            if ($product['stock'] > 0) {
                                echo '<p class="text-20">Sale :  <span class="text-bs-primary custom-price" style="text-decoration: line-through;">'.$product['mp'] .'</span><span class="text-bs-primary sale-precent">( '  .$product['off'] . '% )</span></p>';
                                echo '<p class="text-20">Price :<span class="text-bs-primary text-bold custom-price">' . $product['sp'] . '</span></p>';
                                echo '<p class="text-20">Stock : <span class="text-bs-primary">' . $product['stock'] . '</span></p>';
                                echo '<input type="hidden" value="' . $product_id . '" id="p-id"><button class="btn btn-primary btn-product text-20 margin-5" id="add-to-cart">Add To Cart</button>';
                            } else {
                                echo '<p class="text-red">Out of Stock</p>';
                            }
                            ?>
                            <span id="add-to-cart-message" class="text-bold text-20"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-10">
        <h1 class="text-bs-primary text-left text-upper font-primary">Other's product</h1>
        <hr>
        <div class="row">
            <?php foreach ($list_ as $product) : ?>
                <div class="col-sm-3 col-md-3">
                    <a href="product.php?id=<?php echo $product['id']; ?>" class="thumbnail w-prod">
                        <img src="<?php echo $product['image']; ?>">
                        <div class="product-items">
                            <p class="base-product text-center"><?php echo $product['name']; ?></p>
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
<?php
require_once("inc/footer.php");
?>

