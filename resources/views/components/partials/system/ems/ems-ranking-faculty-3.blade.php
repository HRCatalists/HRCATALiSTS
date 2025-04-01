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
                <td class="text-center">
                    <input type="number" id="classroomEvaluationIII" name="performanceEvaluationIII" class="score-input" min="0" max="50">
                </td>
                <td class="text-center">(50 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>B. Work Performance Evaluation</td>
                <td class="text-center">
                    <input type="number" id="workEvaluationIII" name="performanceEvaluationIII" class="score-input" min="0" max="50">
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
document.addEventListener('DOMContentLoaded', function () {
    function calculateTotalPointsIII() {
        let totalPoints = 0;
        const maxScore = 100;

        // Get all numeric inputs in the Faculty Performance section (Form 3)
        document.querySelectorAll('#content3 .score-input').forEach(function (input) {
            let value = parseFloat(input.value) || 0; // Convert input to number or default to 0
            if (value > parseFloat(input.max)) {
                value = parseFloat(input.max); // Ensure value does not exceed max allowed score
            }
            totalPoints += value;
        });

        // Ensure total does not exceed the maximum score
        totalPoints = Math.min(totalPoints, maxScore);

        // Update total points (in Form 3)
        document.getElementById('totalPointsIII').innerText = totalPoints.toFixed(2);

        // Calculate weighted percentage (35%)
        let totalPercentage = totalPoints * 0.35;
        document.getElementById('totalPercentageIII').innerText = totalPercentage.toFixed(2);
    }

    // Attach event listeners to input fields (in Form 3)
    document.querySelectorAll('#content3 .score-input').forEach(function (input) {
        input.addEventListener('input', calculateTotalPointsIII);
    });

    // Initial calculation on page load for Form 3
    calculateTotalPointsIII();
});
</script>
