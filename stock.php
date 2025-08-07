<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet" integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">
<div class="container-fluid">
    <div class="container-fluid p-5">
    <h2 class="mb-5">
        <i class="fa-solid fa-cart-shopping"></i>
        All Product Information
    </h2>
    <table id="table" class="table align-middle table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Quantity (pcs)</th>
                <th>Discount (%)</th>
                <th>Total ($)</th>
                <th>Payment ($)</th>
                <th>Date</th>
                <th>Cash Out</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include 'db.php';
                $query_stock = "SELECT * FROM tbl_product";

                try {
                    $query_stock_run = mysqli_query($conn,$query_stock);
                } catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
                if(mysqli_num_rows($query_stock_run)>0){
                    foreach($query_stock_run as $stock){
                        ?>
                            <tr>
                                <td><?= $stock['id'] ?></td>
                                <td><?= $stock['name'] ?></td>
                                <td><?= $stock['price'] ?></td>
                                <td><?= $stock['qty'] ?></td>
                                <td><?= $stock['dis'] ?></td>
                                <td><?= $stock['total'] ?></td>
                                <td><?= $stock['pay'] ?></td>
                                <td><?= $stock['cr_date'] ?></td>
                                <td>
                                    <span class="<?= ($stock['isPay']) == 0 ? 'bg-danger-subtle text-danger':'bg-success-subtle text-success' ?> px-3 py-1 rounded-pill  fw-semibold" style="font-size: 14px;">
                                        <?= ($stock['isPay']) == 0 ? 'Not Yet':'Paid' ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button type="button" value="<?= $stock['id'] ?>" class="btn btn-warning btnEdit">
                                            <i class="fa-solid fa-pen-to-square"></i>   
                                            Edit</button>
                                        <button data-id="<?= $stock['id'] ?>" type="button" class="btn btn-danger btnDelete">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete</button>
                                        <button type="button" data-id="<?= $stock['id'] ?>" class="btn btn-success btnPay <?= ($stock['isPay']) == 0 ? '':'disabled' ?>">
                                            <i class="fa-solid fa-wallet"></i>
                                            Pay
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                }
            ?>
            
        </tbody>
    </table>
</div>
</div>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js" integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#table').DataTable();
        $('.btnPay').each(function(){
            $(this).click(function(){
                let id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "This product payemnt will be pay.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Pay it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                    url: "payment.php",
                    data: {
                        id : id,
                        scope : 'pay'
                    },
                    method: "POST",
                    success: function (res) {
                        if(res == '168'){
                            Swal.fire({
                            title: "The Work Completed.",
                            text: "The product payment is paid.",
                            icon: "success"
                            })
                        }else if(res == '007'){
                            Swal.fire({
                            icon: "error",
                            title: "Work Not Complete.",
                            text: "The product payment couldn't pay."
                            });
                        }else{
                            Swal.fire({
                            icon: "error",
                            title: "Work Not Complete.",
                            text: res
                            });
                        }
                    },
                    error: function (err) {
                        Swal.fire({
                            icon: "error",
                            title: "Server Error",
                            text: err
                            });
                        }
                    }).then(function(){
                        $.ajax({
                            url: "pay.php",
                            method: "GET",
                            success: function (res) {
                                $('#display').html(res);
                            }
                        });
                    });
                    }
                    });
            })
        })
        $('.btnEdit').each(function(){
            $(this).click(function(){
                let id = $(this).val();
                $.ajax({
                    url: "edit.php",
                    data: {
                        id: id,
                        scope: 'edit'
                    },
                    method:'POST',
                    success: function(res) {
                        $('#display').html(res)
                    }
                });
            })
        })
        $('.btnDelete').each(function(){
            $(this).click(function(){
                let id = $(this).data('id');
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "delete.php",
                        data: {
                            id: id,
                            scope: 'delete'
                        },
                        method:"POST",
                        success: function(res) {
                            if(res == '168'){
                                Swal.fire({
                                    title: "The Work Completed.",
                                    text: "Information Deleted Successfully.",
                                    icon: "success"
                                });
                            }else{
                                Swal.fire({
                                    icon: "error",
                                    title: "Work Not Complete.",
                                    text: "Something gone wrong !"
                                });
                            }
                        }
                    }).then(function(){
                        $.ajax({
                            url: "pay.php",
                            method: "GET",
                            success: function (res) {
                                $('#display').html(res);
                            }
                        });
                    });
                }
                });
            })
        })
    })
</script>