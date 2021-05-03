<!DOCTYPE html>
<html lang="en">
<head>
{{-- SEO TAGs --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="John Doe">
<link rel="icon" href="{{ asset('public/img/fev.png') }}">
<meta property="og:title" content="ToDo: make your daily tasks let you live awesome.">
<meta property="og:description" content="you can see after a few years that what was your daily life and what is now. Go awesome do awesome.">
<meta property="og:image" content="{{ asset('/public/img/todo.PNG') }}">
<meta property="og:url" content="http://euro-travel-example.com/index.htm">

<meta name="twitter:title" content="ToDo: make your daily tasks let you live awesome.">
<meta name="twitter:description" content="you can see after a few years that what was your daily life and what is now. Go awesome do awesome.">
<meta name="twitter:image" content="{{ asset('/public/img/todo.PNG') }}">
<meta name="twitter:card" content="you can see after a few years that what was your daily life and what is now. Go awesome do awesome.">
<meta name="csrf-token" content="{{ csrf_token() }}">


{{-- CSS LINKS --}}
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('public/css/main.css?'.rand()) }}">
    <link rel="stylesheet" href="{{ asset('public/css/unedit/footer.css?'.rand()) }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/public/js') }}/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/public/js') }}/dist/bootstrap-clockpicker.min.css">
</head>
<body>
	@yield('content')

@includeif("footer")
<script type="text/javascript" src="{{ asset('/public/js') }}/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/js') }}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('/public/js') }}/dist/bootstrap-clockpicker.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('/public/js') }}/main.js?{{rand()}}"></script>

</body>
</html>