<!-- Faculty Rank 2 -->
<div class="tab-pane fade" id="content2" role="tabpanel">
  <!-- ✅ Make sure this emp_id gets updated dynamically -->
  <input type="hidden" name="emp_id" id="rank2_emp_id" value="{{ $faculty->emp_id ?? '' }}">

  
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
        <td></td><td><strong>100 POINTS</strong></td><td><strong>x 20%</strong></td>
      </tr>

      <tr><td><strong>A. Teaching Experience</strong></td><td></td><td><strong>(60 pts maximum)</strong></td><td></td></tr>

      @php $def = fn($val) => isset($val) ? $val : 0; @endphp

      @foreach([
        ['Years of full-time teaching in CC', 'full_time_cc', '2 pts/year'],
        ['Years of full-time teaching in other schools', 'full_time_other_schools', '1 pt/year'],
        ['Years of part-time teaching in CC', 'part_time_cc', '0.5 pt/year'],
        ['Years of part-time teaching in other schools', 'part_time_other_schools', '0.25 pt/year']
      ] as [$label, $name, $points])
      <tr>
        <td>{{ $label }}</td>
        <td class="text-center">
          <input type="number" name="{{ $name }}" min="0" max="30" value="{{ $def($faculty->$name ?? null) }}">
        </td>
        <td class="text-center">{{ $points }}</td><td></td>
      </tr>
      @endforeach

      <tr><td><strong>B. Professional Growth and Leadership</strong></td><td><strong>(40 pts max)</strong></td><td></td><td></td></tr>
      <tr>
        <td>B.1 Research Output (Class Based; School Based; Community based)</td>
        <td class="text-center">
          <input type="checkbox" name="research_school_based" value="1" {{ isset($faculty) && $faculty->research_school_based ? 'checked' : '' }}>
        </td>
        <td class="text-center">15 pts</td><td></td>
      </tr>

      <tr><td>B.2 Publication/Scholarly Ability</td><td></td></tr>
      @foreach([
        ['Course Module', 'course_module', 5],
        ['Workbook/Lab Manual/Textbook', 'workbook_lab_manual', 5],
        ['Research Articles', 'research_articles', 2],
        ['Editorship of Journals', 'journal_editorship', 2]
      ] as [$label, $name, $points])
      <tr>
        <td class="ps-4">{{ $label }}</td>
        <td class="text-center">
          <input type="checkbox" name="{{ $name }}" value="{{ $points }}" {{ isset($faculty) && $faculty->$name ? 'checked' : '' }}>
        </td>
        <td class="text-center">{{ $points }} pts</td><td></td>
      </tr>
      @endforeach

      <tr><td>B.3 Participation in Dev't</td><td></td></tr>
      @foreach([
        ['Chairman', 'participation_chairman', 5],
        ['Member', 'participation_member', 3]
      ] as [$label, $name, $points])
      <tr>
        <td class="ps-4">{{ $label }}</td>
        <td class="text-center">
          <input type="checkbox" name="{{ $name }}" value="{{ $points }}" {{ isset($faculty) && $faculty->$name ? 'checked' : '' }}>
        </td>
        <td class="text-center">{{ $points }} pts</td><td></td>
      </tr>
      @endforeach

      <tr><td>B.4 Professional Leadership</td><td></td></tr>
      @foreach([
        ['Within the School', 'resource_person_within', '1 pt/activity'],
        ['Outside the School', 'resource_person_outside', '1 pt/activity'],
        ['Membership - Officer', 'membership_officer_accreditor', '2 pts/year'],
        ['Membership - Member', 'membership_member', '1 pt/year']
      ] as [$label, $name, $points])
      <tr>
        <td class="ps-4">{{ $label }}</td>
        <td class="text-center">
          <input type="number" name="{{ $name }}" value="{{ $def($faculty->$name ?? null) }}">
        </td>
        <td class="text-center">{{ $points }}</td><td></td>
      </tr>
      @endforeach

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

