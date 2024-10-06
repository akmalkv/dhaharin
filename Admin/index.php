<?php 
    include "../Connection/index.php";

    $query = "SELECT * FROM pesanan WHERE selesai = 0";
    $sql = mysqli_query($conn, $query);

    $query_Riwayat = "SELECT * FROM pesanan WHERE selesai = 1";
    $sql_Riwayat = mysqli_query($conn, $query_Riwayat);
    $no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../Admin/admin.css">
</head>
<body>
    <?php include_once "../Admin/navbar/index.php"; ?>
    
    <div class="container">
        <div class="top">
            <input type="text" placeholder="Search...">
        </div>
        <div class="tab">
            <div class="tab1">
                <p class="title">Orders</p>
                <button id="btnHandle" onclick="toggleHandle()">Riwayat</button>
            </div>

            <div class="content">
                <div class="scroll-table">
                    <table >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Alamat</th>
                                <th>Pesan</th>
                                <th>Done</th>
                            </tr>
                        </thead>

                        <?php
                            while($result = mysqli_fetch_assoc($sql)){
                        ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo ++$no.".";?>
                                        </td>
                                        <td>
                                            <?php echo $result['nama'];?>
                                        </td>
                                        <td>
                                            <?php echo $result['pesanan'];?>
                                        </td>
                                        <td>
                                            <?php echo $result['jumlah'];?>
                                        </td>
                                        <td>
                                            <?php echo $result['alamat'];?>
                                        </td>
                                        <td>
                                            <?php echo $result['pesan'];?>
                                        </td>
                                        <td>
                                            <a href="../Proses/P_menu.php?done=<?php echo $result['id'];?>" type="button" id="done" onClick="return confirm('Apakah anda ingin meyelesaikan pesanan ini')">
                                                Done
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="switch-content">
                <div class="scroll-table">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesanan</th>
                                <th>Jumlah</th>
                                <th>Alamat</th>
                                <th>Pesan</th>
                                <th>Done</th>
                            </tr>
                        </thead>

                        <?php
                            while($result = mysqli_fetch_assoc($sql_Riwayat)){
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo ++$no.".";?>
                                    </td>
                                    <td>
                                        <?php echo $result['nama'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['pesanan'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['jumlah'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['alamat'];?>
                                    </td>
                                    <td>
                                        <?php echo $result['pesan'];?>
                                    </td>
                                    <td>
                                        <a href="../Proses/P_menu.php?hapus=<?php echo $result['id'];?>" type="button" id="hapus" onClick="return confirm('Apakah anda ingin menghapus riwayat ini')">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="admin.js"></script>
</body>
</html>
