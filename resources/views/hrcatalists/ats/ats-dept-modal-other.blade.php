{{-- <!-- TEST MODAL BUTTON -->
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testDepartmentModal">
    Test Department Modal
</button>

<!-- TEST MODAL -->
<div class="modal fade" id="testDepartmentModal" tabindex="-1" aria-labelledby="testDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="testDepartmentModalLabel">Test Department Selection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- Department Dropdown -->
                    <div class="mb-3">
                        <label for="test_department" class="form-label">Department</label>
                        <select id="test_department" class="form-select">
                            <option value="">Select a Department</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- Hidden Fields for "Other" -->
                    <div id="test_customDepartmentFields" class="d-none">
                        <div class="mb-2">
                            <label for="test_other_department_name" class="form-label">New Department Name</label>
                            <input type="text" id="test_other_department_name" class="form-control">
                        </div>
                        <div>
                            <label for="test_other_department_code" class="form-label">Department Code</label>
                            <input type="text" id="test_other_department_code" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Script (PURE JS, NO DEPENDENCIES) -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("test_department");
    const customFields = document.getElementById("test_customDepartmentFields");
    const nameInput = document.getElementById("test_other_department_name");
    const codeInput = document.getElementById("test_other_department_code");

    function toggleCustomFields() {
        const show = select.value === "other";
        customFields.classList.toggle("d-none", !show);
        nameInput.required = show;
        codeInput.required = show;
        console.log("Changed to:", select.value); // ✅ DEBUG
    }

    toggleCustomFields(); // init
    select.addEventListener("change", toggleCustomFields);
});
</script> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department Toggle Test</title>
    <!-- Bootstrap CSS (CDN for testing) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">Test: Show Custom Fields When "Other" is Selected</h2>

        <!-- Trigger Modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testDepartmentModal">
            Open Department Modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="testDepartmentModal" tabindex="-1" aria-labelledby="testDepartmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="testDepartmentModalLabel">Department Selector</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Department Dropdown -->
                            <div class="mb-3">
                                <label for="test_department" class="form-label">Department</label>
                                <select id="test_department" class="form-select">
                                    <option value="">Select a Department</option>
                                    <option value="IT">IT</option>
                                    <option value="HR">HR</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Hidden Fields for Custom Department -->
                            <div id="test_customDepartmentFields" class="d-none">
                                <div class="mb-3">
                                    <label for="test_other_department_name" class="form-label">New Department Name</label>
                                    <input type="text" class="form-control" id="test_other_department_name">
                                </div>
                                <div class="mb-3">
                                    <label for="test_other_department_code" class="form-label">Department Code</label>
                                    <input type="text" class="form-control" id="test_other_department_code">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toggle Logic -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const select = document.getElementById("test_department");
            const customFields = document.getElementById("test_customDepartmentFields");
            const nameInput = document.getElementById("test_other_department_name");
            const codeInput = document.getElementById("test_other_department_code");

            function toggleCustomFields() {
                const show = select.value === "other";
                customFields.classList.toggle("d-none", !show);
                nameInput.required = show;
                codeInput.required = show;
                console.log("Department changed to:", select.value);
            }

            toggleCustomFields();
            select.addEventListener("change", toggleCustomFields);
        });
    </script>
</body>
</html>

