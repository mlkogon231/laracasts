<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<div class = "test">

@if(Session::has('flash_message'))
	<div class = "alert alert-success">{{ Session::get('flash_message') }}</div>
@endif

@yield('content')
</div>
@yield('footer')
</html>
