@extends('layouts.app')
@section('content')
<style type="text/css">
  .icon-bx.style-3 {
    border: 2px solid #dbdbdb;
    display: inline-block;
    height: 3rem;
    line-height: 2.75rem;
    text-align: center;
    width: 3rem;
}
.icon-bx {
    border-radius: 0.5rem;
    height: 3.75rem;
    line-height: 3.75rem;
    width: 3.75rem;
}
.small-box .icon>img.fa, .small-box .icon>img.fab, .small-box .icon>img.fad, .small-box .icon>img.fal, .small-box .icon>img.far, .small-box .icon>img.fas, .small-box .icon>img.ion {
    font-size: 70px;
    top: 20px;
}
.small-box .icon>img {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: -48px;
    transition: -webkit-transform .3s linear;
    transition: transform .3s linear;
    transition: transform .3s linear,-webkit-transform .3s linear;
}
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 122px"> 
                <img src="{{asset('images/dashboard/delivery-courier-man.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Pools</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">{{ $poolCount }}</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 122px"> 
                <img src="{{asset('images/dashboard/delivery-courier-man.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">{{ $userTotalCount }}</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 107px"> 
                <img src="{{asset('images/dashboard/wallet.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Main Balance</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">{{ config('app.currency_symbol') }} {{ number_format($walletTotalBal,2) }}</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 107px"> 
                <img src="{{asset('images/dashboard/cashback.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total {{ config('app.coin_name') }} Balance</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">{{ config('app.coin_symbol') }} {{ number_format($coinTotalBal,2) }}</h4>
              </div>
            </div>
          </div>
        </div>
  
        <div class="row">          
          <div class="col-md-3 col-sm-3 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users by Role</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="roleChart"></canvas>
                </div>
              </div>
            </div>
          </div>        
          <div class="col-md-3 col-sm-3 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">KYC Status Summary</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="kycChart"></canvas>
                </div>
              </div>
            </div>
          </div>        
          <div class="col-md-3 col-sm-3 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bank Status Summary</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="bankChart"></canvas>
                </div>
              </div>
            </div>
          </div>        
          <div class="col-md-3 col-sm-3 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fund Requests by Status</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="fundChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Top 10 Winners by Win Amount</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="winnerChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-12">             
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Last 10 Pools</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-responsive">
                    <canvas id="poolChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <div class="row">
          <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Top Referred Users </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>User Code </th>
                      <th>User Name</th>
                      <th>Phone Number</th>
                      <th>Status</th>
                      <th>Referred</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($topReferrers as $values)
                      <tr>
                        <td><a href="javascript:void(0)">{{ $values->reg_code }}</a></td>
                        <td>{{ $values->name }}</td>
                        <td>{{ $values->phone_number }}</td>
                        <td><span class="badge {{$values->status == 'Active'?'badge-success':'badge-danger'}}">{{ $values->status }}</span></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $values->total_referrals }}</div>
                        </td>
                      </tr>
                      @endforeach           
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All </a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>

    const config = {
      type: 'bar',
      data : {
        labels: {!! json_encode($topWinnersChart['labels']) !!},
        datasets: [{
          label: 'Win Amount (₹)',
          data: {!! json_encode($topWinnersChart['data']) !!},
          backgroundColor: {!! json_encode($topWinnersChart['colors']) !!},
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          // title: {
          //   display: true,
          //   text: 'Top 10 Winners by Win Amount'
          // },
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false // ❌ remove vertical grid lines
            },
            border: {
              display: false // ❌ remove axis line
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              display: false // ❌ remove horizontal grid lines
            },
            border: {
              display: false // ❌ remove axis line
            }
          }
        },
        elements: {
          bar: {
            borderRadius: 10, // ✅ rounded corners
            borderSkipped: false
          }
        }
      }
    };

    new Chart(document.getElementById('winnerChart'), config);



  const role_config = {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($roleCountChart['labels']) !!},
        datasets: [{
          data: {!! json_encode($roleCountChart['data']) !!},
          backgroundColor: {!! json_encode($roleCountChart['colors']) !!},
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 14,     // ✅ Size of the color box
              boxHeight: 14,    // ✅ Height of the box (works with padding)
              usePointStyle: true, // Change box to circle
              pointStyle: 'round'  // ✅ Rounded/circle legend
            }
          },
          // title: {
          //   display: true,
          //   text: 'Users by Role'
          // }
        },
        elements: {
          arc: {
            borderRadius: 6 // ✅ Rounded doughnut segments
          }
        }
      }
    };

    new Chart(document.getElementById('roleChart'), role_config);


  const kyc_config = {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($kycStatusChart['labels']) !!},
        datasets: [{
          data: {!! json_encode($kycStatusChart['data']) !!},
          backgroundColor: {!! json_encode($kycStatusChart['colors']) !!},
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 14,     // ✅ Size of the color box
              boxHeight: 14,    // ✅ Height of the box (works with padding)
              usePointStyle: true, // Change box to circle
              pointStyle: 'round'  // ✅ Rounded/circle legend
            }
          },
          // title: {
          //   display: true,
          //   text: 'Users by Role'
          // }
        },
        elements: {
          arc: {
            borderRadius: 6 // ✅ Rounded doughnut segments
          }
        }
      }
    };

    new Chart(document.getElementById('kycChart'), kyc_config);


    const bank_config = {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($bankStatusChart['labels']) !!},
        datasets: [{
          data: {!! json_encode($bankStatusChart['data']) !!},
          backgroundColor: {!! json_encode($bankStatusChart['colors']) !!},
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 14,     // ✅ Size of the color box
              boxHeight: 14,    // ✅ Height of the box (works with padding)
              usePointStyle: true, // Change box to circle
              pointStyle: 'round'  // ✅ Rounded/circle legend
            }
          },
          // title: {
          //   display: true,
          //   text: 'Users by Role'
          // }
        },
        elements: {
          arc: {
            borderRadius: 6 // ✅ Rounded doughnut segments
          }
        }
      }
    };

    new Chart(document.getElementById('bankChart'), bank_config);


    const fundConfig = {
      type: 'doughnut',
      data: {
        labels: {!! json_encode($fundStatusChart['labels']) !!},
        datasets: [{
          data: {!! json_encode($fundStatusChart['data']) !!},
          backgroundColor: {!! json_encode($fundStatusChart['colors']) !!},
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              usePointStyle: true,
              pointStyle: 'round',
              boxWidth: 20,
              boxHeight: 12
            }
          },
          // title: {
          //   display: true,
          //   text: 'Fund Requests by Status'
          // }
        },
        elements: {
          arc: {
            borderRadius: 10
          }
        }
      }
    };

    new Chart(document.getElementById('fundChart'), fundConfig);

    const poolConfig = {
      type: 'bar',
      data: {
        labels: {!! json_encode($poolsChart['labels']) !!},
        datasets: [{
          label: 'Amount (₹)',
          data: {!! json_encode($poolsChart['data']) !!},
          backgroundColor: {!! json_encode($poolsChart['colors']) !!},
          borderRadius: 10,
          borderSkipped: false
        }]
      },
      options: {
        responsive: true,
        plugins: {
          // title: {
          //   display: true,
          //   text: 'Top 10 Winners by Win Amount'
          // },
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false // ❌ remove vertical grid lines
            },
            border: {
              display: false // ❌ remove axis line
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              display: false // ❌ remove horizontal grid lines
            },
            border: {
              display: false // ❌ remove axis line
            }
          }
        },
        elements: {
          bar: {
            borderRadius: 10, // ✅ rounded corners
            borderSkipped: false
          }
        }
      }
      // options: {
      //   responsive: true,
      //   plugins: {
      //     legend: { display: false },
      //     // title: {
      //     //   display: true,
      //     //   text: 'Last 10 Pools by Amount (Color by Type)'
      //     // },
      //     tooltip: {
      //       callbacks: {
      //         label: function(context) {
      //           return `₹ ${context.formattedValue}`;
      //         }
      //       }
      //     }
      //   },
      //   scales: {
      //     x: {
      //       grid: { display: false },
      //       ticks: { autoSkip: false }
      //     },
      //     y: {
      //       beginAtZero: true,
      //       // title: { display: true, text: 'Amount (₹)' },
      //       grid: { display: true }
      //     }
      //   }
      // }
    };

    new Chart(document.getElementById('poolChart'), poolConfig);
  </script>
@endsection