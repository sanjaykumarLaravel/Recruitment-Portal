<!DOCTYPE html>
<html>
<head>
    <title>NetProphets Cyberworks Pvt. Ltd.</title>
</head>
<body>
    <p>Dear Team,</p>
    </br>
    </br>
    <p>Please check the below interview feedback:
    </br>	
    <p>
	</br>
	<table>

		<tr>
			<th style="text-align:left">Candidate Name : </th>
			<td style="text-align:left">{{$candidate_name}}</td>
		</tr>
		<tr>
			<th style="text-align:left">Skill / Technology : </th>
			<td style="text-align:left">{{$skill}}</td>
		</tr>
		<tr>
			<th style="text-align:left">Technological Skills : </th>
			<td style="text-align:left">{{$technological_skills}}</td>
		</tr>
		<tr>
			<th style="text-align:left">Result : </th>
			<td style="text-align:left">{{$result}}</td>
		</tr>
		<tr>
			<th style="text-align:left">Comments : </th>
			<td style="text-align:left">{!!$comments!!}</td>
		</tr>
	</table>
    </br>
    </br>
    <p>
		Thanks,</br><br>{{ $name ?? ''}}
	</p>
</body>
</html>