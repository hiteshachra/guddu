<?php $__env->startSection('content'); ?>
              <div class="row g-6">
                <!-- Card Border Shadow -->
                <div class="col-lg-3 col-sm-6">
                  <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-users icon-28px"></i></span>
                        </div>
                        <h4 class="mb-0"><?php echo e(number_format($userCount)); ?></h4>
                      </div>
                      <p class="mb-1">Total User</p>
                      <p class="mb-0">
                        <span class="text-heading fw-medium me-2"><?php echo e(number_format($userInactiveCount)); ?></span>
                        <small class="text-body-secondary">Inactive Users</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-alert-triangle icon-28px"></i></span>
                        </div>
                        <h4 class="mb-0"><?php echo e(number_format($packagesCount)); ?></h4>
                      </div>
                      <p class="mb-1">Total Packages</p>                     
                      <p class="mb-0">
                        <span class="text-heading fw-medium me-2"><?php echo e(number_format($packagesInactiveCount)); ?></span>
                        <small class="text-body-secondary">Inactive Packages</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-git-fork icon-28px"></i></span>
                        </div>
                        <h4 class="mb-0"><?php echo e(number_format($businessCategoryCount)); ?></h4>
                      </div>
                      <p class="mb-1">Total Business Categories</p>                     
                      <p class="mb-0">
                        <span class="text-heading fw-medium me-2"><?php echo e(number_format($businessCategoryInactiveCount)); ?></span>
                        <small class="text-body-secondary">Inactive Business Categories</small>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="card card-border-shadow-info h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2">
                        <div class="avatar me-4">
                          <span class="avatar-initial rounded bg-label-info"><i class="icon-base ti tabler-clock icon-28px"></i></span>
                        </div>
                        <h4 class="mb-0"><?php echo e(number_format($coursesCount)); ?></h4>
                      </div>
                      <p class="mb-1">Total Business Courses</p>                     
                      <p class="mb-0">
                        <span class="text-heading fw-medium me-2"><?php echo e(number_format($coursesInactiveCount)); ?></span>
                        <small class="text-body-secondary">Inactive Business Courses</small>
                      </p>
                    </div>
                  </div>
                </div>
                <!--/ Card Border Shadow -->
  
         
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Users</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="userRoleChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Leads</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="leadStatusChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Task</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="taskChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Documents</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="documentChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Loans</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="loanChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Blogs</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="blogChart"></div>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Supports</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="supportChart"></div>
                    </div>
                  </div>
                </div> 
                <div class="col-xxl-3 col-lg-4 col-lg-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">User Packages</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="planChart"></div>
                    </div>
                  </div>
                </div>
                    <!-- Earning Reports -->
    
    <!--/ Earning Reports -->  
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
  <script>
    function renderDonutChart(elementId, labels, series, colors, totalLabel = 'Total', totalValue = '') {
      const chartElement = document.querySelector(elementId);
      if (chartElement === undefined || chartElement === null) return;

      const chartConfig = {
        chart: {
          height: 391,
          parentHeightOffset: 0,
          type: 'donut'
        },
        labels: labels,
        series: series,
        colors: colors,
        stroke: { width: 0 },
        dataLabels: {
          enabled: false,
          formatter: (val) => parseInt(val) + ''
        },
        legend: {
          show: true,
          position: 'bottom',
          offsetY: 15,
          markers: { width: 8, height: 8, offsetX: -3 },
          itemMargin: { horizontal: 15, vertical: 8 },
          fontSize: '13px',
          fontFamily: "inherit",
          fontWeight: 400,
          labels: {
            colors: 'heading-color',
            useSeriesColors: false
          }
        },
        tooltip: { theme: 'dark' },
        grid: {
          padding: { top: 15 }
        },
        plotOptions: {
          pie: {
            donut: {
              size: '77%',
              labels: {
                show: true,
                value: {
                  fontSize: '24px',
                  fontFamily: "inherit",
                  colors: 'heading-color',
                  fontWeight: 500,
                  offsetY: -20,
                  formatter: function (val) {
                    return parseInt(val) + '';
                  }
                },
                name: {
                  offsetY: 30,
                  fontFamily: "inherit"
                },
                total: {
                  show: true,
                  fontSize: '15px',
                  fontFamily: "inherit",
                  color: 'body-color',
                  label: totalLabel,
                  formatter: function () {
                    return totalValue;
                  }
                }
              }
            }
          }
        },
        responsive: [
          {
            breakpoint: 420,
            options: {
              chart: {
                height: 360
              }
            }
          }
        ]
      };

      const chart = new ApexCharts(chartElement, chartConfig);
      chart.render();
    }
      
    const chartConfigs = [
      { id: '#userRoleChart', data: <?php echo $userRoleCount; ?>, label: 'Roles' },
      { id: '#leadStatusChart', data: <?php echo $leadStatusChart; ?>, label: 'Leads' },
      { id: '#taskChart', data: <?php echo $taskChart; ?>, label: 'Tasks' },
      { id: '#loanChart', data: <?php echo $loanChart; ?>, label: 'Loans' },
      { id: '#blogChart', data: <?php echo $blogChart; ?>, label: 'Blogs' },
      { id: '#supportChart', data: <?php echo $supportChart; ?>, label: 'Support Tickets' },
      { id: '#planChart', data: <?php echo $planChart; ?>, label: 'User Plans' },
      { id: '#documentChart', data: <?php echo $documentVerificationChart; ?>, label: 'User Docs' },
    ];

    chartConfigs.forEach(chart => {
      renderDonutChart(
        chart.id,
        chart.data.labels,
        chart.data.series,
        chart.data.colors,
        chart.label,
        'Total: ' + chart.data.series.reduce((a, b) => a + b, 0)
      );
    });

  </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\sgitsss\ignitingbusiness\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>