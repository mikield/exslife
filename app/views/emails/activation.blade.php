<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ trans('auth.activateTitle') }}</h2>

		<div>
			{{ trans('auth.activateMessage') }} {{ URL::to('activate/'.$code) }}.<br/>
		</div>
	</body>
</html>