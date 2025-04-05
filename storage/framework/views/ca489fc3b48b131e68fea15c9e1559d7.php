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
                <td>A. Attendance in school-sponsored activities</td>
                <td class="text-center">
                    <input type="checkbox" name="attendance_activities" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>B. Committee Involvement/ voluntary services</td>
                <td class="text-center">
                    <input type="checkbox" name="committee_involvement" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>C. Participation in the CC-Community Extension Program</td>
                <td class="text-center">
                    <input type="checkbox" name="community_extension" value="40">
                </td>
                <td class="text-center">(40 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td><strong>TOTAL CREDIT POINTS EARNED (IV)</strong></td>
                <td id="totalPointsIV">0</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>TOTAL CREDIT POINTS EARNED x 15%</strong></td>
                <td id="totalPercentageIV">0</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // ✅ Populate Form 4
    window.populateFacultyFormRank4 = function (faculty) {
        const content = document.querySelector("#content4");

        content.querySelector('[name="attendance_activities"]').checked = !!Number(faculty.attendance_activities);
        content.querySelector('[name="committee_involvement"]').checked = !!Number(faculty.committee_involvement);
        content.querySelector('[name="community_extension"]').checked = !!Number(faculty.community_extension);

        updateTotalPointsRank4();
    };

    function updateTotalPointsRank4() {
        const content = document.querySelector("#content4");
        let total = 0;

        content.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            if (checkbox.checked) {
                total += parseFloat(checkbox.value) || 0;
            }
        });

        const percentage = total * 0.15;
        document.getElementById("totalPointsIV").innerText = total.toFixed(2);
        document.getElementById("totalPercentageIV").innerText = percentage.toFixed(2);
    }

    document.querySelectorAll('#content4 input[type="checkbox"]').forEach(cb => {
        cb.addEventListener("change", updateTotalPointsRank4);
    });

    const saveBtn = document.createElement("button");
    saveBtn.id = "saveButtonRank4";
    saveBtn.className = "btn btn-primary mt-3";
    saveBtn.textContent = "Save";
    document.querySelector("#content4").appendChild(saveBtn);

    saveBtn.addEventListener("click", function () {
        const emp_id = document.querySelector('[name="emp_id"]')?.value;
        if (!emp_id) return alert("Please select a faculty first.");

        const formData = new FormData();
        formData.append("emp_id", emp_id);

        ['attendance_activities', 'committee_involvement', 'community_extension'].forEach(name => {
            const checked = document.querySelector(`#content4 [name="${name}"]`)?.checked;
            const input = document.querySelector(`#content4 [name="${name}"]`);
            const value = input && input.checked ? parseInt(input.value) : 0;
            formData.append(name, value);

        });

        fetch("/save-points4", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(async res => {
            const text = await res.text();
            try {
                const json = JSON.parse(text);
                if (!res.ok) throw new Error(json.message || "Unknown error");
                alert("Rank 4 saved successfully!");
                return json;
            } catch (err) {
                console.error("Rank 4 Save Error (invalid JSON):", text);
                alert("Unexpected server response:\n" + text);
                throw err;
            }
        })
        .catch(err => {
            console.error("Rank 4 Save Error:", err);
            alert("An error occurred while saving Rank 4.");
        });
    });

    window.updateTotalPointsRank4 = updateTotalPointsRank4;
});
</script>
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ems/ems-ranking-faculty-4.blade.php ENDPATH**/ ?>