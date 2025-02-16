document.addEventListener("DOMContentLoaded", function () {
    // Educational Table
    const educationTableBody = document.querySelector("#educationTable tbody");
    const addEducationButton = document.getElementById("addEducationRow");
    const removeEducationButton = document.getElementById("removeEducationRow");

    function addEditableEducationRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter Degree</td>
            <td contenteditable="true">Enter School</td>
            <td contenteditable="true">Enter Course</td>
            <td contenteditable="true">Enter Major</td>
            <td contenteditable="true">Enter Remarks</td>
        `;
        educationTableBody.appendChild(newRow);
    }

    addEducationButton.addEventListener("click", addEditableEducationRow);

    removeEducationButton.addEventListener("click", function () {
        const rows = educationTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            educationTableBody.removeChild(rows[rows.length - 1]);
        }
    });

    // License Table
    const licenseTableBody = document.querySelector("#licenseTable tbody");
    const addLicenseButton = document.getElementById("addLicenseRow");
    const removeLicenseButton = document.getElementById("removeLicenseRow");

    function addEditableLicenseRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter License</td>
            <td contenteditable="true">Enter License Number</td>
            <td contenteditable="true">Enter Exp Date</td>
            <td contenteditable="true">Enter Renewal Date From</td>
            <td contenteditable="true">Enter Renewal Date To</td>
        `;
        licenseTableBody.appendChild(newRow);
    }

    addLicenseButton.addEventListener("click", addEditableLicenseRow);

    removeLicenseButton.addEventListener("click", function () {
        const rows = licenseTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            licenseTableBody.removeChild(rows[rows.length - 1]);
        }
    });


    
    // employemnt service record

   
    const employmentTableBody = document.querySelector("#employmentTable tbody");
    const addEmploymentButton = document.getElementById("addEmploymentRow");
    const removeEmploymentButton = document.getElementById("removeEmploymentRow");

    function addEditableEmploymentRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter Department</td>
            <td contenteditable="true">Enter Inclusive Date</td>
            <td contenteditable="true">Enter Appointment Record</td>
            <td contenteditable="true">Enter Position/Designation</td>
            <td contenteditable="true">Enter Rank</td>
            <td contenteditable="true">Enter Remarks</td>
        `;
        employmentTableBody.appendChild(newRow);
    }

    addEmploymentButton.addEventListener("click", addEditableEmploymentRow);

    removeEmploymentButton.addEventListener("click", function () {
        const rows = employmentTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            employmentTableBody.removeChild(rows[rows.length - 1]);
        }
    });

    // seminar
    const seminarTableBody = document.querySelector("#seminarTable tbody");
    const addSeminarButton = document.getElementById("addSeminarRow");
    const removeSeminarButton = document.getElementById("removeSeminarRow");

    function addEditableSeminarRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter Date</td>
            <td contenteditable="true">Enter Title</td>
            <td contenteditable="true">Enter Venue</td>
            <td contenteditable="true">Enter Remark</td>
        `;
        seminarTableBody.appendChild(newRow);
    }

    addSeminarButton.addEventListener("click", addEditableSeminarRow);

    removeSeminarButton.addEventListener("click", function () {
        const rows = seminarTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            seminarTableBody.removeChild(rows[rows.length - 1]);
        }
    });


    // organization

    const organizationTableBody = document.querySelector("#organizationTable tbody");
    const addOrganizationButton = document.getElementById("addOrganizationRow");
    const removeOrganizationButton = document.getElementById("removeOrganizationRow");

    function addEditableOrganizationRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter Date of Registration</td>
            <td contenteditable="true">Enter Validity Date</td>
            <td contenteditable="true">Enter Name of Organization</td>
            <td contenteditable="true">Enter Place</td>
            <td contenteditable="true">Enter Position</td>
        `;
        organizationTableBody.appendChild(newRow);
    }

    addOrganizationButton.addEventListener("click", addEditableOrganizationRow);

    removeOrganizationButton.addEventListener("click", function () {
        const rows = organizationTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            organizationTableBody.removeChild(rows[rows.length - 1]);
        }
    });


    // other

    const particularTableBody = document.querySelector("#particularTable tbody");
    const addParticularButton = document.getElementById("addParticularRow");
    const removeParticularButton = document.getElementById("removeParticularRow");

    function addEditableParticularRow() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td contenteditable="true">Enter Date</td>
            <td contenteditable="true">Enter Description/Particular</td>
        `;
        particularTableBody.appendChild(newRow);
    }

    addParticularButton.addEventListener("click", addEditableParticularRow);

    removeParticularButton.addEventListener("click", function () {
        const rows = particularTableBody.getElementsByTagName("tr");
        if (rows.length > 1) {
            particularTableBody.removeChild(rows[rows.length - 1]);
        }
    });
});




