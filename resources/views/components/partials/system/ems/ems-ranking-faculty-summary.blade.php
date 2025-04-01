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
        <td id="academyCredit">0</td>
        <td id="academyWeight">30%</td>
        <td id="academyRating">0</td>
      </tr>
      <tr>
        <td>II. Teaching Experience & Professional/Work Experience</td>
        <td id="teachingCredit">0</td>
        <td id="teachingWeight">20%</td>
        <td id="teachingRating">0</td>
      </tr>
      <tr>
        <td>III. Faculty Performance as a Professional Educator</td>
        <td id="facultyPerformanceCredit">0</td>
        <td id="facultyPerformanceWeight">35%</td>
        <td id="facultyPerformanceRating">0</td>
      </tr>
      <tr>
        <td>IV. Corporate Commitment (In/ Off Campus Service)</td>
        <td id="corporateCommitmentCredit">0</td>
        <td id="corporateCommitmentWeight">15%</td>
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
        <td class="text-end" colspan="3"><strong>RANK</strong></td>
        <td id="finalRank">Not Ranked</td>
      </tr>
      <tr>
        <td class="text-start" colspan="4"><strong>N.B. Credit points/ rank will be effective only upon submission of supporting documents on specified date.</strong></td>
      </tr>
    </tbody>
  </table>
</div>

<<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to calculate and update the summary table
    function updateSummary() {
        // Grab the points from each section (using the new IDs)
        let academyPoints = parseFloat(document.getElementById('totalPointsI') ? document.getElementById('totalPointsI').innerText : 0) || 0;
        let teachingPoints = parseFloat(document.getElementById('totalPointsII') ? document.getElementById('totalPointsII').innerText : 0) || 0;
        let facultyPoints = parseFloat(document.getElementById('totalPointsIII') ? document.getElementById('totalPointsIII').innerText : 0) || 0;
        let corporatePoints = parseFloat(document.getElementById('totalPointsIV') ? document.getElementById('totalPointsIV').innerText : 0) || 0;

        // Debugging: Check if values are being captured correctly
        console.log("Academy Points: ", academyPoints);
        console.log("Teaching Points: ", teachingPoints);
        console.log("Faculty Points: ", facultyPoints);
        console.log("Corporate Points: ", corporatePoints);

        // Calculate weighted ratings for each section
        let academyWeighted = academyPoints * 0.30;
        let teachingWeighted = teachingPoints * 0.20;
        let facultyWeighted = facultyPoints * 0.35;
        let corporateWeighted = corporatePoints * 0.15;

        // Debugging: Check weighted values
        console.log("Academy Weighted: ", academyWeighted);
        console.log("Teaching Weighted: ", teachingWeighted);
        console.log("Faculty Weighted: ", facultyWeighted);
        console.log("Corporate Weighted: ", corporateWeighted);

        // Update summary table with individual section points
        document.getElementById('academyCredit').innerText = academyPoints.toFixed(2);
        document.getElementById('academyWeight').innerText = "30%";
        document.getElementById('academyRating').innerText = academyWeighted.toFixed(2);

        document.getElementById('teachingCredit').innerText = teachingPoints.toFixed(2);
        document.getElementById('teachingWeight').innerText = "20%";
        document.getElementById('teachingRating').innerText = teachingWeighted.toFixed(2);

        document.getElementById('facultyPerformanceCredit').innerText = facultyPoints.toFixed(2);
        document.getElementById('facultyPerformanceWeight').innerText = "35%";
        document.getElementById('facultyPerformanceRating').innerText = facultyWeighted.toFixed(2);

        document.getElementById('corporateCommitmentCredit').innerText = corporatePoints.toFixed(2);
        document.getElementById('corporateCommitmentWeight').innerText = "15%";
        document.getElementById('corporateCommitmentRating').innerText = corporateWeighted.toFixed(2);

        // Calculate overall score and update summary
        let overallRating = academyWeighted + teachingWeighted + facultyWeighted + corporateWeighted;
        document.getElementById('overallRating').innerText = overallRating.toFixed(2);

        // Determine rank based on overall rating
        let rank = "";
        if (overallRating >= 300) {
            rank = "Excellent";
        } else if (overallRating >= 200) {
            rank = "Good";
        } else {
            rank = "Needs Improvement";
        }
        document.getElementById('finalRank').innerText = rank;
    }

    // Call updateSummary when the page loads
    updateSummary();

    // Attach event listeners to trigger updates when points change
    document.querySelectorAll('input[type="checkbox"], input[type="number"]').forEach(function (input) {
        input.addEventListener('change', function() {
            updateSummary();
        });
    });
});

</script>
