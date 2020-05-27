
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{asset('public/backend/css')}}/styles.css" rel="stylesheet" />
    <link href="{{asset('public/backend/css')}}/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('layouts.includes.nav')
<div id="layoutSidenav">
    @include('layouts.includes.sidebar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.includes.footer')
    </div>
</div>
<script src="{{asset('public/backend/js')}}/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/scripts.js"></script>
<script src="{{asset('public/backend/js')}}/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/chart-area-demo.js"></script>
<script src="{{asset('public/backend/js')}}/chart-bar-demo.js"></script>
<script src="{{asset('public/backend/js')}}/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{asset('public/backend/js')}}/datatables-demo.js"></script>
</body>
</html>
