<!DOCTYPE html>
<html>
<head>
	<title>Release Letter</title>
</head>
<body>
@if($schedules)
<p>Dear Sir/Madam,</p>
<br>
<p><b>RELEASE LETTER</b></p>
<br>
<p>This is to certify that Mr. <span>{{ Auth::user()->name }}</span> (name of the person who is being released) has to come for industrial presetation on <span>{{ Carbon\Carbon::parse($schedules->date)->format('d/m/Y')}}</span>. Please let the person take a leave on this date.</p>
<br>
<p>Thank you.</p>
@else
<p>Not available yet!</p>
@endif
</body>
</html>