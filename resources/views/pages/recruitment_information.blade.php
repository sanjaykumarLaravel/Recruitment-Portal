@extends('layouts.app')
@section('title', 'Recruitment Request List')
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
          </ol>
          <h6 class="font-weight-bolder mb-0">Recruitment Request List</h6>
        </nav>
      </div>
    </nav>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible text-white" role="alert">
          <span class="text-sm">{{ session()->get('message') }}</span>
          <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        @endif
      </div>
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Recruitment Request List</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      @if(auth()->user()->employee_type==1 || auth()->user()->employee_type==3)
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Requested By</th>
                      @endif
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Request</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Positions</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience/Positions</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Designation</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skills</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Interviewer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($recruitmentData)>0)
                        @foreach($recruitmentData as $data)
                            <tr>
                                @if(auth()->user()->employee_type==1|| auth()->user()->employee_type==3)
                                <td class="align-middle text-center text-sm">              
                                    <h6 class="mb-1">
                                      <a href="{{route('recruitment-view',['id'=>$data->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="click here for view">{{@$data['User']['name']}}</a>
                                    </h6>
                                </td>        
                                @endif  
                                <td class="align-middle text-center text-sm">
                                    <a href="{{route('recruitment-view',['id'=>$data->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="click here for view"><b>{{$data->date_of_request}}</b></a>
                                </td>
                                <!-- <td class="align-middle text-center text-sm">
                                    {{$data->positions}}
                                </td> -->
                                <td class="align-middle text-center text-sm">
                                    @php
                                      if(isset($data->years_of_experience))
                                      {
                                        $expArr = explode(',',$data->years_of_experience);
                                        $postitionArr = explode(',',$data->positions);
                                        if(count($expArr)>0)
                                        { 
                                          foreach($expArr as $k=>$arr)
                                          {
                                            $num = $k+1;
                                            echo $num.'.&nbsp;';
                                            echo 'Experience : '.$arr.'&nbsp;,&nbsp;';
                                            echo 'Positions : '.$postitionArr[$k].'</br>';
                                            //echo '<hr>';
                                          }
                                        }
                                      }
                                    @endphp
                                </td>
                                <!-- <td class="align-middle text-center text-sm">
                                    {{$data->designation}}
                                </td> -->
                                <td class="align-middle text-center text-sm">
                                    {{$data->department}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{$data->mandatory_skills}}
                                </td>
                                <td class="align-middle text-center text-sm">
                                @php
                                  if(isset($data['RecInterviewerList']))
                                  {
                                    if(count($data['RecInterviewerList'])>0)
                                    {
                                      foreach($data['RecInterviewerList'] as $k=>$interviewer)
                                      {
                                        if(count($data['RecInterviewerList'])>$k+1)
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
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if($data->status==1)
                                        <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                                    @elseif($data->status==2)
                                        <span class="badge badge-sm badge-warning" style="background-color: #FFA726;">In Progress</span>
                                    @else
                                        <span class="badge badge-sm bg-gradient-success">Completed</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <a href="{{route('recruitment-comments',['id'=>$data->id])}}"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Comments"><i class="fa fa-eye text-sm me-2"></i></a>
                                  </br>
                                  @if((auth()->user()->employee_type==1|| auth()->user()->employee_type==3) && ($data->status==1 || $data->status==2))
                                  <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reply"><i class="fa fa-reply text-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}"></i></a>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <!-- <div class="modal fade" id="myModal" role="dialog"> -->
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">HR comments</h4>
                                          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="post" action="{{route('save-recruitment-comment')}}">
                                          @csrf
                                          <input type="hidden" name="rec_id" value="{{$data->id}}">
                                        <div class="modal-body">
                                          <div class="row my-2">
                                            <div class="col-lg-12 col-md-12 col-12 mx-auto">
                                              <label class="form-label" style="float: left;">Comment</label>
                                              <div class="input-group input-group-outline">
                                                <textarea id="comments" class="form-control" name="comments" required  placeholder="Comment on the request"></textarea>
                                              </div>
                                            </div>
                                          </div> 
                                          <div class="row my-2">
                                            <div class="col-lg-12 col-md-12 col-12 mx-auto">
                                              <label class="form-label" style="float: left;">Status</label>
                                              <div class="input-group input-group-outline">
                                                <select class="form-control" required name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="2">InProgress</option>
                                                    <option value="3">Completed</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div> 

                                        </div>
                                        <div class="modal-footer">
                                          <div class="row my-2">
                                            <div class="col-lg-6 col-sm-6 col-12">
                                              <button class="btn bg-gradient-success w-100 mb-0 toast-btn" type="submit" data-target="successToast">Save</button>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-12 mt-lg-0 mt-2">
                                              <button type="button" class="btn bg-gradient-default" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                      </div>
                                      
                                    </div>
                                  </div>
                                  @endif
                                </td>                                                          
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10"  style="text-align:center;">
                                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto">No data found.</a>
                            </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
            </div>
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
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
@endsection