<div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addApplicantForm" method="POST" action="{{ route('applicants.store') }}" enctype="multipart/form-data">
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
                            <input type="text" 
                                class="form-control @error('first_name') is-invalid @enderror"
                                id="firstName" name="first_name" 
                                value="{{ old('first_name') }}"
                                placeholder="Enter first name"
                                required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                class="form-control @error('last_name') is-invalid @enderror"
                                id="lastName" name="last_name" 
                                value="{{ old('last_name') }}"
                                placeholder="Enter last name"
                                required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email & Phone -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" 
                                class="form-control @error('email') is-invalid @enderror"
                                id="emailAddress" name="email" 
                                value="{{ old('email') }}"
                                placeholder="e.g. johndoe@example.com"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="text" 
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phoneNumber" name="phone" 
                                value="{{ old('phone') }}"
                                placeholder="e.g. 09123456789"
                                required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Full Address <span class="text-danger">*</span></label>
                        <input type="text" 
                            class="form-control @error('address') is-invalid @enderror"
                            id="address" name="address" 
                            value="{{ old('address') }}"
                            placeholder="e.g. 123 Purok St., Olongapo City"
                            required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Job Dropdown -->
                    <div class="mb-3">
                        <label for="job_id" class="form-label">Select Position <span class="text-danger">*</span></label>
                        <select name="job_id" id="job_id" class="form-select @error('job_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Choose a position</option>
                            @foreach($jobs as $job)
                                <option 
                                    value="{{ $job->id }}"
                                    data-slug="{{ $job->slug }}"
                                    data-classification="{{ $job->classification }}"
                                    {{ old('job_id') == $job->id ? 'selected' : '' }}>
                                    {{ $job->job_title }} ({{ $job->department }}) - {{ $job->classification }}
                                </option>
                            @endforeach
                        </select>
                        @error('job_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="hidden" id="classification" name="classification" value="{{ old('classification') }}">
                    <input type="hidden" id="jobSlug" name="slug" value="{{ old('slug') }}">

                    <!-- CV Upload -->
                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV (PDF only) <span class="text-danger">*</span></label>
                        <div class="custom-file-wrapper">
                            <input type="file" name="cv" id="cv" accept=".pdf" required class=" @error('cv') is-invalid @enderror custom-file">
                            <label for="cv" id="cvLabel">Choose file</label>
                        </div>
                        <small class="text-muted">Max 2MB, PDF format only.</small>
                        @error('cv')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    
                    <!-- Privacy / Terms (hidden but required) -->
                    <input type="hidden" name="privacy_policy_agreed" value="1">
                    <input type="hidden" name="terms_agreed" value="1">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
