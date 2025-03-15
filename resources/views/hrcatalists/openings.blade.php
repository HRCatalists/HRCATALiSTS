<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | Job Openings
    </x-slot:title>

    <!-- Job Openings start-->
    <div class="latest-opening table-container justify-content-center align-items-center mx-auto">
        <h1 class="my-5">JOB OPENINGS</h1>

        <!-- Search Bar Container -->
        <div class="search-container">
            <form id="jobSearchForm" class="search-bar-2">
                <div class="row w-100">
                    <!-- Job Title Input -->
                    <div class="col-4">
                        <input type="text" id="keyword" name="keyword" placeholder="Enter Job Title or Tags">
                    </div>
        
                    <!-- Searchable Dropdown (Select2) -->                                      
                    <div class="col-6">
                        <select id="position" name="position">
                            <option value="">Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                            @endforeach
                        </select> 
                    </div>
        
                    <!-- Search Button -->
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>                              
            </form>
        </div>
        

        <!-- Job Listings -->
        <div class="container mt-5 g-1">
            <div class="row row-gap-5" id="jobResults">
                @foreach ($jobs as $job)
                    <div class="col-md-4 job-card-container">
                        <div class="card job-card p-4">
                            <h5>{{ $job->job_title }}</h5>
                            <div class="tags">
                                @foreach (explode(',', $job->tags) as $tag)
                                    <span class="tag">{{ trim($tag) }}</span>
                                @endforeach
                            </div>                             
                            <p class="requirements">
                                <strong>Job Description:</strong><br>
                                <span title="{{ $job->job_description }}">
                                    @foreach (explode("\n", $job->job_description) as $description)
                                        {!! nl2br(e(Str::limit(trim($description), 55, '...'))) !!}<br>
                                    @endforeach
                                </span><br>
                                <strong>Requirements:</strong><br>
                                <span title="{{ $job->requirements }}">
                                    @foreach (explode("\n", $job->requirements) as $requirement)
                                        {!! nl2br(e(Str::limit(trim($requirement), 55, '...'))) !!}<br>
                                    @endforeach
                                </span>
                            </p>
                            <a class="btn-3" href="{{ route('job-selected', $job->slug) }}">APPLY NOW</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>        
    </div>
    <!-- Job Openings end-->

    {{-- <script>
        $(document).ready(function() {
            $('#jobSearchForm').on('submit', function(event) {
                event.preventDefault(); // Prevent page refresh

                let keyword = $('#keyword').val().trim();
                let position = $('#position').val().trim();

                $.ajax({
                    url: "{{ route('job.search') }}",
                    method: "GET",
                    data: { keyword: keyword, position: position },
                    dataType: "json", // Ensure JSON response
                    success: function(response) {
                        // Clear job results
                        $('#jobResults').html('');

                        // ✅ Check if jobs array is empty
                        if (!response.jobs || response.jobs.length === 0) {
                            $('#jobResults').html(`
                                <div class="col-12 text-center mt-4">
                                    <p class="text-muted">❌ No job openings found for "<strong>${keyword}</strong>" in "<strong>${position}</strong>".</p>
                                    <p>🔍 Try searching with different keywords or check back later.</p>
                                </div>
                            `);
                            return;
                        }

                        // Append filtered jobs (Using the Correct Blade Structure)
                        $.each(response.jobs, function(index, job) {
                            let jobCard = `
                                <div class="col-md-4 job-card-container">
                                    <div class="card job-card p-4">
                                        <h5>${job.job_title}</h5>

                                        <!-- Job Tags -->
                                        <div class="tags">
                                            ${getTags(job.tags)}
                                        </div>                             

                                        <!-- Job Description -->
                                        <p class="requirements">
                                            <strong>Job Description:</strong><br>
                                            <span title="${escapeHtml(job.job_description)}">
                                                ${formatList(job.job_description)}
                                            </span><br>

                                            <strong>Requirements:</strong><br>
                                            <span title="${escapeHtml(job.requirements)}">
                                                ${formatList(job.requirements)}
                                            </span>
                                        </p>

                                        <a class="btn-3" href="/job-selected/${job.slug}">APPLY NOW</a>
                                    </div>
                                </div>`;
                            $('#jobResults').append(jobCard);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error); // Debugging
                        $('#jobResults').html('<p class="text-danger">⚠️ An error occurred while fetching job listings. Please try again later.</p>');
                    }
                });
            });

            // Helper function to format descriptions & requirements (Truncates each line separately)
            function formatList(text) {
                if (!text) return '';
                return text.split("\n").map(line => 
                    `${truncateText(line.trim(), 55)}<br>` // Truncate and keep line breaks
                ).join('');
            }

            // Helper function to truncate text (55 characters per line)
            function truncateText(text, limit) {
                return text.length > limit ? text.substring(0, limit) + '...' : text;
            }

            // Helper function to format tags properly
            function getTags(tags) {
                if (!tags) return '';
                return tags.split(',').map(tag => 
                    `<span class="tag">${tag.trim()}</span>`
                ).join('');
            }

            // Helper function to escape HTML (for safe title attributes)
            function escapeHtml(text) {
                return text.replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");
            }
        });
    </script> --}}
    <script>
        document.getElementById('jobSearchForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let keyword = document.getElementById('keyword').value;
        let department = document.getElementById('position').value;

        fetch(`/search-jobs?keyword=${keyword}&position=${department}`)
            .then(response => response.json())
            .then(data => {
                let jobResults = document.getElementById('jobResults');
                jobResults.innerHTML = '';

                if (data.jobs.length > 0) {
                    data.jobs.forEach(job => {
                        jobResults.innerHTML += `
                            <div class="col-md-4 job-card-container">
                                <div class="card job-card p-4">
                                    <h5>${job.job_title}</h5>
                                    <div class="tags">${job.tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join('')}</div>
                                    <p class="requirements">
                                        <strong>Job Description:</strong><br>
                                        <span>${job.job_description.length > 55 ? job.job_description.substring(0, 55) + '...' : job.job_description}</span><br>
                                        <strong>Requirements:</strong><br>
                                        <span>${job.requirements.length > 55 ? job.requirements.substring(0, 55) + '...' : job.requirements}</span>
                                    </p>
                                    <a class="btn-3" href="/job/${job.slug}">APPLY NOW</a>
                                </div>
                            </div>`;
                    });
                } else {
                    jobResults.innerHTML = '<p class="text-center">No jobs found</p>';
                }
            })
            .catch(error => console.error('Error fetching jobs:', error));
    });
    </script>
    
</x-welcome-layout>