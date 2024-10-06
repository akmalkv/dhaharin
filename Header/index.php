<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./Header/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<nav>
    <div class="containerNav">
        <div class="logo">
            <i class="fa-solid fa-bowl-food"></i>
            <p>Dhaharin</p>
        </div>

        <div class="navMenu">
            <ul>
                <li><a href="index.php" <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') echo 'class="active"'; ?>>Home</a></li>
                <li><a href="shop.php" <?php if (basename($_SERVER['PHP_SELF']) === 'shop.php') echo 'class="active"'; ?>>Shop</a></li>
                <li><a href="#" target="_blank">Service</a></li>
                <li><a href="sign.php" <?php if (basename($_SERVER['PHP_SELF']) === 'sign.php') echo 'class="active"'; ?>>account</a></li>
            </ul>
        </div>

        <div class="search">
            <div class="search-container">
                <input class="search-input" type="search" name="search" placeholder="Search">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </div>
            <div class="keranjang">
                <i class="fa-solid fa-cart-shopping"></i>
                <div class="jumlah"></div>
            </div>
        </div>
    </div>
</nav>
</html>