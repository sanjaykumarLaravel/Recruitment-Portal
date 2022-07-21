<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\RecruitmentInformation;
use App\Models\RecruitmentComments;
use Mail;
use Log;
use App\Models\Interviewer;
use App\Models\RecInterviewerList;
use App\Models\InterviewEvaluation;
use App\Models\InterviewEvaluationFeedback;
use App\Models\verifiedusersinformation;

class RecruitmentInformationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Recuitment Information
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee_type = Auth::user()->employee_type;
        $user_id = Auth::user()->id;
        if($employee_type==1 || $employee_type==3)
        {
            $recruitmentData = RecruitmentInformation::with(['User','RecInterviewerList'=>function($recinteList){
            $recinteList->with('Interviewer');
        }])->orderBy('created_at', 'DESC')->limit(10)->get();
        }
        else
        {
            $recruitmentData = RecruitmentInformation::with(['User','RecInterviewerList'=>function($recinteList){
            $recinteList->with('Interviewer');
        }])->where('user_id',$user_id)->orderBy('created_at', 'DESC')->limit(10)->get();
        }
        
        return view('pages.recruitment_information',compact('recruitmentData'));
    }
    /**
     * Show the Recuitment Information Add Form
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $interviewer = Interviewer::where('status',1)->get();
        return view('pages.recruitment_form',compact('interviewer'));
    }
    /**
     * Save the Recuitment Information
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save(Request $request)
    {
        $number_of_positions = implode(',',$request->input('number_of_positions'));
        $years_of_experience = implode(',',$request->input('years_of_experience'));
        $interviewer = $request->input('interviewer');

        // echo $number_of_positions;
        // echo "</br>";
        // echo $number_of_positions;
        // dd(($interviewer));
        $save = new RecruitmentInformation();
        $save->user_id = Auth::user()->id;
        $save->date_of_request = date('y-m-d');
        $save->position_required_by_date = $request->input('position_required_by_date');
        $save->positions = $number_of_positions;
        $save->years_of_experience = $years_of_experience;
        $save->designation = $request->input('designation');
        $save->department = $request->input('department');
        $save->job_description = $request->input('job_description');
        $save->mandatory_skills = $request->input('mandatory_skills');
        $save->location = $request->input('location');
        $save->selection_process = $request->input('selection_process');
        $save->special_instructions = $request->input('special_instructions');
        // $save->feedback = $request->input('feedback');
        // $save->interviewer = $interviewer;
        $save->status = 1;
        $save->save();

        if(count($interviewer)>0)
        {
            foreach($interviewer as $intData)
            {
                $recInterviewList = new RecInterviewerList();
                $recInterviewList->rec_id = $save->id;
                $recInterviewList->interviewer_id = $intData;
                $recInterviewList->save();
            }
        }

        // For Mail
        try{
            $requestStatus = 'Pending';
            // $emails = array('lydia.george@netprophetsglobal.com','Shobhana.Bansal@netprophetsglobal.com');
            $emails = array('sanjay.kumar@netprophetsglobal.com','jugendra.singh@netprophetsglobal.com');
            // $emails = array('ankit.katiyar@netprophetsglobal.com');
            $data = ['requestStatus' => $requestStatus,'designation'=>$request->input('designation'),'name'=>Auth::user()->name];

            Mail::send('email.request', $data, function($message) use ($emails, $requestStatus) {
                $message->to($emails);
                $message->from('hrd@netprophetsglobal.com', 'hrd'); 
                $message->subject('You have got a new Recruitment request from '.Auth::user()->name.'');
            });
        }
        catch(Exception $e){
            // echo 'successdasf';
            Log::info('Email Failed :'.$e);
        }

        return redirect()->route('recruitment-request-list')->with('message', 'Recruitment request successfully submitted.');

    }
    /**
     * View the Recuitment Information
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view($id='')
    {
        $recruitmentInformation = RecruitmentInformation::with(['RecInterviewerList'=>function($recinteList){
            $recinteList->with('Interviewer');
        }])->where('id',$id)->first();
        return view('pages.recruitment_view',compact('recruitmentInformation','id'));
    }
    /**
     * Show the Recuitment Information Comments
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function comments($id='')
    {
        $recruitmentComments = RecruitmentComments::where('recruitment_id',$id)->orderBy('created_at', 'DESC')->get();
        return view('pages.recruitment_comment',compact('recruitmentComments','id'));
    }  
    /**
     * Save the Recuitment Information Comments
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function savecomment(Request $request)
    {
        $save = new RecruitmentComments();
        $save->user_id = Auth::user()->id;
        $save->recruitment_id = $request->input('rec_id');
        $save->status = $request->input('status');
        $save->comments = $request->input('comments');
        $save->save();

        $update = RecruitmentInformation::with('User')->find($request->input('rec_id'));
        $update->status = $request->input('status');
        $update->save();

        // For Email
        try{
            if($request->input('status')==1)
            {
                $requestStatus = 'Pending';
            }
            elseif($request->input('status')==2)
            {
                $requestStatus = 'In Progress';
            }
            elseif($request->input('status')==3)
            {
                $requestStatus = 'Completed';
            }
            $email = $update['User']->email;
            $name = $update['User']->name;
            $data = ['requestStatus' => $requestStatus,'name'=>$name];

            Mail::send('email.status', $data, function($message) use ($email, $name, $requestStatus) {
                $message->to($email,  $name);
                $message->from('hrd@netprophetsglobal.com', 'hrd'); 
                $message->subject('NP Recruitment Request :'.$requestStatus );
            });

            // if (Mail::failures()) {
            //     dd('Mail not send.');
            // }
            // else
            // {
            //     dd('success');
            // }
        }
        catch(Exception $e){
            // echo 'successdasf';
            Log::info('Email Failed :'.$e);
        }
        return redirect()->route('recruitment-request-list')->with('message', 'Recruitment comment successfully send.');

    }

    public function InterviewEvaluation()
    {
        $employee_type = Auth::user()->employee_type;
        $user_id = Auth::user()->id;
        if($employee_type==1 || $employee_type==3){
            $recruitmentData = InterviewEvaluation::orderBy('created_at', 'desc')->paginate(10);
        }else{
            $$recruitmentData = InterviewEvaluation::orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('pages.interview_evaluation',compact('recruitmentData'));
    }
    public function CreateInterviewEvaluation()
    {
        $interviewer = Interviewer::where('status',1)->get();
        return view('pages.create_interview_evaluation',compact('interviewer'));
    }

    /**
     * Save the Recuitment Information
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function SaveInterviewEvaluation(Request $request)
    {
        $interviewerString = implode(',',$request->input('interviewer'));
        $interviewer = $request->input('interviewer');

        $interview_evaluation = new InterviewEvaluation();
        $interview_evaluation->user_id = Auth::user()->id;
        $interview_evaluation->date_of_request = date('y-m-d');
        $interview_evaluation->candidate_name = $request->input('candidate_name');
        $interview_evaluation->skill = $request->input('skill');
        $interview_evaluation->interviewer = $interviewerString;
        $interview_evaluation->status = 1;
        $interview_evaluation->save();

        if(count($interviewer)>0)
        {
            foreach($interviewer as $intData)
            {
                $interview_evaluation_feedback = new InterviewEvaluationFeedback();
                $interview_evaluation_feedback->interview_evaluation_id = $interview_evaluation->id;
                $interview_evaluation_feedback->interviewer_id = $intData;
                $interview_evaluation_feedback->save();
            }
        }

        // For Mail
        try{
            // Get Interviewer Email Ids for Mail
            $interviewerEmails = Interviewer::whereIn('emp_id',$interviewer)->get()->toArray();
            $names = array_column($interviewerEmails, 'name');
            $pm_names_array = implode(", ",$names);
            $emails = array_column($interviewerEmails, 'email');
            $candidate_name = $request->input('candidate_name');
            $data = ['candidate_name'=>$request->input('candidate_name'),'skill'=>$request->input('skill'),'pm_names_array'=>$pm_names_array,'interview_evaluation_id'=>base64_encode(base64_encode(base64_encode($interview_evaluation->id))),'interviewerString'=>base64_encode(base64_encode(base64_encode($interviewerString)))];
            // $emails = 'ankit.katiyar@netprophetsglobal.com';
            Mail::send('email.interview_evaluation', $data, function($message) use ($emails,$candidate_name) {
                $message->to($emails);
                // $message->to('ankit.katiyar@netprophetsglobal.com');
                $message->from('hrd@netprophetsglobal.com', 'hrd'); 
                $message->subject("We value your feedback for $candidate_name");
            });
        }
        catch(Exception $e){
            // echo 'successdasf';
            Log::info('Email Failed :'.$e);
        }

        return redirect()->route('interview-evaluation')->with('message', 'Interview Evaluation Request sent successfully.');

    }
    public function InterviewEvaluationFeedback($interviewevaluationId ='',$interviewers='')
    {
        $interviewevaluationId = base64_decode(base64_decode(base64_decode($interviewevaluationId)));
        $interviewerIds = base64_decode(base64_decode(base64_decode($interviewers)));
        $interviewerArr = explode(',',$interviewerIds);
        // Check InterviewEvaluation id exists or not
        $interviewEvaluation = InterviewEvaluation::where('id',$interviewevaluationId)->where('status',1)->first();
        if($interviewEvaluation=='')
        {
            // abort(403);
            return "Sorry, You don't have permission to access this route";
        }

        // Check Interviewer emp_id is same or not
        $interviewer = Interviewer::where('email',Auth::user()->email)->first();
        // Check Interviewer assign the interview
        $get_interview_evaluation = InterviewEvaluationFeedback::where('interview_evaluation_id',$interviewevaluationId)->where('interviewer_id',$interviewer->emp_id)->first();
        if(isset($get_interview_evaluation->interviewer_id) && in_array($get_interview_evaluation->interviewer_id,$interviewerArr))
        {}
        else
        {
            return "Sorry, You don't have permission to access this route";
        }
        // Check Interviewer Submit the feedback or not
        $interview_evaluation = InterviewEvaluationFeedback::where('interview_evaluation_id',$interviewevaluationId)->where('interviewer_id',(int)$interviewer->emp_id)->where('technological_skills','!=','null')->where('result','!=','null')->first();
        if($interview_evaluation)
        {
            return 'Sorry, You have already submitted the Interview Evaluation Feedback.';
        }
        return view('pages.interview_evaluation_feedback',compact('interviewEvaluation'));
    }
    public function SaveInterviewEvaluationFeedback(Request $request)
    {
        
        $interviewer = Interviewer::where('email',Auth::user()->email)->first();
        $interview_evaluation = InterviewEvaluationFeedback::where('interview_evaluation_id',$request->inter_eval_id)->where('interviewer_id',$interviewer->emp_id) ->update([
           'technological_skills' => $request->technological_skills,
           'comments' => $request->comments,
           'result' => $request->result,
           'candidate_attitude' => ''
        ]);
        // For Mail
        try{
            $emails = array('lydia.george@netprophetsglobal.com','Shobhana.Bansal@netprophetsglobal.com');
            // $emails = array('sanjay.kumar@netprophetsglobal.com');
            // $emails = array('ankit.katiyar@netprophetsglobal.com');
            $candidate_name = $request->candidate_name;
            $data = ['candidate_name' => $request->candidate_name,'skill'=>$request->skill,'technological_skills'=>$request->technological_skills,'result'=>$request->result,'comments'=>$request->comments,'name'=>Auth::user()->name];

            Mail::send('email.interview_evaluation_feedback', $data, function($message) use ($emails, $candidate_name) {
                $message->to($emails);
                $message->from('hrd@netprophetsglobal.com', 'hrd'); 
                $message->subject("Intervew Feedback $candidate_name");
            });
        }
        catch(Exception $e){
            // echo 'successdasf';
            Log::info('Email Failed :'.$e);
        }

        return redirect()->route('home')->with('message', 'Interview Evaluation Feedback successfully submitted.');

    }


    public function interviewevaluationview($id=''){
        // dd($id);
        $interview_evaluation_view = InterviewEvaluationFeedback::with(['VerifiedUsersInformation'=>function($verUser){
            $verUser->select('emp_id','employee_name','email','designation');
        }])->where('interview_evaluation_id',$id)->get();
        $interviewer_id = $interview_evaluation_view[0]['interviewer_id'];
        // dd($interviewer_id);
        // $interview_eva_view = verifiedusersinformation::where('emp_id',$interviewer_id)->get();
        
        // echo '<pre>';print_r($interview_evaluation_view[0]['interviewer_id']);exit;
        // dd($interview_evaluation_view);
        return view('pages.interview_evaluation_view',compact('interview_evaluation_view'));
    }


}
