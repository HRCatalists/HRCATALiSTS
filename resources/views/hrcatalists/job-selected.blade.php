<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | {{ $job->job_title }}
    </x-slot:title>

    <div class="container mt-5">
        <a href="{{ url('/') }}" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <!-- Job selected -->
    <div class="container job-selected">
        <div class="row">

            <!-- Left Column -->
            <div class="col-md-6">

                <div class="mb-5">
                    <!-- Job Title -->
                    <h2 class="mb-0 text-dark fw-normal">{{ $job->job_title }}</h2>

                    <!-- Tags (assuming $job->tags is an array) -->
                    <div class="d-flex my-3">
                        @foreach($job->tags as $tag)
                            <button class="btn btn-outline-primary me-2">{{ $tag }}</button>
                        @endforeach
                    </div>

                    <!-- Closing Date -->
                    <div class="closing-date text-muted mb-4">
                        <p class="mb-0 fw-bold">Closing Date:</p>
                        <p>{{ \Carbon\Carbon::parse($job->closing_date)->format('F d, Y') }}</p>
                    </div>

                </div>

                <!-- Requirements -->
                <div class="mb-5">
                    <h4>Requirements:</h4>
                    <ul>
                        @foreach($job->requirements as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <h4>Job Description:</h4>
                    <ul>
                        @foreach($job->description as $desc)
                            <li>{{ $desc }}</li>
                        @endforeach
                    </ul>                    
                </div>

                <!-- Contacts -->
                <div>
                    <h4>Contacts:</h4>
                    <p>
                        <i class="fas fa-envelope text-primary"></i>
                        <a href="" class="text-primary">admin@gmail.com</a>
                    </p>
                    <p>
                        <i class="fas fa-phone text-primary"></i>
                        <span class="text-primary">0912345678</span>
                    </p>
                </div>

            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="container mb-5">
                    
                    <h3 class="text-primary">Application Form</h3>

                    <div id="form-page-1" class="form-page">

                        <div class="row mb-3">

                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" id="firstName" class="form-control" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" id="lastName" class="form-control" placeholder="Enter Last Name" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="EmailAddress" class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" id="emailaddress" class="form-control" placeholder="Enter E-mail Address" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="PhoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" id="PhoneNumber" class="form-control" placeholder="Enter Phone Number" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="Address" class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" id="Address" class="form-control" placeholder="Enter Address" required>
                            </div>

                        </div>

                        <!-- Attach CV -->
                        <div class="col-md-7 mb-5 mt-5">
                            <label for="cv" class="form-label">Attach CV <span class="text-danger">*</span></label>
                            <div class="file-upload col-md-12">
                                <label for="cv" class="upload-label">
                                    <button type="button" class="btn btn-primary">Upload</button> 
                                    <span class="file-name">or drag your file here</span>
                                </label>
                                <input type="file" id="cv" class="file-input" accept=".pdf" required>
                            </div>
                            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>
                            <small class="form-text text-danger" id="error-message" style="display: none;"></small>
                        </div>

                        <p class="privacy-policy mb-5">
                            Before providing any information or data, please read and understand our 
                            <a href="#">Privacy Policy</a>.
                        </p>
                        
                        <div class="form-group form-check mb-5">
                            <input type="checkbox" class="form-check-input shadow" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">I agree to the Privacy Policy.</label>
                        </div>

                        <div>
                            <button class="btn submit-button">SUBMIT</button>
                        </div>

                    </div>

                </div>
            </div>
            
        </div>
    </div>

</x-welcome-layout>
