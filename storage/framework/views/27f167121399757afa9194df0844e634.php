<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? 'Columban College Inc. | HR CATALISTS'); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!--  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <!-- Buttons for datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Styles CSS --> 
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/sidebar.css')); ?>">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/data-tables.css')); ?>">

    <!-- Dashboard Calendar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/db-ats-calendar.css')); ?>">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/ats-calendar.css')); ?>">
</head>

<body>
    <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.system-navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.system-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c)): ?>
<?php $attributes = $__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c; ?>
<?php unset($__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c)): ?>
<?php $component = $__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c; ?>
<?php unset($__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c); ?>
<?php endif; ?>

    <?php echo e($slot); ?>


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
    <script src="<?php echo e(asset('js/db-calendar.js')); ?>"></script>

    <!-- Tab JS -->
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

    <!-- Data Tables -->
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

    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.href = "/login"; // Redirect user back to login
            }
        });
    </script>

</body>
</html><?php /**PATH C:\laragon\www\hr_catalists\resources\views/layouts/admin-ats-layout.blade.php ENDPATH**/ ?>