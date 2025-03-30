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
                    <input type="radio" id="ten-points-A" name="groupIVA" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>B. Committee Involvement/ voluntary services beyond call of duty (school or student activities outside hours without pay or honorarium)</td>
                <td class="text-center">
                    <input type="radio" id="ten-points-B" name="groupIVB" value="30">
                </td>
                <td class="text-center">(30 pts maximum)</td>
                <td></td>
            </tr>
            <tr>
                <td>C. Participation in the CC-Community Extension Program</td>
                <td class="text-center">
                    <input type="radio" id="ten-points-C" name="groupIVC" value="40">
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
        // Function to calculate total points
        function calculateTotalPointsIV() {
            let totalPoints = 0;

            // Loop through each selected radio button and calculate selected values
            document.querySelectorAll('input[type="radio"]:checked').forEach(function (radio) {
                const value = parseFloat(radio.value); // Ensure value is treated as a float
                totalPoints += value; // Sum the values of all selected radio buttons
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

        // Attach event listeners to all radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(function (input) {
            input.addEventListener('change', calculateTotalPointsIV); // Recalculate when a radio button is selected
        });

        // Initial calculation on page load (if any radio button is already selected)
        calculateTotalPointsIV();
    });
</script>
