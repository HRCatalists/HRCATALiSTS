<?php if (isset($component)) { $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48 = $attributes; } ?>
<?php $component = App\View\Components\AdminEmsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ems-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminEmsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | ATS Calendar
     <?php $__env->endSlot(); ?>

    <div class="d-flex">
    <?php if (isset($component)) { $__componentOriginald5876c07269e58343b8102e8c5f829ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5876c07269e58343b8102e8c5f829ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ats.ats-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ats.ats-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $attributes = $__attributesOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__attributesOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $component = $__componentOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__componentOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
    </div>

     
    <!-- Profile Content -->
    <div class="d-flex">
      
    
        <!-- Profile Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">

                <div>

                    <div class="container mt-5">

                        <div class="d-flex justify-content-center mb-4">
                            <h2 class="db-h2">FACULTY RANKING SYSTEM</h2>   
                        </div>
    
                        <div class="container">
    
                            <div class="search-container ">
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
    
                                <label class="fw-bold me-2" for="inlusiveDate">Academic Year: </label>
    
                                <input type="number" id="inlusiveDate" class="form-control me-2 year-input">
                                <span class="fw-bold me-2">to</span>
                                <input type="number" id="inlusiveDate" class="form-control me-2 year-input">
    
                            </div>
                        </div>
    
                    </div>

                    <div>
                        
                        <div class="d-flex justify-content-end mb-3">
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
                                <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content5" role="tab">SUMMARY</a>
                                </li>
                        </ul>

                        <!-- Tab content -->
                        <div class="tab-content" id="myTabContent">
                            
                            <div class="tab-pane fade show active" id="content1" role="tabpanel">

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Action</th>
                                            <th>Credit Points</th>
                                            <th>Weights</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>I. ACADEMIC PREPARATION & OTHER QUALIFICATIONS</strong></td>
                                            <td></td>
                                            <td><strong>100 POINTS</strong></td>
                                            <td><strong>x 30%</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>A. Educational Degrees</strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center"><strong>(50 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Bachelor's Degree</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">20 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Academic Units towards Master's Degree (last 3 years) for every 6 Units</td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">6 units = 1 pt</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>MA/MS/MAT/MBA/MPM (Candidate): Completed Academic Requirements</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">25 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Master's Thesis defended without S.O.</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">28 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Full-fledged Master's Degree</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">30 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Academic Units earned towards Doctorate Degree (last 3 years) for every 6 Units</td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">6 units = 1 pt</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Ph.D./Ed.D. (Candidate): Completed Academic Requirements</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">40 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Doctorate Dissertation defended without S.O.</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">45 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Full-fledged Doctorate Degree</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupA" value="1"></td>
                                            <td  class="text-center">50 pts</td>
                                            <td></td>
                                        </tr>

                                        <!-- LETTER B -->
                                        <tr>
                                            <td><strong>B. Additional Degrees</strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupB" value="1"></td>
                                            <td  class="text-center"><strong>(10 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Another Bachelor's Degree</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupB" value="1"></td>
                                            <td  class="text-center">4 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Another Master's Degree - Full Pledged</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupB" value="1"></td>
                                            <td  class="text-center">6 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Another Doctorate Degree - Full Pledged</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupB" value="1"></td>
                                            <td  class="text-center">10 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Two or more degrees</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupB" value="1"></td>
                                            <td  class="text-center">10 pts</td>
                                            <td></td>
                                        </tr>

                                        <!-- LETTER C -->
                                        <tr>
                                            <td><strong>C. Additional Training</strong></td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center"><strong>(10 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Advanced/Special training in related field to one's teaching/ 
                                                assignment (3 weeks maximum)
                                            </td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">2pts/ training</td>
                                            <td></td>
                                        </tr>



                                        <tr>
                                            <td>Travel related to one's field/present assignment and Scholarship/Study Grant (Domestic Abroad)</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">5 pts pro-rated</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Seminars/Workshops/Conventions/Conferences (cumulative)</td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">.33 pt/day or 1 pt/3 days</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>18 units of Professional Education Subjects</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Plumbing Licenses</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Certificate of Completion</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">3 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>National Certificate</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Trainor's Methodology Certificate</td>
                                            <td   class="text-center"><input type="radio" id="fifty-points" name="groupC" value="1"></td>
                                            <td  class="text-center">10 pts</td>
                                            <td></td>
                                        </tr>

                                        <!-- LETTER D -->
                                        <tr>
                                            <td><strong>D. Government Examinations Passed/Eligibility</strong></td>
                                            <td  class="text-center"><input type="radio" id="twenty-points" name="groupD" value="1" ></td>
                                            <td  class="text-center"><strong>(20 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Teachers Board (LET)</td>
                                            <td  class="text-center"><input type="radio" id="twenty-points" name="groupD" value="1" ></td>
                                            <td  class="text-center">20 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CS Certification Eligibility/Career Professional</td>
                                            <td  class="text-center"><input type="radio" id="twenty-points" name="groupD" value="1" ></td>
                                            <td  class="text-center">15 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Bar/CPA/MD/DM/DV/Engineering etc.</td>
                                            <td  class="text-center"><input type="radio" id="twenty-points" name="groupD" value="1" ></td>
                                            <td  class="text-center">20 pts</td>
                                            <td></td>
                                        </tr>

                                        <!-- LETTER E -->
                                        <tr>
                                            <td><strong>E. Academic Honors/Awards Received</strong></td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center"><strong>(10 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Board/Bar Placer</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">10 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Awards:</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Local</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">3 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Regional</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">National/International</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">1o pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Summa Cum Laude</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">10 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Magna Cum Laude</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">8 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Cum Laude</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">6 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">With Distinction</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupE" value="1" ></td>
                                            <td  class="text-center">3 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED (I)</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED x 30%</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>


                            <!-- TEACHING EXPERIENCE AND PROFESSIONAL/ WORK EXPERIENCE -->

                            <div class="tab-pane fade" id="content2" role="tabpanel">

                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Weights</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>II. TEACHING EXPERIENCE AND PROFESSIONAL/ WORK EXPERIENCE</strong></td>
                                            <td></td>
                                            <td><strong>100 POINTS</strong></td>
                                            <td><strong>x 20%</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>A. Teacher Experience</strong></td>
                                            <td   class="text-center"><input type="radio" id="sixty-points" name="group" value="1"></td>
                                            <td><strong>(60 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Every year of full-time teaching in CC</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIA" value="1" ></td>
                                            <td  class="text-center">2 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Every year of full-time teaching in other schools</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIA" value="1" ></td>
                                            <td  class="text-center">1 pt</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Every year of part-time teaching in CC</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIA" value="1" ></td>
                                            <td  class="text-center">1/2 pt</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Every year of part-time teaching in other schools</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIA" value="1" ></td>
                                            <td  class="text-center">1/4 pt</td>
                                            <td></td>
                                        </tr>

                                        <!-- LETTER B -->

                                        <tr>
                                            <td><strong>B. Professional Growth and Leadership</strong></td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB" value="1" ></td>
                                            <td><strong>(40 pts maximum)</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B.1 Research Output (Class Based; School Based; Community based)</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB1" value="1" ></td>
                                            <td  class="text-center">15 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B.2 Publication/ Scholarly Ability</td>
                                            <td   class="text-center"><input type="radio" id="fifteen-points" name="group" value="1"></td>
                                            <td  class="text-center">(15 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Teaching/ Course Module</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB2" value="1" ></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Workbook/ Lab Manual/ Textbook/ Reference Book</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB2" value="1" ></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Research/ Professional Articles</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB2" value="1" ></td>
                                            <td  class="text-center">2 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Editorship of professional journals</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB2" value="1" ></td>
                                            <td  class="text-center">2 pts</td>
                                            <td></td>
                                        </tr>

                                        <!-- B.3 -->


                                        <tr>
                                            <td>B.3 Participation in Area/Dept/Program Dev't. (Ranking; Research; Sportfest; 
                                                Institutional Planning; Accreditation Process etc.) as: </td>
                                            <td   class="text-center"><input type="radio" id="five-points" name="group" value="1"></td>
                                            <td  class="text-center">(5 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Chairman</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB3" value="1" ></td>
                                            <td  class="text-center">5 pts</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">Member</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIB3" value="1" ></td>
                                            <td  class="text-center">3 pts</td>
                                            <td></td>
                                        </tr>


                                        <!-- B.4 -->


                                        <tr>
                                            <td>B.4 Professional Leadership</td>
                                            <td   class="text-center"><input type="radio" id="five-points" name="group" value="1"></td>
                                            <td  class="text-center">(5 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">B.4.1 Resource person as consultant/facilitator</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4"><div class="ps-4">Within the School</div></td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">1 pt/ activity</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4"><div class="ps-4">Outside the school/RQAT</div></td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">1 pt/ activity</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">B.4.2 Involvement/ Membership in educational, culturals, religious or similar nationally/ 
                                                internationally recognized organization as:</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4"><div class="ps-4">Officer/ National Accreditor</div></td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">2 pts/ year</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4"><div class="ps-4">Member (last 3 years)</div></td>
                                            <td contenteditable="true"></td>
                                            <td class="text-center">1 pt/ year</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED (II)</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED x 20%</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                    </tbody>
                                </table>
                                
                            </div>



                            <!-- FACULTY PERFORMANCE AS A PROFESSIONAL EDUCATOR -->

                            <div class="tab-pane fade" id="content3" role="tabpanel">
                                
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Weights</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>III. FACULTY PERFORMANCE AS A PROFESSIONAL EDUCATOR</strong></td>
                                            <td></td>
                                            <td><strong>100 POINTS</strong></td>
                                            <td><strong>x 35%</strong></td>
                                        </tr>
                                        <tr>
                                            <td>A. Classroom/ Teacher Performance Evaluation (seperate evaluation instrument of Dean, 
                                                Director/ Chairperson/ Coordinator, and Student)</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIIA" value="1" ></td>
                                            <td  class="text-center">(50 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B. Work Performance Evaluation (seperate evaluation instrument)</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIIIB" value="1" ></td>
                                            <td  class="text-center">(50 pts maximum)</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED (II)</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED x 35%</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>


                            <!-- CORPORATE COMMITMENT (IN/ OFF CAMPUS) SERVICES -->

                            <div class="tab-pane fade" id="content4" role="tabpanel">
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Actions</th>
                                            <th>Credit Points</th>
                                            <th>Weights</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>IV. CORPORATE COMMITMENT (IN/ OFF CAMPUS) SERVICES</strong></td>
                                            <td></td>
                                            <td><strong>100 POINTS</strong></td>
                                            <td><strong>x 15%</strong></td>
                                        </tr>
                                        <tr>
                                            <td>A. Attendance in school-sponsored activities (in-house seminars, retreat/ recollection, 
                                                masses, meetings, graduations, etc.)</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIVA" value="1" ></td>
                                            <td  class="text-center">(30 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>B. Committee Involvement/ voluntary services beyond call of duty 
                                                (school or student activities outside hours without pay or honorarium)</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIVB" value="1" ></td>
                                            <td  class="text-center">(30 pts maximum)</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>C. Participation in the CC-Community Extension Program</td>
                                            <td  class="text-center"><input type="radio" id="ten-points" name="groupIVC" value="1" ></td>
                                            <td  class="text-center">(40 pts maximum)</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED (II)</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TOTAL CREDIT POINTS EARNED x 35%</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>


                            <!-- SUMMARY -->

                            <div class="tab-pane fade" id="content5" role="tabpanel">
                                
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="4">SUMMARY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Job Factors</th>
                                            <th>Credit</th>
                                            <th>Weight</th>
                                            <th>Rating</th>
                                        </tr>

                                        <tr>
                                            <td>I. Academy Preparation & Other Qualifications</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>II. Teaching Experience 7 Professional/ Work Experience</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>III. Faculty Performance as a Professional Educator</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td>IV. Corporate Commitment (In/ Off Campus Service)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td class="text-end" colspan="3"><strong>OVERALL RATING</strong></td>
                                            <td></td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="text-start" colspan="3">PREVIOUS RANK: </td>
                                            <td></td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="text-end" colspan="3"><strong>RANK</strong></td>
                                            <td></td>
                                            
                                        </tr>

                                        <tr>
                                            <td class="text-start" colspan="4"><strong>N.B. Credit points/ rank will be
                                                effective only upon submission of supporting documents on specified date.
                                            </strong></td>
                                            
                                        </tr>

                                        
                                    </tbody>
                                </table>    


                            </div>

                        </div>

                    
                    </div>

                </div>

                

                        

            </div>
        </div>

    </div>


        <script src="js/ranking-system.js"></script>

    <!-- FullCalendar Script -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('main-calendar');
            // var reminderListEl = document.getElementById('reminderList');
    
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                eventDidMount: function (info) {
                    let tooltip = document.createElement("div");
                    tooltip.classList.add("fc-tooltip");
                    tooltip.innerHTML = `<strong>Time:</strong> ${info.event.extendedProps.event_time} <br> 
                                         <strong>Description:</strong> ${info.event.extendedProps.description}`;
                    document.body.appendChild(tooltip);
    
                    info.el.addEventListener("mouseenter", function (event) {
                        tooltip.style.display = "block";
                        tooltip.style.left = event.pageX + 10 + "px";
                        tooltip.style.top = event.pageY + 10 + "px";
                    });
    
                    info.el.addEventListener("mouseleave", function () {
                        tooltip.style.display = "none";
                    });
                },
                events: function (fetchInfo, successCallback, failureCallback) {
                    fetch("<?php echo e(route('events.index')); ?>")
                        .then(response => response.json())
                        .then(events => {
                            let today = new Date(); // Get today's date with timezone correction
                            today.setHours(0, 0, 0, 0); // Normalize time to avoid timezone issues

                            let formattedEvents = events.map(event => {
                                let eventDate = new Date(event.event_date); // Convert event date to Date object
                                eventDate.setHours(0, 0, 0, 0); // Normalize time for accurate comparison

                                let eventColor = "#28A745"; // Default (Future Events)

                                if (eventDate < today) {
                                    eventColor = "#FFA500"; // Past Events (Orange)
                                } else if (eventDate.getTime() === today.getTime()) {
                                    eventColor = "#007BFF"; // Today's Events (Blue)
                                }

                                return {
                                    id: event.id,
                                    title: event.title,
                                    start: event.event_date,
                                    event_time: event.event_time,
                                    description: event.description,
                                    backgroundColor: eventColor, // ✅ Set event color dynamically
                                    borderColor: eventColor
                                };
                            });

                            successCallback(formattedEvents);
                        })
                        .catch(error => failureCallback(error));
                },
                dateClick: function (info) {
                    Swal.fire({
                        title: 'Add New Event',
                        html: `
                            <input type="text" id="swal-title" class="swal2-input" placeholder="Event Title">
                            <input type="text" id="swal-description" class="swal2-input" placeholder="Event Description">
                            <input type="time" id="swal-time" class="swal2-input">
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Add Event',
                        cancelButtonText: 'Cancel',
                        preConfirm: () => {
                            let title = document.getElementById('swal-title').value.trim();
                            let description = document.getElementById('swal-description').value.trim();
                            let eventTime = document.getElementById('swal-time').value || "00:00";

                            if (!title) {
                                Swal.showValidationMessage('Title is required!');
                                return false;
                            }
                            return { title, description, eventTime };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("<?php echo e(route('events.store')); ?>", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    title: result.value.title,
                                    description: result.value.description || "No description",
                                    event_date: info.dateStr,
                                    event_time: result.value.eventTime
                                })
                            })
                            .then(response => response.json().then(data => ({ status: response.status, body: data }))) // Capture both status & body
                            .then(({ status, body }) => {
                                console.log("Server Response:", status, body); // Log to inspect response

                                if (status === 201 || body.success) {
                                    Swal.fire('Success!', 'Event added successfully!', 'success');
                                    calendar.refetchEvents();
                                } else {
                                    Swal.fire('Error!', body.message || 'Failed to add event.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error("Fetch Error:", error);
                                Swal.fire('Error!', 'Something went wrong. Check console for details.', 'error');
                            });
                        }
                    });
                }
            });
    
            calendar.render();
    
            // Form submission for adding events
            eventForm.addEventListener('submit', function (event) {
                event.preventDefault();

                let formData = {
                    title: document.getElementById('title').value,
                    description: document.getElementById('description').value,
                    event_date: document.getElementById('event_date').value,
                    event_time: document.getElementById('event_time').value
                };

                fetch("<?php echo e(route('events.store')); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data }))) // Capture both status & body
                .then(({ status, body }) => {
                    console.log("Server Response:", status, body); // Log response

                    if (status === 201 || body.success) {
                        Swal.fire('Success!', 'Event added successfully!', 'success');
                        calendar.refetchEvents(); // ✅ Refresh calendar events
                        eventForm.reset(); // ✅ Clear form fields
                    } else {
                        Swal.fire('Error!', body.message || 'Failed to add event.', 'error');
                    }
                })
                .catch(error => {
                    console.error("Fetch Error:", error);
                    Swal.fire('Error!', 'Something went wrong. Check console for details.', 'error');
                });
            });
    
            // Initialize DataTable
            var eventTable = $('#eventTable').DataTable();

            // Event delegation for delete buttons
            $('#eventTable tbody').on('click', '.delete-btn', function () {
                var button = $(this);
                var eventId = button.data('id');
                var row = button.closest('tr');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This event will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>'); // Show loading spinner

                        fetch(`/events/${eventId}`, {
                            method: 'DELETE',
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Event has been removed.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                eventTable.row(row).remove().draw(); // Remove row from DataTable
                                calendar.refetchEvents(); // Refresh calendar events
                            } else {
                                Swal.fire('Error!', data.error || 'Could not delete event.', 'error');
                                button.prop('disabled', false).html('<i class="fas fa-trash-alt"></i>'); // Restore delete button
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                            button.prop('disabled', false).html('<i class="fas fa-trash-alt"></i>');
                        });
                    }
                });
            });
        });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $attributes = $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $component = $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ems/admin-ems-faculty-ranking.blade.php ENDPATH**/ ?>