<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    @include('layouts.head')
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--=================================
 preloader -->





        <!--=================================
 preloader -->
        @include('layouts.main-sidebar')
        <div class="page-wrapper">
        @include('layouts.main-header')
        <div class="content-wrapper">
            <div class="content">

@yield('content')



    </div>
    </div>
</div>
</div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
