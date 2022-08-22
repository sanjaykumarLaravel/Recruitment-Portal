<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header"  style="text-align: center;">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('home')}}">
        <img src="{{asset('/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <!-- <span class="ms-1 font-weight-bold text-white">Dashboard</span> -->
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='home') ? 'active bg-gradient-primary' : '' }}" href="{{route('home')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if(auth()->user()->employee_type==1 || auth()->user()->employee_type==2)
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='create-recruitment-request') ? 'active bg-gradient-primary' : '' }}" href="{{route('crate-recruitment-request')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Raise a Request</span>
          </a>
        </li>
        @if(auth()->user()->employee_type==2 )
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='recruitment-request-list' || Request::segment(1) ==='recruitment-comments' || Request::segment(1) ==='recruitment-view') ? 'active bg-gradient-primary' : '' }}" href="{{route('recruitment-request-list')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">My Request</span>
          </a>
        </li>@endif
        @endif
        @if(auth()->user()->employee_type==1 || auth()->user()->employee_type==3)
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='recruitment-request-list' || Request::segment(1) ==='recruitment-view' || Request::segment(1) ==='recruitment-comments') ? 'active bg-gradient-primary' : '' }}" href="{{route('recruitment-request-list')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Recruitment Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='interview-evaluation' || Request::segment(1) ==='interview-evaluation' || Request::segment(1) ==='interview-evaluation') ? 'active bg-gradient-primary' : '' }}" href="{{route('interview-evaluation')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Interview Evaluation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{  (Request::segment(1) ==='employee-list' || Request::segment(1) ==='employee-list' || Request::segment(1) ==='employee-list') ? 'active bg-gradient-primary' : '' }}" href="{{route('employee-list')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Candidate List</span>
          </a>
        </li>

        @endif

        <!-- <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fa fa-sign-out opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">{{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li> -->
      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <span class="nav-link-text ms-1"><i class="fa fa-sign-out opacity-10"></i> {{ __('Logout') }}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

      </div>
    </div>

</aside>