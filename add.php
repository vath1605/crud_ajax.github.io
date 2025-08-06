<form class="container-fluid p-5">
    <div class="row gy-3">
        <div class="col-12 mb-4">
            <h2 class="d-flex align-items-center gap-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg>
                Add Product Information
            </h2>
        </div>
        <div class="col-6">
            <label for="title" class="form-label">Input Product Title <span class="text-danger">*</span></label>
            <input type="text" placeholder="Product Title" id="title" class="form-control">
        </div>
        <div class="col-6">
            <label for="name" class="form-label">Input Product Name <span class="text-danger">*</span></label>
            <input type="text" placeholder="Product Name" id="name" class="form-control">
        </div>
        <div class="col-4">
            <label for="price" class="form-label">Input Product Price <span class="text-danger">*</span></label>
            <input type="number" placeholder="Product Price" id="price" class="form-control">
        </div>
        <div class="col-4">
            <label class="form-label" for="discount">Choose Product Discount <span class="text-danger">*</span></label>
            <select class="form-select" id="discount">
                <option value="0">0%</option>
                <option value="25">25%</option>
                <option value="50">50%</option>
                <option value="75">75%</option>
            </select>
        </div>
        <div class="col-4">
            <label for="qty" class="form-label">Input Product QTY <span class="text-danger">*</span></label>
            <input type="number" class="form-control" placeholder="Product QTY" id="qty">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Input Product Description <span class="text-danger">*</span></label>
            <textarea id="description" class="form-control" rows="20" placeholder="Product Description"></textarea>
        </div>
        <div class="col-8"></div>
        <div class="col-4 d-flex gap-2 justify-content-end">
            <button type="reset" class="btn btn-secondary d-flex align-items-center px-4 py-2 fw-semibold">
                <i class="fa-regular fa-circle-xmark"></i>
                Clear Form
            </button>
            <button type="button" id="btnSave" class="btn btn-success d-flex align-items-center px-4 py-2 fw-semibold">
                <i class="fa-regular fa-floppy-disk"></i>
                Save</button>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#btnSave').click(function(){
            let name = $('#name');
            let title = $('#title');
            let discount = $('#discount');
            let price = $('#price');
            let qty = $('#qty');
            let des = $('#description');
            let total =(price.val() * qty.val()).toFixed(2);
            let pay = (total - (discount.val()*total)/100).toFixed(2);
            $.ajax({
                url: "insert.php",
                method:"POST",
                data: {
                    name: name.val(),
                    title: title.val(),
                    discount: discount.val(),
                    price: price.val(),
                    qty: qty.val(),
                    des: des.val(),
                    total: total,
                    pay: pay,
                    scope: 'insert'
                },
                success: function (response) {
                    if(response == '168'){
                        Swal.fire({
                            title: "The Work Completed.",
                            text: "Information Inserted Successfully.",
                            icon: "success"
                            });
                    }else if(response == '101'){
                        Swal.fire({
                            icon: "error",
                            title: "Work Not Complete.",
                            text: "Please Fill Out All Fields."
                            });
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Work Not Complete.",
                            text: response
                            });
                    }
                    name.val('');
                    title.val('');
                    discount.val('');
                    price.val('');
                    qty.val('');
                    des.val('');
                },
                error: function (error){
                    alert('Error on :' + error.error());
                }
            });
            
        })
    })
</script>