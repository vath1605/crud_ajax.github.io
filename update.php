<?php 
    if(isset($_POST['scope']) && $_POST['scope']=='update'){
        include 'db.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $des = $_POST['des'];
        $total = $_POST['total'];
        $pay = $_POST['pay'];
        $isPay = $_POST['isPay'];
        $query_update = "UPDATE tbl_product SET
            name = '$name',
            title = '$title',
            description = '$des',
            price = '$price',
            qty = '$qty',
            dis = '$discount',
            total = '$total',
            pay = '$pay',
            isPay = '$isPay'
        WHERE id = '$id'
        ";

        $query_update_run = mysqli_query($conn,$query_update);
        if($query_update_run){
            echo 168;
        }else{
            echo 001;
        }
    }
?>