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
                <span class="info-box-text">Total Order</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">41,410</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 107px"> 
                <img src="{{asset('images/dashboard/basket-grocery.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Return Order</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">41,410</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 107px"> 
                <img src="{{asset('images/dashboard/wallet.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Main Balance</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">41,410</h4>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-white">
              <span class="info-box-icon" style="width: 107px"> 
                <img src="{{asset('images/dashboard/cashback.png')}}">
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Cashback Balance</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                <h4 class="info-box-number">41,410</h4>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Order Report</h5>
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
                <div class="row">
                  <div class="col-md-6">
                    <h4>Orders</h4>
                    @foreach($orders as $values) 
                    <div class="progress-group">
                      {{$values->name}}
                      <span class="float-right"><b>{{$values->order_count}}</b>/{{($total_orders)}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar" style="width: {{$total_orders == 0 ? 0 : ($values->order_count*100)/(float)$total_orders}}%;background:{{$values->status_color}} !important"></div>
                      </div>
                    </div>
                    @endforeach
                  </div> 
                  <div class="col-md-6">
                    <h4>Return Orders</h4>
                    @foreach($returns as $values) 
                    <div class="progress-group">
                      {{$values->name}}
                      <span class="float-right"><b>{{$values->order_count}}</b>/{{($total_returns)}}</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: {{$total_returns == 0 ? 0 : ($values->order_count*100)/(float)$total_returns}}%;background:{{$values->status_color}} !important"></div>
                      </div>
                    </div>
                    @endforeach
                  </div> 
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 col-12">
                    <div class="description-block border-right">
                      <h5 class="description-header">₹{{number_format($order_amt)}}</h5>
                      <span class="description-text">ORDERS AMOUNT</span>
                    </div>
                  </div>
                  <div class="col-sm-4 col-12">
                    <div class="description-block border-right">
                      <h5 class="description-header">₹{{number_format($returns_amt)}}</h5>
                      <span class="description-text">RETURN ORDERS AMOUNT</span>
                    </div>
                  </div>
                  <div class="col-sm-4 col-12">
                    <div class="description-block">
                      <h5 class="description-header">₹{{number_format($order_amt-$returns_amt)}}</h5>
                      <span class="description-text">ACTUAL ORDERS AMOUNT</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-12">
                <div class="info-box bg-white">
                  <span class="info-box-icon" style="width: 122px"> 
                    <img src="{{asset('images/dashboard/delivery-courier-man.png')}}">
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Order</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <h4 class="info-box-number">41,410</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12">
                <div class="info-box bg-white">
                  <span class="info-box-icon" style="width: 107px"> 
                    <img src="{{asset('images/dashboard/basket-grocery.png')}}">
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Return Order</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <h4 class="info-box-number">41,410</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12">
                <div class="info-box bg-white">
                  <span class="info-box-icon" style="width: 107px"> 
                    <img src="{{asset('images/dashboard/wallet.png')}}">
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Main Balance</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <h4 class="info-box-number">41,410</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12">
                <div class="info-box bg-white">
                  <span class="info-box-icon" style="width: 107px"> 
                    <img src="{{asset('images/dashboard/cashback.png')}}">
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Cashback Balance</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <h4 class="info-box-number">41,410</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12">             
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users</h3>
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
                    <div class="row">
                      <div class="col-md-7">
                        <div class="chart-responsive">
                          <canvas id="pieChart" height="110"></canvas>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <ul class="chart-legend clearfix">
                          <li><i class="far fa-circle text-success"></i> Distributor</li>
                          <li><i class="far fa-circle text-warning"></i> Restaurant</li>
                          <li><i class="far fa-circle text-info"></i> Delivery Boy</li>
                          <li><i class="far fa-circle text-primary"></i> User</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-12">             
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Users</h3>
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
                    <div class="row">
                      <div class="col-md-7">
                        <div class="chart-responsive">
                          <canvas id="pieChart" height="110"></canvas>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <ul class="chart-legend clearfix">
                          <li><i class="far fa-circle text-success"></i> Distributor</li>
                          <li><i class="far fa-circle text-warning"></i> Restaurant</li>
                          <li><i class="far fa-circle text-info"></i> Delivery Boy</li>
                          <li><i class="far fa-circle text-primary"></i> User</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

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
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection