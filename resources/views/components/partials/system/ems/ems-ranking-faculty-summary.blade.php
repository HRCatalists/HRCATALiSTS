<!-- SUMMARY TAB -->
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
        <td id="academyCredit">0</td>
        <td>30%</td>
        <td id="academyRating">0</td>
      </tr>
      <tr>
        <td>II. Teaching Experience & Professional/Work Experience</td>
        <td id="teachingCredit">0</td>
        <td>20%</td>
        <td id="teachingRating">0</td>
      </tr>
      <tr>
        <td>III. Faculty Performance as a Professional Educator</td>
        <td id="facultyPerformanceCredit">0</td>
        <td>35%</td>
        <td id="facultyPerformanceRating">0</td>
      </tr>
      <tr>
        <td>IV. Corporate Commitment (In/ Off Campus Service)</td>
        <td id="corporateCommitmentCredit">0</td>
        <td>15%</td>
        <td id="corporateCommitmentRating">0</td>
      </tr>
      <tr>
        <td class="text-end" colspan="3"><strong>OVERALL RATING</strong></td>
        <td id="overallRating">0</td>
      </tr>
      <tr>
        <td class="text-start" colspan="3">PREVIOUS RANK: </td>
        <td id="previousRank">Not Calculated</td>
      </tr>
      <tr>
        <td class="text-start" colspan="3">PREVIOUS SCORE: </td>
        <td id="previousScore">0</td>
      </tr>
      <tr>
        <td class="text-end" colspan="3"><strong>RANK</strong></td>
        <td id="finalRank">Not Ranked</td>
      </tr>
      <tr>
        <td class="text-start" colspan="4">
          <strong>N.B. Credit points/ rank will be effective only upon submission of supporting documents on specified date.</strong>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="text-center my-3">
    <button id="saveSummaryBtn" class="btn btn-success">Generate Summary</button>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("saveSummaryBtn").addEventListener("click", function () {
    const empId = document.querySelector('[name="emp_id"]').value;
    if (!empId) return alert("Please select a faculty first.");

    fetch("/save-summary", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({ emp_id: empId })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        const s = data.summary;

        const a = s.academy_preparation_other_qualifications;
        const b = s.teaching_and_work_exp;
        const c = s.faculty_performance;
        const d = s.corporate_commitment;
        const oldRank = s.old_rank || "Not Recorded";
        const oldScore = s.old_score || 0;

        const weighted = {
          academy: a * 0.30,
          teaching: b * 0.20,
          performance: c * 0.35,
          commitment: d * 0.15
        };

        const total = Object.values(weighted).reduce((sum, val) => sum + val, 0);

        document.getElementById("academyCredit").textContent = a;
        document.getElementById("teachingCredit").textContent = b;
        document.getElementById("facultyPerformanceCredit").textContent = c;
        document.getElementById("corporateCommitmentCredit").textContent = d;

        document.getElementById("academyRating").textContent = weighted.academy.toFixed(2);
        document.getElementById("teachingRating").textContent = weighted.teaching.toFixed(2);
        document.getElementById("facultyPerformanceRating").textContent = weighted.performance.toFixed(2);
        document.getElementById("corporateCommitmentRating").textContent = weighted.commitment.toFixed(2);

        document.getElementById("overallRating").textContent = total.toFixed(2);
        document.getElementById("finalRank").textContent = getRankFromScore(total);
        document.getElementById("previousRank").textContent = oldRank;
        document.getElementById("previousScore").textContent = oldScore;
      } else {
        alert("Failed to generate summary: " + (data.error || "Unknown error"));
      }
    })
    .catch(err => {
      console.error("Summary error:", err);
      alert("An error occurred generating the summary.");
    });
  });

  function getRankFromScore(score) {
    if (score >= 95) return "Professor";
    if (score >= 85) return "Associate Professor";
    if (score >= 75) return "Assistant Professor";
    if (score >= 65) return "Instructor";
    return "Needs Review";
  }
});
</script>
