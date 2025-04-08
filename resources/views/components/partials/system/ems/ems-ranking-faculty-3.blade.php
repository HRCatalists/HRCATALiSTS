<div class="tab-pane fade" id="content3" role="tabpanel">
<input type="hidden" name="emp_id" id="rank3_emp_id" value="{{ $faculty->emp_id ?? '' }}">
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
        <td>A. Classroom/ Teacher Performance Evaluation</td>
        <td class="text-center">
          <input type="number" id="classroomEvaluationIII" name="classroom_evaluation" class="score-input" min="0" max="50">
        </td>
        <td class="text-center">(50 pts maximum)</td>
        <td></td>
      </tr>
      <tr>
        <td>B. Work Performance Evaluation</td>
        <td class="text-center">
          <input type="number" id="workEvaluationIII" name="work_evaluation" class="score-input" min="0" max="50">
        </td>
        <td class="text-center">(50 pts maximum)</td>
        <td></td>
      </tr>
      <tr>
        <td><strong>TOTAL CREDIT POINTS EARNED (III)</strong></td>
        <td id="totalPointsIII">0</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td><strong>TOTAL CREDIT POINTS EARNED x 35%</strong></td>
        <td id="totalPercentageIII">0</td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Populate form with data
  window.populateFacultyFormRank3 = function (faculty) {
  console.log("Rank 3 received:", faculty); // ✅ Check this!

  const classroom = document.querySelector('#content3 [name="classroom_evaluation"]');
  const work = document.querySelector('#content3 [name="work_evaluation"]');
  const empInput = document.querySelector('#rank3_emp_id');

  if (classroom) classroom.value = faculty.classroom_evaluation ?? 0;
  if (work) work.value = faculty.work_evaluation ?? 0;
  if (empInput) empInput.value = faculty.emp_id ?? "";

  updateTotalPointsRank3();
};


  // Update points and apply cap
  function updateTotalPointsRank3() {
    const classroomInput = document.querySelector('#content3 [name="classroom_evaluation"]');
    const workInput = document.querySelector('#content3 [name="work_evaluation"]');

    let classroom = parseFloat(classroomInput?.value) || 0;
    let work = parseFloat(workInput?.value) || 0;

    if (classroom > 50) {
      classroom = 50;
      classroomInput.value = 50;
    }
    if (work > 50) {
      work = 50;
      workInput.value = 50;
    }

    const total = classroom + work;
    const percentage = total * 0.35;

    document.getElementById("totalPointsIII").innerText = total.toFixed(2);
    document.getElementById("totalPercentageIII").innerText = percentage.toFixed(2);
  }

  // Attach input listeners
  document.querySelectorAll('#content3 input').forEach(input => {
    input.addEventListener("input", updateTotalPointsRank3);
  });

  // Create Save button
  const saveBtn = document.createElement("button");
  saveBtn.id = "saveButtonRank3";
  saveBtn.className = "btn btn-primary mt-3";
  saveBtn.textContent = "Save";
  document.querySelector("#content3").appendChild(saveBtn);

  // Save function
  saveBtn.addEventListener("click", function () {
    const emp_id = document.querySelector('#rank3_emp_id')?.value;
    if (!emp_id) return alert("Please select a faculty first.");

    const classroomInput = document.querySelector('#content3 [name="classroom_evaluation"]');
    const workInput = document.querySelector('#content3 [name="work_evaluation"]');

    let classroom = parseFloat(classroomInput?.value) || 0;
    let work = parseFloat(workInput?.value) || 0;

    if (classroom > 50) classroom = 50;
    if (work > 50) work = 50;

    const total = classroom + work;
    const percentage = total * 0.35;

    const formData = new FormData();
    formData.append("emp_id", emp_id);
    formData.append("classroom_evaluation", classroom);
    formData.append("work_evaluation", work);
    formData.append("total_points", total);
    formData.append("total_percentage", percentage.toFixed(2));

    fetch("/save-points3", {
      method: "POST",
      body: formData,
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      }
    })
    .then(async (res) => {
      const text = await res.text();
      try {
        const json = JSON.parse(text);
        if (!res.ok) {
          alert("Failed to save Rank 3: " + (json.error || json.message || "Unknown error"));
          return;
        }
        alert("Rank 3 saved successfully!");
      } catch (err) {
        alert("Unexpected server response:\n" + text);
        console.error("Rank 3 JSON parse error:", err);
      }
    })
    .catch(err => {
      console.error("Rank 3 Save Error:", err);
      alert("An error occurred while saving Rank 3.");
    });
  });

  window.updateTotalPointsRank3 = updateTotalPointsRank3;
});
</script>
