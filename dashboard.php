<?php 
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
?> 

<div class="page-wrapper"> 
  
  <!-- Page Content-->
  <div class="page-content-tab">
    <div class="container-fluid"> 
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
          </div>
          <!--end page-title-box--> 
        </div>
        <!--end col--> 
      </div>
      <!-- end page title end breadcrumb -->
      <div class="row">
        <div class="col-lg-9">
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                    <div class="col-9">
                      <p class="text-dark mb-0 fw-semibold">Total Clients</p>
                      <h3 class="my-1 font-20 fw-bold"><?php
                      $t_clients = mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(*) AS sum FROM client"));
                      echo number_format($t_clients['sum'],0);
                    ?></h3>
                      <p class="mb-0 text-truncate text-muted"><span class="text-success">100%</span> of Total</p>
                    </div>
                    <!--end col-->
                    <div class="col-3 align-self-center">
                      <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"> <i class="fa fa-users font-24 align-self-center text-muted"></i> </div>
                    </div>
                    <!--end col--> 
                  </div>
                  <!--end row--> 
                </div>
                <!--end card-body--> 
              </div>
              <!--end card--> 
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                    <div class="col-9">
                      <p class="text-dark mb-0 fw-semibold">Crypto Balance</p>
                      <h3 class="my-1 font-20 fw-bold">41,306</h3>
                      <p class="mb-0 text-truncate text-muted"><span class="text-success">100%</span> of Total</p>
                    </div>
                    <!--end col-->
                    <div class="col-3 align-self-center">
                      <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"> <i class="mdi mdi-currency-btc font-24 align-self-center text-muted"></i> </div>
                    </div>
                    <!--end col--> 
                  </div>
                  <!--end row--> 
                </div>
                <!--end card-body--> 
              </div>
              <!--end card--> 
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                    <div class="col-9">
                      <p class="text-dark mb-0 fw-semibold">Total Ideas</p>
                      <h3 class="my-1 font-20 fw-bold"><?php $isum = mysqli_fetch_array(mysqli_query($db,"SELECT count(*) AS sum FROM ideas")); echo number_format($isum['sum'],0); ?></h3>
                      <p class="mb-0 text-truncate text-muted"><span class="text-danger">0%</span> of Total</p>
                    </div>
                    <!--end col-->
                    <div class="col-3 align-self-center">
                      <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"> <i class="fas fa-user-tie font-24 align-self-center text-muted"></i> </div>
                    </div>
                    <!--end col--> 
                  </div>
                  <!--end row--> 
                </div>
                <!--end card-body--> 
              </div>
              <!--end card--> 
            </div>
            <!--end col-->
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="row d-flex justify-content-center">
                    <div class="col-9">
                      <p class="text-dark mb-0 fw-semibold">Total Products</p>
                      <h3 class="my-1 font-20 fw-bold"><?php $psum = mysqli_fetch_array(mysqli_query($db,"SELECT count(*) AS sum FROM product")); echo number_format($psum['sum'],0); ?></h3>
                      <p class="mb-0 text-truncate text-muted"><span class="text-success">0%</span> of Total</p>
                    </div>
                    <!--end col-->
                    <div class="col-3 align-self-center">
                      <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto"> <i class="mdi mdi-home-currency-usd font-24 align-self-center text-muted"></i> </div>
                    </div>
                    <!--end col--> 
                  </div>
                  <!--end row--> 
                </div>
                <!--end card-body--> 
              </div>
              <!--end card--> 
            </div>
            <!--end col--> 
          </div>
          <!--end row-->
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">Site traffic statistics</h4>
                </div>
                <!--end col-->
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="">
                <div id="ana_dash_1" class="apex-charts"></div>
              </div>
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col-->
        <div class="col-lg-3">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">Investment by Category</h4>
                </div>
                <!--end col-->
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="text-center">
                <div id="ana_device" class="apex-charts"></div>
              </div>
              <div class="table-responsive mt-2">
                <table class="table border-dashed table-sm mb-0">
                  <thead>
                    <tr class="thead-light">
                      <th>Category</th>
                      <th class="text-end">No. Enrolled</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Products</td>
                      <td class="text-end">1843</td>
                    </tr>
                    <tr>
                      <td>Ideas</td>
                      <td class="text-end">2543</td>
                    </tr>
                    <tr>
                      <td>Crypto</td>
                      <td class="text-end">3654</td>
                    </tr>

                  </tbody>
                </table>
                <!--end /table--> 
              </div>
              <!--end /div--> 
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col--> 
      </div>
      <!--end row-->
      
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">Live Visits Our New Site</h4>
                </div>
                <!--end col-->
                <div class="col-auto">
                  <div class="dropdown"> <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Today<i class="las la-angle-down ms-1"></i> </a>
                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#">Today</a> <a class="dropdown-item" href="#">Yesterday</a> <a class="dropdown-item" href="#">Last Week</a> </div>
                  </div>
                </div>
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div id="circlechart" class="apex-charts"></div>
              <div>
                <div class="row">
                  <div class="col-lg">
                    <h4 class="card-title mt-0 mb-2">Traffic Sources</h4>
                    <div class="traffic-card">
                      <h4 class="my-2"><p id="demo"></p>

