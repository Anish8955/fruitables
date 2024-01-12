
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{asset('front/assets')}}" data-template="vertical-menu-template-free">

<head>
    @include('admin.includes.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.includes.sidebar')

            <div class="layout-page">

                @include('admin.includes.header')

                <div class="content-wrapper">

                    @yield('content')

                    <!-- footer Start -->
                    @include('admin.includes.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

    </div>
   

    <!-- Main jQuery -->
    @include('admin.includes.script')

</body>

</html>