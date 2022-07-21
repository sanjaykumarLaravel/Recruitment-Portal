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
			<td>Candidate Name : </td>
			<td>{{ $candidate_name }}</td>
		</tr>
		<tr>
			<td>Skill / Technology : </td>
			<td>{{ $skill }}</td>
		</tr>
		<tr>
			<td>Technological Skills : </td>
			<td>{{ $technological_skills }}</td>
		</tr>
		<tr>
			<td>Result : </th>
			<td>{{ $result }}</td>
		</tr>
		<tr>
			<td>Comments : </td>
			<td>{!!$comments!!}</td>
		</tr>
	</table>
    </br>
    </br>
    <p>Thanks</p>
    <p>{{ $name ?? ''}}</p>
</body>
</html>