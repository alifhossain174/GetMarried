{{-- @extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests')) --}}


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>401 - Unauthorized</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{url('error_assets')}}/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="{{url('error_assets')}}/css/style.css" />
</head>

<body>

	<div id="notfound">
		<div class="notfound-bg">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div class="notfound">
			<div class="notfound-404">
				{{-- <h1>429</h1> --}}
				<h1 style="font-size: 140px;">Warning</h1>
			</div>
			<h2>You Have Submitted Too Many Contact Requests</h2>
			<p>Please wait for a few minutes</p>
			<a href="{{url('/')}}">Homepage</a>
		</div>
	</div>

</body>

</html>
