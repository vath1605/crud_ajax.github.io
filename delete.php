<?php
    if(isset($_POST['scope']) && $_POST['scope'] == 'delete'){
        include 'db.php';
        $id = $_POST['id'];
        $query_delete = "DELETE FROM tbl_product WHERE id = '$id'";
        $query_delete_run = mysqli_query($conn,$query_delete);
        if($query_delete_run){
            echo 168;
        }else{
            echo 002;
        }
    }
?>