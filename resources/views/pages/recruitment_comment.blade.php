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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Comments Recruitment Request</h6>
        </nav>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Recruitment Request #{{$id}} </h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
              @if(count($recruitmentComments)>0)
                @foreach($recruitmentComments as $data)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">{{$data->comments}}</h6>
                    <span class="text-xs">{{$data->created_at}}</span> 
                  </div>
                </li>
                  @endforeach
              @else
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm" style="color: red;">No data found.</h6>
                  </div>
                </li>
              @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      @include('include.footer')
    </div>
</main>

@include('include.setting')

@endsection
