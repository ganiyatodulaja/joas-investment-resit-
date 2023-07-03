<?php 
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$error = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> There was error adding the idea.
                                </div>';
$success = '<div class="alert alert-success border-0" role="alert">
                                    <strong>Success!</strong> The idea was successfully added.
                                </div>';
?> 
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title p-3">CREATE IDEA</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="row">
									<?php
                                if(isset($_POST['post-data'])){
                                    $title = $_POST['title'];
                                    $details = $_POST['details'];
                                    $type = $_POST['type'];
                                    $abs = "added a new idea to the database";
                                $insert = mysqli_query($db,"INSERT INTO ideas (title,details,type,adminid) VALUES ('$title', '$details','$type','{$admin['adminid']}')");
                                if($insert){
                                    echo $success;
                                    mysqli_query($db,"INSERT INTO log (adminid,details) VALUES ('{$admin['adminid']}','$abs') ");
                                }
                                else {
                                    echo $error;

                                }

                
                                }
                                ?>
                                    <form method="post" action="">

                                    <div class="col-md-12 row">
                                        <div class="col-md-5 mb-3">
                                        <label>Title of Idea</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title of idea" required>
                                      </div>
                                      <div class="col-md-5 mb-3">
                                        <label>Investment Type</label>
                                        <select class="form-select select2" name="type" required>
                                            <option value="" selected>-- Choose Idea Type -- </option>
                                            <option value="Crypto">Crypto</option>
                                            <option value="Stock">Stock</option>
                                            <option value="Real Estate">Real Estate</option>
                                        </select>
                                      </div>
                                      </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 mb-3">
                                        <label>Abstract of Idea <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="details" required rows="5" placeholder="Details of Product"></textarea>
                                      </div>

                                      </div>


										<div class="col-md-12 row">
											<div class="col-md-6">
												<input type="submit" value="Submit Data" name="post-data" class="btn btn-danger">
											</div>
										</div>
                                  </form>
                                </div>            
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div><!-- container -->
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