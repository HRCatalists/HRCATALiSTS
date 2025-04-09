<!-- Ensure this meta tag is in your layout's head -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Faculty Rank 1 Partial Form -->
<div class="tab-pane fade show active" id="content1" role="tabpanel">
  <!-- Hidden field for emp_id; ensure that $faculty is passed to the view -->
  <input type="hidden" name="emp_id" id="rank1_emp_id" value="{{ $faculty->emp_id ?? '' }}">


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
      <!-- I. ACADEMIC PREPARATION & OTHER QUALIFICATIONS -->
      <tr>
        <td colspan="4"><strong>I. ACADEMIC PREPARATION & Other Qualifications</strong></td>
      </tr>
      <!-- A. Educational Degrees (cap 50 pts) -->
      <tr>
        <td colspan="4"><strong>A. Educational Degrees (50 pts max)</strong></td>
      </tr>
      <tr>
        <td>Bachelor's Degree</td>
        <td class="text-center">
          <input type="checkbox" name="bachelor_degree" value="20" 
          {{ isset($faculty) && $faculty->bachelor_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">20 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Academic Units toward Master's Degree (enter units; 6 units = 1 pt)</td>
        <td>
          <input type="number" name="academic_units_master_degree" class="form-control" placeholder="Units" 
          value="{{ $faculty->academic_units_master_degree ?? '' }}">
        </td>
        <td class="text-center">Calculated</td>
        <td></td>
      </tr>
      <tr>
        <td>MA/MS/MAT/MBA/MPM (Candidate): Completed Academic Requirements</td>
        <td class="text-center">
          <input type="checkbox" name="ma_ms_candidate" value="25" 
          {{ isset($faculty) && $faculty->ma_ms_candidate ? 'checked' : '' }}>
        </td>
        <td class="text-center">25 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Master's Thesis defended without S.O.</td>
        <td class="text-center">
          <input type="checkbox" name="masters_thesis_completed" value="28" 
          {{ isset($faculty) && $faculty->masters_thesis_completed ? 'checked' : '' }}>
        </td>
        <td class="text-center">28 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Full-fledged Master's Degree</td>
        <td class="text-center">
          <input type="checkbox" name="full_master_degree" value="30" 
          {{ isset($faculty) && $faculty->full_master_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">30 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Academic Units toward Doctorate Degree (enter units; 6 units = 1 pt)</td>
        <td>
          <input type="number" name="academic_units_doctorate_degree" class="form-control" placeholder="Units" 
          value="{{ $faculty->academic_units_doctorate_degree ?? '' }}">
        </td>
        <td class="text-center">Calculated</td>
        <td></td>
      </tr>
      <tr>
        <td>Ph.D./Ed.D. (Candidate): Completed Academic Requirements</td>
        <td class="text-center">
          <input type="checkbox" name="phd_education" value="40" 
          {{ isset($faculty) && $faculty->phd_education ? 'checked' : '' }}>
        </td>
        <td class="text-center">40 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Doctorate Dissertation defended without S.O.</td>
        <td class="text-center">
          <input type="checkbox" name="doctorate_dissertation_completed" value="45" 
          {{ isset($faculty) && $faculty->doctorate_dissertation_completed ? 'checked' : '' }}>
        </td>
        <td class="text-center">45 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Full-fledged Doctorate Degree</td>
        <td class="text-center">
          <input type="checkbox" name="full_doctorate_degree" value="50" 
          {{ isset($faculty) && $faculty->full_doctorate_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">50 pts</td>
        <td></td>
      </tr>
      <!-- B. Additional Degrees (cap 10 pts) -->
      <tr>
        <td colspan="4"><strong>B. Additional Degrees (10 pts max)</strong></td>
      </tr>
      <tr>
        <td>Another Bachelor's Degree</td>
        <td class="text-center">
          <input type="checkbox" name="additional_bachelor_degree" value="4" 
          {{ isset($faculty) && $faculty->additional_bachelor_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">4 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Another Master's Degree - Full Pledged</td>
        <td class="text-center">
          <input type="checkbox" name="additional_master_degree" value="6" 
          {{ isset($faculty) && $faculty->additional_master_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">6 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Another Doctorate Degree - Full Pledged</td>
        <td class="text-center">
          <input type="checkbox" name="additional_doctorate_degree" value="10" 
          {{ isset($faculty) && $faculty->additional_doctorate_degree ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Two or more degrees</td>
        <td class="text-center">
          <input type="checkbox" name="multiple_degrees" value="10" 
          {{ isset($faculty) && $faculty->multiple_degrees ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <!-- C. Additional Training (cap 10 pts) -->
      <tr>
        <td colspan="4"><strong>C. Additional Training (10 pts max)</strong></td>
      </tr>
      <tr>
        <td>Advanced/Special training in related field (3 weeks maximum)</td>
        <td class="text-center">
          <input type="checkbox" name="specialized_training" value="2" 
          {{ isset($faculty) && $faculty->specialized_training ? 'checked' : '' }}>
        </td>
        <td class="text-center">2 pts per training</td>
        <td></td>
      </tr>
      <tr>
        <td>Travel related to field/assignment and Scholarship/Study Grant (Domestic Abroad)</td>
        <td class="text-center">
          <input type="checkbox" name="travel_grant_for_study" value="5" 
          {{ isset($faculty) && $faculty->travel_grant_for_study ? 'checked' : '' }}>
        </td>
        <td class="text-center">5 pts pro-rated</td>
        <td></td>
      </tr>
      <tr>
        <td>Seminars/Workshops/Conventions/Conferences (enter days attended)</td>
        <td>
          <input type="number" name="seminars_attended" class="form-control" placeholder="Days" 
          value="{{ $faculty->seminars_attended ?? '' }}">
        </td>
        <td class="text-center">.33 pt per day</td>
        <td></td>
      </tr>
      <tr>
        <td>18 units of Professional Education Subjects</td>
        <td class="text-center">
          <input type="checkbox" name="professional_education_units" value="5" 
          {{ isset($faculty) && $faculty->professional_education_units ? 'checked' : '' }}>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Plumbing Licenses</td>
        <td class="text-center">
          <input type="checkbox" name="plumbing_certification" value="5" 
          {{ isset($faculty) && $faculty->plumbing_certification ? 'checked' : '' }}>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Certificate of Completion</td>
        <td class="text-center">
          <input type="checkbox" name="certificate_of_completion" value="3" 
          {{ isset($faculty) && $faculty->certificate_of_completion ? 'checked' : '' }}>
        </td>
        <td class="text-center">3 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>National Certificate</td>
        <td class="text-center">
          <input type="checkbox" name="national_certification" value="5" 
          {{ isset($faculty) && $faculty->national_certification ? 'checked' : '' }}>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Trainor's Methodology Certificate</td>
        <td class="text-center">
          <input type="checkbox" name="trainers_methodology" value="10" 
          {{ isset($faculty) && $faculty->trainers_methodology ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <!-- D. Government Examinations (cap 20 pts) -->
      <tr>
        <td colspan="4"><strong>D. Government Examinations Passed/Eligibility (20 pts max)</strong></td>
      </tr>
      <tr>
        <td>Teachers Board (LET)</td>
        <td class="text-center">
          <input type="checkbox" name="teachers_board_certified" value="20" 
          {{ isset($faculty) && $faculty->teachers_board_certified ? 'checked' : '' }}>
        </td>
        <td class="text-center">20 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>CS Certification Eligibility/Career Professional</td>
        <td class="text-center">
          <input type="checkbox" name="career_service_certification" value="15" 
          {{ isset($faculty) && $faculty->career_service_certification ? 'checked' : '' }}>
        </td>
        <td class="text-center">15 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Bar/CPA/MD/DM/DV/Engineering etc.</td>
        <td class="text-center">
          <input type="checkbox" name="bar_exam_certification" value="20" 
          {{ isset($faculty) && $faculty->bar_exam_certification ? 'checked' : '' }}>
        </td>
        <td class="text-center">20 pts</td>
        <td></td>
      </tr>
      <!-- E. Academic Honors/Awards (cap 10 pts) -->
      <tr>
        <td colspan="4"><strong>E. Academic Honors/Awards Received (10 pts max)</strong></td>
      </tr>
      <tr>
        <td>Board/Bar Placer</td>
        <td class="text-center">
          <input type="checkbox" name="board_exam_placer" value="10" 
          {{ isset($faculty) && $faculty->board_exam_placer ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Awards - Local</td>
        <td class="text-center">
          <input type="checkbox" name="local_awards" value="3" 
          {{ isset($faculty) && $faculty->local_awards ? 'checked' : '' }}>
        </td>
        <td class="text-center">3 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Awards - Regional</td>
        <td class="text-center">
          <input type="checkbox" name="regional_awards" value="5" 
          {{ isset($faculty) && $faculty->regional_awards ? 'checked' : '' }}>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Awards - National/International</td>
        <td class="text-center">
          <input type="checkbox" name="national_awards" value="10" 
          {{ isset($faculty) && $faculty->national_awards ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Summa Cum Laude</td>
        <td class="text-center">
          <input type="checkbox" name="summa_cum_laude" value="10" 
          {{ isset($faculty) && $faculty->summa_cum_laude ? 'checked' : '' }}>
        </td>
        <td class="text-center">10 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Magna Cum Laude</td>
        <td class="text-center">
          <input type="checkbox" name="magna_cum_laude" value="8" 
          {{ isset($faculty) && $faculty->magna_cum_laude ? 'checked' : '' }}>
        </td>
        <td class="text-center">8 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>Cum Laude</td>
        <td class="text-center">
          <input type="checkbox" name="cum_laude" value="6" 
          {{ isset($faculty) && $faculty->cum_laude ? 'checked' : '' }}>
        </td>
        <td class="text-center">6 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>With Distinction</td>
        <td class="text-center">
          <input type="checkbox" name="with_distinction" value="3" 
          {{ isset($faculty) && $faculty->with_distinction ? 'checked' : '' }}>
        </td>
        <td class="text-center">3 pts</td>
        <td></td>
      </tr>
      <!-- Totals -->
      <tr>
        <td><strong>TOTAL CREDIT POINTS EARNED (I)</strong></td>
        <td id="totalPointsI"><strong>0</strong></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><strong>TOTAL CREDIT POINTS EARNED x 30%</strong></td>
        <td id="totalPercentageI"><strong>0</strong></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class="mt-4 text-center">
  <button id="saveButton" class="btn btn-primary">Save</button>
</div>
</div>
<!-- Save Button -->

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        // ✅ Populates Rank 1 form only
        window.populateFacultyForm = function (faculty) {
            const fields = [
                "bachelor_degree", "academic_units_master_degree", "ma_ms_candidate",
                "masters_thesis_completed", "full_master_degree", "academic_units_doctorate_degree",
                "phd_education", "doctorate_dissertation_completed", "full_doctorate_degree",
                "additional_bachelor_degree", "additional_master_degree", "additional_doctorate_degree",
                "multiple_degrees", "specialized_training", "travel_grant_for_study",
                "seminars_attended", "professional_education_units", "plumbing_certification",
                "certificate_of_completion", "national_certification", "trainers_methodology",
                "teachers_board_certified", "career_service_certification", "bar_exam_certification",
                "board_exam_placer", "local_awards", "regional_awards", "national_awards",
                "summa_cum_laude", "magna_cum_laude", "cum_laude", "with_distinction"
            ];

            fields.forEach(field => {
                const input = document.querySelector(`#content1 [name="${field}"]`);
                const value = faculty[field];
                if (!input) return;

                if (input.type === "checkbox") {
                    input.checked = Boolean(Number(value));
                } else {
                    input.value = value ?? "";
                }
            });

            updateTotalPoints(); // ✅ Recalculate total points
        };

        // ✅ Populates Rank 1 form only
        function updateTotalPoints() {
          const $ = (name) => document.querySelector(`#content1 [name="${name}"]`);
          let groupA = 0, groupB = 0, groupC = 0, groupD = 0, groupE = 0;

          // Group A: Degrees (Max 50)
          if ($("bachelor_degree")?.checked) groupA += 20;
          if ($("ma_ms_candidate")?.checked) groupA += 25;
          if ($("masters_thesis_completed")?.checked) groupA += 28;
          if ($("full_master_degree")?.checked) groupA += 30;
          if ($("phd_education")?.checked) groupA += 40;
          if ($("doctorate_dissertation_completed")?.checked) groupA += 45;
          if ($("full_doctorate_degree")?.checked) groupA += 50;

          groupA += (parseFloat($("academic_units_master_degree")?.value) || 0) / 6;
          groupA += (parseFloat($("academic_units_doctorate_degree")?.value) || 0) / 6;

          // // Group A: Degrees (Max 50, staged logic)
          // const degreeStages = [
          //   { checkbox: $("bachelor_degree"), points: 20 },
          //   { checkbox: $("ma_ms_candidate"), points: 25 },
          //   { checkbox: $("masters_thesis_completed"), points: 28 },
          //   { checkbox: $("full_master_degree"), points: 30 },
          //   { checkbox: $("phd_education"), points: 40 },
          //   { checkbox: $("doctorate_dissertation_completed"), points: 45 },
          //   { checkbox: $("full_doctorate_degree"), points: 50 }
          // ];

          // let highestStage = 0;
          // degreeStages.forEach(stage => {
          //   if (stage.checkbox?.checked) {
          //     highestStage = Math.max(highestStage, stage.points);
          //   }
          // });

          // groupA += highestStage;

          // // Academic Units: Master’s
          // const masterUnits = parseFloat($("academic_units_master_degree")?.value) || 0;
          // const maMsCandidateCheckbox = $("ma_ms_candidate");

          // if (masterUnits >= 30) {
          //   if (maMsCandidateCheckbox && !maMsCandidateCheckbox.checked) {
          //     maMsCandidateCheckbox.checked = true;
          //   }
          // } else {
          //   if (maMsCandidateCheckbox && maMsCandidateCheckbox.checked) {
          //     maMsCandidateCheckbox.checked = false;
          //   }
          // }

          // const hasStage25OrAbove = degreeStages.some(stage => stage.points >= 25 && stage.checkbox?.checked);
          // if (!hasStage25OrAbove) {
          //   groupA += masterUnits / 6;
          // }

          // // Academic Units: Doctorate
          // const doctorateUnits = parseFloat($("academic_units_doctorate_degree")?.value) || 0;
          // const phdEducationCheckbox = $("phd_education");

          // if (doctorateUnits >= 30) {
          //   if (phdEducationCheckbox && !phdEducationCheckbox.checked) {
          //     phdEducationCheckbox.checked = true;
          //   }
          // } else {
          //   if (phdEducationCheckbox && phdEducationCheckbox.checked) {
          //     phdEducationCheckbox.checked = false;
          //   }
          // }

          // const hasStage40OrAbove = degreeStages.some(stage => stage.points >= 40 && stage.checkbox?.checked);
          // if (!hasStage40OrAbove) {
          //   groupA += doctorateUnits / 6;
          // }

          groupA = Math.min(groupA, 50);

          // Group B: Additional Degrees (Max 10)
          if ($("additional_bachelor_degree")?.checked) groupB += 4;
          if ($("additional_master_degree")?.checked) groupB += 6;
          if ($("additional_doctorate_degree")?.checked) groupB += 10;
          if ($("multiple_degrees")?.checked) groupB += 10;

          groupB = Math.min(groupB, 10);

          // Group C: Trainings (Max 10)
          if ($("specialized_training")?.checked) groupC += 2;
          if ($("travel_grant_for_study")?.checked) groupC += 5;
          if ($("professional_education_units")?.checked) groupC += 5;
          if ($("plumbing_certification")?.checked) groupC += 5;
          if ($("certificate_of_completion")?.checked) groupC += 3;
          if ($("national_certification")?.checked) groupC += 5;
          if ($("trainers_methodology")?.checked) groupC += 10;

          groupC += (parseFloat($("seminars_attended")?.value) || 0) * 0.33;
          groupC = Math.min(groupC, 10);

          // Group D: Government Exams (Max 20)
          if ($("teachers_board_certified")?.checked) groupD += 20;
          if ($("career_service_certification")?.checked) groupD += 15;
          if ($("bar_exam_certification")?.checked) groupD += 20;

          groupD = Math.min(groupD, 20);

          // Group E: Honors (Max 10)
          if ($("board_exam_placer")?.checked) groupE += 10;
          if ($("local_awards")?.checked) groupE += 3;
          if ($("regional_awards")?.checked) groupE += 5;
          if ($("national_awards")?.checked) groupE += 10;
          if ($("summa_cum_laude")?.checked) groupE += 10;
          if ($("magna_cum_laude")?.checked) groupE += 8;
          if ($("cum_laude")?.checked) groupE += 6;
          if ($("with_distinction")?.checked) groupE += 3;

          groupE = Math.min(groupE, 10);

          const total = groupA + groupB + groupC + groupD + groupE;
          const weighted = total * 0.30;

          document.getElementById("totalPointsI").innerText = total.toFixed(2);
          document.getElementById("totalPercentageI").innerText = weighted.toFixed(2);
        }

                // Recalculate when any input changes inside Rank 1
                document.querySelectorAll('#content1 input').forEach(input => {
                    input.addEventListener("input", updateTotalPoints);
                    if (input.type === "checkbox") {
                        input.addEventListener("change", updateTotalPoints);
                    }
                });

        // SAVE FUNCTION for Rank 1
        document.getElementById("saveButton").addEventListener("click", function () {
            const emp_id = document.querySelector('[name="emp_id"]').value;
            if (!emp_id) return alert("Employee ID is missing.");

            const totalPoints = parseFloat(document.getElementById("totalPointsI").innerText) || 0;
            const formData = new FormData();

            const fields = [
                "emp_id", "bachelor_degree", "academic_units_master_degree", "ma_ms_candidate",
                "masters_thesis_completed", "full_master_degree", "academic_units_doctorate_degree",
                "phd_education", "doctorate_dissertation_completed", "full_doctorate_degree",
                "additional_bachelor_degree", "additional_master_degree", "additional_doctorate_degree",
                "multiple_degrees", "specialized_training", "travel_grant_for_study",
                "seminars_attended", "professional_education_units", "plumbing_certification",
                "certificate_of_completion", "national_certification", "trainers_methodology",
                "teachers_board_certified", "career_service_certification", "bar_exam_certification",
                "board_exam_placer", "local_awards", "regional_awards", "national_awards",
                "summa_cum_laude", "magna_cum_laude", "cum_laude", "with_distinction"
            ];

            fields.forEach(field => {
                const input = document.querySelector(`#content1 [name="${field}"]`);
                if (input) {
                    formData.append(field, input.type === "checkbox" ? (input.checked ? input.value : 0) : input.value);
                }
            });

            formData.append("total_points", totalPoints);

            const saveBtn = document.getElementById("saveButton");
            saveBtn.disabled = true;
            saveBtn.innerText = "Saving...";

            fetch("/save-points", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(res => res.json())
            .then(data => {
                saveBtn.disabled = false;
                saveBtn.innerText = "Save";
                if (data.success) {
                    alert("Faculty ranking saved successfully!");
                } else {
                    alert("Error saving: " + (data.message || "Unknown error"));
                }
            })
            .catch(err => {
                saveBtn.disabled = false;
                saveBtn.innerText = "Save";
                console.error("Save error:", err);
                alert("An error occurred while saving.");
            });
        });
    });
  </script>
