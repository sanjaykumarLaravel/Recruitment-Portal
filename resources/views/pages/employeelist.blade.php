@extends('layouts.app')
@section('title', 'Candidate List')
@section('content')
@include('include.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Candidate</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Candidate List</h6>
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
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between px-3">
              <h6 class="text-white text-capitalize">Candidate List</h6>
                <a href="#" data-bs-toggle="modal" data-bs-target="#employeeModal" style="color: #fff; border: 1px solid #fff; line-height: 2; padding: 0 9px; border-radius: 8px;">Import Candidate list</a>
            </div>              
          </div>

          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Candidate Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Technology</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Current CTC</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expected CTC</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Notice Period</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Shortlisted</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Interviewed</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Offered</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Joined</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skills</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skills</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Interviewer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($employee)>0)
                        @foreach($employee as $data)
                        <?php //echo '<pre>'; print_r($data);?>
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{route('interview-evaluation-view',['id'=>$data->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="click here for view"><b>{{-- $data->id --}}</b></a>
                                    <b>{{$data->name}}</b>
                                </td>
                                <td class="align-middle text-center text-sm">{{ $data->experience }}</td>
                                <td class="align-middle text-center text-sm">{{ $data->technology }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->current_ctc }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->expected_ctc }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->notice_period }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->shortlisted }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->interviewed }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->offered }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->joined }}</td>    
                                <td class="align-middle text-center text-sm">{{ $data->skills }}</td>    
                                <td class="align-middle text-center text-sm">
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#addemployeeskills" style="border: 1px solid #fff; line-height: 2; padding: 0 9px; border-radius: 8px;" onClick="notification_archive({{$data->id}})">
                                    Add Silks
                                  </a>
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

       <!-- Modal -->                
        <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <!-- <div class="modal fade" id="myModal" role="dialog"> -->
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Import Candidate List:</h4>
                  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
              </div>
              <form method="post" action="{{route('save-employee-upload')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-12 col-md-12 col-12 mx-auto">
                          <label class="form-label">File Upload <spna class="text-danger">*</spna></label>
                          <div class="input-group input-group-outline">
                          <input type="file" id="employeefile" name="employeefile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                          </div>
                        </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <div class="row my-2">
                        <div class="col-lg-6 col-sm-6 col-12">
                          <button class="btn bg-gradient-success mb-0 toast-btn" style="width: 142px !important"  type="submit" data-target="successToast">Upload</button>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                          <button type="button" class="btn bg-gradient-default" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
              </form>
            </div>
        </div>
      </div>
       <!-- Close Modal -->

       <!-- Open Modal -->
        <!-- Modal -->                
        <div class="modal fade" id="addemployeeskills" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <!-- <div class="modal fade" id="myModal" role="dialog"> -->
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">HR comments</h4>
                  
                  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
              </div>
              <form method="post" action="{{route('employee-silks-update')}}">
                  @csrf
                  <div class="modal-body">
                    <div class="row my-2">
                      <div class="col-lg-12 col-md-12 col-12 mx-auto">
                          <label class="form-label">
                            File Upload 
                            <spna class="text-danger">*</spna>
                          </label>
                          <div class="input-group input-group-outline">
                          <input type="hidden" id="employeeid" name="employeeid" >
                            <!-- <div class="button-container">
                                <button type="button" onclick="selectAll()">Select All</button>
                                <button type="button" onclick="deselectAll()">Deselect All</button>
                            </div> -->
                            <select id="employeesilks" name="employeesilks[]" style="width: 400px;" multiple >
                                <option value="php">php</option>
                                <option value="java">Java</option>
                                <option value="javaScript">JavaScript</option>
                                <option value="perl">Perl</option>
                                <option value="ios">Ios</option>
                                <option value="html">Html</option>
                                <option value="xml">XML</option>
                                <option value="xml">Dot</option>
                            </select>
                          </div>
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                    <div class="row my-2">
                        <div class="col-lg-6 col-sm-6 col-12">
                          <button class="btn bg-gradient-success mb-0 toast-btn" style="width: 142px !important"  type="submit" data-target="successToast">Add Silks</button>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                          <button type="button" class="btn bg-gradient-default" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
       <!-- Close Modal -->
      @include('include.footer')
  </div>
</main>

@include('include.setting')
@endsection

@section('footer_content')
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>

  <script>
    $(document).ready(function() {
      $("#employeesilks").select2();
    });

    function selectAll() {
        $("#employeesilks > option").prop("selected", true);
        $("#employeesilks").trigger("change");
    }

    function deselectAll() {
        $("#employeesilks > option").prop("selected", false);
        $("#employeesilks").trigger("change");
    }

    function notification_archive(id){
    
      $("#employeeid").val(id);
    }
  </script>
  <!-- <script>
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
  </script> -->
@endsection