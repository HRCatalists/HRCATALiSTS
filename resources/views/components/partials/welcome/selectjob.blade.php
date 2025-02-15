

    <div class="container job-selected py-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-5">
                    <!-- Job Title -->
                    <h2 class="mb-0 text-dark fw-normal">{{ $job->job_title }}</h2>

                    <!-- Tags -->
                    <div class="d-flex my-3">
                        @foreach(explode(',', $job->tags) as $tag)
                            <button class="btn btn-outline-primary me-2">{{ trim($tag) }}</button>
                        @endforeach
                    </div>

                    <!-- Closing date -->
                    <div class="closing-date text-muted mb-4">
                        <p class="mb-0 fw-bold">Closing Date:</p>
                        <p>{{ \Carbon\Carbon::parse($job->end_date)->format('F d, Y') }}</p>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="mb-5">
                    <h4>Requirements:</h4>
                    <ul>
                        @foreach(explode("\n", $job->requirements) as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <h4>Job Description:</h4>
                    <ul>
                        @foreach(explode("\n", $job->job_description) as $desc)
                            <li>{{ $desc }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="w-100 text-center">
                    <a href="#" class="btn btn-lg btn-primary">Apply Now</a>
                </div>
            </div>
        </div>
    </div>

