<!-- Faculty Rank 2 -->
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

      <!-- A. Teaching Experience -->
      <tr>
        <td><strong>A. Teaching Experience</strong></td><td></td><td><strong>(60 pts maximum)</strong></td><td></td>
      </tr>
      <?php
        $def = fn($val) => isset($val) ? $val : 0;
      ?>
      <tr>
        <td>Years of full-time teaching in CC</td>
        <td class="text-center">
          <input type="number" name="full_time_cc" min="0" max="30" value="<?php echo e($def($faculty->full_time_cc ?? null)); ?>">
        </td>
        <td class="text-center">2 pts/year</td><td></td>
      </tr>
      <tr>
        <td>Years of full-time teaching in other schools</td>
        <td class="text-center">
          <input type="number" name="full_time_other_schools" min="0" max="30" value="<?php echo e($def($faculty->full_time_other_schools ?? null)); ?>">
        </td>
        <td class="text-center">1 pt/year</td><td></td>
      </tr>
      <tr>
        <td>Years of part-time teaching in CC</td>
        <td class="text-center">
          <input type="number" name="part_time_cc" min="0" max="30" value="<?php echo e($def($faculty->part_time_cc ?? null)); ?>">
        </td>
        <td class="text-center">0.5 pt/year</td><td></td>
      </tr>
      <tr>
        <td>Years of part-time teaching in other schools</td>
        <td class="text-center">
          <input type="number" name="part_time_other_schools" min="0" max="30" value="<?php echo e($def($faculty->part_time_other_schools ?? null)); ?>">
        </td>
        <td class="text-center">0.25 pt/year</td><td></td>
      </tr>

      <!-- B. Professional Growth -->
      <tr>
        <td><strong>B. Professional Growth and Leadership</strong></td>
        <td><strong>(40 pts max)</strong></td><td></td><td></td>
      </tr>
      <tr>
        <td>B.1 Research Output</td>
        <td class="text-center">
          <input type="checkbox" name="research_school_based" value="1" <?php echo e(isset($faculty) && $faculty->research_school_based ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">15 pts</td><td></td>
      </tr>
      <tr><td>B.2 Publication/Scholarly Ability</td><td></td></tr>
      <tr>
        <td class="ps-4">Course Module</td>
        <td class="text-center">
          <input type="checkbox" name="course_module" value="5" <?php echo e(isset($faculty) && $faculty->course_module ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">5 pts</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Workbook/Lab Manual/Textbook</td>
        <td class="text-center">
          <input type="checkbox" name="workbook_lab_manual" value="5" <?php echo e(isset($faculty) && $faculty->workbook_lab_manual ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">5 pts</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Research Articles</td>
        <td class="text-center">
          <input type="checkbox" name="research_articles" value="2" <?php echo e(isset($faculty) && $faculty->research_articles ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">2 pts</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Editorship of Journals</td>
        <td class="text-center">
          <input type="checkbox" name="journal_editorship" value="2" <?php echo e(isset($faculty) && $faculty->journal_editorship ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">2 pts</td><td></td>
      </tr>
      <tr><td>B.3 Participation in Dev't</td><td></td></tr>
      <tr>
        <td class="ps-4">Chairman</td>
        <td class="text-center">
          <input type="checkbox" name="participation_chairman" value="5" <?php echo e(isset($faculty) && $faculty->participation_chairman ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">5 pts</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Member</td>
        <td class="text-center">
          <input type="checkbox" name="participation_member" value="3" <?php echo e(isset($faculty) && $faculty->participation_member ? 'checked' : ''); ?>>
        </td>
        <td class="text-center">3 pts</td><td></td>
      </tr>
      <tr><td>B.4 Professional Leadership</td><td></td></tr>
      <tr>
        <td class="ps-4">Within the School</td>
        <td class="text-center">
          <input type="number" name="resource_person_within" value="<?php echo e($def($faculty->resource_person_within ?? null)); ?>">
        </td>
        <td class="text-center">1 pt/activity</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Outside the School</td>
        <td class="text-center">
          <input type="number" name="resource_person_outside" value="<?php echo e($def($faculty->resource_person_outside ?? null)); ?>">
        </td>
        <td class="text-center">1 pt/activity</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Membership - Officer</td>
        <td class="text-center">
          <input type="number" name="membership_officer_accreditor" value="<?php echo e($def($faculty->membership_officer_accreditor ?? null)); ?>">
        </td>
        <td class="text-center">2 pts/year</td><td></td>
      </tr>
      <tr>
        <td class="ps-4">Membership - Member</td>
        <td class="text-center">
          <input type="number" name="membership_member" value="<?php echo e($def($faculty->membership_member ?? null)); ?>">
        </td>
        <td class="text-center">1 pt/year</td><td></td>
      </tr>

      <tr>
        <td><strong>Total Points (II)</strong></td>
        <td id="totalPointsII"><strong>0</strong></td><td></td><td></td>
      </tr>
    </tbody>
  </table>
  <div class="text-center">
    <button id="saveButtonRank2" class="btn btn-primary">Save</button>
  </div>
</div>

<!-- ✅ RANK 2 SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    window.populateFacultyFormRank2 = function (faculty) {
        const fields = [
            "full_time_cc", "full_time_other_schools", "part_time_cc", "part_time_other_schools",
            "research_school_based", "course_module", "workbook_lab_manual", "research_articles",
            "journal_editorship", "participation_chairman", "participation_member",
            "resource_person_within", "resource_person_outside",
            "membership_officer_accreditor", "membership_member"
        ];

        fields.forEach(field => {
            const input = document.querySelector(`#content2 [name="${field}"]`);
            if (!input) return;

            if (input.type === "checkbox") {
                input.checked = faculty[field] == 1;
            } else {
                input.value = faculty[field] ?? 0;
            }
        });

        updateTotalPointsRank2();

        const tabTrigger = document.querySelector('[href="#content2"]');
        if (tabTrigger) new bootstrap.Tab(tabTrigger).show();
    };

    function updateTotalPointsRank2() {
        let total = 0;
        const $ = sel => document.querySelector(`#content2 [name="${sel}"]`);

        total += (parseFloat($("full_time_cc")?.value) || 0) * 2;
        total += (parseFloat($("full_time_other_schools")?.value) || 0) * 1;
        total += (parseFloat($("part_time_cc")?.value) || 0) * 0.5;
        total += (parseFloat($("part_time_other_schools")?.value) || 0) * 0.25;

        const checks = [
            ["research_school_based", 15], ["course_module", 5], ["workbook_lab_manual", 5],
            ["research_articles", 2], ["journal_editorship", 2],
            ["participation_chairman", 5], ["participation_member", 3],
            ["membership_officer_accreditor", 2], ["membership_member", 1]
        ];

        checks.forEach(([name, pts]) => {
            const c = $(`${name}`);
            if (c && c.checked) total += pts;
        });

        total += parseFloat($("resource_person_within")?.value) || 0;
        total += parseFloat($("resource_person_outside")?.value) || 0;

        document.getElementById("totalPointsII").innerText = total.toFixed(2);
    }

    document.querySelectorAll("#content2 input").forEach(input => {
        input.addEventListener("input", updateTotalPointsRank2);
        if (input.type === "checkbox") {
            input.addEventListener("change", updateTotalPointsRank2);
        }
    });

    document.getElementById("saveButtonRank2").addEventListener("click", function () {
        const emp_id = document.querySelector('[name="emp_id"]').value;
        if (!emp_id) return alert("Please select a faculty first.");

        const formData = new FormData();
        formData.append("emp_id", emp_id);

        document.querySelectorAll("#content2 input").forEach(input => {
            if (input.name) {
                formData.append(input.name, input.type === "checkbox" ? (input.checked ? input.value : 0) : input.value);
            }
        });

        fetch("/save-points2", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => alert(data.success ? "Saved successfully!" : "Save failed!"))
        .catch(err => {
            console.error("Save error:", err);
            alert("An error occurred while saving.");
        });
    });
});
</script>
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ems/ems-ranking-faculty-2.blade.php ENDPATH**/ ?>