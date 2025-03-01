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
                    <h2 class="mb-0 text-dark fw-normal">{{ $job->job_title }}</h2>

                    <div class="d-flex my-3">
                        @foreach(explode(',', $job->tags) as $tag)
                            <button class="btn btn-outline-primary me-2">{{ trim($tag) }}</button>
                        @endforeach
                    </div>

                    <div class="closing-date text-muted mb-4">
                        <p class="mb-0 fw-bold">Closing Date:</p>
                        <p>{{ \Carbon\Carbon::parse($job->end_date)->format('F d, Y') }}</p>
                    </div>
                </div>

                <div class="mb-5">
                    <h4>Requirements:</h4>
                    <p>{!! nl2br(e($job->requirements)) !!}</p>
                </div>

                <div class="mb-5">
                    <h4>Job Description:</h4>
                    <p>{!! nl2br(e($job->job_description)) !!}</p>
                </div>

                <div>
                    <h4>Contacts:</h4>
                    <p>
                        <i class="fas fa-envelope text-primary"></i>
                        <a href="mailto:admin@gmail.com" class="text-primary">admin@gmail.com</a>
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

                    <!-- Show validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('applicants.store', ['slug' => $job->slug]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="job_id" value="{{ $job->id }}">

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}" required>
                                @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
                                @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter E-mail Address" value="{{ old('email') }}" required>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}" required>
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address') }}" required>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Attach CV -->
                        <div class="col-md-7 mb-5 mt-5">
                            <label class="form-label">Attach CV <span class="text-danger">*</span></label>
                            <input type="file" name="cv" class="form-control" accept=".pdf" required>
                            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>
                            @error('cv') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group form-check mb-5">
                            <input type="checkbox" class="form-check-input" name="privacy_policy_agreed" required>
                            <label class="form-check-label">I agree to the Privacy Policy.</label>
                            @error('privacy_policy_agreed') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-welcome-layout>
