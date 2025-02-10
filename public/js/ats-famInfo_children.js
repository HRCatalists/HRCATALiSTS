
  // Generate child fields dynamically based on number of children
  function generateChildFields() {
    const container = document.getElementById('childFieldsContainer');
    const childrenCount = parseInt(document.getElementById('childrenCount').value, 10);
    container.innerHTML = ''; // Clear previous child fields

    for (let i = 1; i <= childrenCount; i++) {
      const childDiv = document.createElement('div');
      childDiv.className = 'row mb-3';

      // Name field
      const nameDiv = document.createElement('div');
      nameDiv.className = 'col-md-6';
      nameDiv.innerHTML = `
        <label for="childName${i}" class="form-label">Name of Child ${i}</label>
        <input type="text" id="childName${i}" class="form-control" placeholder="Enter Name of Child ${i}">
      `;
      childDiv.appendChild(nameDiv);

      // Date of Birth field
      const dobDiv = document.createElement('div');
      dobDiv.className = 'col-md-6';
      dobDiv.innerHTML = `
        <label for="childDob${i}" class="form-label">Date of Birth of Child ${i}</label>
        <input type="date" id="childDob${i}" class="form-control">
      `;
      childDiv.appendChild(dobDiv);

      container.appendChild(childDiv);
    }
  }