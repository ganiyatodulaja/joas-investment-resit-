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
$passmatch = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> Password does not match!
                                </div>';
$exist = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> The client already exist.
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
                                <h4 class="card-title p-3">CLIENT LIST</h4>
                                <?php
                                if(isset($_GET['value']) && $_GET['value']==1){
                                    echo $success;
                                }
                                if(isset($_GET['value']) && $_GET['value']==2){
                                    echo $error;
                                }
                                ?>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="row">


                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                            <?php
                            $sn=1;
                            $sql = mysqli_query($db,"SELECT * FROM client ORDER BY regdate DESC");
                            while($client = mysqli_fetch_array($sql)){
                            ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $client['firstname']; ?></td>
                                            <td><?php echo $client['lastname']; ?></td>
                                            <td><?php echo $client['gender']; ?></td>
                                            <td><?php echo $client['email']; ?></td>
                                            <td><?php echo $client['phone']; ?></td>
                                            <td><?php echo $client['country']; ?></td>
                                            <td class="text-end">                                                       
                                                <a href="edit-client?encrypt-key=<?php echo $client['clientid'];?>"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="delete-client?encrypt-key=<?php echo $client['clientid']; ?>" onClick="return confirm('Are you sure you want to delete <?php echo $client['firstname']." ".$client['lastname']; ?>')"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        </tbody>
                                    </table><!--end /table-->



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