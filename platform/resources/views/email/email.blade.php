<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $data['title'] }}</title>
</head>
<body style="max-width: 450px; border: 1px solid #ccc; padding: 10px;">
	<h2>{{ $data['title'] }}</h2>
	<p>{{ $data['description'] }}</p>
	<pre>
Class Duration: {{ $data['duration'] }}
Class Starting at: {{ $data['time'] }} {{ $data['date'] }} ({{ $data['timezone'] }})
Assigned Teacher: {{ $data['teacher'] }}
Student's email: {{ $data['student'] }}
Class Link: <a href="{{ $data['link'] }}">{{ $data['link'] }}</a>
Guests: {{ $data['guest'] }}
Repeat: {{ $data['repeat']=='' ? "No Repeat" : str_replace(",", " ", $data['repeat']) }}
	</pre>
		@if (isset($data['accept']))
Accept Guest Request: <a href="{{ $data['accept'] }}" style="border: 1px solid #ccc; padding: 10px 20px; display: block; text-decoration: none; background: green; color: white; max-width: 100px; text-align: center; margin: 0px auto;">Click Here To Accept</a>
		@endif

	With Best Regards, <br>
	{{ $data['admin'] }}
</body>
</html>