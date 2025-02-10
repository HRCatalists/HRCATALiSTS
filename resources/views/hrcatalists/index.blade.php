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
            <input type="text" placeholder="Enter keyword">

            <select>
                <option>Positions</option>
                <!-- Ideally, you would dynamically fill this with real data -->
                <option>Position 1</option>
                <option>Position 2</option>
                <option>Position 3</option>
                <option>Position 4</option>
                <option>Position 5</option>
            </select>

            <a href="#" class="search-btn">Search</a> 
        </div>
    </div>
 <!-- Latest Opening -->
 <div class="latest-opening justify-content-center align-items-center mx-auto pb-5">
        <h1>LATEST OPENING</h1>

        <div class="container mt-5 g-1">
            <div class="row">
                @foreach ($jobs as $job)
                    <div class="col-md-4">
                        <div class="card job-card p-4">
                            <h5>{{ $job->job_title }}</h5>
                            <p class="requirements">
                                Requirements:<br>
                                <!-- Assuming the requirements are stored in the database -->
                                {!! nl2br(e($job->requirements)) !!}
                            </p>
                            <div class="tags">
                                <!-- Dynamically display tags, assuming 'tags' is a comma-separated string in the database -->
                                @foreach (explode(',', $job->tags) as $tag)
                                    <span class="tag">{{ $tag }}</span>
                                @endforeach
                            </div>

                            <!-- Apply button (placeholder link) -->
                            <a style="--clr: #000" class="btn-3" href="#">
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
                            <td><a href="#" class="find-out-more">Find out more →</a></td> <!-- Placeholder link -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-welcome-layout>
