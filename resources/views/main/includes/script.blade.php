<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script>
    function logout() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = "{{ route('logout')}}"; // Redirect to the logout route
        }
    }
</script>

        <script src="{{asset('js/main.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript to show the success message -->
<script>
    $(document).ready(function () {
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    });
</script>
@stack('scripts')






   