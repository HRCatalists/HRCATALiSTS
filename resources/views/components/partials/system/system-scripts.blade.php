{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>


<!-- ✅ jQuery (REQUIRED for DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- ✅ DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- ✅ DataTables Buttons Extension -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- ✅ Export Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<!-- Chart.js Library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart JS -->
<script src="{{ asset('js/ats-db-chart.js') }}"></script>

<!-- Sidebar JS -->
<script src="{{ asset('js/sidebar.js') }}"></script>

<!-- Calendar JS -->
{{-- <script src="{{ asset('js/db-calendar.js') }}"></script> --}}

{{-- Job status JS --}}
<script src="{{ asset('js/job-status.js') }}"></script>

{{-- Job status JS --}}
{{-- <script src="{{ asset('js/ats-status-update.js') }}"></script> --}}


{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- DataTables toolbar/pagination Initialization for Applicant Tables --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}
{{-- <script>
    $(document).ready(function () {
        // Loop through each table with class 'applicantTable' and initialize DataTables
        $('.applicantTable').each(function () {
            $(this).DataTable({
                responsive: true, // Makes the table adapt on different screen sizes
                paging: true, // Enables pagination (Next, Previous, etc.)
                searching: true, // Enables the search input box
                info: true, // Shows table info like "Showing 1 to 10 of 50 entries"
                lengthChange: true, // Allows user to select number of entries to show
                order: [[3, 'desc']], // Default sort by 4th column (Applied Date) in descending order
                dom: '<"datatable-toolbar d-flex justify-content-between align-items-center my-3"lf>tip'
                // Custom DOM layout:
                // "l" = entries length dropdown
                // "f" = search box
                // "t" = table
                // "i" = info text
                // "p" = pagination controls
                // All wrapped in a flexbox toolbar for styling
            });
        });

        // When a new tab is shown (via Bootstrap tab click),
        // force the DataTable to redraw its columns (important for hidden tab tables)
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
            $('.applicantTable').DataTable().columns.adjust().draw();
        });
    });
</script> --}}
<script>
    $(document).ready(function () {
        // Initialize all tables
        $('.applicantTable').each(function () {
            $(this).DataTable({
                responsive: true,
                paging: true,
                searching: true,
                info: true,
                lengthChange: true,
                order: [[3, 'desc']],
                dom: '<"datatable-toolbar d-flex justify-content-between align-items-center my-3"lf>tip',
                columnDefs: [
                    { targets: 3, width: '180px' }, // STATUS
                    { targets: 6, width: '200px' }, // POSITION APPLIED TO
                ],
            });
        });

        // Fix for hidden tabs
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
            $('.applicantTable').DataTable().columns.adjust().draw();
        });

        // Add row numbering
        $('.applicantTable').each(function () {
            const table = $(this).DataTable();

            table.on('draw', function () {
                const pageInfo = table.page.info();
                let rowNum = pageInfo.start + 1;

                table.rows({ page: 'current' }).every(function () {
                    const row = this.node();
                    $(row).find('td.no-number').first().html(rowNum++);
                });
            });

            table.draw(); // Trigger initial numbering
        });
    });
</script>
{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- DataTables Initialization for Applicant Tables --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}

{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- Change status dropdown start --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mapping of statuses to colors
        const statusColors = {
            'pending': '#6c757d',       // Gray
            'screening': '#17a2b8',     // Teal
            'scheduled': '#ffc107',     // Yellow
            'evaluation': '#007bff',   // Blue
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
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#28a745'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#dc3545'
            });
        @endif
    });
</script> 
{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- Change status dropdown end --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}  

{{-- * --}}
{{-- ** --}}
{{-- *** --}}
<!-- Overview Tab JS -->
{{-- *** --}}
{{-- ** --}}
{{-- * --}}  
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
{{-- * --}}
{{-- ** --}}
{{-- *** --}}
<!-- Overview Tab JS -->
{{-- *** --}}
{{-- ** --}}
{{-- * --}}  

{{-- * --}}
{{-- ** --}}
{{-- *** --}}
<!-- Logs Datatables JS -->
{{-- *** --}}
{{-- ** --}}
{{-- * --}}
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
{{-- * --}}
{{-- ** --}}
{{-- *** --}}
<!-- Logs Datatables JS -->
{{-- *** --}}
{{-- ** --}}
{{-- * --}}

{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- Redirect to login page if user clicks back button --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}
{{-- <script>
    window.addEventListener('pageshow', function (event) {
        if (event.persisted || (window.performance && window.performance.getEntriesByType("navigation")[0].type === "back_forward")) {
            // Perform AJAX call to check if the user is still authenticated
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
                    // Redirect to login if user is logged out
                    window.location.replace("/login");
                }
            })
            .catch(error => {
                console.error('Error checking authentication:', error);
            });
        }
    });
</script> --}}
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
{{-- * --}}
{{-- ** --}}
{{-- *** --}}
{{-- Redirect to login page if user clicks back button --}}
{{-- *** --}}
{{-- ** --}}
{{-- * --}}