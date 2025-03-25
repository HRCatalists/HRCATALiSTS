<!-- Edit Position Modal -->
<div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPositionModalLabel">EDIT POSITION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editJobForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="job_id" id="editJobId">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editJobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" id="editJobTitle" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editDepartment" class="form-label">Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="department" id="editDepartment" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editDescription" class="form-label">Job Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="job_description" id="editDescription" rows="4" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="editRequirements" class="form-label">Requirements <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="requirements" id="editRequirements" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="editTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="editTags">
                        </div>
                        <div class="col-md-3">
                            <label for="editDateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_issued" id="editDateIssued" required>
                        </div>
                        <div class="col-md-3">
                            <label for="editEndDate" class="form-label">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="end_date" id="editEndDate" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-post">SAVE</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".edit-btn").forEach(button => {
            button.addEventListener("click", function() {
                document.getElementById("editJobId").value = this.dataset.id;
                document.getElementById("editJobTitle").value = this.dataset.title;
                document.getElementById("editDepartment").value = this.dataset.department;
                document.getElementById("editDescription").value = this.dataset.description;
                document.getElementById("editRequirements").value = this.dataset.requirements;
                document.getElementById("editTags").value = this.dataset.tags;
                document.getElementById("editDateIssued").value = this.dataset.dateIssued;
                document.getElementById("editEndDate").value = this.dataset.endDate;
                document.getElementById("editJobForm").action = `/jobs/${this.dataset.id}`;
            });
        });
    });
</script>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views\hrcatalists\ats\edit_position.blade.php ENDPATH**/ ?>