<script>
let x = Math.floor((Math.random() * 100) + 1);
document.getElementById("demo").innerHTML = x;
</script></h4>
                      <p class="mb-2 fw-semibold">Right Now</p>
                    </div>
                  </div>
                  <!--end col-->
                  <div class="col-lg-auto align-self-center">
                    <ul class="list-unstyled url-list mb-0">
                      <li> <i class="fas fa-caret-right font-16 text-primary"></i> <span>Organic</span> </li>
                      <li> <i class="fas fa-caret-right font-16 text-success"></i> <span>Direct</span> </li>
                      <li> <i class="fas fa-caret-right font-16 text-gray"></i> <span>Campaign</span> </li>
                    </ul>
                  </div>
                  <!--end col--> 
                </div>
                <!--end row-->
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
                  <div class="progress-bar bg-info" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100">28%</div>
                  <div class="progress-bar bg-soft-secondary" role="progressbar" style="width: 17%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100">17%</div>
                </div>
              </div>
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col-->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">Pages View by Users</h4>
                </div>
                <!--end col-->
                <div class="col-auto">
                  <div class="dropdown"> <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Today<i class="las la-angle-down ms-1"></i> </a>
                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#">Today</a> <a class="dropdown-item" href="#">Yesterday</a> <a class="dropdown-item" href="#">Last Week</a> </div>
                  </div>
                </div>
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <ul class="list-group custom-list-group">
                <li class="list-group-item align-items-center d-flex justify-content-between">
                  <div class="media"> <img src="assets/images/favicon.png" height="30" class="me-3 align-self-center rounded" alt="...">
                    <div class="media-body align-self-center">
                      <h6 class="m-0">Admin Dashboard</h6>
                      <p class="mb-0 text-muted">joas/dashboard</p>
                    </div>
                    <!--end media body--> 
                  </div>
                  <div class="align-self-center"> <a href="#" class="btn btn-sm btn-soft-primary">4.3k <i class="las la-external-link-alt font-15"></i></a> </div>
                </li>
                <li class="list-group-item align-items-center d-flex justify-content-between">
                  <div class="media"> <img src="assets/images/favicon.png" height="30" class="me-3 align-self-center rounded" alt="...">
                    <div class="media-body align-self-center">
                      <h6 class="m-0">Client dashboard</h6>
                      <p class="mb-0 text-muted">joas/clients/dashboard</p>
                    </div>
                    <!--end media body--> 
                  </div>
                  <div class="align-self-center"> <a href="#" class="btn btn-sm btn-soft-primary">3.7k <i class="las la-external-link-alt font-15"></i></a> </div>
                </li>
                <li class="list-group-item align-items-center d-flex justify-content-between">
                  <div class="media"> <img src="assets/images/favicon" height="30" class="me-3 align-self-center rounded" alt="...">
                    <div class="media-body align-self-center">
                      <h6 class="m-0">view products</h6>
                      <p class="mb-0 text-muted">joas/view-products</p>
                    </div>
                    <!--end media body--> 
                  </div>
                  <div class="align-self-center"> <a href="#" class="btn btn-sm btn-soft-primary">2.9k <i class="las la-external-link-alt font-15"></i></a> </div>
                </li>
                <li class="list-group-item align-items-center d-flex justify-content-between">
                  <div class="media"> <img src="assets/images/favicon.png" height="30" class="me-3 align-self-center rounded" alt="...">
                    <div class="media-body align-self-center">
                      <h6 class="m-0">idea creation</h6>
                      <p class="mb-0 text-muted">joas/new-idea</p>
                    </div>
                    <!--end media body--> 
                  </div>
                  <div class="align-self-center"> <a href="#" class="btn btn-sm btn-soft-primary">1.6k <i class="las la-external-link-alt font-15"></i></a> </div>
                </li>
              </ul>
            </div>
            <!--end card-body--> 
          </div>
          <!--end card-->
          <div class="card">
            <div class="card-body">
              <div class="d-flex">
                <h2 class="m-0 align-self-center"><p id="demo2"></p>

