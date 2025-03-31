
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
                                        <td class="text-center"><input type="radio" name="bachelor_degree" value="20"></td>
                                        <td class="text-center"><strong>(50 pts maximum)</strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Bachelor's Degree</td>
                                        <td class="text-center"><input type="radio" name="bachelor_degree" value="20"></td>
                                        <td class="text-center">20 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Academic Units towards Master's Degree (last 3 years) for every 6 Units</td>
                                        <td><input type="number" name="masters_academic_units" class="form-control" placeholder="Units"></td>
                                        <td class="text-center">6 units = 1 pt</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>MA/MS/MAT/MBA/MPM (Candidate): Completed Academic Requirements</td>
                                        <td class="text-center"><input type="radio" name="masters_candidate" value="25"></td>
                                        <td class="text-center">25 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Master's Thesis defended without S.O.</td>
                                        <td class="text-center"><input type="radio" name="masters_thesis" value="28"></td>
                                        <td class="text-center">28 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Full-fledged Master's Degree</td>
                                        <td class="text-center"><input type="radio" name="full_masters" value="30"></td>
                                        <td class="text-center">30 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Academic Units earned towards Doctorate Degree (last 3 years) for every 6 Units</td>
                                        <td><input type="number" name="doctorate_academic_units" class="form-control" placeholder="Units"></td>
                                        <td class="text-center">6 units = 1 pt</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Ph.D./Ed.D. (Candidate): Completed Academic Requirements</td>
                                        <td class="text-center"><input type="radio" name="doctorate_candidate" value="40"></td>
                                        <td class="text-center">40 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Doctorate Dissertation defended without S.O.</td>
                                        <td class="text-center"><input type="radio" name="doctorate_dissertation" value="45"></td>
                                        <td class="text-center">45 pts</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Full-fledged Doctorate Degree</td>
                                        <td class="text-center"><input type="radio" name="full_doctorate" value="50"></td>
                                        <td class="text-center">50 pts</td>
                                        <td></td>
                                    </tr>
                            
                                    <tr>
                        <td><strong>B. Additional Degrees</strong></td>
                        <td class="text-center"><input type="radio" name="another_bachelors" value="4"></td>
                        <td class="text-center"><strong>(10 pts maximum)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Another Bachelor's Degree</td>
                        <td class="text-center"><input type="radio" name="another_bachelors" value="4"></td>
                        <td class="text-center">4 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Another Master's Degree - Full Pledged</td>
                        <td class="text-center"><input type="radio" name="another_masters" value="6"></td>
                        <td class="text-center">6 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Another Doctorate Degree - Full Pledged</td>
                        <td class="text-center"><input type="radio" name="another_doctorate" value="10"></td>
                        <td class="text-center">10 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Two or more degrees</td>
                        <td class="text-center"><input type="radio" name="multiple_degrees" value="10"></td>
                        <td class="text-center">10 pts</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><strong>C. Additional Training</strong></td>
                        <td class="text-center"></td>
                        <td class="text-center"><strong>(10 pts maximum)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Advanced/Special training in related field to one's teaching/assignment (3 weeks maximum)</td>
                        <td contenteditable="true" name="advanced_special_training"></td>
                        <td class="text-center">2pts/ training</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Travel related to one's field/present assignment and Scholarship/Study Grant (Domestic Abroad)</td>
                        <td class="text-center"><input type="radio" name="travel_study_grant" value="5"></td>
                        <td class="text-center">5 pts pro-rated</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Seminars/Workshops/Conventions/Conferences (cumulative)</td>
                        <td contenteditable="true" name="seminars_workshops"></td>
                        <td class="text-center">.33 pt/day or 1 pt/3 days</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>18 units of Professional Education Subjects</td>
                        <td class="text-center"><input type="radio" name="professional_education_units" value="5"></td>
                        <td class="text-center">5 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Plumbing Licenses</td>
                        <td class="text-center"><input type="radio" name="plumbing_license" value="5"></td>
                        <td class="text-center">5 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Certificate of Completion</td>
                        <td class="text-center"><input type="radio" name="certificate_completion" value="3"></td>
                        <td class="text-center">3 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>National Certificate</td>
                        <td class="text-center"><input type="radio" name="national_certificate" value="5"></td>
                        <td class="text-center">5 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Trainor's Methodology Certificate</td>
                        <td class="text-center"><input type="radio" name="trainors_methodology" value="10"></td>
                        <td class="text-center">10 pts</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><strong>D. Government Examinations Passed/Eligibility</strong></td>
                        <td class="text-center"></td>
                        <td class="text-center"><strong>(20 pts maximum)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Teachers Board (LET)</td>
                        <td class="text-center"><input type="radio" name="groupD" value="20"></td>
                        <td class="text-center">20 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>CS Certification Eligibility/Career Professional</td>
                        <td class="text-center"><input type="radio" name="groupD" value="15"></td>
                        <td class="text-center">15 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bar/CPA/MD/DM/DV/Engineering etc.</td>
                        <td class="text-center"><input type="radio" name="groupD" value="20"></td>
                        <td class="text-center">20 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>E. Academic Honors/Awards Received</strong></td>
                        <td class="text-center"></td>
                        <td class="text-center"><strong>(10 pts maximum)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Board/Bar Placer</td>
                        <td class="text-center"><input type="radio" name="groupE" value="10"></td>
                        <td class="text-center">10 pts</td>
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
                        <td class="text-center"><input type="radio" name="groupE" value="3"></td>
                        <td class="text-center">3 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">Regional</td>
                        <td class="text-center"><input type="radio" name="groupE" value="5"></td>
                        <td class="text-center">5 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">National/International</td>
                        <td class="text-center"><input type="radio" name="groupE" value="10"></td>
                        <td class="text-center">10 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">Summa Cum Laude</td>
                        <td class="text-center"><input type="radio" name="groupE" value="10"></td>
                        <td class="text-center">10 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">Magna Cum Laude</td>
                        <td class="text-center"><input type="radio" name="groupE" value="8"></td>
                        <td class="text-center">8 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">Cum Laude</td>
                        <td class="text-center"><input type="radio" name="groupE" value="6"></td>
                        <td class="text-center">6 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="ps-4">With Distinction</td>
                        <td class="text-center"><input type="radio" name="groupE" value="3"></td>
                        <td class="text-center">3 pts</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL CREDIT POINTS EARNED (I)</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalPoints"><strong>0</strong></td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL CREDIT POINTS EARNED x 30%</strong></td>
                        <td></td>
                        <td></td>
                        <td id="totalPercentage"><strong>0</strong></td>
                    </tr>
                    </table>
</div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to calculate total points
        function calculateTotalPoints() {
            let totalPoints = 0;

            // Loop through each radio button input and calculate selected values
            document.querySelectorAll('input[type="radio"]:checked').forEach(function (radio) {
                totalPoints += parseInt(radio.value);
            });

            // Update total points
            document.getElementById('totalPoints').innerText = totalPoints;

            // Calculate the total percentage (total points x 30%)
            let totalPercentage = totalPoints * 0.30;
            document.getElementById('totalPercentage').innerText = totalPercentage.toFixed(2);
        }

        // Attach event listeners to all inputs (radio and number) for change
        document.querySelectorAll('input[type="radio"], input[type="number"]').forEach(function (input) {
            input.addEventListener('change', calculateTotalPoints);
        });

        // Initial calculation on page load
        calculateTotalPoints();
    });
</script><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ems/ems-ranking-faculty-1.blade.php ENDPATH**/ ?>