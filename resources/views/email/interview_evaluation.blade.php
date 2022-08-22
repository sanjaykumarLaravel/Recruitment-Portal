<!DOCTYPE html>
<html>
<head>
    <title>NetProphets Cyberworks Pvt. Ltd.</title>
</head>
<body>
    <p>Hi {{$name}},</p>
    </br>
    </br>
        <p>Please give your feedback regarding {{$candidate_name}}.</p>
    </br>
    <p>
        <b>Note:<b> Please take this up urgently.</br><br>
    	<a href="{{env('APP_URL')}}/interview-evaluation-feedback/{{$interview_evaluation_id}}/{{$interviewerString}}">Click Here</a>
    </p>
    </br>
    </br>
    </br>
    <p>
        Thanks,</br><br>Team HR.
    </p>
</body>
</html>