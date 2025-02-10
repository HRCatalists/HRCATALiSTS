<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Job Openings
    </x-slot:title>

        <!-- Sidebar & Active Position List -->
        <div class="d-flex">
            <!-- Sidebar -->
            <x-partials.system.ats.ats-sidebar />
            <!-- End of Sidebar -->
        
            <!-- Active Position List -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">
                    
                    <div class="d-flex justify-content-between align-items-center my-5">
                        <div>
                            <h2 class="dt-h2">Openings</h2>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="card checkbox-card-2">
                            <div class="container d-flex">

                                <!-- Select All heckbox -->
                                <div class="d-flex me-4 py-3">
                                    <input type="checkbox" id="selectAll" class="rowCheckbox">
                                </div>
                                
                                <!-- Delete Button -->
                                <div class="d-flex py-1">
                                    <button class="btn reject-btn btn-sm">DELETE</button>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="d-flex justify-content-around ms-3">
                            <!-- Add Position Button -->
                            <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                                ADD POSITION
                            </button>

                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                                <a href=""></a>
                            </button>
                        </div>
                    </div>
        
                    <!-- Active Position Table -->
                    <table id="activePositionsTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th></th>
                                <th>JOB TITLE</th>
                                <th>DEPARTMENT</th>
                                <th>DATE ISSUED</th>
                                <th>END DATE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Medical Staff</td>
                                <td> Clinic </td>
                                <td>November 11, 2024</td>
                                <td>Decemeber 11, 2024</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="modal" data-bs-target="#editPositionModal">EDIT</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>CCS Professor</td>
                                <td>College of Computer Studies</td>
                                <td>November 11, 2024</td>
                                <td>Decemeber 11, 2024</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="modal" data-bs-target="#editPositionModal">EDIT</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Maintenance</td>
                                <td>Maintenance Department</td>
                                <td>November 11, 2024</td>
                                <td>Decemeber 11, 2024</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="modal" data-bs-target="#editPositionModal">EDIT</button>
                                    </div>
                                </td> 
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>Sanitary Engineers</td>
                                <td>Maintenance Department</td>
                                <td>November 11, 2024</td>
                                <td>Decemeber 11, 2024</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-ap-edit" data-bs-toggle="modal" data-bs-target="#editPositionModal">EDIT</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Delete Popup -->
                    <div id="rejectPopup" class="custom-popup">
                        <div class="popup-content">
                            <p>Are you sure you want to delete this candidate?</p>
                            <button class="btn btn-danger" onclick="rejectAction()">Yes, delete the candidate</button>
                            <button class="btn btn-outline-secondary" onclick="closePopup('rejectPopup')">Cancel</button>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

        <!-- Offcanvas for Candidate Profile View -->
        <!-- Add Position Modal -->
        <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPositionModalLabel">ADD A POSITION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="department" placeholder="Enter Department" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="requirements" class="form-label">Job Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" rows="4" required placeholder="Enter job description..."></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="duties" class="form-label">Requirements <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="requirements" rows="4" required placeholder="Enter requirements..."></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tags" placeholder="Enter tags">
                                </div>
                                <div class="col-md-3">
                                    <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dateIssued" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-post">POST</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Add a Position -->

        <!-- Edit Position Modal -->
        <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPositionModalLabel">EDIT POSITION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="department" placeholder="Enter Department" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="requirements" class="form-label">Job Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" rows="4" required placeholder="Enter job description..."></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="duties" class="form-label">Requirements <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="requirements" rows="4" required placeholder="Enter requirements..."></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="tags" placeholder="Enter tags">
                                </div>
                                <div class="col-md-3">
                                    <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dateIssued" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-post">SAVE</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Edit -->

</x-admin-ats-layout>