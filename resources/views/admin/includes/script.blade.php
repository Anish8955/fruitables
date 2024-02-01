
<script src=  "{{asset('public/front/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('public/front/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('public/front/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/front/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('public/front/assets/vendor/js/menu.js')}}"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('public/front/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{asset('public/front/assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script src="{{asset('public/front/assets/js/dashboards-analytics.js')}}"></script>

  <script>
    function logout() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = "{{ route('logoutadmin') }}"; // Redirect to the logout route
        }
    }
</script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js">
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
