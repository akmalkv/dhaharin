<?php 
    include '../Controller/C_menu.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            $succes = insert_order($_POST);

            if($succes){
                header("location: ../index.php");
                echo '<script>alert("Pesanan sedang di proses");</script>';
            } else {
                echo $succes;
            }
        }else if($_POST['aksi'] == "input"){
            $succes = insert_menu($_POST, $_FILES);

            if($succes){
                header("location: ../Admin/menu.php");
            } 
        }else if($_POST['aksi'] == "update"){
            $succes = update_menu($_POST, $_FILES);

            if($succes){
                header("location: ../Admin/menu.php");
            }else{
                echo $succes;
            }
        }
    } else if(isset($_GET['done'])){
        $succes = delete_order($_GET, 'done');

        if($succes){
            header("location: ../Admin/index.php");
        }else{
            echo $succes;
        }

    } else if (isset($_GET['hapus'])){
        $succes = delete_order($_GET, 'hapus');

        if($succes){
            header("location: ../Admin/index.php");
        }else{
            echo $succes;
        }
    }else if(isset($_GET['hapusMenu'])){
        $succes = delete_menu($_GET);

        if($succes){
            header("location: ../Admin/menu.php");
        }else{
            echo $succes;
        }
    }
?>