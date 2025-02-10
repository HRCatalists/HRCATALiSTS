<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Archived
    </x-slot:title>

        <!-- Sidebar & Calendar -->
        <div class="d-flex">
            <!-- Sidebar -->
            <x-partials.system.ats.ats-sidebar />
            <!-- End of Sidebar -->

            <!-- Archived List -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">
                    
                    <div class="d-flex justify-content-between align-items-center my-5">
                        <div>
                            <h2 class="dt-h2">Archived Applicants</h2>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="card checkbox-card">
                            <div class="container d-flex">

                                <!-- Select All heckbox -->
                                <div class="d-flex me-4 py-3">
                                    <input type="checkbox" id="selectAll" class="rowCheckbox">
                                </div>
                                
                                <!-- Retrieve and Delete Buttons -->
                                <div class="d-flex py-1">
                                    <button class="btn btn-success btn-sm me-2">RETRIEVE</button>
                                    <button class="btn reject-btn btn-sm">DELETE</button>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="d-flex justify-content-around ms-3">

                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                                <a href=""></a>
                            </button>
                        </div>
                    </div>
        
                    <!-- Applicant Table -->
                    <table id="archivedApplicantTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th></th>
                                <th>APPLICANT NAME</th>
                                <th>APPLIED DATE</th>
                                <th>POSITION APPLIED TO</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Rhinell Menes</td>
                                <td>November 11, 2024</td>
                                <td>Medical Staff</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>John Rafael De Venencia</td>
                                <td>November 11, 2024</td>
                                <td>Medical Staff</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Jianah Fate Gamboa</td>
                                <td>November 11, 2024</td>
                                <td>Medical Staff</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Raiden Monsalud</td>
                                <td>November 11, 2024</td>
                                <td>Medical Staff</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Retrieve Popup -->
                    <div id="retrievePopup" class="custom-popup">
                        <div class="popup-content">
                            <p>Are you sure you want to retrieve this applicant?</p>
                            <button class="btn btn-success" onclick="retrieveAction()">Yes, retrieve the applicant</button>
                            <button class="btn btn-outline-secondary" onclick="closePopup('retrievePopup')">Cancel</button>
                        </div>
                    </div>

                    <!-- Delete Popup -->
                    <div id="deletePopup" class="custom-popup">
                        <div class="popup-content">
                            <p>Are you sure you want to delete this applicant?</p>
                            <button class="btn btn-danger" onclick="deleteAction()">Yes, delete the applicant</button>
                            <button class="btn btn-outline-secondary" onclick="closePopup('deletePopup')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Offcanvas for Candidate Profile View -->
        <!-- View button -->
        <div class="offcanvas offcanvas-end p-0" tabindex="-1" id="candidateProfile" aria-labelledby="candidateProfileLabel">

            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="candidateProfileLabel">Candidate Profile View</h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body-wrapper px-4">
                <div class="content-section">
                    <h5 class="my-4 ">Rhinell Menes</h5>
                    
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="showTab('overview')">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showTab('notes')">Notes</a>
                        </li>
                        
                    </ul>

                    <!-- Tab Content -->
                    <!-- Overview Tab -->
                    <div id="overview" class="tab-content">
                        
                        <!-- Applicant Section -->
                        <div class="applicant-section">
                            
                            <div class="applicant-data">
                                <h5>Applicant Data</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p> <strong>Position:</strong> Medical Staff</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p> <strong>Full Name:</strong> Rhinell menes</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fa-solid fa-envelope me-2"></i> menesj@gmail.com
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fa-solid fa-phone me-2"></i> 09313 4567 89
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <i class="fa-solid fa-location-dot me-2"></i> 37-B 7th St., West Tapinac, Olongapo City
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Attachment -->
                            <div class="file-attachment my-4">
                                <img src="images/pdf-img.png" alt="PDF icon">
                                <span>Severus_Snape_CVfinalfinal.pdf</span>
                                <span class="ms-auto">200 KB</span>
                            </div>

                            <div class="d-grid mt-5">
                                <button class="btn btn-primary">EDIT APPLICANT DATA</button>
                            </div>
                                                                            
                        </div>
                    </div>
                    <!-- End Overview Tab -->
                    
                    <!-- Note Tab -->
                    <div id="notes" class="tab-content" style="display: none;">
                        <div class="notes-section">
                            <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                            <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                            <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>

                            <div class="notes-btn">
                                <button class="btn btn-primary mt-3">Add</button>
                                <button class="btn btn-success mt-3">Edit</button>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            <!-- End of View button -->
        </div>            
        <!-- End of Offcanvas for Candidate Profile View -->
        
</x-admin-ats-layout>