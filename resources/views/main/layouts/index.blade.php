<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.includes.head')
</head>

<body>
   

    <!-- Navbar start -->
    @include('main.includes.header')
    <!-- Navbar End -->

    @yield('content')

    <!-- footer Start -->
    @include('main.includes.footer')

     <!-- Back to Top -->
     <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   


    <!-- Main jQuery -->
    @include('main.includes.Script')

</body>

</html>