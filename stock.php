<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.css" rel="stylesheet" integrity="sha384-oy6ZmHnH9nTuDaccEOUPX5BSJbGKwDpz3u3XiFJBdNXDpAAZh28v/4zfMCU7o63p" crossorigin="anonymous">
<div class="container-fluid px-5">
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
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Coke</td>
                <td>0.65</td>
                <td>10</td>
                <td>0</td>
                <td>6.5</td>
                <td>6.5</td>
                <td>............</td>
                <td>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>   
                            Edit</button>
                        <button type="button" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            Delete</button>
                        <button type="button" class="btn btn-success">
                            <i class="fa-solid fa-wallet"></i>
                            Pay
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.2/datatables.min.js" integrity="sha384-F5wD4YVHPFcdPbOt91vfXz6ZUTjeWsy4mJlvR4duPvlQdnq704Bh6DxV1BJy3gA2" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#table').DataTable();
    })
</script>