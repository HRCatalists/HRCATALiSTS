
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<!-- jQuery and DataTables JS -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.53/build/pdfmake.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.53/build/vfs_fonts.js"></script>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart JS -->
<script src="<?php echo e(asset('js/ats-db-chart.js')); ?>"></script>

<!-- Sidebar JS -->
<script src="<?php echo e(asset('js/sidebar.js')); ?>"></script>

<!-- Calendar JS -->



<script src="<?php echo e(asset('js/job-status.js')); ?>"></script>


<script src="<?php echo e(asset('js/ats-status-update.js')); ?>"></script>









<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mapping of statuses to colors
        const statusColors = {
            'pending': '#6c757d',       // Gray
            'screening': '#17a2b8',     // Teal
            'scheduled': '#ffc107',     // Yellow
            'interviewed': '#007bff',   // Blue
            'hired': '#28a745',         // Green
            'rejected': '#dc3545',      // Red
            'archived': '#343a40'       // Dark Gray
        };

        // Apply initial colors on page load
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            const currentStatus = dropdown.value;
            applyStatusColor(dropdown, currentStatus);

            // Listen for changes on dropdown
            dropdown.addEventListener('change', function () {
                const selectedStatus = this.value;
                const form = this.closest('form');
                const applicantName = this.getAttribute('data-applicant-name');

                // Apply color based on selected status
                applyStatusColor(this, selectedStatus);

                // SweetAlert confirmation
                Swal.fire({
                    title: 'Change status to ' + selectedStatus.charAt(0).toUpperCase() + selectedStatus.slice(1) + '?',
                    text: 'Are you sure you want to change the status of ' + applicantName + '?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // ✅ Submit form after confirmation
                    } else {
                        // Revert dropdown to original value if cancelled
                        this.value = this.getAttribute('data-current-status');
                        applyStatusColor(this, this.getAttribute('data-current-status'));
                    }
                });
            });
        });

        // Function to apply background color based on status
        function applyStatusColor(dropdown, status) {
            dropdown.style.backgroundColor = statusColors[status] || '#6c757d';
        }

        // Display success or error messages if available
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "<?php echo e(session('success')); ?>",
                confirmButtonColor: '#28a745'
            });
        <?php endif; ?>

        <?php if(session('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "<?php echo e(session('error')); ?>",
                confirmButtonColor: '#dc3545'
            });
        <?php endif; ?>
    });
</script> 






  




<!-- Overview Tab JS -->


  
<script>
    function showTab(tabId) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach((tab) => {
            tab.style.display = 'none';
        });

        // Show the selected tab
        document.getElementById(tabId).style.display = 'block';

        // Remove active class from all nav links
        document.querySelectorAll('.nav-link').forEach((link) => {
            link.classList.remove('active');
        });

        // Add active class to the clicked nav link
        document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
    }
</script>




