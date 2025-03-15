<x-welcome-layout>

    <x-slot:title>
        Columban College Inc. | Careers
    </x-slot:title>

    <!-- Banner Section with Search Bar -->
    <div class="banner" style="background-image: url('{{ asset('images/cc-bg-pic.png') }}')">
        <div class="text-center">
            <p>Human Asset Management & Development Office</p>
        </div>
        
        {{-- <div class="search-bar">
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

            <button>Search</button> 
        </div> --}}
        <div class="search-bar">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" placeholder="Enter job title or tags">
                </div>
                <div class="col-md-4">
                    <select>
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->code }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-flex justify-content-end align-items-center">
                    <button class="float-end">Search</button> 
                </div>
            </div>
        </div>        
    </div>

    <!-- About Us Section -->
    <div class="about-us">
        <div class="text-center mb-5">
            <h1> ABOUT US </h1>
        </div>

        <div class="container text-center">

            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="info-card flex-fill">
                        <h3 class="m-3">VISION</h3>
                        <p class="mt-3">Columban College Human Resources Department envisions itself to be the core of manpower of this institution, 
                            since it is duty-bound to uphold proper work training and career enhancement among personnel both teaching and non-teaching.</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="info-card flex-fill">
                        <h3 class="m-3">MISSION</h3>
                        <p class="mt-3">Columban College Human Resources Department assures the employees and its clientele the quality service in a workplace 
                            that serves as a career of innovation, professionalism and good human relation, thus producing highly skilled personnel, 
                            excellent workforce and committed members.</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="info-card flex-fill">
                        <h3 class="m-3">GOALS</h3>
                        <p class="mt-3">
                            
                            <span class="fw-bold">1.</span> To produce competent and work oriented teaching and non-teaching personnel imbued with God-loving passion for work. <br> <br>
                            <span class="fw-bold">2.</span> To emulate work values and equality among employees for professional growth and development. <br> <br>
                            <span class="fw-bold">3.</span> To radiate to the entire community the virtues of Christian character, competence, and service to be living witnesses of our patron, St. Columban.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3 Latest Opening -->
    <div class="latest-opening justify-content-center align-items-center">
        <h1>LATEST OPENING</h1>

        <div class="container justify-content-center align-items-center mt-5 g-1">
            <div class="row">
                @if ($jobs->isEmpty())
                    <p>No job openings are available at the moment.</p>
                @else
                    <!-- Swiper -->
                    <div class="swiper-container col-md-5">
                        <div class="swiper mySwiper m-auto">
                            <div class="swiper-wrapper m-auto">
                                @foreach ($jobs->sortByDesc('created_at')->take(3) as $job) {{-- ✅ Limit to 3 items --}}
                                    <div class="swiper-slide">
                                        <!-- Job Card -->
                                        <div class="card job-card p-4 m-auto">
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
            
                                            <!-- Apply Now Button linking to the job details page -->
                                            <a style="--clr: #000" class="btn-3" href="{{ route('job-selected', $job->slug) }}">
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
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
        
                    <!-- Right Image Section -->
                    <div class="col-md-7 latest-opening-img-container">
                        <img src="images/hiring.jpg" id="latestOpeningImg" class="latest-opening-img">
                    </div>
                @endif
            </div>
        </div>        
    </div>

    <!-- Latest Openings -->
    {{-- <div class="latest-opening justify-content-center align-items-center mx-auto pb-5">
        <h1>LATEST OPENINGS</h1>
    
        <div class="container mt-5 g-1">
            <div class="row">
                @if ($jobs->isEmpty())
                    <p>No job openings are available at the moment.</p>
                @else
                    @foreach ($jobs->sortByDesc('created_at')->take(3) as $job)
                        <div class="col-md-4">
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
                                            {!! nl2br(e(Str::limit(trim($description), 50, '...'))) !!}<br>
                                        @endforeach
                                    </span><br>
                                    <strong>Requirements:</strong><br>
                                    <span title="{{ $job->requirements }}">
                                        @foreach (explode("\n", $job->requirements) as $requirement)
                                            {!! nl2br(e(Str::limit(trim($requirement), 50, '...'))) !!}<br>
                                        @endforeach
                                    </span>
                                </p>
    
                                <!-- Apply Now Button linking to the job details page -->
                                <a style="--clr: #000" class="btn-3" href="{{ route('job-selected', $job->slug) }}">
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
                @endif
            </div>
        </div>
    </div> --}}

</x-welcome-layout>
