{{-- dd($interview_evaluation_view); --}}
@extends('layouts.app')
@section('title', 'interview evaluation view')
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Feedback Interview Evaluation</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">View Recruitment Request</h6> -->
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
                <h6 class="mb-0">Interview Evaluation Feedback</h6>
              </div>
              <div class="col-6 text-end">


              
                
              </div>
           </div>
          </div>          
          <div class="card-body px-0 pb-2">          
              @if(count($interview_evaluation_view)>0)
              @php $i=0;@endphp
                  @foreach($interview_evaluation_view as $data)
                      <div class="container my-auto">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 mx-auto">
                              <label class="form-label">Interviewer Name:</label> <h6>{{ $data['VerifiedUsersInformation']->employee_name ?? '-'}}({{ $data['VerifiedUsersInformation']->designation ?? '-' }})</h6>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mx-auto">
                              <label class="form-label"></label><h6></h6>
                            </div>
                          </div>
                      </div> 
                      <div class="container my-auto">                    
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-12 mx-auto">
                            <label class="form-label">Comments:</label> <h6>{{ $data->comments ?? '-' }}</h6>
                          </div>

                          <div class="col-lg-6 col-md-6 col-12 mx-auto">
                            <label class="form-label">Position Required by Date::</label><h6>{{ $data->technological_skills ?? '-' }}</h6>
                          </div>
                        </div>
                      </div>
                      @php $i++;@endphp
                      @if(count($interview_evaluation_view)>$i)
                      <hr/>
                      @endif                      
                  @endforeach       
                @endif
            
          </div>
        </div>
        </div>
      </div>
      @include('include.footer')
    </div>
</main>

@include('include.setting')

@endsection
