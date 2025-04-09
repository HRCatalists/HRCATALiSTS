<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <div class="d-flex">
    <x-partials.system.ats.ats-sidebar />
    </div>

        
            <!-- Profile Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">

                <div>

                    <div class="container mt-5">

                        <div class="d-flex justify-content-center mb-4">
                            <h2 class="db-h2 text-center">NON-TEACHING RANKING and PROMOTION <br> Office Staff</h2>   
                        </div>
    
                        <div class="container">
    
                            <div class="search-container">
                                <!-- <h4 class="text-center mb-3">Search Personnel</h4> -->
                                <div class="d-flex">
                                    <input type="text" id="searchName" class="form-control me-2" placeholder="Enter Name of Personnel" aria-label="Search by Name">
    
                                    <select id="searchDepartment" class="form-select me-2">
                                        <option value="" disabled selected>-Select a Department-</option>
                                        <option value="engineering">Department of Engineering</option>
                                        <option value="cased">Department of Arts & Science and Education</option>
                                        <option value="cba">Department of Business and Accountancy</option>
                                        <option value="nursing">Department of Nursing</option>
                                        <option value="ccs">Department of Computer Studies</option>
                                        <option value="arch">Department of Architecture</option>
                                        <option value="basic_ed">Department of Basic Education</option>
                                    </select>
                                    
                                    <button class="btn search-btn" onclick="searchPersonnel()">SEARCH</button>
                                </div>
                            </div>
    
                        </div>
    
                    </div>

                    <div>
                        
                        <div class="d-flex justify-content-end my-3">
                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                                <a href=""></a>
                            </button>
                        </div>

                        <!-- Tab links -->
                        <ul class="nav nav-tabs mt-5" id="myTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab">I.</a>
                            </li>

                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab">II.</a>
                            </li>

                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab">III.</a>
                            </li>

                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#content4" role="tab">IV.</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content5" role="tab">V.</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content6" role="tab">VI.</a>
                            </li>
                        </ul>


                        <!-- Tab content -->
                        <div class="tab-content my-5" id="myTabContent">

                                <x-partials.system.ems.ems-ranking-non1 />
                                <x-partials.system.ems.ems-ranking-non2 />
                                <x-partials.system.ems.ems-ranking-non3 />
                                <x-partials.system.ems.ems-ranking-non4 />
                                <x-partials.system.ems.ems-ranking-non5 />
                                <x-partials.system.ems.ems-ranking-non6 /> 

                           

                           




                        </div>

                    
                    </div>

                

                </div>

    </x-admin-ems-layout>