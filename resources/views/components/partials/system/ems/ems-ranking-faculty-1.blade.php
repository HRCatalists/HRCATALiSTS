<!-- Ensure this meta tag is in your layout's head -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Faculty Rank 1 Partial Form -->
<div class="tab-pane fade show active" id="content1" role="tabpanel">
  <!-- Hidden field for emp_id; ensure that $faculty is passed to the view -->
  <input type="hidden" name="emp_id" value="{{ $faculty->emp_id ?? '' }}">

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
</div>
<!-- Save Button -->
<div class="mt-4 text-center">
  <button id="saveButton" class="btn btn-primary">Save</button>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      // Make search globally callable
      window.searchPersonnel = function () {
          const name = document.getElementById("searchName").value;
          const department = document.getElementById("searchDepartment").value;
          const resultsContainer = document.getElementById("search-results");
          resultsContainer.innerHTML = "<p>Searching...</p>";
  
          fetch("/search-faculty", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
              },
              body: JSON.stringify({ name, department })
          })
          .then(res => res.json())
          .then(data => {
              if (!Array.isArray(data) || data.length === 0) {
                  displayNoResults("No results found.");
                  return;
              }
  
              const faculty = data[0];
              const emp = faculty.employee || faculty;
              const empIdInput = document.querySelector('[name="emp_id"]');
              if (empIdInput) empIdInput.value = emp.emp_id || faculty.emp_id;
  
              document.getElementById("selectedEmployeeName").textContent =
                  `${emp.first_name || ''} ${emp.last_name || ''} (${emp.department || ''})`;
  
              populateFacultyForm(faculty);
          })
          .catch(err => {
              console.error("Search error:", err);
              displayNoResults("An error occurred.");
          });
      };
  
      function displayNoResults(msg) {
          document.getElementById("search-results").innerHTML = `<p>${msg}</p>`;
      }
  
      function populateFacultyForm(faculty) {
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
              const input = document.querySelector(`[name="${field}"]`);
              const value = faculty[field];
              if (!input) return;
  
              if (input.type === "checkbox") {
                  input.checked = parseFloat(value) > 0;
              } else {
                  input.value = value ?? "";
              }
          });
  
          updateTotalPoints(); // ✅ Ensure totals are recalculated after populating
      }
  
      function updateTotalPoints() {
          let total = 0;
  
          // Sum all checked checkbox values
          document.querySelectorAll('#content1 input[type="checkbox"]:checked').forEach(el => {
              total += parseFloat(el.value) || 0;
          });
  
          // Add calculated fields
          const masterUnits = parseFloat(document.querySelector('[name="academic_units_master_degree"]')?.value) || 0;
          const doctorateUnits = parseFloat(document.querySelector('[name="academic_units_doctorate_degree"]')?.value) || 0;
          const seminars = parseFloat(document.querySelector('[name="seminars_attended"]')?.value) || 0;
  
          total += masterUnits / 6;
          total += doctorateUnits / 6;
          total += seminars * 0.33;
  
          total = parseFloat(total.toFixed(2));
          document.getElementById("totalPointsI").innerText = total.toFixed(2);
          document.getElementById("totalPercentageI").innerText = (total * 0.3).toFixed(2);
      }
  
      // Attach update trigger to all inputs
      document.querySelectorAll('#content1 input').forEach(input => {
          input.addEventListener("input", updateTotalPoints);
      });
  
      // SAVE FUNCTION
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
            const input = document.querySelector(`[name="${field}"]`);
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
   
  
