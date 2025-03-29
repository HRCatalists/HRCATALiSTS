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
    
                            <div class="d-flex justify-content-center align-content-center mt-4">
    
                                <label class="fw-bold me-2" for="inlusiveDate">Inclusive Date:</label>
    
                                <input type="date" id="inlusiveDate" class="form-control me-2">
                                <span class="fw-bold me-2">to</span>
                                <input type="date" id="inlusiveDate" class="form-control me-2">
    
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
                            <div class="tab-pane fade show active" id="content1" role="tabpanel">


                                <!-- academic preparation table-->

                                
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ACADEMIC PREPARATION</th>
                                            <th>RESIDENCY</th>
                                            <th>PUBLICATION/AUTHORSHIP<br> OFFICERSHIP/SPEAKERSHIP</th>
                                            <th>PERFORMANCE EVALUATION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <tr>
                                            <td contenteditable="true"></td>
                                            <td contenteditable="true"></td>
                                            <td contenteditable="true"></td>
                                            <td contenteditable="true"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>I. Academic Preparation in addition to the minimum <br>
                                                requirements of a Bachelor's Degree and/or <br>
                                                Licensure (if applicable)
                                            </strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td class="text-center"><strong>5</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>A. Academic Units earned towards Masteral <br>
                                            Degree; (1 pt. for every 9 units earned towards <br>
                                            Masteral Degree; + 1 pt. for MA Compre; <br>
                                            + 1 pt. for MA without S.O.)</td>
                                            <td contenteditable="true"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B. Additional Degree: B.S.</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>C. Special training or studies/seminar-workshop <br>
                                                related to one's area of specialization but not <br>
                                                part of a degree program ( 1 pt. for every training <br>
                                                or special studies of not less than 24 hours)</td>
                                            <td contenteditable="true"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                        
                                       
                                    </tbody>
                                </table>
                            
                            </div>


                            <div class="tab-pane fade" id="content2" role="tabpanel">


                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <!-- II. -->

                                        <tr>
                                            <td><strong>II. Professional Practice & Leadership
                                            </strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td  class="text-center"><strong>20</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>A. Length of service <br>
                                                For every year of full-time service in Columban <br>
                                                College</td>
                                            <td contenteditable="true"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>For evry year of full-time service in CESDI <br>
                                                schools</td>
                                            <td contenteditable="true"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B. Administration Experiences (1 pt. for every year of <br>
                                                service in Columban College)</td>
                                            <td contenteditable="true"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                       
                                       
                                    </tbody>
                                </table>
                            
                            </div>


                            <div class="tab-pane fade" id="content3" role="tabpanel">


                                <!-- III. -->
    
    
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        <tr>
                                            <td><strong>III. Work Efficiency
                                            </strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td  class="text-center"><strong>20</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr>
                                            <td class="text-start">Excellent <span class="float-end">4.01 - 5.0</span></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Very Good <span class="float-end">3.01 - 4.0</span></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Good <span class="float-end">2.01 - 3.0</span></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Fair <span class="float-end">1.01 - 2.0</span></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">Poor <span class="float-end">0.01 - 1.0</span></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupIIIWE" value="1"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
    
    
    
                            </div>


                            <div class="tab-pane fade" id="content4" role="tabpanel">

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- IV. -->
    
                                        <tr>
                                            <td><strong>IV. Special Services to the College and/or <br>
                                                        Department
                                            </strong></td>
                                            <td  class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td  class="text-center"><strong>2</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr>
                                            <td class="text-start">- Membership in School Committees <span class="float-end">(1)</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">- Chairmanship in School Committees <span class="float-end">(1)</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            </div>


                            <div class="tab-pane fade" id="content5" role="tabpanel">

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        <!-- V. -->
    
                                        <tr>
                                            <td><strong>V. School Community Involvement
                                            </strong></td>
                                            <td  class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td  class="text-center"><strong>2</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr>
                                            <td class="text-start">A. In-School Activity Attendance to: <span class="float-end">(1)</span></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Institutional Orientation/Seminars</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Departmental In-Service
                                                                Seminars (at least 2/year, at
                                                                least half-day seminar)</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Retreat/ Recollection</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- First Friday Masses</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Sportfest</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Foundation Day</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Christmas Party</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Teacher's Day</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Graduation Exercises</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr>
                                            <td class="text-start">B. Out-of-School Activities<span class="float-end">(1)</span></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Membership and Active Involvement in 
                                                socio-civic, religious organizations</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Community Extension Services</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Departmental Community Extension Services Program</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Clean and Green Program</td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
    
                            </div>



                            <div class="tab-pane fade" id="content6" role="tabpanel">

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Remarks</th>
                                            <th>Earned Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    
                                        <!-- VI. -->
    
                                        <tr>
                                            <td><strong>VI. Commitment to the College's Purposes and Objectives
                                            </strong></td>
                                            <td  class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td  class="text-center"><strong>1</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                        <tr>
                                            <td class="ps-4">- Attendance in Annual Retreats/ Recollections<span class="float-end">0.25</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Attendance in Seminars or further studies<span class="float-end">0.25</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Participation in the Community Outreach Program of the College<span class="float-end">0.25</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">- Participation in the Clean Green Program of the College<span class="float-end">0.25</span></td>
                                            <td   class="text-center"><input type="checkbox" id="three-points" name="options"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
    
    
                                        <!-- TOTAL -->
    
                                        <tr>
                                            <td><strong>TOTAL
                                            </strong></td>
                                            <td  class="text-center"><input type="radio" id="fifty-points" name="group" value="1"></td>
                                            <td><strong>50</strong></td>
                                            <td></td>
                                        </tr>
    
    
                                        <!-- RANK -->
    
                                        <tr>
                                            <td><strong>Rank:
                                            </strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
    
                                    </tbody>
                                </table>
    
                            </div>


                        </div>

                    
                    </div>

                </div>

</div>

    </x-admin-ems-layout>