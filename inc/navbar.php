<?php
require_once("inc/header.php");

$category_ = $db->FetchAll("`id`,`name`", "category", null, "`id` ASC");


?>

<nav class="custom-navbar navbar navbar-default">
    <div class="container">
        <div id="navbar " class="navbar-collapse collapse navbar-top">
            <ul class="nav navbar-nav pull-right">
                <?php

                session_start();

                if (isset($_SESSION['id'])) {

                    $user_id = escape($_SESSION['id']);
                    $user = $db->Fetch("*", "user", "id='$user_id'");

                    $cart_count = $db->GetNum("cart", "user_id='$user_id' AND active='y'");
                    ?>
                    <li title="Home"><a href='index.php'><i class="">Home</i></a></li>
                    <li title="Cart"><a href='cart.php'><i class=""> Cart<span class="badge"id="cart-count"><?php echo $cart_count; ?></span></i></a></li>
                    <li title="Products"><a href='products.php'><i class="">Collection Gallery</i></a></li>
                    <li title="Login / Register"><a href='login.php'><i class="">Acount</i></a></li>
                    <li title="logout"><a href="logout.php"><i class="">Logout</i></a></li>
                    <?php
                } else {
                    ?>
                    <li title="Home"><a href='index.php'><i class="">Home</i></a></li>
                    <li title="Products"><a href='products.php'><i class="">Collection Gallery</i></a></li>
                    <li title="Login / Register"><a href='login.php'><i class="">Acount</i></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand_img" href="index.php">
                <img  src="https://cdn.shopify.com/s/files/1/0260/3093/2046/files/TICH_Logo_250x102.png?v=1667848760">
            </div>
            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse navbar-bottom ">
            <ul class="nav navbar-nav" style="font-size: 1.2em; padding-top: 7px ">
                <?php foreach ($category_ as $cat): ?>
                    <li><a href="category.php?id=<?php echo $cat['id']; ?>"><?= $cat['name'] ?></a> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
<div style="height:10px;"></div>