<!-- Data Tables for applicant status change-->


 
<script>
    // Function to show the popup
    function showPopup(popupId) {
        const popup = document.getElementById(popupId);
        popup.style.visibility = 'visible';
        popup.style.opacity = '1';
    }

    // Function to close the popup
    function closePopup(popupId) {
        const popup = document.getElementById(popupId);
        popup.style.opacity = '0';
        popup.style.visibility = 'hidden';
    }

    // Action functions for Approve, Archive, and Reject
    function approveAction() {
        alert("Candidate approved!");
        closePopup('approvePopup');
    }
    
    // Function to handle saving changes
    function saveChanges() {
        const selectedStage = document.getElementById("stages").value;
        alert("Stage saved as: " + selectedStage);
        closeEditStages();
    }

    $(document).ready(function () {
        const table = $('#applicantTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            language: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next',
                },
                search: '',
                searchPlaceholder: 'Search',
            },
            columnDefs: [
                { targets: 0, orderable: false, className: 'text-center' }, // Disable sorting for the "Select All" checkbox column
            ],
            order: [[1, 'asc']], // Set initial order to a different column (e.g., the "NAME" column)
            initComplete: function () {
                // Wrap the search input and prepend the icon
                $('.dataTables_filter input')
                    .wrap('<div class="search-box position-relative"></div>')
                    .attr('placeholder', 'Search');
                $('.search-box').prepend('<i class="bi bi-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%); color: #888;"></i>');
            },
        });
    });

    $(document).ready(function () {
        // Initially hide buttons and collapse the checkbox card
        $('.archive-btn, .reject-btn').hide();
        $('.checkbox-card').removeClass('expanded');

        function toggleButtons() {
            let selectedCount = $('.rowCheckbox:checked').length;
            let totalCount = $('.rowCheckbox').length;

            if (selectedCount > 0) {
                $('.archive-btn, .reject-btn').fadeIn();
                $('.checkbox-card').addClass('expanded'); // Expand card
            } else {
                $('.archive-btn, .reject-btn').fadeOut();
                $('.checkbox-card').removeClass('expanded'); // Collapse card
            }

            // Update "Select All" checkbox
            $('#selectAll').prop('checked', selectedCount === totalCount);
        }

        // Function to show popup dynamically
        function showPopup(popupId, message, actionFunction) {
            $('#' + popupId + ' p').html(message);
            $('#' + popupId).css({ visibility: 'visible', opacity: '1' });

            // Attach event listener only once
            $('#' + popupId + ' .confirm-btn').off('click').on('click', function () {
                closePopup(popupId);
                actionFunction();
            });
        }

        // Function to close popup
        function closePopup(popupId) {
            $('#' + popupId).css({ opacity: '0', visibility: 'hidden' });
        }

        // Handle individual checkbox selection
        $(document).on('change', '.rowCheckbox', function () {
            toggleButtons();
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function () {
            $('.rowCheckbox').prop('checked', this.checked);
            toggleButtons();
        });

        // Archive button click event
        $('.archive-btn').on('click', function () {
            let selectedCount = $('.rowCheckbox:checked').length;
            let totalCount = $('.rowCheckbox').length;

            if (selectedCount === totalCount) {
                showPopup('selectAllArchivePopup', "Are you sure you want to archive ALL applicants?", archiveAll);
            } else if (selectedCount >= 2) {
                showPopup('multiArchivePopup', "Are you sure you want to archive the selected applicants?", archiveSelected);
            } else {
                showPopup('archivePopup', "Are you sure you want to archive this applicant?", archiveAction);
            }
        });

        // Reject button click event
        $('.reject-btn').on('click', function () {
            let selectedCount = $('.rowCheckbox:checked').length;
            let totalCount = $('.rowCheckbox').length;

            if (selectedCount === totalCount) {
                showPopup('selectAllRejectPopup', "Are you sure you want to reject ALL applicants?", rejectAll);
            } else if (selectedCount >= 2) {
                showPopup('multiRejectPopup', "Are you sure you want to reject the selected applicants?", rejectSelected);
            } else {
                showPopup('rejectPopup', "Are you sure you want to reject this applicant?", rejectAction);
            }
        });

        // Archive actions
        function archiveAction() {
            alert("Applicant archived!");
        }
        function archiveSelected() {
            alert("Selected applicants archived!");
        }
        function archiveAll() {
            alert("All applicants archived!");
        }

        // Reject actions
        function rejectAction() {
            alert("Applicant rejected!");
        }
        function rejectSelected() {
            alert("Selected applicants rejected!");
        }
        function rejectAll() {
            alert("All applicants rejected!");
        }

        // Close popup when cancel button is clicked
        $('.btn-outline-secondary').on('click', function () {
            closePopup($(this).closest('.custom-popup').attr('id'));
        });
    });
</script>



<!-- Data Tables for applicant status change-->


 




<!-- Logs Datatables JS -->



<script>   
    $(document).ready(function() {
        $('#logsTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            buttons: ['print'],
            language: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                },
                search: "", // Remove the default "Search" label
                searchPlaceholder: "Search" // Add placeholder text
            },
            initComplete: function() {
                // Wrap the search input and prepend the icon
                $('.dataTables_filter input')
                    .wrap('<div class="search-box position-relative"></div>') // Add position relative for icon positioning
                    .attr('placeholder', 'Search'); // Ensure placeholder is set
                $('.search-box').prepend('<i class="bi bi-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%); color: #888;"></i>');
            }
        });
    });  
</script>



<!-- Logs Datatables JS -->












<script>
    fetch('/api/check-auth', {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (!data.authenticated) {
            window.location.replace("/login"); // Redirect if logged out
        }
    })
    .catch(error => console.error('Auth check error:', error));
</script>















