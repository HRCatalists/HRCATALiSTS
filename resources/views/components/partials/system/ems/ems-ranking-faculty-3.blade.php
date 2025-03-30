<div class="tab-pane fade" id="content3" role="tabpanel">
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
                <td class="text-center"><input type="checkbox" id="classroomEvaluation" name="performanceEvaluation" value="50"></td>
                <td class="text-center">(50 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>B. Work Performance Evaluation</td>
                <td class="text-center"><input type="checkbox" id="workEvaluation" name="performanceEvaluation" value="50"></td>
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
document.addEventListener('DOMContentLoaded', function () {
    // Function to calculate total points for Faculty Performance section
    function calculateTotalPointsIII() {
        let totalPoints = 0;

        // Loop through each checkbox input in this section and calculate selected values
        document.querySelectorAll('input[name="performanceEvaluation"]:checked').forEach(function (checkbox) {
            totalPoints += parseFloat(checkbox.value);
        });

        // Ensure totalPoints does not exceed the maximum score of 100
        if (totalPoints > 100) {
            totalPoints = 100;
        }

        // Update total points for this section
        document.getElementById('totalPointsIII').innerText = totalPoints;

        // Calculate the total percentage (total points x 35%)
        let totalPercentage = totalPoints * 0.35;
        document.getElementById('totalPercentageIII').innerText = totalPercentage.toFixed(2);
    }

    // Attach event listeners to all checkboxes for change
    document.querySelectorAll('input[name="performanceEvaluation"]').forEach(function (input) {
        input.addEventListener('change', calculateTotalPointsIII);
    });

    // Initial calculation on page load
    calculateTotalPointsIII();
});
</script>
