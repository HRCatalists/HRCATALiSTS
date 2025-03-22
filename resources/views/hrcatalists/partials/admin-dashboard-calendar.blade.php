<div class="card shadow">
    <div class="card-body">
        <div class="calendar-container">
            <div class="calendar-header d-flex justify-content-between align-items-center">
                <button id="prev-month">&lt;</button>
                <span id="calendar-header" class="text-center"></span>
                <button id="next-month">&gt;</button>
            </div>
            <div id="calendar" class="mb-4"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let eventsData = @json($events); // ✅ Pass events dynamically

        // ✅ Ensure the calendar initializes for both ATS & EMS
        if (document.getElementById("calendar")) {
            initializeCalendar(eventsData);
        }
    });
</script>