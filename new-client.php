<?php 
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$error = '<div class="alert alert-danger border-0" role="alert">
                                    <strong>Error!</strong> There was error adding this client.
                                </div>';
$success = '<div class="alert alert-success border-0" role="alert">
                                    <strong>Success!</strong> The client was successfully added.
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
                                <h4 class="card-title p-3">CLIENT ENROLLMENT FORM</h4>
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="row">
									<?php
                                if(isset($_POST['post-data'])){
                                    $firstname = $_POST['firstname'];
                                    $lastname = $_POST['lastname'];
                                    $address1 = $_POST['address1'];
                                    $address2 = $_POST['address2'];
                                    $phone = $_POST['phone'];
                                    $email = $_POST['email'];
                                    $dob = $_POST['dob'];
                                    $gender = $_POST['gender'];
                                    $country = $_POST['country'];
                                    $pass1 = $_POST['pass1'];
                                    $pass2 = $_POST['pass2'];
                                    $income = $_POST['income'];
                                    $occupation = $_POST['occupation'];
                                    $abs = "successfully added a client to the database";

                                    $query = mysqli_query($db,"SELECT * FROM client WHERE email='$email'");

                                    if($pass1!=$pass2){
                                        echo $passmatch;
                                    }                   
                                    else {
                                        
                                        $check = mysqli_num_rows($query);
                                        if($check>0){
                                            echo $exist;
                                        }
                                        else {
                                        $insert = mysqli_query($db,"INSERT INTO client (firstname,lastname,email,address1,address2,country,dob,gender,phone,password,income,occupation) VALUES ('$firstname','$lastname','$email','$address1','$address2','$country','$dob','$gender','$phone','$pass1','$income','$occupation')");
                                        if($insert){
                                            echo $success;
                                            mysqli_query($db,"INSERT INTO log (adminid,details) VALUES ('{$admin['adminid']}','$abs') ");
                                        }
                                        else {
                                            echo $error.mysqli_error($db);
                                        }
                                        }
                                    }                 
                                }
                                ?>
                                    <form method="post" action="">

                                    <div class="col-md-12 row">
                                        <div class="col-md-4 mb-3">
                                        <label>First Name</label>
                                        <input class="form-control" name="firstname" placeholder="Enter first Name" required>
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Last Name</label>
                                        <input class="form-control" name="lastname" required placeholder="Enter Last Name">
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" required name="email" placeholder="example@domain.com" class="form-control">
                                      </div>
                                      </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 mb-3">
                                        <label>Address Line 1 <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address1" required placeholder="Enter Address Line 1">
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Address Line 2 <span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" name="address2" placeholder="Enter Address Line 2">
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" name="phone" placeholder="+44 xxx xxxx">
                                      </div>
                                      </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 mb-3">
                                        <label>Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="dob" required>
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Gender <span class="text-danger">*</span></label>
                                        <select class="form-select select2" name="gender" required>
                                            <option value="">--Choose Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Country <span class="text-danger">*</span></label>
                                        <select class="form-select select2" name="country" required>
    <option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antartica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo">Congo, the Democratic Republic of the</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cota D'Ivoire">Cote d'Ivoire</option>
