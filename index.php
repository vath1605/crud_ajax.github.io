<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<style>
    .active{
        background-color: black !important;
        color: white !important;
    }
    li a{
        color: black !important;
    }
    li a:hover{
        background-color: rgb(229, 229, 229);
    }
</style>
<body>  
<header class="container-fluid pt-2 px-2">
    <nav class="navbar bg-dark-subtle w-100 rounded-3">
    <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand fw-bold text-uppercase" href="#">
            etec store
        </a>
    </div>
    </nav>
</header>
<aside class="py-3 float-start px-2" style="height: 93.5vh; width: 15vw;">
    <section class="bg-dark-subtle rounded-4 w-100 h-100 container-fluid p-0">
        <div class="container d-flex flex-column align-items-center py-4">
            <a href="#" class="text-dark nav-link fs-5 fw-bold">Admin Dashboard</a>
            <div class="container bg-secondary" style="height: 1px;"></div>
        </div>
        <ul class="container-fluid list-unstyled p-0">
            <li class="w-100 mb-2">
                <a id="add" data-url="add" class="nav-link fw-bold w-100 py-3 ps-3 rounded-3 h-100 d-flex align-items-center gap-1" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
  <path d="M2.5 0q-.25 0-.487.048l.194.98A1.5 1.5 0 0 1 2.5 1h.458V0zm2.292 0h-.917v1h.917zm1.833 0h-.917v1h.917zm1.833 0h-.916v1h.916zm1.834 0h-.917v1h.917zm1.833 0h-.917v1h.917zM13.5 0h-.458v1h.458q.151 0 .293.029l.194-.981A2.5 2.5 0 0 0 13.5 0m2.079 1.11a2.5 2.5 0 0 0-.69-.689l-.556.831q.248.167.415.415l.83-.556zM1.11.421a2.5 2.5 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415zM16 2.5q0-.25-.048-.487l-.98.194q.027.141.028.293v.458h1zM.048 2.013A2.5 2.5 0 0 0 0 2.5v.458h1V2.5q0-.151.029-.293zM0 3.875v.917h1v-.917zm16 .917v-.917h-1v.917zM0 5.708v.917h1v-.917zm16 .917v-.917h-1v.917zM0 7.542v.916h1v-.916zm15 .916h1v-.916h-1zM0 9.375v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .916v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .917v.458q0 .25.048.487l.98-.194A1.5 1.5 0 0 1 1 13.5v-.458zm16 .458v-.458h-1v.458q0 .151-.029.293l.981.194Q16 13.75 16 13.5M.421 14.89c.183.272.417.506.69.689l.556-.831a1.5 1.5 0 0 1-.415-.415zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373Q2.25 16 2.5 16h.458v-1H2.5q-.151 0-.293-.029zM13.5 16q.25 0 .487-.048l-.194-.98A1.5 1.5 0 0 1 13.5 15h-.458v1zm-9.625 0h.917v-1h-.917zm1.833 0h.917v-1h-.917zm1.834-1v1h.916v-1zm1.833 1h.917v-1h-.917zm1.833 0h.917v-1h-.917zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg>
                    Add Product</a>
            </li>
            <li class="w-100">
                <a id="view" data-url="stock" class="nav-link fw-bold w-100 py-3 ps-3 rounded-3 h-100 d-flex align-items-center gap-1" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
                    View Product</a>
            </li>
        </ul>
    </section>
</aside>
<main class="float-end py-3 pe-2" style="width: 84vw; height: 93.55vh;">
    <section id="display" style="width: 100%; height: 100%; overflow-y: scroll; scrollbar-width: none;" >

    </section>
</main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script>
    $(function(){
        let currentPage = localStorage.getItem('page') ? localStorage.getItem('page') : 'add';
        if(currentPage == 'add'){
            $('#add').addClass('active');
            $('#view').removeClass('active');
        }else{
            $('#add').removeClass('active');
            $('#view').addClass('active');
        }
        $.ajax({
            url: currentPage + '.php',
            method:'GET',
            success: function(res){
            $('#display').html(res);
            }
            })
        $('li a').click(function(e){
            e.preventDefault();
            let page = $(this).data('url');
            localStorage.setItem('page',page);
            $('li a').removeClass('active');
            $(this).addClass('active');
            $.ajax({
            url: page + '.php',
            method:'GET',
            success: function(res){
            $('#display').html(res);
            }
            })
        })
    })
</script>
</html>