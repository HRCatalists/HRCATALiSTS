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
            <tr>
                <td><strong>A. Teacher Experience</strong></td>
                <td class="text-center"><input type="checkbox" id="sixty-points" name="teacherExperience" value="60"></td>
                <td><strong>(60 pts maximum)</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>Every year of full-time teaching in CC</td>
                <td class="text-center"><input type="checkbox" id="ten-points-1" name="teacherExperience" value="2"></td>
                <td class="text-center">2 pts</td>
                <td></td>
            </tr>
            <tr>
                <td>Every year of full-time teaching in other schools</td>
                <td class="text-center"><input type="checkbox" id="ten-points-2" name="teacherExperience" value="1"></td>
                <td class="text-center">1 pt</td>
                <td></td>
            </tr>
            <tr>
                <td>Every year of part-time teaching in CC</td>
                <td class="text-center"><input type="checkbox" id="ten-points-3" name="teacherExperience" value="0.5"></td>
                <td class="text-center">1/2 pt</td>
                <td></td>
            </tr>
            <tr>
                <td>Every year of part-time teaching in other schools</td>
                <td class="text-center"><input type="checkbox" id="ten-points-4" name="teacherExperience" value="0.25"></td>
                <td class="text-center">1/4 pt</td>
                <td></td>
            </tr>

            <!-- LETTER B -->
            <tr>
                <td><strong>B. Professional Growth and Leadership</strong></td>
                <td class="text-center"><input type="checkbox" id="ten-points-5" name="growthLeadership" value="40"></td>
                <td><strong>(40 pts maximum)</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>B.1 Research Output</td>
                <td class="text-center"><input type="checkbox" id="ten-points-6" name="growthLeadershipResearch" value="15"></td>
                <td class="text-center">15 pts</td>
                <td></td>
            </tr>
            <tr>
                <td>B.2 Publication/ Scholarly Ability</td>
                <td class="text-center"><input type="checkbox" id="fifteen-points" name="growthLeadershipPublication" value="5"></td>
                <td class="text-center">5 pts</td>
                <td></td>
            </tr>
            <tr>
                <td>B.3 Participation in Area/Dept/Program Dev't.</td>
                <td class="text-center"><input type="checkbox" id="five-points" name="growthLeadershipParticipation" value="5"></td>
                <td class="text-center">5 pts</td>
                <td></td>
            </tr>
            <tr>
                <td>B.4 Professional Leadership</td>
                <td class="text-center"><input type="checkbox" id="five-points-2" name="growthLeadershipProfessional" value="5"></td>
                <td class="text-center">5 pts</td>
                <td></td>
            </tr>

            <!-- Final totals -->
            <tr>
                <td><strong>TOTAL CREDIT POINTS EARNED (II)</strong></td>
                <td></td>
                <td id="totalPoints">0</td>
                <td></td>
            </tr>
            <tr>
                <td><strong>TOTAL CREDIT POINTS EARNED x 20%</strong></td>
                <td id="totalPercentage">0</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to calculate total points
        function calculateTotalPoints() {
            let totalPoints = 0;

            // Loop through each checked checkbox and calculate selected values
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(function (checkbox) {
                const value = parseFloat(checkbox.value); // Ensure value is treated as a float
                totalPoints += value; // Add the value to total points
            });

            // Update the total points in the DOM
            document.getElementById('totalPoints').innerText = totalPoints.toFixed(2); // Display rounded total points

            // Calculate the total percentage (total points x 20%)
            let totalPercentage = totalPoints * 0.20;
            document.getElementById('totalPercentage').innerText = totalPercentage.toFixed(2); // Display rounded total percentage
        }

        // Attach event listeners to all checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(function (input) {
            input.addEventListener('change', calculateTotalPoints); // Recalculate when a checkbox is toggled
        });

        // Initial calculation on page load (if any checkbox is already selected)
        calculateTotalPoints();
    });
</script>
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ems/ems-ranking-faculty-2.blade.php ENDPATH**/ ?>