<?php 
    if(isset($_POST['scope']) && $_POST['scope']=="pay"){
        include'db.php';
        $id = $_POST['id'];
        $query_pay = "UPDATE tbl_product SET isPay = 1 WHERE id = '$id'";
        try {
            $query_pay_run = mysqli_query($conn,$query_pay);
        } catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
        if($query_pay_run){
            echo 168;
        }else{
            echo 007;
        }
    }
?>