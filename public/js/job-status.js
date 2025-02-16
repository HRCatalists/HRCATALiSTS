document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".activate-btn").forEach(button => {
        button.addEventListener("click", function () {
            let jobId = this.getAttribute("data-id");
            let currentStatus = this.getAttribute("data-status");
            let newStatus = currentStatus === "active" ? "inactive" : "active";
            let buttonElement = this;
            let statusBadge = this.closest("tr").querySelector(".status-badge");

            fetch(`/jobs/${jobId}/toggle-status`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json().catch(() => { throw new Error("Invalid JSON response") }))
            .then(data => {
                console.log("Server Response:", data); // ✅ Debug Response

                if (data.success) {
                    buttonElement.setAttribute("data-status", newStatus);
                    buttonElement.textContent = newStatus === "active" ? "DEACTIVATE" : "ACTIVATE";
                    statusBadge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                    statusBadge.classList.toggle("bg-success", newStatus === "active");
                    statusBadge.classList.toggle("bg-danger", newStatus !== "active");
                } else {
                    alert("Failed to update job status: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred: " + error.message);
            });
        });
    });
});
