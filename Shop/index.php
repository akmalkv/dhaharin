<?php 
    include(__DIR__ . '/../Connection/index.php');

    $query = "SELECT * FROM menu_makanan";
    $sql = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once "./Header/index.php"; ?>
    <div class="kotak">
        <?php
            while($result = mysqli_fetch_assoc($sql)){
        ?>
                <div class="kotak1">
                    <div id="gambar">
                        <img src="./image/<?php echo $result['gambar']?>" alt="">
                    </div>
                    <p id="nama">
                        <?php echo $result['nama']?>
                    </p>
                    <div id="flex">
                        <div id="flex1">
                            <p>
                                <?php echo $result['harga']?>
                                <?php echo $result['asal']?>
                            </p>
                            <span id="rating">
                                <img src="../image/Star.svg" alt="">
                                <p><?php echo $result['rating']?></p>
                            </span>
                        </div>
                        <button id="btn">
                            buy
                        </button>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</body>
</html>