<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | Teaching Staff
        
    </x-slot:title>

    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />

         
        
            <!-- Form Content -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">

                    <div class="container d-flex mt-5 mb-4 fixed-action-container" id="target-content">
                        <div class="container justify-content-center align-content-center">
                            <a href="admin-ems-emp.html" class="back-icon">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                        
                        <div class="d-flex me-2">
                            <!-- <a type="button" class="btn edit-btn me-2">
                                <i class="fa fa-save me-2"></i>SAVE
                            </a> -->

                            <a href="#" class="btn shadow dropdown-toggle d-flex align-items-center text-decoration-none print-btn" type="button" id="more-profile" data-bs-toggle="dropdown" aria-expanded="false">
                                MORE
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="more-profile">
                                <li><a class="dropdown-item" href="#">EDIT</a></li>
                                <li><a class="dropdown-item" href="#">PRINT</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">RANKING</a></li>
                            </ul>

                        </div>
                    </div>
                   
                    <!-- Main Content -->
                    <div class="emp-content">

                        <div class="d-flex justify-content-center mb-4">
                            <h2 class="db-h2 mb-3">EMPLOYEE PROFILE</h2>   
                        </div>

                        <!-- Employment Data Section -->
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="position" class="form-label me-2 fw-bold text-start">Faculty Code:</label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">Full Name:</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">School Of:</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">Status:</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">Designation Group:</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">Position:</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center">
                                            <label for="employment-status" class="form-label me-2 fw-bold text-start">Branch:</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <img src="images/dummy-profile.png" alt="Profile Picture">
                                </div>
                            </div>
                        </div>

                        <!-- Personal Data Section -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Personal Data</h4>
                    
                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Mobile-number" class="form-label me-2 text-start mr-1 fw-bold">Mobile Number:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="e-address" class="form-label me-2 text-start mr-1 fw-bold">E-mail Address:</label>
                                </div>
                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Address" class="form-label me-2 text-start mr-1 fw-bold">Address:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="tel-no" class="form-label me-2 text-start mr-1 fw-bold">Tel No.:</label>
                                </div>
                            </div>


                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="date-of-birth" class="form-label me-2 text-start mr-1 fw-bold">Date of Birth:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="place-of-birth" class="form-label me-2 text-start mr-1 fw-bold">Place of Birth:</label>
                                </div>
                            </div>


                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Gender" class="form-label me-2 text-start mr-1 fw-bold">Gender:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Religion" class="form-label me-2 text-start mr-1 fw-bold">Religion:</label>
                                </div>
                            </div>


                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Citizenship" class="form-label me-2 text-start mr-1 fw-bold">Citizenship:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Civil-Status" class="form-label me-2 text-start mr-1 fw-bold">Civil Status:</label>
                                </div>
                            </div>


                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Spouse" class="form-label me-2 text-start mr-1 fw-bold">Name of spouse:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="s-address" class="form-label me-2 text-start mr-1 fw-bold">Address:</label>
                                </div>
                            </div>


                            <div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <label for="spouse-occupation" class="form-label me-2 fw-bold text-start">Spouse's Occupation:</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <label for="num-dependent" class="form-label me-2 fw-bold text-start">No. of Dependent:</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Spouse" class="form-label me-2 text-start mr-1 fw-bold">Name of Children:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="s-address" class="form-label me-2 text-start mr-1 fw-bold">Date of Birth of Children:</label>
                                </div>
                            </div>


                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Father" class="form-label me-2 text-start mr-1 fw-bold">Father:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="f-address" class="form-label me-2 text-start mr-1 fw-bold">Address:</label>
                                </div>
                            </div>
            

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Father" class="form-label me-2 text-start mr-1 fw-bold">Mother:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="m-address" class="form-label me-2 text-start mr-1 fw-bold">Address:</label>
                                </div>
                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Father" class="form-label me-2 text-start mr-1 fw-bold">SSS No.:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="m-address" class="form-label me-2 text-start mr-1 fw-bold">PhilHealth No.:</label>
                                </div>
                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="Father" class="form-label me-2 text-start mr-1 fw-bold">TIN No.:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="m-address" class="form-label me-2 text-start mr-1 fw-bold">Pag-Ibig No.:</label>
                                </div>
                            </div>
                        </div>

                        <!-- Educational Background -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Educational Background</h4>

                            <div class=" my-5">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Education</th>
                                                <th>School</th>
                                                <th>Course</th>
                                                <th>Major</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Bachelor's Degree</td>
                                                <td>Columban College</td>
                                                <td>Computer Science</td>
                                                <td>Software Development</td>
                                                <td>Graduated with Honors</td>
                                            </tr>
                                            <tr>
                                                <td>High School</td>
                                                <td>Sample High School</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>With High Honors</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Details -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Employment Data</h4>
                        
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <label for="position" class="form-label me-2 fw-bold text-start">Parent Department:</label>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <label for="employment-status" class="form-label me-2 fw-bold text-start">Parent College:</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <label for="employment-status" class="form-label me-2 fw-bold text-start">Employment Classification:</label>
                                </div>
                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="teaching-load" class="form-label me-2 text-start mr-1 fw-bold">Employment Status:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="date-of-employment" class="form-label me-2 text-start mr-1 fw-bold">Date of Employment:</label>
                                </div>
                            </div>

                            <div class="row d-flex flex-wrap mb-3">
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="teaching-load" class="form-label me-2 text-start mr-1 fw-bold">Accreditation:</label>
                                </div>
                                <div class="col-md-6 d-flex align-items-center mb-1">
                                    <label for="date-of-employment" class="form-label me-2 text-start mr-1 fw-bold">Date of Permanent Status:</label>
                                </div>
                            </div>

                        </div>

                        <!-- Professional Board Exam or Civil Service Eligibility -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Employment Data</h4>
                        
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>License</th>
                                        <th>License Number</th>
                                        <th>Expiry Date</th>
                                        <th>Renewal Date From</th>
                                        <th>Renewal Date To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <!-- Employement Service Record -->  
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Employment Service Record</h4>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Inclusive Date</th>
                                        <th>Appointment Record</th>
                                        <th>Position/Designation</th>
                                        <th>Rank</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <!-- Training and Seminars Attended -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Training and Seminars Attended</h4>
                            
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Venue</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Organizational Membership / Officeship -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Organizational Membership / Officeship</h4>

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date of Registration</th>
                                            <th>Validity Date</th>
                                            <th>Name of Organization</th>
                                            <th>Place</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>

                        </div>

                        <!-- Others -->
                        <div class="border-1 border-top border-dark mb-5">
                            <h4 class="db-h4 my-5">Others</h4>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description / Particular</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>

        </div>
  
</x-admin-ems-layout>