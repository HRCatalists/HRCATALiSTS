<!-- Add Position Modal -->
<div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPositionModalLabel">ADD A POSITION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addJobForm" method="POST" action="{{ route('jobs.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="department" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="description" class="form-label">Job Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="job_description" rows="4" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="requirements" class="form-label">Requirements <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="requirements" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags">
                        </div>
                        <div class="col-md-3">
                            <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_issued" required>
                        </div>
                        <div class="col-md-3">
                            <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-post">POST</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>