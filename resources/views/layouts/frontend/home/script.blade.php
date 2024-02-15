<!-- JAVASCRIPT -->
<script src="{{ asset('front/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SLIDER -->
<script src="{{ asset('front/libs/tiny-slider/min/tiny-slider.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('front/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('front/assets/js/plugins.init.js') }}"></script>
<!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="{{ asset('front/assets/js/app.js') }}"></script>
<!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

<!-- amchart -->
<script src="{{ asset('front/assets/js/amchart/index.js') }}"></script>
<script src="{{ asset('front/assets/js/amchart/xy.js') }}"></script>
<script src="{{ asset('front/assets/js/amchart/Animated.js') }}"></script>

<script src="{{ asset('assets/libs/jquery/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('assets\libs\datatables.net\js\jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets\libs\datatables.net\js\dataTables.bootstrap5.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> --}}
@stack('scripts')


<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        var eye = document.getElementById('eye')
        var eyeSlash = document.getElementById('eye-slash')

        if (x.type === "password") {
            x.type = "text";
            eye.style.display = 'block';
            eyeSlash.style.display = 'none';
        } else {
            x.type = "password";
            eye.style.display = 'none';
            eyeSlash.style.display = 'block';
        }
    }
</script>


