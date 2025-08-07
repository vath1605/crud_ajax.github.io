<?php 
    if(isset($_POST['scope']) && $_POST['scope']=='edit'){
        include 'db.php';
        $id = $_POST['id'];
        $query_select_row = "SELECT * FROM tbl_product WHERE id='$id'";
        $query_select_row_run = mysqli_query($conn,$query_select_row);
        if(mysqli_num_rows($query_select_row_run)>0){
            $data = mysqli_fetch_assoc($query_select_row_run);
            ?> 
<form class="container-fluid p-5">
    <div class="row gy-3">
        <div class="col-12 mb-4">
            <h2 class="d-flex align-items-center gap-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                Update Product Information
            </h2>
        </div>
        <div class="col-6">
            <label for="title" class="form-label">Input Product Title <span class="text-danger">*</span></label>
            <input type="text" value="<?= $data['title'] ?>" placeholder="Product Title" id="title" class="form-control">
            <input type="hidden" id="id" value="<?= $id ?>">
        </div>
        <div class="col-6">
            <label for="name" class="form-label">Input Product Name <span class="text-danger">*</span></label>
            <input type="text" placeholder="Product Name" value="<?= $data['name'] ?>" id="name" class="form-control">
        </div>
        <div class="col-4">
            <label for="price" class="form-label">Input Product Price <span class="text-danger">*</span></label>
            <input type="number" value="<?= $data['price'] ?>" placeholder="Product Price" id="price" class="form-control">
        </div>
        <div class="col-4">
            <label class="form-label" for="discount">Choose Product Discount <span class="text-danger">*</span></label>
            <select class="form-select" id="discount">
                <option <?= $data['dis'] == 0 ? 'selected':'' ?> value="0">0%</option>
                <option <?= $data['dis'] == 25? 'selected':'' ?> value="25">25%</option>
                <option <?= $data['dis'] == 50 ? 'selected':'' ?> value="50">50%</option>
                <option <?= $data['dis'] == 75 ? 'selected':'' ?> value="75">75%</option>
            </select>
        </div>
        <div class="col-4">
            <label for="qty" class="form-label">Input Product QTY <span class="text-danger">*</span></label>
            <input value="<?= $data['qty'] ?>" type="number" class="form-control" placeholder="Product QTY" id="qty">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Input Product Description <span class="text-danger">*</span></label>
            <textarea id="description" class="form-control" rows="20" placeholder="Product Description"> <?= $data['description'] ?> </textarea>
        </div>
        <div class="col-8"></div>
        <div class="col-4 d-flex gap-2 justify-content-end">
            <button type="button" id="cancelBtn" class="btn btn-danger d-flex align-items-center px-4 py-2 fw-semibold">
                <i class="fa-regular fa-circle-xmark"></i>
                Cancel
            </button>
            <button type="button" id="btnUpdate" class="btn btn-success d-flex align-items-center px-4 py-2 fw-semibold">
                <i class="fa-regular fa-floppy-disk"></i>
                Update</button>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#cancelBtn').click(function(){
            $.ajax({
            url: "stock.php",
            method: "GET",
            success: function (res) {
                $('#display').html(res);
            }
            });
        })
        $('#btnUpdate').click(function(){
            let id = $('#id');
            let name = $('#name');
            let title = $('#title');
            let discount = $('#discount');
            let price = $('#price');
            let qty = $('#qty');
            let des = $('#description');
            let total =(price.val() * qty.val()).toFixed(2);
            let pay = (total - (discount.val()*total)/100).toFixed(2);
            $.ajax({
                url: "update.php",
                data: {
                    id: id.val(),
                    name: name.val(),
                    title: title.val(),
                    discount: discount.val(),
                    price: price.val(),
                    qty: qty.val(),
                    des: des.val(),
                    total: total,
                    pay: pay,
                    scope: 'update'
                },
                method: 'POST',
                success: function(res) {
                    if(res == '168'){
                        Swal.fire({
                            title: "The Work Completed.",
                            text: "Information Updated Successfully.",
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
                    url: "stock.php",   
                    method: 'GET',
                    success: function (res) {
                        $('#display').html(res)
                    }
                });
            });
        })

    })
</script>
            <?php 
        }
    }
?>