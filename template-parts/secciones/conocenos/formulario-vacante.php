<?php echo do_shortcode('[contact-form-7 id="c6f8469" title="Formulario Vacantes"]')?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('cvFile');
    const uploadArea = document.getElementById('uploadArea');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const removeFile = document.getElementById('removeFile');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            fileName.textContent = file.name;
            uploadArea.style.display = 'none';
            filePreview.style.display = 'block';
        }
    });

    removeFile.addEventListener('click', function() {
        fileInput.value = '';
        uploadArea.style.display = 'block';
        filePreview.style.display = 'none';
        
        // Disparar evento para Contact Form 7
        const event = new Event('change');
        fileInput.dispatchEvent(event);
    });

    // Opcional: Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#0d6efd';
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#dee2e6';
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.style.borderColor = '#dee2e6';
        
        const dt = e.dataTransfer;
        const file = dt.files[0];
        
        if (file) {
            fileInput.files = dt.files;
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    });
});
</script>


