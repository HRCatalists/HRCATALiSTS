

// page 4 - licenses script


        // Add new license form
        document.getElementById('add-form').addEventListener('click', function () {
          // Select the license form to duplicate
          const formToDuplicate = document.querySelector('.qualification-license-form');

          // Clone the form
          const clonedForm = formToDuplicate.cloneNode(true);

          // Clear input fields in the cloned form
          const inputs = clonedForm.querySelectorAll('input');
          inputs.forEach(input => {
            input.value = ''; // Reset value
          });

          // Append the cloned form below the existing forms
          const container = document.getElementById('occupational-qualifications-container');
          container.insertBefore(clonedForm, document.querySelector('.button-group')); // Insert before the button group
        });

        // Remove the most recent license form
        document.getElementById('remove-form').addEventListener('click', function () {
          const licenseForms = document.querySelectorAll('.qualification-license-form');

          // Only remove if more than one form exists
          if (licenseForms.length > 1) {
            const lastForm = licenseForms[licenseForms.length - 1];
            lastForm.remove();
          } else {
            alert('You must keep at least one license form.');
          }
        });


