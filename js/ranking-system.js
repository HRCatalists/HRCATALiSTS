// Advanced/Special training in related field to one's teaching/ assignment (3 weeks maximum)

$(document).ready(function () {
    $("#addRow").click(function () {
        let newRow = `
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
            </tr>`;
        $("#tableBody").append(newRow);
    });

    $("#removeRow").click(function () {
        $("#tableBody tr:last").remove();
    });
});



// 2 pts per training

function calculatePoints() {
    let count = document.getElementById("training-count").value;
    let points = count * 2; // 2 points per training
    document.getElementById("total-points").textContent = points;
}


// Seminars/Workshops/Conventions/Conferences (cumulative)

function calculatePointseminar() {
    let days = parseInt(document.getElementById("seminar-count").value) || 0; // Get input value, default to 0 if empty
    let points = Math.floor(days / 3) * 1 + (days % 3) * 0.33; // 1 pt per 3 days, 0.33 pt per extra day
    document.getElementById("total-pointseminar").textContent = points.toFixed(2); // Display with 2 decimal places
}


// Within the School

function calculatePointwithintheschool() {
    let activities = parseInt(document.getElementById("withintheschool-count").value) || 0; // Get input value, default to 0 if empty
    document.getElementById("total-points-withintheschool").textContent = activities; // 1 point per activity
}


// Outside the School

function calculatePointRQAT() {
    let activities = parseInt(document.getElementById("RQAT-count").value) || 0; // Get input value, default to 0 if empty
    document.getElementById("total-points-RQAT").textContent = activities; // 1 point per activity
}


// Officer/ National Accreditor

function calculatePointNatAccreditor() {
    let count = document.getElementById("NatAccreditor-count").value;
    let points = count * 2; // 2 points per training
    document.getElementById("total-points-NatAccreditor").textContent = points;
}


// Member (last 3 years)

function calculatePointmember() {
    let activities = parseInt(document.getElementById("member-count").value) || 0; // Get input value, default to 0 if empty
    document.getElementById("total-points-member").textContent = activities; 
}
