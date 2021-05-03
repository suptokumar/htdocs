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
<meta property="og:title" content="European Travel Destinations">
<meta property="og:description" content="Offering tour packages for individuals or groups.">
<meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
<meta property="og:url" content="http://euro-travel-example.com/index.htm">

<meta name="twitter:title" content="European Travel Destinations ">
<meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
<meta name="twitter:image" content="http://euro-travel-example.com/thumbnail.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="csrf-token" content="{{ csrf_token() }}">


{{-- CSS LINKS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('public/css/main.css?') }}">
    <link rel="stylesheet" href="{{ asset('public/css/unedit/footer.css?') }}">
</head>
<body>
	@yield('content')

@includeif("footer")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>