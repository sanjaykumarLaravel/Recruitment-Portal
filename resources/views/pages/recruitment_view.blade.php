@extends('layouts.app')
@section('title', 'View Recruitment Request')
@section('content')
@include('include.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">My Request</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">View Recruitment</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">View Recruitment Request</h6>
        </nav>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        <div class="card my-4">
          <div class="card-header pb-0 px-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">View Recruitment Request</h6>
              </div>
              <div class="col-6 text-end">
                  @if($recruitmentInformation->status==1)
                    <button class="btn btn-outline-primary btn-sm mb-0">Status: 
                  {{isset($recruitmentInformation->status)?'Pending':'-'}}</button>
                  @elseif($recruitmentInformation->status==2)
                    <button class="btn btn-outline-primary btn-sm mb-0">Status: 
                  {{isset($recruitmentInformation->status)?'InProgress':'-'}}</button>
                  @else
                    <button class="btn btn-outline-primary btn-sm mb-0">Status: 
                  {{isset($recruitmentInformation->status)?'Completed':'-'}}</button>
                  @endif
              </div>
           </div>
          </div>          
          <div class="card-body px-0 pb-2">
            <form method="post" action="{{route('save-recruitment-request')}}">
              @csrf
            <div class="container my-auto">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Date of Request:</label> <h6>{{isset($recruitmentInformation->date_of_request)?$recruitmentInformation->date_of_request:'-'}}</h6>
                </div>

                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Position Required by Date::</label><h6>{{isset($recruitmentInformation->position_required_by_date)?$recruitmentInformation->position_required_by_date:'-'}}</h6>
                </div>
              </div>
              <div class="row my-2">
                <!-- <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Number of Positions:</label><h6>{{isset($recruitmentInformation->positions)?$recruitmentInformation->positions:'-'}}</h6>
                </div> -->

                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Years of Experience/Number of Positions:</label><h6>
                    @php
                      if(isset($recruitmentInformation->years_of_experience))
                      {
                        $expArr = explode(',',$recruitmentInformation->years_of_experience);
                        $postitionArr = explode(',',$recruitmentInformation->positions);
                        if(count($expArr)>0)
                        { 
                          foreach($expArr as $k=>$arr)
                          {
                            $num = $k+1;
                            echo $num.'.&nbsp;';
                            echo 'Experience : '.$arr.'&nbsp;,&nbsp;';
                            echo 'Positions : '.$postitionArr[$k].'</br>';
                            echo '<hr>';
                          }
                        }
                       // dd($expArr);
                      }

                    @endphp
                  </h6>
                </div>
              </div>    
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Designation:</label><h6>{{isset($recruitmentInformation->designation)?$recruitmentInformation->designation:'-'}}</h6>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Department:</label><h6>{{isset($recruitmentInformation->department)?$recruitmentInformation->department:'-'}}</h6>
                </div>
              </div> 
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Mandatory Skills:</label><h6>{{isset($recruitmentInformation->mandatory_skills)?$recruitmentInformation->mandatory_skills:'-'}}</h6>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Location:</label><h6>{{isset($recruitmentInformation->location)?$recruitmentInformation->location:'-'}}</h6>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Selection Process:</label><h6>{{isset($recruitmentInformation->selection_process)?$recruitmentInformation->selection_process:'-'}}</h6>
                </div>
              </div> 
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Special Instructions:</label><h6>{{isset($recruitmentInformation->special_instructions)?$recruitmentInformation->special_instructions:'-'}}</h6>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Interviewer:</label><h6>
                    @php
                      if(isset($recruitmentInformation['RecInterviewerList']))
                      {
                        if(count($recruitmentInformation['RecInterviewerList'])>0)
                        {
                          foreach($recruitmentInformation['RecInterviewerList'] as $k=>$interviewer)
                          {
                            if(count($recruitmentInformation['RecInterviewerList'])>$k+1)
                            {
                              $commaSep = ',';
                            }
                            else
                            {
                              $commaSep = '';
                            }
                            if(isset($interviewer['Interviewer']))
                            {
                              echo $interviewer['Interviewer']['name'].' ('.$interviewer['Interviewer']['designation'].')'.$commaSep;
                            }
                            else
                            {
                              echo '-';
                            }
                            $k++;
                          }
                        }
                        else
                        {
                          echo '-';
                        }
                      }
                      else
                      {
                        echo '-';
                      }
                    @endphp
                  </h6>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Job Description:</label><h6>{!!isset($recruitmentInformation->job_description)?$recruitmentInformation->job_description:'-'!!}</h6>
                </div>
              </div> 
            </div>
            </form>
          </div>
        </div>
        </div>
      </div>
      @include('include.footer')
    </div>
</main>

@include('include.setting')

@endsection
