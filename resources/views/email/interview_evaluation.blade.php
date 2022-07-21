<!DOCTYPE html>
<html>
<head>
    <title>NetProphets Cyberworks Pvt. Ltd.</title>
</head>
<body>
    <p>Hi {{ $pm_names_array ?? '' }},
    </p>
    </br>
    </br>
    <p>Please give your feedback regarding -- {{$candidate_name ?? ''}}.
    </br>
    <p><b>Note:</b> Please take this up urjently.</p>	
    <p>
    	<a href="http://localhost:8000/interview-evaluation-feedback/{{$interview_evaluation_id}}/{{$interviewerString}}">Click Here</a>
    </p>
    </br>
    </br>
    </br>
    <p>
        Thanks,</br><br>Team HR
    </p>
</body>
</html>