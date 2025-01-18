
// employment record form

        // Add new employment record form
        document.getElementById('add-employment-record').addEventListener('click', function () {
          // Select the employment record form to duplicate
          const formToDuplicate = document.querySelector('.employment-record-item');

          // Clone the form
          const clonedForm = formToDuplicate.cloneNode(true);

          // Clear input fields in the cloned form
          const inputs = clonedForm.querySelectorAll('input');
          inputs.forEach(input => {
            input.value = ''; // Reset value
          });

          // Append the cloned form to the container
          const container = document.getElementById('employment-record-section');
          const buttonGroup = document.querySelector('.employment-button-group');
          container.insertBefore(clonedForm, buttonGroup); // Insert above the button group
        });

        // Remove the most recent employment record form
        document.getElementById('remove-employment-record').addEventListener('click', function () {
          const employmentRecords = document.querySelectorAll('.employment-record-item');

          // Only remove if there is more than one form
          if (employmentRecords.length > 1) {
            const lastRecord = employmentRecords[employmentRecords.length - 1];
            lastRecord.remove();
          } else {
            alert('You must keep at least one employment record form.');
          }
        });

