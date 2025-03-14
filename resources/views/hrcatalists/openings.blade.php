<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | Job Openings
    </x-slot:title>

    <!-- Job Openings start-->
    <div class="latest-opening table-container justify-content-center align-items-center mx-auto pb-5">
        <h1 class="my-5">JOB OPENINGS</h1>


   <div class="search-container">
    <form id="jobSearchForm" class="search-bar-2">
        <input type="text" id="keyword" name="keyword" placeholder="Enter keyword">

        <select id="position" name="position">
            <option value="Positions">Positions</option>
            <option value="Positions one">Positions one</option>
            <option value="Positions two">Positions two</option>
            <option value="Positions three">Positions three</option>
            <option value="Positions four">Positions four</option>
            <option value="Positions five">Positions five</option>
        </select>
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
                        <strong>Job Description:</strong><br>
                        <span>{{ Str::limit($job->job_description, 50, '...') }}</span><br>
                        <strong>Requirements:</strong><br>
                        <span>{{ Str::limit($job->requirements, 50, '...') }}</span>
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
                                        <strong>Job Description:</strong><br>
                                        <span>${truncateText(job.job_description, 50)}</span><br>
                                        <strong>Requirements:</strong><br>
                                        <span>${truncateText(job.requirements, 50)}</span>
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