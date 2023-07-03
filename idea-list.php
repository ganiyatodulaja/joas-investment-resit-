<?php 
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$error = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> There was error deleting the client.
                                </div>';
$success = '<div class="alert alert-success border-0" role="alert">
                                    <strong>Success!</strong> The client was successfully deleted.
                                </div>';
?> 
    <div class="page-wrapper">

        <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Ideas List</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Created</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($db,"SELECT * FROM ideas ORDER BY add_date DESC");
                                                while($idea = mysqli_fetch_array($query)){
                                                    $ad = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM admin WHERE adminid='{$idea['adminid']}'"));
                                                ?>
                                            <tr>
                                                <td>
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="#" class="d-inline-block align-middle mb-0 product-name"><?php echo $idea['title']; ?></a> 
                                                        <br>
                                                         
                                                    </p>
                                                </td>
                                                <td><?php echo $idea['type']; ?></td>
                                                <td><?php echo $ad['firstname']." ".$ad['lastname']; ?></td>
                                                <td><?php $added = date('j F, Y', strtotime($idea['add_date'])); echo $added; ?></td>
                                                 <td>                                                       
                                                    <a href="#" class="mr-2"><i class="las la-pen text-secondary font-16"></i></a>
                                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table> 
                                    </div> 
                                    <div class="row">
                                        <div class="col">
                                            <a href="new-idea" class="btn btn-outline-light btn-sm px-4 ">+ Add New</a>
                                        </div><!--end col-->      
                                        <div class="col-auto">
                                            <nav aria-label="...">
                                                <ul class="pagination pagination-sm mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul><!--end pagination-->
                                            </nav><!--end nav-->       
                                         </div> <!--end col-->                               
                                    </div><!--end row-->       
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div><!-- container -->

                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
<script>
			function getLgaById() {
				var stateId = $('#stateId').val();
				$.post("common.php",{getLgaById:'getLgaById',stateId:stateId},function(response){
					//alert(response);
					var data = response.split('^');
					var lgaData = data[1];
					$("#lgaId").html(lgaData);
				});
			}
	
	
			function getWardById() {
				var lgaId = $('#lgaId').val();
				$.post("common.php",{getWardById:'getWardById',lgaId:lgaId},function(response){
//					alert(response);
					var data = response.split('^');
					var wardData = data[1];
					$("#wardId").html(wardData);
				});
			}
	
	
			function getFacById() {
				var wardId = $('#wardId').val();
				$.post("common.php",{getFacById:'getFacById',wardId:wardId},function(response){
					//alert(response);
					var data = response.split('^');
					var facData = data[1];
					$("#facId").html(facData);
				});
			}
			</script>
           <!--Start Footer-->
<?php include 'footer.php'; ?>