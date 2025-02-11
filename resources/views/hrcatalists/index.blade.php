<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | Careers
    </x-slot:title>

    <!-- Banner Section with Search Bar -->
    <div class="banner" style="background-image: url('{{ asset('images/cc-bg-pic.png') }}')">
        <div class="text-center"> 
            <p>Christi Simus Non Nostri<br>We are Christ's and not our own</p> 
        </div>
        
        <div class="search-bar">
            <input type="text" placeholder="Enter key word">

            <select>
                <option>Positions</option>
                <option>Positions one</option>
                <option>Positions two</option>
                <option>Positions three</option>
                <option>Positions four</option>
                <option>Positions five</option>
                <option>Positions wneiurjhewiurherh</option>
            </select>

            <a href="" class="search-btn">Search</a> 
        </div>
    </div>

    <!-- About Us Section -->
    <div class="about-us">
        <h1 class="mx-auto mb-3">ABOUT US</h1>

        <div class="d-flex mt-5">
            <img src="images/ccihr-logo.png" alt="About Us Image"> 
            <div class="about-us-content px-5">
                <h2>Human Asset Management and Development Office</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>

    <!-- Latest Openings -->
    <div class="latest-opening justify-content-center align-items-center mx-auto pb-5">
        <h1>LATEST OPENINGS</h1>

        <div class="container mt-5 g-1">
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-md-4">
                        <div class="card job-card p-4">
                            <h5>{{ $job->job_title }}</h5>
                            <p class="requirements">
                                Requirements:<br>
                                {!! nl2br(e($job->requirements)) !!}
                            </p>
                            <div class="tags">
                                @foreach (explode(',', $job->tags) as $tag)
                                    <span class="tag">{{ trim($tag) }}</span>
                                @endforeach
                            </div>

                            <!-- Apply Now Button linking to the job details page -->
                            <a style="--clr: #000" class="btn-3" href="{{ route('jobs.show', $job->id) }}">
                                <span class="button__icon-wrapper">
                                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                                    </svg>
                                    <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                                    </svg>
                                </span>
                                APPLY NOW
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- List of openings -->
    <div class="table-container">
        <h1 class="list-ttl mb-5">LIST OF OPENINGS</h1>

        @if($jobs->isEmpty())
            <p>No job listings available at the moment.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Tags</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ implode(', ', explode(',', $job->tags)) }}</td>
                            <td>
                                <a href="{{ route('jobs.show', $job->id) }}" class="find-out-more">Find out more →</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-welcome-layout>