<!-- ✅ Rank 2 JS Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // ✅ Populate Faculty Rank 2 (Optional tab switch with showTab = true)
    window.populateFacultyFormRank2 = function (faculty, showTab = false) {
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
            input.type === "checkbox"
                ? input.checked = faculty[field] == 1
                : input.value = faculty[field] ?? 0;
        });

        document.querySelector('#rank2_emp_id').value = faculty.emp_id;
        updateTotalPointsRank2();

        // ✅ Show tab if requested
        if (showTab) {
            const tabTrigger = document.querySelector('[href="#content2"]');
            if (tabTrigger) new bootstrap.Tab(tabTrigger).show();
        }
    };

    // 🔢 Update and calculate total + weighted score
    function updateTotalPointsRank2() {
        const $ = sel => document.querySelector(`#content2 [name="${sel}"]`);

        // --- GROUP A: Teaching Experience (max 60 pts) ---
        let groupA = 0;
        groupA += (parseFloat($("full_time_cc")?.value) || 0) * 2;
        groupA += (parseFloat($("full_time_other_schools")?.value) || 0) * 1;
        groupA += (parseFloat($("part_time_cc")?.value) || 0) * 0.5;
        groupA += (parseFloat($("part_time_other_schools")?.value) || 0) * 0.25;
        if (groupA > 60) groupA = 60;

        // --- GROUP B: Professional Growth & Leadership (max 40 pts) ---
        let groupB = 0;
        const checks = [
            ["research_school_based", 15], ["course_module", 5], ["workbook_lab_manual", 5],
            ["research_articles", 2], ["journal_editorship", 2],
            ["participation_chairman", 5], ["participation_member", 3],
            ["membership_officer_accreditor", 2], ["membership_member", 1]
        ];

        checks.forEach(([name, pts]) => {
            const c = $(`${name}`);
            if (c?.checked) groupB += pts;
        });

        groupB += parseFloat($("resource_person_within")?.value) || 0;
        groupB += parseFloat($("resource_person_outside")?.value) || 0;
        if (groupB > 40) groupB = 40;

        const total = groupA + groupB;
        const weighted = total * 0.20;

        // 👀 Display totals
        document.getElementById("totalPointsII").innerHTML = `
            <strong>${total.toFixed(2)} pts</strong><br>
            <small class="text-muted">Weighted: ${weighted.toFixed(2)} pts</small>
        `;

        // 🔁 Store total for backend submission
        document.getElementById("saveButtonRank2").dataset.total = total.toFixed(2);
    }

    // 🧮 Auto-update total when input changes
    document.querySelectorAll("#content2 input").forEach(input => {
        input.addEventListener("input", updateTotalPointsRank2);
        if (input.type === "checkbox") input.addEventListener("change", updateTotalPointsRank2);
    });

    // 💾 Save Rank 2
    document.getElementById("saveButtonRank2").addEventListener("click", function () {
        const emp_id = document.getElementById("rank2_emp_id").value;
        if (!emp_id) return alert("Please select a faculty first.");

        const formData = new FormData();
        formData.append("emp_id", emp_id);

        // 📤 Include all inputs
        document.querySelectorAll("#content2 input").forEach(input => {
            if (input.name) {
                const value = input.type === "checkbox" ? (input.checked ? 1 : 0) : input.value;
                formData.append(input.name, value);
            }
        });

        // ✅ Send total points
        const totalPoints = document.getElementById("saveButtonRank2").dataset.total || 0;
        formData.append("total_points", totalPoints);

        fetch("/save-points2", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            return res.json();
        })
        .then(data => {
            alert(data.success ? "Rank 2 saved successfully!" : "Save failed!");
        })
        .catch(err => {
            console.error("Save error:", err);
            alert("An error occurred while saving: " + err.message);
        });
    });

    // 🔁 Expose updater for external triggers
    window.updateTotalPointsRank2 = updateTotalPointsRank2;
});
</script>
