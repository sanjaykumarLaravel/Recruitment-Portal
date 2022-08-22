@extends('layouts.app')
@section('title', 'Interview Evaluation Feedback')
@section('content')
<style>
.readonlyBG{
  background-color: #e6e7e8!important;
}
</style>

@include('include.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Interview Evaluation Feedback</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">Add Interview Evaluation</h6> -->
        </nav>
      </div>
    </nav>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Interview Evaluation Feedback</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form method="post" action="{{route('save-interview-evaluation-feedback')}}">
              @csrf
              <input type="hidden" name="inter_eval_id" value="{{isset($interviewEvaluation)?$interviewEvaluation->id:''}}">
            <div class="container my-auto">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Date of Request <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="date_of_request" type="text" class="form-control readonlyBG" name="date_of_request" value="{{isset($interviewEvaluation)?$interviewEvaluation->date_of_request:''}}" autocomplete="date_of_request" readonly="">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Candidate Name <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="candidate_name" type="text" class="form-control readonlyBG" name="candidate_name" autocomplete="nope" value="{{isset($interviewEvaluation)?$interviewEvaluation->candidate_name:''}}" readonly="">
                  </div>
                </div>

              </div>
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Skill / Technology<spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="skill" type="text" class="form-control readonlyBG" name="skill" value="{{isset($interviewEvaluation)?$interviewEvaluation->skill:''}}" required autocomplete="nope" autofocus  placeholder="Skill / Technology" readonly="">
                    @error('skill')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>  
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Technological Skills <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <select class="form-control" name="technological_skills" required>
                      <option value="">Select Technological Skills </option>
                      <option value="Not Acceptable">Not Acceptable </option>
                      <option value="Acceptable">Acceptable </option>
                      <option value="Good">Good </option>
                      <option value="Excellent">Excellent </option>
                    </select>
                    @error('technological_skills')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Result <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <select class="form-control" name="result" required>
                      <option value="">Select Result </option>
                      <option value="Not Recommended">Not Recommended </option>
                      <option value="Can be Recommended">Can be Recommended </option>
                      <option value="Recommended">Recommended </option>
                      <option value="Strongly Recommended">Strongly Recommended </option>
                    </select>
                    @error('result')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Brief Evaluation </label>
                  <div class="input-group input-group-outline">
                    <textarea name="comments" id="comments" required></textarea>
                    @error('comments')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row my-4">
                <div class="col-lg-5 col-sm-6 col-12"></div>
                <div class="col-lg-2 col-sm-6 col-12">
                  <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="successToast">Send Feedback</button>
                </div>
                <!-- <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                  <button class="btn bg-gradient-danger w-100 mb-0 toast-btn" type="button" data-target="dangerToast">Cancel</button>
                </div> -->
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
@section('footer_content')
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'comments', {height: 120,width:2000} );

</script>
@endsection