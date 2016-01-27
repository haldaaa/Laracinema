
</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script src="{{asset ('vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>




    <!-- Theme Javascript -->
    <script src="{{ asset('assets/js/utility/utility.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- Widget Javascript -->
    <script src="assets/js/demo/widgets.js"></script>

    <script src="{{asset('js/main.js')}}"></script>
@show
<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";


        // Init Theme Core
        Core.init();
    })
    </script>
</body>
</html>