<script>
    $(document).ready(function () {
        let table = $('#jobListingsTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            pageLength: 10,
            language: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next',
                },
                search: '',
                searchPlaceholder: 'Search',
            },
            columnDefs: [
                { targets: 0, orderable: false, className: 'text-center' }, // Disable sorting for the checkbox column
                { targets: 4, orderable: true, className: 'text-center' }, // Enable sorting for STATUS column
                { targets: 5, orderable: false, className: 'text-center' }  // Disable sorting for actions column
            ],
            order: [[2, 'desc']], // Sort by DATE CREATED by default
        });

        // Select all checkbox functionality
        $(".selectAllTable").on("change", function () {
            let isChecked = $(this).prop("checked");

            // Select or deselect all row checkboxes
            $(".rowCheckbox").prop("checked", isChecked).trigger("change");
        });

        // Row checkbox functionality (delegated event listener for dynamically loaded checkboxes)
        $(document).on("change", ".rowCheckbox", function () {
            let totalCheckboxes = $(".rowCheckbox").length;
            let checkedCheckboxes = $(".rowCheckbox:checked").length;

            // If all checkboxes are checked, check the "Select All" checkbox
            $(".selectAllTable").prop("checked", totalCheckboxes === checkedCheckboxes);

            // Show/hide the action buttons and expand/collapse card
            toggleActionButtons();
        });

        // Function to show/hide action buttons based on selected checkboxes
        function toggleActionButtons() {
            let anyChecked = $(".rowCheckbox:checked").length > 0;
            $(".bulk-activate-btn, .reject-btn").toggle(anyChecked);

            if (anyChecked) {
                $(".checkbox-card").addClass("expanded"); // Expand the card
            } else {
                $(".checkbox-card").removeClass("expanded"); // Collapse the card
            }

            // Update the ACTIVATE/DEACTIVATE button inside the card
            updateBulkActivateButton();
        }

        // Activate/Deactivate button functionality for each row
        $(document).on("click", ".activate-btn", function () {
            let button = $(this);
            let row = button.closest("tr");
            let statusColumn = row.find(".status-column");

            if (button.text().trim() === "ACTIVATE") {
                if (confirm("Are you sure you want to activate the job?")) {
                    // Change the status to Active
                    statusColumn.html('<span class="badge bg-success">Active</span>');

                    // Change button to DEACTIVATE (red background)
                    button.text("DEACTIVATE")
                        .removeClass("btn-success")
                        .addClass("btn-danger");

                    // Update the ACTIVATE/DEACTIVATE button inside the card
                    updateBulkActivateButton();
                }
            } else {
                if (confirm("Are you sure you want to deactivate the job?")) {
                    // Change the status to Inactive
                    statusColumn.html('<span class="badge bg-danger">Inactive</span>');

                    // Change button back to ACTIVATE (green background)
                    button.text("ACTIVATE")
                        .removeClass("btn-danger")
                        .addClass("btn-success");

                    // Update the ACTIVATE/DEACTIVATE button inside the card
                    updateBulkActivateButton();
                }
            }
        });

        // Bulk activate/deactivate functionality (Card Button)
        $(".bulk-activate-btn").on("click", function () {
            let selectedRows = $(".rowCheckbox:checked").closest("tr");
            let bulkButton = $(".bulk-activate-btn");

            if (selectedRows.length === 0) {
                alert("No jobs selected!");
                return;
            }

            let activeJobs = selectedRows.find(".status-column .bg-success").length;
            let inactiveJobs = selectedRows.find(".status-column .bg-danger").length;

            // Prevent action if selected jobs have mixed statuses
            if (activeJobs > 0 && inactiveJobs > 0) {
                alert("Cannot proceed with the action because of different statuses.");
                return;
            }

            if (bulkButton.text().trim() === "ACTIVATE") {
                if (confirm("Are you sure you want to activate the selected jobs?")) {
                    selectedRows.each(function () {
                        let statusColumn = $(this).find(".status-column");
                        let activateButton = $(this).find(".activate-btn");

                        // Update status to Active
                        statusColumn.html('<span class="badge bg-success">Active</span>');

                        // Change button to DEACTIVATE
                        activateButton.text("DEACTIVATE")
                            .removeClass("btn-success")
                            .addClass("btn-danger");
                    });

                    // Change bulk button to DEACTIVATE
                    bulkButton.text("DEACTIVATE")
                        .removeClass("btn-success")
                        .addClass("btn-danger");
                }
            } else {
                if (confirm("Are you sure you want to deactivate the selected jobs?")) {
                    selectedRows.each(function () {
                        let statusColumn = $(this).find(".status-column");
                        let activateButton = $(this).find(".activate-btn");

                        // Update status to Inactive
                        statusColumn.html('<span class="badge bg-danger">Inactive</span>');

                        // Change button back to ACTIVATE
                        activateButton.text("ACTIVATE")
                            .removeClass("btn-danger")
                            .addClass("btn-success");
                    });

                    // Change bulk button to ACTIVATE
                    bulkButton.text("ACTIVATE")
                        .removeClass("btn-danger")
                        .addClass("btn-success");
                }
            }
        });

        // Function to update the ACTIVATE/DEACTIVATE button inside the card
        function updateBulkActivateButton() {
            let selectedRows = $(".rowCheckbox:checked").closest("tr");
            let activeJobs = selectedRows.find(".status-column .bg-success").length;
            let inactiveJobs = selectedRows.find(".status-column .bg-danger").length;
            let bulkButton = $(".bulk-activate-btn");

            if (activeJobs > 0 && inactiveJobs === 0) {
                bulkButton.text("DEACTIVATE")
                    .removeClass("btn-success")
                    .addClass("btn-danger");
            } else {
                bulkButton.text("ACTIVATE")
                    .removeClass("btn-danger")
                    .addClass("btn-success");
            }
        }
    });
</script>






<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/system-scripts.blade.php ENDPATH**/ ?>