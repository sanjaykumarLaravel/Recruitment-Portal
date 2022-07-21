<!DOCTYPE html>
<html>
<head>
    <title>We value your feedback for.</title>
</head>
<body>
    <p>Hi {{ $pm_names_array ?? '' }},
    </p>
    </br>
    </br>
    <!-- <p> I email you today to ask regarding {{$candidate_name}}. So I request to you please proivde the feedback on below link.</p> -->
    <p>Please give your feedback regarding {{$candidate_name ?? ''}}.
    </br>
    <p><b>Note:</b> Please take this up urjently.</p>	
    <p>
    	<a href="http://localhost:8000/interview-evaluation-feedback/{{$interview_evaluation_id}}/{{$interviewerString}}">http://localhost:8000/interview-evaluation-feedback/{{$interview_evaluation_id}}/{{$interviewerString}}</a>
    </p>
    </br>
    </br>
    </br>
    <p>Thanks</p>
    <p>Team HR</p>
</body>
</html>