<option value="Croatia">Croatia (Hrvatska)</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
<option value="Korea">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia, Federated States of</option>
<option value="Moldova">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
<option value="Saint LUCIA">Saint LUCIA</option>
<option value="Saint Vincent">Saint Vincent and the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia (Slovak Republic)</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
<option value="Span">Spain</option>
<option value="SriLanka">Sri Lanka</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syrian Arab Republic</option>
<option value="Taiwan">Taiwan, Province of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania, United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Serbia">Serbia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
                                      </div>
                                      </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 mb-3">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" name="pass1" required class="form-control">
                                      </div>
                                        <div class="col-md-4 mb-3">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" name="pass2" class="form-control">
                                      </div>
                                      </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="username">Annual Income</label>
                                                <input type="text" class="form-control" id="income" name="income" placeholder="Enter your Income">                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-2">
                                                <label class="form-label" for="address1">Occupation</label>
  <select class="form-select select2" id="occupation" name="occupation">
    <option value="" selected="selected" disabled="disabled">-- select one --</option>
    <optgroup label="Healthcare Practitioners and Technical Occupations:">
        <option value="Chiropractor">Chiropractor</option>
        <option value="Dentist">Dentist</option>
        <option value="Dietitian or Nutritionist">
          Dietitian or Nutritionist
        </option>
        <option value="Optometrist">Optometrist</option>
        <option value="Pharmacist">Pharmacist</option>
        <option value="Physician">Physician</option>
        <option value="Physician Assistant">Physician Assistant</option>
        <option value="Podiatrist">Podiatrist</option>
        <option value="Registered Nurse">Registered Nurse</option>
        <option value="Therapist">Therapist</option>
        <option value="Veterinarian">Veterinarian</option>
        <option value="Health Technologist or Technician">
          Health Technologist or Technician
        </option>
        <option value="Other Healthcare Practitioners and Technical Occupation">
          Other Healthcare Practitioners and Technical Occupation
        </option>
      </optgroup>

      <optgroup label="Healthcare Support Occupations:">
        <option value="Nursing, Psychiatric, or Home Health Aide">
          Nursing, Psychiatric, or Home Health Aide
        </option>
        <option value="Occupational and Physical Therapist Assistant or Aide">
          Occupational and Physical Therapist Assistant or Aide
        </option>
        <option value="Other Healthcare Support Occupation">
          Other Healthcare Support Occupation
        </option>
      </optgroup>
      <optgroup label="Business, Executive, Management, and Financial Occupations:">
        <option value="Chief Executive">Chief Executive</option>
        <option value="General and Operations Manager">
          General and Operations Manager
        </option>
        <option
          value="Advertising, Marketing, Promotions, Public Relations, and Sales
          Manager"
        >
          Advertising, Marketing, Promotions, Public Relations, and Sales
          Manager
        </option>
        <option value="Operations Specialties Manager (e.g., IT or HR Manager)">
          Operations Specialties Manager (e.g., IT or HR Manager)
        </option>
        <option value="Construction Manager">Construction Manager</option>
        <option value="Engineering Manager">Engineering Manager</option>
        <option value="Accountant, Auditor">Accountant, Auditor</option>
        <option value="Business Operations or Financial Specialist">
          Business Operations or Financial Specialist
        </option>
        <option value="Business Owner">Business Owner</option>
        <option value="Other Business, Executive, Management, Financial Occupation">
          Other Business, Executive, Management, Financial Occupation
        </option>
      </optgroup>
      <optgroup label="Architecture and Engineering Occupations:">
        <option value="Architect, Surveyor, or Cartographer">
          Architect, Surveyor, or Cartographer
        </option>
        <option value="Engineer">Engineer</option>
        <option value="Other Architecture and Engineering Occupation">
          Other Architecture and Engineering Occupation
        </option>
      </optgroup>
      <optgroup label="Education, Training, and Library Occupations:">
        <option value="Postsecondary Teacher (e.g., College Professor)">
          Postsecondary Teacher (e.g., College Professor)
        </option>
        <option value="Primary, Secondary, or Special Education School Teacher">
          Primary, Secondary, or Special Education School Teacher
        </option>
        <option value="Other Teacher or Instructor">
          Other Teacher or Instructor
        </option>
        <option value="Other Education, Training, and Library Occupation">
          Other Education, Training, and Library Occupation
        </option>
      </optgroup>
      <optgroup label="Other Professional Occupations:">
        <option value="Arts, Design, Entertainment, Sports, and Media Occupations">
          Arts, Design, Entertainment, Sports, and Media Occupations
        </option>
        <option value="Computer Specialist, Mathematical Science">
          Computer Specialist, Mathematical Science
        </option>
        <option
          value="Counselor, Social Worker, or Other Community and Social Service
          Specialist"
        >
          Counselor, Social Worker, or Other Community and Social Service
          Specialist
        </option>
        <option value="Lawyer, Judge">Lawyer, Judge</option>
        <option
          value="Life Scientist (e.g., Animal, Food, Soil, or Biological Scientist,
          Zoologist)"
        >
          Life Scientist (e.g., Animal, Food, Soil, or Biological Scientist,
          Zoologist)
        </option>
        <option value="Physical Scientist (e.g., Astronomer, Physicist, Chemist, Hydrologist)">
          Physical Scientist (e.g., Astronomer, Physicist, Chemist, Hydrologist)
        </option>
        <option
          value="Religious Worker (e.g., Clergy, Director of Religious Activities or
          Education)"
        >
          Religious Worker (e.g., Clergy, Director of Religious Activities or
          Education)
        </option>
        <option value="Social Scientist and Related Worker">
          Social Scientist and Related Worker
        </option>
        <option value="Other Professional Occupation">
          Other Professional Occupation
        </option>
      </optgroup>
      <optgroup label="Office and Administrative Support Occupations:">
        <option value="Supervisor of Administrative Support Workers">
          Supervisor of Administrative Support Workers
        </option>
        <option value="Financial Clerk">Financial Clerk</option>
        <option value="Secretary or Administrative Assistant">
          Secretary or Administrative Assistant
        </option>
        <option value="Material Recording, Scheduling, and Dispatching Worker">
          Material Recording, Scheduling, and Dispatching Worker
        </option>
        <option value="Other Office and Administrative Support Occupation">
          Other Office and Administrative Support Occupation
        </option>
      </optgroup>
      <optgroup label="Services Occupations:">
        <option
          value="Protective Service (e.g., Fire Fighting, Police Officer, Correctional
          Officer)"
        >
          Protective Service (e.g., Fire Fighting, Police Officer, Correctional
          Officer)
        </option>
        <option value="Chef or Head Cook">Chef or Head Cook</option>
        <option value="Cook or Food Preparation Worker">
          Cook or Food Preparation Worker
        </option>
        <option value="Food and Beverage Serving Worker (e.g., Bartender, Waiter, Waitress)">
          Food and Beverage Serving Worker (e.g., Bartender, Waiter, Waitress)
        </option>
        <option value="Building and Grounds Cleaning and Maintenance">
          Building and Grounds Cleaning and Maintenance
        </option>
        <option
          value="Personal Care and Service (e.g., Hairdresser, Flight Attendant,
          Concierge)"
        >
          Personal Care and Service (e.g., Hairdresser, Flight Attendant,
          Concierge)
        </option>
        <option value="Sales Supervisor, Retail Sales">
          Sales Supervisor, Retail Sales
        </option>
        <option value="Retail Sales Worker">Retail Sales Worker</option>
        <option value="Insurance Sales Agent">Insurance Sales Agent</option>
        <option value="Sales Representative">Sales Representative</option>
        <option value="Real Estate Sales Agent">Real Estate Sales Agent</option>
        <option value="Other Services Occupation">
          Other Services Occupation
        </option>
      </optgroup>
      <optgroup label="Agriculture, Maintenance, Repair, and Skilled Crafts Occupations:">
        <option value="Construction and Extraction (e.g., Construction Laborer, Electrician)">
          Construction and Extraction (e.g., Construction Laborer, Electrician)
        </option>
        <option value="Farming, Fishing, and Forestry">
          Farming, Fishing, and Forestry
        </option>
        <option value="Installation, Maintenance, and Repair">
          Installation, Maintenance, and Repair
        </option>
        <option value="Production Occupations">Production Occupations</option>
        <option value="Other Agriculture, Maintenance, Repair, and Skilled Crafts Occupation">
          Other Agriculture, Maintenance, Repair, and Skilled Crafts Occupation
        </option>
      </optgroup>
      <optgroup label="Transportation Occupations:">
        <option value="Aircraft Pilot or Flight Engineer">
          Aircraft Pilot or Flight Engineer
        </option>
        <option value="Motor Vehicle Operator (e.g., Ambulance, Bus, Taxi, or Truck Driver)">
          Motor Vehicle Operator (e.g., Ambulance, Bus, Taxi, or Truck Driver)
        </option>
        <option value="Other Transportation Occupation">
          Other Transportation Occupation
        </option>
      </optgroup>
      <optgroup label="Other Occupations:">
        <option value="Military">Military</option>
        <option value="Homemaker">Homemaker</option>
        <option value="Other Occupation">Other Occupation</option>
        <option value="Don't Know">Don&apos;t Know</option>
        <option value="Not Applicable">Not Applicable</option>
      </optgroup>
   </select>                              
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