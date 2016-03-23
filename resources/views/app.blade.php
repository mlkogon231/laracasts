<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class = "test">

@if(Session::has('flash_message'))
	<div class = "alert alert-success">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button>
		{{ Session::get('flash_message') }}

	</div>
@endif

@yield('content')
</div>


<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('footer')
</html>
