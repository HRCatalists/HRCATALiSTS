<!-- CORPORATE COMMITMENT (IN/ OFF CAMPUS) SERVICES -->
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
                <td>A. Attendance in school-sponsored activities (in-house seminars, retreat/ recollection, masses, meetings, graduations, etc.)</td>
                <td class="text-center">
                    <input type="checkbox" id="ten-points-A" name="groupIVA" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>B. Committee Involvement/ voluntary services beyond call of duty (school or student activities outside hours without pay or honorarium)</td>
                <td class="text-center">
                    <input type="checkbox" id="ten-points-B" name="groupIVB" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>C. Participation in the CC-Community Extension Program</td>
                <td class="text-center">
                    <input type="checkbox" id="ten-points-C" name="groupIVC" value="40">
                </td>
                <td class="text-center">(40 pts maximum)</td>
                <td></td>
            </tr>

            <!-- Final totals -->
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
document.addEventListener('DOMContentLoaded', function () {
    // Function to calculate total points for checkboxes
    function calculateTotalPointsIV() {
        let totalPoints = 0;

        // Loop through each selected checkbox and calculate selected values
        document.querySelectorAll('#content4 input[type="checkbox"]:checked').forEach(function (checkbox) {
            const value = parseFloat(checkbox.value); // Ensure value is treated as a float
            totalPoints += value; // Sum the values of all selected checkboxes
        });

        // Ensure total points don't exceed 100 (maximum allowed)
        if (totalPoints > 100) {
            totalPoints = 100;
        }

        // Update the total points in the DOM
        document.getElementById('totalPointsIV').innerText = totalPoints.toFixed(2); // Display rounded total points

        // Calculate the total percentage (total points x 15%)
        let totalPercentage = totalPoints * 0.15;
        document.getElementById('totalPercentageIV').innerText = totalPercentage.toFixed(2); // Display rounded total percentage
    }

    // Attach event listeners to checkboxes to trigger calculation when selected
    document.querySelectorAll('#content4 input[type="checkbox"]').forEach(function (checkbox) {
        checkbox.addEventListener('change', calculateTotalPointsIV);
    });

    // Initial call to calculate totals on page load in case checkboxes are already checked
    calculateTotalPointsIV();
});

</script>
