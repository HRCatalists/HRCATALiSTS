function calculatePoints() {
    let count = document.getElementById("training-count").value;
    let points = count * 2; // 2 points per training
    document.getElementById("total-points").textContent = points;
}



$(document).ready(function(){
    $("#addRow").click(function(){
        let newRow = "<tr><td></td><td></td><td></td><td></td></tr>";
        $("#tableBody").append(newRow);
    });
    
    $("#removeRow").click(function(){
        $("#tableBody tr:last").remove();
    });
});

function calculatePointseminar() {
    let days = parseInt(document.getElementById("seminar-count").value) || 0; // Get input value, default to 0 if empty
    let points = Math.floor(days / 3) * 1 + (days % 3) * 0.33; // 1 pt per 3 days, 0.33 pt per extra day
    document.getElementById("total-pointseminar").textContent = points.toFixed(2); // Display with 2 decimal places
}