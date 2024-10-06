<?php
    include(__DIR__ . '/../Connection/index.php');

    function insert_order($data){
        $nama = $data['nama'];
        $pesanan = $data['pesanan'];
        $alamat = $data['alamat'];
        $pesan = $data['pesan'];
        $jumlah = $data['jumlah'];
        $selesai = $data['selesai'];

        $query = "INSERT into pesanan VALUES(null, '$nama', '$pesanan', '$jumlah', '$alamat', '$pesan', '$selesai')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function insert_menu($data, $file){
        $nama = $data['nama_makanan'];
        $jenis = $data['jenis_makanan'];
        $harga = $data['harga'];
        $asal = $data['asal_makanan'];
        $rating = $data['rating'];
        $tampilkan = $data['tampilkan'];

        //merubah nama foto sesuai id
        $split = explode('.',$file['gambar_makanan']['name']);
        $ekstensi = $split[count($split)-1];
        $gambar = $nama.'.'.$ekstensi;

        $dir = "../image/";
        $tmp = $file['gambar_makanan']['tmp_name'];
        move_uploaded_file($tmp, $dir.$gambar);

        $queryInput = "INSERT into  menu_makanan VALUES(null, '$gambar', '$nama','$jenis', '$harga', '$asal', '$rating', '$tampilkan')";
        $sqlInput = mysqli_query($GLOBALS['conn'], $queryInput);

        return true;
    }

    function update_menu($data, $file){
        $id_menu = $data['id'];
        $nama = $data['nama_makanan'];
        $jenis = $data['jenis_makanan'];
        $harga = $data['harga'];
        $asal = $data['asal_makanan'];
        $rating = $data['rating'];
        $tampilkan =$data['tampilkan'];

        $querySelect = "SELECT * FROM menu_makanan WHERE id = '$id_menu'";
        $sqlSelect = mysqli_query($GLOBALS['conn'], $querySelect);
        $result = mysqli_fetch_assoc($sqlSelect);

        if($file['gambar_makanan']['name'] == ""){
            $gambar = $result['gambar'];
        }else{
            // merubah nama foto sesuai id
            $split = explode('.',$file['gambar_makanan']['name']);
            $ekstensi = $split[count($split)-1];
            $gambar = $result['id'].'.'.$ekstensi;

            unlink("../image/".$result['gambar']);

            $dir = "../image/";
            $tmp = $file['gambar_makanan']['tmp_name'];
            move_uploaded_file($tmp, $dir.$gambar);
        }

        $queryUpdate = "UPDATE menu_makanan SET gambar = '$gambar', nama = '$nama', jenis = '$jenis', harga = '$harga', asal = '$asal', rating='$rating', tampilkan='$tampilkan' WHERE id = '$id_menu'";
        $sqlUpdate = mysqli_query($GLOBALS['conn'], $queryUpdate);

        return true;
    }

    function delete_order($data, $action){
        if($action == 'done'){
            $id_pesanan = $data['done'];

            $queryUpdate = "UPDATE pesanan SET selesai = 1 WHERE id = '$id_pesanan' AND selesai = 0";
            $sqlUpdate = mysqli_query($GLOBALS['conn'], $queryUpdate);
            
            return true;
        }else if($action == 'hapus'){
            $id_riwayat = $data['hapus'];
        
            $query = "DELETE from pesanan WHERE id = '$id_riwayat' AND selesai = 1";
            $sql = mysqli_query($GLOBALS['conn'], $query);

            return true;
        }
    }

    function delete_menu($data){
        $id_menu = $data['hapusMenu'];

        $querySelect = "SELECT * FROM menu_makanan WHERE id = '$id_menu'";
        $sqlSelect = mysqli_query($GLOBALS['conn'], $querySelect);
        $result = mysqli_fetch_assoc($sqlSelect);

        unlink("../image/".$result['gambar']);

        $query = "DELETE from menu_makanan WHERE id = '$id_menu'";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

?>