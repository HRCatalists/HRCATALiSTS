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
                                <strong>Qualifications:</strong><br>
                                <span title="{{ $job->requirements }}">
                                    @foreach (explode("\n", $job->requirements) as $requirement)
                                        {!! nl2br(e(Str::limit(trim($requirement), 55, '...'))) !!}<br>
                                    @endforeach
                                </span><br>
                                <strong>Job Description:</strong><br>
                                <span title="{{ $job->job_description }}">
                                    @foreach (explode("\n", $job->job_description) as $description)
                                        {!! nl2br(e(Str::limit(trim($description), 55, '...'))) !!}<br>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('jobSearchForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let keyword = document.getElementById('keyword').value;
        let department = document.getElementById('position').value;

        function escapeHtml(text) {
            const div = document.createElement("div");
            div.textContent = text;
            return div.innerHTML;
        }

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
                                    <h5>${escapeHtml(job.job_title)}</h5>
                                    <div class="tags">
                                        ${job.tags.split(',').map(tag => `<span class="tag">${escapeHtml(tag.trim())}</span>`).join('')}
                                    </div>
                                    <p class="requirements">
                                        <strong>Qualifications:</strong><br>
                                        <span title="${(job.requirements || '').replace(/"/g, '&quot;')}">
                                            ${(job.requirements || '').split('\n').map(r => `${escapeHtml(r.trim().length > 55 ? r.trim().substring(0, 55) + '...' : r.trim())}<br>`).join('')}
                                        </span><br>
                                        <strong>Job Description:</strong><br>
                                        <span title="${(job.job_description || '').replace(/"/g, '&quot;')}">
                                            ${(job.job_description || '').split('\n').map(d => `${escapeHtml(d.trim().length > 55 ? d.trim().substring(0, 55) + '...' : d.trim())}<br>`).join('')}
                                        </span>
                                    </p>
                                    <a class="btn-3" href="/job-selected/${job.slug}">APPLY NOW</a>
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