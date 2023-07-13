<?php 
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$error = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> There was error adding the product.
                                </div>';
$success = '<div class="alert alert-success border-0" role="alert">
                                    <strong>Success!</strong> The product was successfully added.
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
                                <h4 class="card-title p-3">ADD PRODUCT PAGE</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="row">
									<?php
                                if(isset($_POST['post-data'])){
                                    $name = $_POST['name'];
                                    $category = $_POST['category'];
                                    $details = $_POST['details'];
                                    $price = $_POST['price'];
                                    $abs = "inserted a new product into the database";
                                    

                $file = mysqli_real_escape_string( $db, $_FILES[ 'pic' ][ 'name' ] );
                $ext = pathinfo( $file, PATHINFO_EXTENSION );
                $allowed = [ 'png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG' ];
                $target = "assets/images/products/" . basename($file);
                $filename = $file;
                //check if file type is valid
                if(in_array( $ext, $allowed)) {
                  if(move_uploaded_file($_FILES['pic']['tmp_name'], $target)) {
                    $update = mysqli_query( $db, "INSERT INTO product (name,category,details,price,adminid,image) VALUES ('$name','$category','$details','$price','{$admin['adminid']}','$filename')");
                    // execute query
                    if ($update) {
                      echo $success;
                      mysqli_query($db,"INSERT INTO log (adminid,details) VALUES ('{$admin['adminid']}','$abs') ");
                    } else {
                      echo $error;
                    }
                  }
                }
                                }
                                ?>
                                    <form method="post" action="" enctype="multipart/form-data">

                                    <div class="col-md-12 row">
                                        <div class="col-md-4 mb-3">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control" name="pic" placeholder="Enter first Name" required>
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Product Name</label>
                                        <input class="form-control" name="name" required placeholder="Enter Product Name">
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select class="form-select select2" name="category" required>
                                            <option value="">-- Choose Category --</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Residential">Residential</option>
                                        </select>
                                      </div>
                                      </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-10 mb-3">
                                        <label>Product Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="details" required rows="5" placeholder="Details of Product"></textarea>
                                      </div>

                                      </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Price</label>
                                                <input type="number" class="form-control" id="income" name="price" placeholder="Enter price">                               
                                            </div>
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