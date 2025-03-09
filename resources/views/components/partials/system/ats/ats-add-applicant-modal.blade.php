<div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addApplicantForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-white" style="background-color: #111D5B;">
                    <h5 class="modal-title" id="addApplicantModalLabel">Add New Applicant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-primary mb-3">Application Form</h5>

                    <!-- First & Last Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name" required>
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name" required>
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>

                    <!-- Email & Phone Number -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label">E-mail Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="emailAddress" name="email" placeholder="Enter E-mail Address" required>
                            <div class="error-message text-danger"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="Enter Phone Number" required>
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>

                    <!-- Full Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Full Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Full Address" required>
                        <div class="error-message text-danger"></div>
                    </div>

                    <!-- Job Selection Dropdown -->
                    <label for="job_id" class="form-label">Select Job <span class="text-danger">*</span></label>
                    <select name="job_id" id="job_id" class="form-select" required>
                        <option value="" selected disabled>Select a Job</option>
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" data-slug="{{ $job->slug }}">
                                {{ $job->job_title }} ({{ $job->department }})
                            </option>
                        @endforeach
                    </select>
                    <div class="error-message text-danger"></div>

                    <!-- Hidden Slug Field -->
                    <input type="hidden" id="jobSlug" name="slug" value="">

                    <!-- CV Upload -->
                    <div class="my-4">
                        <label for="cv" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>

                        <div class="input-group">
                            <input type="file" name="cv" id="cv" class="form-control d-none @error('cv') is-invalid @enderror" accept=".pdf" required>
                            <label for="cv" class="btn btn-primary">Choose File</label>
                            <span class="input-group-text file-label">No file selected</span>
                        </div>

                        <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>

                        @error('cv') 
                            <div class="invalid-feedback d-block">{{ $message }}</div> 
                        @enderror
                    </div>
                    
                    <!-- ✅ Privacy Policy Agreement -->
                    <div class="mb-3">
                        <input type="checkbox" id="privacy_policy_agreed" name="privacy_policy_agreed" value="1" required>
                        <label for="privacy_policy_agreed" class="form-label">
                            I agree to the <a href="#" target="_blank">Privacy Policy</a>
                        </label>
                        <div class="error-message text-danger"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>