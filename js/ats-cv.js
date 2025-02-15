 document.getElementById('cv').addEventListener('change', function() {
            const fileInput = this;
            const file = fileInput.files[0];
            const fileName = file?.name || "or drag your file here";
            const fileType = file?.type;
            const fileSize = file?.size || 0;
            const fileErrorMessage = document.getElementById('error-message');
            const fileUpload = document.querySelector('.file-upload');
            const maxSize = 2 * 1024 * 1024; // 2 MB in bytes
    
            // Reset file name display and error message
            document.querySelector('.file-name').textContent = fileName;
            fileErrorMessage.style.display = 'none';
            fileUpload.classList.remove('border-danger');
    
            // Check if the file type is PDF
            if (fileType !== 'application/pdf') {
                fileUpload.classList.add('border-danger');
                fileErrorMessage.textContent = "Wrong file format. Please upload a PDF.";
                fileErrorMessage.style.display = 'block';
            } 
            // Check if file size exceeds 2 MB
            else if (fileSize > maxSize) {
                fileUpload.classList.add('border-danger');
                fileErrorMessage.textContent = "File size exceeds 2 MB. Please upload a smaller file.";
                fileErrorMessage.style.display = 'block';
            } 
            // If valid, remove any error indicators
            else {
                fileUpload.classList.remove('border-danger');
                fileErrorMessage.style.display = 'none';
            }
        });

