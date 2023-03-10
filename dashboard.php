<?php
$title = "Dashboard";
require_once 'header.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">

  <!-- Total Riders-->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SALES(THIS YEAR)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="year"></div>
          </div>
          <div class="col-auto">
            <span class="fa-2x text-gray-300">&#8358;</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Total Employed Riders -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sales(THIS MONTH)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="month"></div>
          </div>
          <div class="col-auto">
            <span class="fa-2x text-gray-300">&#8358;</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Total Companies-->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">sales(today)</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="today"></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <span class="fa-2x text-gray-300">&#8358;</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sold products</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" id="sales"></div>
          </div>
          <div class="col-auto">
            <span class="fa-2x text-gray-300"><i class="fas fa-tag"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold color-blue">Sales Chart (This Year)</h6>
      </div>
      <div class="card-body">
          <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
          </div>
      </div>
    </div>
  </div>
</div>


<?php
require_once 'footer.php';
?>
