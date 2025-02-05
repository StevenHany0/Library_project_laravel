<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Book App</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
 
    <style>

        .table-width th, .table-width td , .table-width tr {
           
            padding: 20px;
        }



    </style>
</head>

<body>
    @include('book.layout.header')
    
    <div class="container mt-5">
       
            <div>
                @yield('content')
            </div>

            
            <div class="col-md-3">
                @include('book.layout.sidebar')
            </div>
        
    </div>
    
    
    @include('book.layout.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
