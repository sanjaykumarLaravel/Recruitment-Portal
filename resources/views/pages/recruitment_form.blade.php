@extends('layouts.app')
@section('title', 'Create Recruitment Request')
@section('content')
@include('include.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Raise a Request</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Raise a Request</h6>
        </nav>
      </div>
    </nav>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Raise a Request</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <form method="post" action="{{route('save-recruitment-request')}}">
              @csrf
            <div class="container my-auto">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Date of Request <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="date_of_request" type="text" class="form-control" name="date_of_request" value="{{date('d/m/Y')}}" autocomplete="date_of_request" readonly="">
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Position Required by Date <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="position_required_by_date" type="date" class="form-control @error('position_required_by_date') is-invalid @enderror" name="position_required_by_date" value="{{ old('position_required_by_date') }}" required autocomplete="position_required_by_date" autofocus  placeholder="dd-mm-yyyy">
                    @error('position_required_by_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row my-2 field_wrapper">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Number of Positions <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="number_of_positions" type="number" class="form-control @error('number_of_positions') is-invalid @enderror" name="number_of_positions[]" value="{{ old('number_of_positions') }}" required autocomplete="number_of_positions" autofocus  placeholder="Number of Positions" min=1 max=20>
                    @error('number_of_positions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-5 col-md-5 col-12 mx-auto">
                  <label class="form-label">Years of Experience <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="years_of_experience" type="text" class="form-control @error('years_of_experience') is-invalid @enderror" name="years_of_experience[]" value="{{ old('years_of_experience') }}" required autocomplete="years_of_experience" autofocus  placeholder="Years of Experience">
                    @error('years_of_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-1 col-md-1 col-12 mx-auto">
                  <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{{asset('/assets/img/add-icon.png')}}" style="padding-top: 65%;" /></a>
                </div>
              </div>    
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Designation <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus  placeholder="Designation">
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Department <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus  placeholder="Department">
                    @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Mandatory Skills <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="mandatory_skills" type="text" class="form-control @error('mandatory_skills') is-invalid @enderror" name="mandatory_skills" value="{{ old('mandatory_skills') }}" required autocomplete="Mandatory Skills" autofocus  placeholder="Mandatory Skills">
                    @error('mandatory_skills')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mx-auto">
                  <label class="form-label">Location <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus  placeholder="Location">
                    @error('Location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Selection Process <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="selection_process" type="text" class="form-control @error('selection_process') is-invalid @enderror" name="selection_process" value="{{ old('selection_process') }}" required autocomplete="Selection Process" autofocus  placeholder="Selection Process">
                    @error('selection_process')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Special Instructions <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <input id="special_instructions" type="text" class="form-control @error('special_instructions') is-invalid @enderror" name="special_instructions" value="{{ old('special_instructions') }}" required autocomplete="Special Instructions" autofocus  placeholder="Special Instructions">
                    @error('special_instructions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 
              <!-- <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Feedback</label>
                  <div class="input-group input-group-outline">
                    <input id="feedback" type="text" class="form-control @error('feedback') is-invalid @enderror" name="feedback" value="{{ old('feedback') }}" autocomplete="Feedback" autofocus  placeholder="Feedback">
                    @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> --> 
              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Interviewer <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <select class="js-example-basic-single select2" name="interviewer[]" required  multiple="multiple">
                      @if(count($interviewer)>0)
                        <option></option>
                        @foreach($interviewer as $interviewerName)
                          <option value="{{$interviewerName->emp_id}}">{{$interviewerName->name}} ({{$interviewerName->designation}})</option>
                        @endforeach
                      @else
                        <option value="">No data found.</option>
                      @endif
                    </select>
                    @error('interviewer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div> 

              <div class="row my-2">
                <div class="col-lg-12 col-md-12 col-12 mx-auto">
                  <label class="form-label">Job Description <spna class="text-danger">*</spna></label>
                  <div class="input-group input-group-outline">
                    <textarea name="job_description" id="job_description" required></textarea>
                    @error('job_description')
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
                  <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="successToast">Send Request</button>
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
CKEDITOR.replace( 'job_description', {height: 120,width:2000} );

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="Myclass"><div class="row field_wrapper" style="margin-top: 10px;"> <div class="col-lg-6 col-md-6 col-12 mx-auto"> <div class="input-group input-group-outline"> <input id="number_of_positions" type="number" class="form-control" name="number_of_positions[]" value="" required autocomplete="number_of_positions" autofocus  placeholder="Number of Positions"> </div> </div> <div class="col-lg-5 col-md-5 col-12 mx-auto"> <div class="input-group input-group-outline"> <input id="years_of_experience" type="text" class="form-control" name="years_of_experience[]" value="" required autocomplete="years_of_experience" autofocus  placeholder="Years of Experience"> </div> </div> <div class="col-lg-1 col-md-1 col-12 mx-auto"> <a href="javascript:void(0);" class="remove_button" title="Delete field"><img src="{{asset('/assets/img/remove-icon.png')}}"/></a> </div> </div></div>'; //New input field html 
      var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parents('div.Myclass').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 $(document).ready(function() {
 $('.select2').select2({
   placeholder: "Select Interviewer",
   multiple: true,
   // allowClear: true
 });
 });
</script>
@endsection