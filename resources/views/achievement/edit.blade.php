<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Prestasi - SMPN 4 Genteng</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* Modern CSS Variables & Reset */
:root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --secondary: #7c3aed;
      --accent: #06b6d4;
      --light: #f8fafc;
      --dark: #0f172a;
      --gray: #64748b;
      --gray-light: #e2e8f0;
      --white: #ffffff;
      --success: #10b981;
      --warning: #f59e0b;
      --error: #ef4444;

      --radius-lg: 16px;
      --radius-md: 12px;
      --radius-sm: 8px;

      --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
      --shadow-md: 0 6px 20px rgba(0, 0, 0, 0.12);
      --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.15);
      --shadow-xl: 0 20px 60px rgba(0, 0, 0, 0.2);

      --transition-fast: 0.2s ease;
      --transition: 0.3s ease;
      --transition-slow: 0.5s ease;

      --gradient-primary: linear-gradient(135deg, var(--primary), var(--secondary));
      --gradient-accent: linear-gradient(135deg, var(--accent), var(--secondary));
      --gradient-dark: linear-gradient(135deg, var(--dark));
      /*#1e293b*/
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
      font-size: 16px;
    }

    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.7;
      color: var(--dark);
      /*background: linear-gradient135deg #f0f9ff 0%, #e0f2fe 100%;*/
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      line-height: 1.3;
    }

    .form-container {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
    }

    .form-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .form-header-icon {
      width: 80px;
      height: 80px;
      margin: 0 auto 20px;
      border-radius: 50%;
      background: var(--gradient-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      font-size: 2rem;
      box-shadow: var(--shadow-lg);
    }

    .form-header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
    }

    .form-header p {
      font-size: 1.1rem;
      color: var(--gray);
      max-width: 600px;
      margin: 0 auto;
    }

    .achievement-form {
      background: var(--white);
      border-radius: var(--radius-lg);
      padding: 50px;
      box-shadow: var(--shadow-xl);
      position: relative;
      overflow: hidden;
    }

    .achievement-form::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: var(--gradient-primary);
    }

    .form-group {
      margin-bottom: 30px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 25px;
    }

    .form-label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: var(--dark);
      font-size: 1.05rem;
      position: relative;
    }

    .form-label.required::after {
      content: '*';
      color: var(--error);
      margin-left: 4px;
    }

    .form-control {
      width: 100%;
      padding: 16px 20px;
      border: 2px solid var(--gray-light);
      border-radius: var(--radius-md);
      font-family: 'Inter', sans-serif;
      font-size: 1rem;
      transition: var(--transition);
      background-color: var(--white);
      color: var(--dark);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .form-control:hover {
      border-color: var(--gray);
    }

    .form-control::placeholder {
      color: var(--gray);
      opacity: 0.7;
    }

    select.form-control {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%232563eb' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 20px center;
      background-size: 16px;
      padding-right: 50px;
    }

    textarea.form-control {
      min-height: 150px;
      resize: vertical;
      line-height: 1.6;
    }

    .file-upload-container {
      position: relative;
    }

    .file-upload-label {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      border: 2px dashed var(--gray-light);
      border-radius: var(--radius-md);
      background-color: var(--light);
      cursor: pointer;
      transition: var(--transition);
      text-align: center;
    }

    .file-upload-label:hover {
      border-color: var(--primary);
      background-color: rgba(37, 99, 235, 0.05);
    }

    .file-upload-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }

    .file-upload-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: rgba(37, 99, 235, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      font-size: 1.5rem;
    }

    .file-upload-text h4 {
      font-size: 1.2rem;
      margin-bottom: 8px;
      color: var(--dark);
    }

    .file-upload-text p {
      color: var(--gray);
      font-size: 0.95rem;
    }

    .file-upload-input {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;
    }

    .file-preview {
      margin-top: 20px;
      display: none;
    }

    .file-preview.active {
      display: block;
    }

    .file-preview-item {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      background-color: var(--light);
      border-radius: var(--radius-md);
      border: 1px solid var(--gray-light);
    }

    .file-preview-icon {
      width: 50px;
      height: 50px;
      border-radius: var(--radius-sm);
      background: var(--gradient-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--white);
      font-size: 1.3rem;
    }

    .file-preview-info {
      flex: 1;
    }

    .file-preview-name {
      font-weight: 600;
      color: var(--dark);
      margin-bottom: 5px;
      word-break: break-all;
    }

    .file-preview-size {
      font-size: 0.9rem;
      color: var(--gray);
    }

    .form-actions {
      display: flex;
      gap: 20px;
      margin-top: 40px;
      padding-top: 30px;
      border-top: 1px solid var(--gray-light);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 16px 32px;
      font-weight: 600;
      font-size: 1rem;
      border-radius: var(--radius-md);
      border: none;
      cursor: pointer;
      transition: var(--transition);
      font-family: 'Poppins', sans-serif;
      position: relative;
      overflow: hidden;
      z-index: 1;
      flex: 1;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--gradient-primary);
      z-index: -1;
      transition: var(--transition);
      opacity: 1;
    }

    .btn:hover::before {
      opacity: 0.9;
      transform: scale(1.05);
    }

    .btn-primary {
      background: var(--gradient-primary);
      color: var(--white);
      box-shadow: var(--shadow-md);
    }

    .btn-secondary {
      background: transparent;
      color: var(--primary);
      border: 2px solid var(--primary);
    }

    .btn-secondary::before {
      background: var(--primary);
      opacity: 0;
    }

    .btn-secondary:hover {
      color: var(--white);
      border-color: transparent;
    }

    .btn-secondary:hover::before {
      opacity: 1;
    }

    .form-footer {
      text-align: center;
      margin-top: 30px;
      color: var(--gray);
      font-size: 0.9rem;
    }

    .form-footer a {
      color: var(--primary);
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition-fast);
    }

    .form-footer a:hover {
      text-decoration: underline;
    }

    /* Validation States */
    .form-control.error {
      border-color: var(--error);
      background-color: rgba(239, 68, 68, 0.05);
    }

    .form-control.success {
      border-color: var(--success);
      background-color: rgba(16, 185, 129, 0.05);
    }

    .validation-message {
      display: block;
      margin-top: 8px;
      font-size: 0.9rem;
      padding-left: 5px;
    }

    .validation-message.error {
      color: var(--error);
    }

    .validation-message.success {
      color: var(--success);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .form-row {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .achievement-form {
        padding: 30px 25px;
      }

      .form-header h1 {
        font-size: 2rem;
      }

      .form-header-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
      }

      .form-actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
      }
    }

    @media (max-width: 576px) {
      body {
        padding: 15px;
      }

      .achievement-form {
        padding: 25px 20px;
      }

      .form-header h1 {
        font-size: 1.8rem;
      }

      .form-control {
        padding: 14px 16px;
      }
    }

    /* Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .achievement-form {
      animation: fadeIn 0.5s ease-out;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <div class="form-header">
      <div class="form-header-icon">
        <i class="fas fa-trophy"></i>
      </div>
      <h1>{{ isset($achievement) ? 'Edit Prestasi' : 'Tambah Prestasi Baru' }}</h1>
      <p>
        Isi form berikut untuk {{ isset($achievement) ? 'mengubah data prestasi' : 'menambahkan prestasi baru' }} SMPN 4 Genteng
      </p>
    </div>

    <form method="POST"
      action="{{ isset($achievement) ? route('admin.achievements.update', $achievement->id) : route('admin.achievements.store') }}"
      enctype="multipart/form-data"
      class="achievement-form"
      id="achievementForm">

      @csrf
      @if(isset($achievement))
      @method('PUT')
      @endif

      <div class="form-row">
        <div class="form-group">
          <label for="title" class="form-label required">Judul Prestasi</label>
          <input type="text"
          name="title"
          id="title"
          class="form-control"
          placeholder="Contoh: Juara 1 Olimpiade Matematika"
          value="{{ old('title', $achievement->title ?? '') }}"
          required>
          <span class="validation-message" id="titleValidation"></span>
        </div>

        <div class="form-group">
          <label for="level" class="form-label required">Tingkat Prestasi</label>
          <select name="level" id="level" class="form-control" required>
            @php
            $currentLevel = old('level', $achievement->level ?? '');
            @endphp
            <option value="" disabled {{ !$currentLevel ? 'selected' : '' }}>Pilih Tingkat Prestasi</option>
            <option value="Kecamatan" {{ $currentLevel == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
            <option value="Kabupaten" {{ $currentLevel == 'Kabupaten' ? 'selected' : '' }}>Kabupaten</option>
            <option value="Provinsi" {{ $currentLevel == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
            <option value="Nasional" {{ $currentLevel == 'Nasional' ? 'selected' : '' }}>Nasional</option>
          </select>
          <span class="validation-message" id="levelValidation"></span>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="year" class="form-label required">Tahun Prestasi</label>
          <input type="number"
          name="year"
          id="year"
          class="form-control"
          placeholder="Contoh: 2023"
          min="2000"
          max="{{ date('Y') + 1 }}"
          value="{{ old('year', $achievement->year ?? '') }}"
          required>
          <span class="validation-message" id="yearValidation"></span>
        </div>

        <div class="form-group">
          <label for="image" class="form-label {{ !isset($achievement) ? 'required' : '' }}">Gambar Prestasi</label>
          <div class="file-upload-container">
            <label for="image" class="file-upload-label">
              <div class="file-upload-content">
                <div class="file-upload-icon">
                  <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <div class="file-upload-text">
                  <h4>{{ isset($achievement) ? 'Ganti Gambar' : 'Unggah Gambar' }}</h4>
                  <p>
                    Klik untuk memilih file atau tarik dan lepas di sini
                  </p>
                  <p style="font-size: 0.85rem; margin-top: 5px;">
                    Format: JPG, PNG, GIF (Maks. 5MB)
                  </p>
                </div>
              </div>
            </label>
            <input type="file"
            name="image"
            id="image"
            class="file-upload-input"
            accept="image/*"
            {{ !isset($achievement) ? 'required' : '' }}>
          </div>

          <div class="file-preview" id="filePreview" style="{{ isset($achievement) && $achievement->image ? 'display: block;' : '' }}">
            <div class="file-preview-item">
              <div class="file-preview-icon">
                <i class="fas fa-image"></i>
              </div>
              <div class="file-preview-info">
                <div class="file-preview-name" id="fileName">
                  {{ isset($achievement) ? $achievement->image : 'Nama file akan muncul di sini' }}
                </div>
                <div class="file-preview-size" id="fileSize">
                  {{ isset($achievement) ? 'File tersimpan' : 'Ukuran file akan muncul di sini' }}
                </div>
              </div>
              <button type="button" class="btn btn-secondary" id="removeFile" style="padding: 8px 16px; font-size: 0.9rem;">
                <i class="fas fa-times"></i> Hapus
              </button>
            </div>
          </div>

          <span class="validation-message" id="imageValidation"></span>
        </div>

      </div>

      <div class="form-group">
        <label for="description" class="form-label required">Deskripsi Prestasi</label>
        <textarea name="description"
          id="description"
          class="form-control"
          placeholder="Deskripsikan prestasi yang diraih..."
          rows="6"
          required>{{ old('description', $achievement->description ?? '') }}</textarea>
        <div style="display: flex; justify-content: space-between; margin-top: 8px;">
          <span class="validation-message" id="descriptionValidation"></span>
          <span id="charCount" style="font-size: 0.9rem; color: var(--gray);">0/1000 karakter</span>
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> {{ isset($achievement) ? 'Update Prestasi' : 'Simpan Prestasi' }}
        </button>
        <a href="{{ route('achievements.index') }}" class="btn btn-secondary">
          <i class="fas fa-arrow-left"></i> Batal
        </a>
      </div>
    </form>
  </div>


  <script>
    // File upload preview functionality
    const fileInput = document.getElementById('image');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const removeFileBtn = document.getElementById('removeFile');

    fileInput.addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
    const file = this.files[0];
    const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);

    // Update preview
    fileName.textContent = file.name;
    fileSize.textContent = `${fileSizeMB} MB`;
    filePreview.style.display = 'block';
    filePreview.classList.add('active');

    // Validate file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
    document.getElementById('imageValidation').textContent = 'Ukuran file terlalu besar (maks. 5MB)';
    document.getElementById('imageValidation').className = 'validation-message error';
    fileInput.classList.add('error');
    } else {
    document.getElementById('imageValidation').textContent = '';
    fileInput.classList.remove('error');
    }
    }
    });

    // Remove file functionality
    removeFileBtn.addEventListener('click', function() {
    fileInput.value = '';
    filePreview.classList.remove('active');
    filePreview.style.display = 'none';
    document.getElementById('imageValidation').textContent = '';
    fileInput.classList.remove('error');
    });

    // Character count for description
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');

    descriptionTextarea.addEventListener('input', function() {
    const length = this.value.length;
    charCount.textContent = `${length}/1000 karakter`;

    if (length > 1000) {
    charCount.style.color = 'var(--error)';
    this.classList.add('error');
    } else if (length >= 10) {
    charCount.style.color = 'var(--success)';
    this.classList.remove('error');
    this.classList.add('success');
    } else {
    charCount.style.color = 'var(--gray)';
    this.classList.remove('error', 'success');
    }
    });

    // Initialize character count
    descriptionTextarea.dispatchEvent(new Event('input'));

    // Form validation
    const form = document.getElementById('achievementForm');
    const inputs = {
      title: document.getElementById('title'),
      level: document.getElementById('level'),
      year: document.getElementById('year'),
      description: document.getElementById('description')
    };

    // Real-time validation
    Object.keys(inputs).forEach(key => {
    const input = inputs[key];
    const validation = document.getElementById(`${key}Validation`);

    input.addEventListener('blur', function() {
    validateField(this, validation);
    });

    input.addEventListener('input', function() {
    // Clear validation on input
    if (this.value.trim() !== '') {
    validation.textContent = '';
    this.classList.remove('error');
    }
    });
    });

    // Year validation
    inputs.year.addEventListener('input', function() {
    const year = parseInt(this.value);
    const currentYear = new Date().getFullYear();
    const validation = document.getElementById('yearValidation');

    if (year < 2000 || year > currentYear + 1) {
    validation.textContent = `Tahun harus antara 2000 dan ${currentYear + 1}`;
    validation.className = 'validation-message error';
    this.classList.add('error');
    } else if (this.value.trim() !== '') {
    validation.textContent = '';
    this.classList.remove('error');
    this.classList.add('success');
    }
    });

    function validateField(field, validationElement) {
      const value = field.value.trim();

      if (field.hasAttribute('required') && value === '') {
        validationElement.textContent = 'Field ini wajib diisi';
        validationElement.className = 'validation-message error';
        field.classList.add('error');
        return false;
      }

      if (field.id === 'year' && value !== '') {
        const year = parseInt(value);
        const currentYear = new Date().getFullYear();

        if (year < 2000 || year > currentYear + 1) {
          validationElement.textContent = `Tahun harus antara 2000 dan ${currentYear + 1}`;
          validationElement.className = 'validation-message error';
          field.classList.add('error');
          return false;
        }
      }

      if (value !== '') {
        validationElement.textContent = '';
        field.classList.remove('error');
        field.classList.add('success');
      }

      return true;
    }

    // Form submission validation
    form.addEventListener('submit', function(e) {
    let isValid = true;

    // Validate all required fields
    Object.keys(inputs).forEach(key => {
    const input = inputs[key];
    const validation = document.getElementById(`${key}Validation`);

    if (!validateField(input, validation)) {
    isValid = false;
    }
    });

    // Validate file if required (only for new achievements)
    const isEditMode = {{ isset($achievement) ? 'true' : 'false' }};
    if (!isEditMode && !fileInput.files[0]) {
    document.getElementById('imageValidation').textContent = 'Gambar prestasi wajib diunggah';
    document.getElementById('imageValidation').className = 'validation-message error';
    isValid = false;
    }

    if (!isValid) {
    e.preventDefault();
    // Scroll to first error
    const firstError = form.querySelector('.error');
    if (firstError) {
    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    }
    });

    // Drag and drop file upload
    const dropArea = document.querySelector('.file-upload-label');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
      e.preventDefault();
      e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
      dropArea.style.borderColor = 'var(--primary)';
      dropArea.style.backgroundColor = 'rgba(37, 99, 235, 0.1)';
    }

    function unhighlight() {
      dropArea.style.borderColor = 'var(--gray-light)';
      dropArea.style.backgroundColor = 'var(--light)';
    }

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
      const dt = e.dataTransfer;
      const files = dt.files;

      if (files.length > 0) {
        fileInput.files = files;
        fileInput.dispatchEvent(new Event('change'));
      }
    }
  </script>
</body>
</html>