<script>
let x = Math.floor((Math.random() * 100) + 1);
document.getElementById("demo2").innerHTML = x;
</script></h2>
                <div class="d-block ms-2 align-self-center"> <span class="text-warning">Right now</span>
                  <h5 class="my-1">Traffic Sources</h5>
                  <p class="mb-0 text-muted">It is a long established fact that a reader will 
                    be of a page when looking at its layout. <a href="#" class="text-primary">Read More <i class="las la-arrow-right"></i></a> </p>
                </div>
              </div>
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col-->
        
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">Activity</h4>
                </div>
                <!--end col-->
                <div class="col-auto">
                  <div class="dropdown"> <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> All<i class="las la-angle-down ms-1"></i> </a>
                  </div>
                </div>
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-bodyp-0">
              <div class="p-3" data-simplebar style="height: 390px;">
                <div class="activity">
                  <?php
                  $actsql = mysqli_query($db,"SELECT * FROM log ORDER BY add_date LIMIT 6");
                  while ($act = mysqli_fetch_array($actsql)) {
                    $ad = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM admin WHERE adminid='{$act['adminid']}'"));
                  ?>
                  <div class="activity-info">
                    <div class="icon-info-activity"> <i class="las la-user-clock bg-soft-primary"></i> </div>
                    <div class="activity-info-text">
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="text-muted mb-0 font-13 w-75"><span><?php echo $ad['firstname']; ?></span> <?php echo $act['details']; ?></p>
                        <small class="text-muted"><?php $added = date('j F, Y', strtotime($act['add_date'])); echo $added; ?></small> </div>
                    </div>
                  </div>
<?php } ?>

                </div>
                <!--end activity--> 
              </div>
              <!--end analytics-dash-activity--> 
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col--> 
        
      </div>
      <!--end row-->
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">OUR PRODUCTS</h4>
                </div>
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="table-responsive browser_users">
                <table class="table mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th class="border-top-0">Product</th>
                      <th class="border-top-0">Category</th>
                      <th class="border-top-0">Price</th>
                      <th class="border-top-0">Status</th>
                    </tr>
                    <!--end tr-->
                  </thead>
                  <tbody>
                    <?php
                    $prodquery = mysqli_query($db,"SELECT * FROM product ORDER BY add_date DESC");
                    while($pro = mysqli_fetch_array($prodquery)){
                    ?>
                    <tr>
                      <td><a href="#" class="text-primary"><?php echo $pro['name']; ?></a></td>
                      <td><?php echo $pro['category']; ?></td>
                      <td>$<?php echo number_format($pro['price'],2); ?></td>
                      <td><span class="badge badge-soft-pink">in stock</span></td>
                    </tr>
                    <!--end tr-->
                  <?php } ?>
                  </tbody>
                </table>
                <!--end table--> 
              </div>
              <!--end /div--> 
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col-->
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="card-title">IDEAS CREATED</h4>
                </div>
                <!--end col--> 
              </div>
              <!--end row--> 
            </div>
            <!--end card-header-->
            <div class="card-body">
              <div class="table-responsive browser_users">
                <table class="table mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th class="border-top-0">Title</th>
                      <th class="border-top-0">Type</th>
                      <th class="border-top-0">Added By</th>
                      <th class="border-top-0">Date</th>
                    </tr>
                    <!--end tr-->
                  </thead>
                  <tbody>
                    <?php
                    $ideaquery = mysqli_query($db,"SELECT * FROM ideas ORDER BY add_date DESC");
                    while($idea = mysqli_fetch_array($ideaquery)){
                    ?>
                    <tr>
                      <td><?php echo $idea['title']; ?></td>
                      <td><?php echo $idea['type']; ?></td>
                      <td><?php $creator = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM admin WHERE adminid='{$admin['adminid']}'")); echo $creator['firstname'].' '.$creator['lastname']; ?></td>
                      <td><?php $time = date('j F, Y', strtotime($idea['add_date'])); echo $time; ?></td>
                    </tr>
                    <!--end tr-->
                  <?php } ?>
                  </tbody>
                </table>
                <!--end table--> 
              </div>
              <!--end /div--> 
            </div>
            <!--end card-body--> 
          </div>
          <!--end card--> 
        </div>
        <!--end col--> 
      </div>
      <!--end row--> 
      
    </div>
    <!-- container --> 
	  <?php include 'footer.php'; ?>