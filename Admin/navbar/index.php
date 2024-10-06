<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Admin/navbar/navbar.css">
</head>
<body>
    <div class="side-bar">
        <p>Admin</p>
        <ul >
            <li <?php if (basename($_SERVER['PHP_SELF']) === 'menu.php') echo 'class="active"'; ?>><a href="menu.php">Menu</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') echo 'class="active"'; ?>><a href="index.php">Orders</a></li>
            <li><a href="eorders.html">e Orders</a></li>
            <li><a href="catalog.html">Catalog</a></li>
            <li><a href="customers.html">Customers</a></li>
            <li><a href="payment.html">Payment</a></li>
        </ul>
    </div>
</body>
</html>