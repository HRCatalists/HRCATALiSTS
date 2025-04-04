<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | Job Openings
    </x-slot:title>

    <!-- Job Openings start-->
    <div class="latest-opening table-container justify-content-center align-items-center mx-auto">
        <h1 class="my-5">JOB OPENINGS</h1>

<div class="search-container">
    <form id="jobSearchForm" class="search-bar-2" action="{{ route('job.search') }}" method="GET">
        <input type="text" id="keyword" name="keyword" placeholder="Enter keyword">
        
        <select id="position" name="position">
            <option value="Positions">Positions</option>
            @if(isset($departments))
                @foreach ($departments as $department)
                    <option value="{{ $department->code }}">{{ $department->name }}</option>
                @endforeach
            @endif
        </select>

        <button type="submit">Search</button>
    </form>
</div>

      <!-- Job Listings -->
<div class="container mt-5 g-1">
    <div class="row" id="jobResults">
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
    $(document).ready(function() {
        // Trigger AJAX search on input change
        $('#keyword, #position').on('input change', function() {
            let keyword = $('#keyword').val();
            let position = $('#position').val();

            $.ajax({
                url: "{{ route('openings') }}",
                method: "GET",
                data: { keyword: keyword, position: position },
                success: function(response) {
                    // Clear job results
                    $('#jobResults').html('');

                    // If no jobs found
                    if (response.jobs.length === 0) {
                        $('#jobResults').html('<p>No job openings found.</p>');
                        return;
                    }

                    // Append filtered jobs
                    $.each(response.jobs, function(index, job) {
                        let jobCard = `
                            <div class="col-md-4 job-card-container">
                                <div class="card job-card p-4">
                                    <h5>${job.job_title}</h5>
                                    <div class="tags">${getTags(job.tags)}</div>                             
                                    <p class="requirements">
                                        <strong>Qualifications:</strong><br>
                                        <span>${truncateText(job.requirements, 50)}</span><br>
                                        <strong>Job Description:</strong><br>
                                        <span>${truncateText(job.job_description, 50)}</span><br>
                                    </p>
                                    <a class="btn-3" href="/job/${job.slug}">APPLY NOW</a>
                                </div>
                            </div>`;
                        $('#jobResults').append(jobCard);
                    });
                }
            });
        });

        // Helper function to truncate text
        function truncateText(text, limit) {
            return text.length > limit ? text.substring(0, limit) + '...' : text;
        }

        // Helper function to format tags
        function getTags(tags) {
            return tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join(' ');
        }
    });
</script>

</x-welcome-layout>