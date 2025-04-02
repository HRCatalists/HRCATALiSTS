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

      <!-- A. Teacher Experience -->
      <tr>
        <td><strong>A. Teacher Experience</strong></td>
        <td></td>
        <td><strong>(60 pts maximum)</strong></td>
        <td></td>
      </tr>
      <tr>
        <td>Years of full-time teaching in CC</td>
        <td class="text-center">
          <input type="number" id="full_time_cc" name="full_time_cc" min="0" max="30" 
                 value="<?= isset($full_time_cc) ? $full_time_cc : 0; ?>">
        </td>
        <td class="text-center">2 pts per year</td>
        <td></td>
      </tr>
      <tr>
        <td>Years of full-time teaching in other schools</td>
        <td class="text-center">
          <input type="number" id="full_time_other_schools" name="full_time_other_schools" min="0" max="30" 
                 value="<?= isset($full_time_other_schools) ? $full_time_other_schools : 0; ?>">
        </td>
        <td class="text-center">1 pt per year</td>
        <td></td>
      </tr>
      <tr>
        <td>Years of part-time teaching in CC</td>
        <td class="text-center">
          <input type="number" id="part_time_cc" name="part_time_cc" min="0" max="30" 
                 value="<?= isset($part_time_cc) ? $part_time_cc : 0; ?>">
        </td>
        <td class="text-center">0.5 pt per year</td>
        <td></td>
      </tr>
      <tr>
        <td>Years of part-time teaching in other schools</td>
        <td class="text-center">
          <input type="number" id="part_time_other_schools" name="part_time_other_schools" min="0" max="30" 
                 value="<?= isset($part_time_other_schools) ? $part_time_other_schools : 0; ?>">
        </td>
        <td class="text-center">0.25 pt per year</td>
        <td></td>
      </tr>

      <!-- B. Professional Growth and Leadership -->
      <tr>
        <td><strong>B. Professional Growth and Leadership</strong></td>
        <td><strong>(40 pts maximum)</strong></td>
        <td></td>
      </tr>
      <tr>
        <td>B.1 Research Output (Class Based; School Based; Community based)</td>
        <td class="text-center">
          <input type="checkbox" id="research_school_based" name="research_school_based" 
                 value="15" <?= isset($research_school_based) && $research_school_based ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">15 pts</td>
        <td></td>
      </tr>
      <tr>
        <td>B.2 Publication/ Scholarly Ability</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Teaching/ Course Module</td>
        <td class="text-center">
          <input type="checkbox" id="course_module" name="course_module" value="5" 
                 <?= isset($course_module) && $course_module ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Workbook/ Lab Manual/ Textbook/ Reference Book</td>
        <td class="text-center">
          <input type="checkbox" id="workbook_lab_manual" name="workbook_lab_manual" value="5" 
                 <?= isset($workbook_lab_manual) && $workbook_lab_manual ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Research/ Professional Articles</td>
        <td class="text-center">
          <input type="checkbox" id="research_articles" name="research_articles" value="2" 
                 <?= isset($research_articles) && $research_articles ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">2 pts</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Editorship of professional journals</td>
        <td class="text-center">
          <input type="checkbox" id="journal_editorship" name="journal_editorship" value="2" 
                 <?= isset($journal_editorship) && $journal_editorship ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">2 pts</td>
        <td></td>
      </tr>

      <!-- B.3 Participation in Area/Dept/Program Development -->
      <tr>
        <td>B.3 Participation in Area/Dept/Program Dev't. (Ranking; Research; Sportfest; Institutional Planning; Accreditation Process etc.) as:</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Chairman</td>
        <td class="text-center">
          <input type="checkbox" id="participation_chairman" name="participation_chairman" value="5" 
                 <?= isset($participation_chairman) && $participation_chairman ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">5 pts</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Member</td>
        <td class="text-center">
          <input type="checkbox" id="participation_member" name="participation_member" value="3" 
                 <?= isset($participation_member) && $participation_member ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">3 pts</td>
        <td></td>
      </tr>

      <!-- B.4 Professional Leadership -->
      <tr>
        <td>B.4 Professional Leadership</td>
        <td class="text-center">
          <input type="checkbox" id="resource_person_within" name="resource_person_within" value="1" 
                 <?= isset($resource_person_within) && $resource_person_within ? 'checked' : ''; ?>>
        </td>
        <td class="text-center">(1 pt per activity)</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Within the School</td>
        <td class="text-center">
          <input type="number" id="resource_person_within_activities" name="resource_person_within_activities" 
                 min="0" value="<?= isset($resource_person_within_activities) ? $resource_person_within_activities : 0; ?>">
        </td>
        <td class="text-center">1 pt/activity</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Outside the School</td>
        <td class="text-center">
          <input type="number" id="resource_person_outside" name="resource_person_outside" min="0" 
                 value="<?= isset($resource_person_outside) ? $resource_person_outside : 0; ?>">
        </td>
        <td class="text-center">1 pt/activity</td>
        <td></td>
      </tr>

      <!-- B.5 Membership & Leadership Roles -->
      <tr>
        <td class="ps-4">Officer/ National Accreditor</td>
        <td class="text-center">
          <input type="number" id="membership_officer_accreditor" name="membership_officer_accreditor" min="0" 
                 value="<?= isset($membership_officer_accreditor) ? $membership_officer_accreditor : 0; ?>">
        </td>
        <td class="text-center">2 pts/year</td>
        <td></td>
      </tr>
      <tr>
        <td class="ps-4">Member (last 3 years)</td>
        <td class="text-center">
          <input type="number" id="membership_member" name="membership_member" min="0" 
                 value="<?= isset($membership_member) ? $membership_member : 0; ?>">
        </td>
        <td class="text-center">1 pt/year</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Retrieve the search button and search input fields
    const searchButton = document.getElementById("search-button");
    const searchNameInput = document.getElementById("search-name");
    const searchDepartmentInput = document.getElementById("search-department");
    const tableBody = document.getElementById("faculty-ranking-table").getElementsByTagName('tbody')[0];

    searchButton.addEventListener("click", function() {
        const name = searchNameInput.value;
        const department = searchDepartmentInput.value;
        searchFaculty(name, department);
    });

    // Search faculty function
    function searchFaculty(name, department) {
        const resultsContainer = document.getElementById("search-results");
        resultsContainer.innerHTML = "<p>Searching...</p>";

        fetch("/search-faculty", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({ name: name, department: department })
        })
        .then(response => {
            if (response.redirected) {
                window.location.href = response.url;
                throw new Error("Redirected to login.");
            }
            if (!response.ok) {
                return response.json().then(errData => { throw errData; });
            }
            return response.json();
        })
        .then(data => {
            if (data.message) {
                displayNoResults(data.message);
            } else if (data.length === 0) {
                displayNoResults("No faculty found matching the criteria.");
            } else {
                populateFacultyTable(data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            displayNoResults("An error occurred while searching.");
        });
    }

    function displayNoResults(message) {
        const resultsContainer = document.getElementById("search-results");
        resultsContainer.innerHTML = `<p>${message}</p>`;
    }

    // Populate the table with search results
    function populateFacultyTable(data) {
        tableBody.innerHTML = ""; // Clear existing table rows

        data.forEach(faculty => {
            const row = `
                <tr>
                    <td>${faculty.employee.first_name} ${faculty.employee.last_name}</td> <!-- Display full name -->
                    <td>${faculty.employee.department}</td> <!-- Display department -->
                    <td>${faculty.total_points}</td> <!-- Display total points -->
                    <td><button class="btn btn-primary" data-id="${faculty.emp_id}" onclick="saveTotalPoints(${faculty.emp_id})">Save Points</button></td> <!-- Add button for saving points -->
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });
    }

    // Function to save total points for a specific faculty
    function saveTotalPoints(empId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("/save-total-points", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({ emp_id: empId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Total points saved successfully!');
            } else {
                alert('Error saving points!');
            }
        })
        .catch(error => {
            console.error("Error saving points:", error);
            alert("An error occurred while saving points.");
        });
    }
});

  </script>

<?php /**PATH C:\laragon\www\hr_catalists\resources\views/components/partials/system/ems/ems-ranking-faculty-2.blade.php ENDPATH**/ ?>