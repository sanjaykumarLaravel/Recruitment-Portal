<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\RecruitmentInformation;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee_type = Auth::user()->employee_type;
        $user_id = Auth::user()->id;
        if($employee_type==1 || $employee_type==3)
        {
            $totalRequest = RecruitmentInformation::get()->count();
            $pendingRequest = RecruitmentInformation::whereIn('status',[1,2])->get()->count();
            $closedRequest = RecruitmentInformation::where('status',3)->get()->count();
            $recruitmentData = RecruitmentInformation::with(['User','RecInterviewerList'=>function($recinteList){
            $recinteList->with('Interviewer');
        }])->orderBy('created_at', 'DESC')->limit(10)->get();
        }
        else
        {
            $totalRequest = RecruitmentInformation::where('user_id',$user_id)->get()->count();
            $pendingRequest = RecruitmentInformation::where('user_id',$user_id)->whereIn('status',[1,2])->get()->count();
            $closedRequest = RecruitmentInformation::where('user_id',$user_id)->where('status',3)->get()->count();
            $recruitmentData = RecruitmentInformation::with(['User','RecInterviewerList'=>function($recinteList){
            $recinteList->with('Interviewer');
        }])->where('user_id',$user_id)->orderBy('created_at', 'DESC')->limit(10)->get();
        }
        
        return view('home',compact('totalRequest','pendingRequest','closedRequest','recruitmentData'));
    }
}
