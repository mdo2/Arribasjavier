<?php /* Less */ ?>
@if(App::environment('local'))
<script src="{{ URL::to('libs/less/less.min.js') }}"></script>
@endif

<?php /* Modernizr */ ?>
<script src="{{ URL::to('inc/js/modernizr.js') }}"></script>

<?php /* jQuery 2.* */ ?>
<script src="{{ URL::to('libs/jquery/jquery.min.js') }}"></script>

<?php /* Bootstrap 3.1.1 */ ?>
<script src="{{ URL::to('libs/bootstrap/js/bootstrap.min.js') }}"></script>

<?php /* Main Site Script */ ?>
<script src="{{ URL::to('inc/js/arribasjavier.js') }}"></script>