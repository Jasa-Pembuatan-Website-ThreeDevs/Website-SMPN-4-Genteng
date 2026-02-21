<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Prestasi - SMPN 4 Genteng</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
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
      --radius-lg: 16px;
      --radius-md: 12px;
      --radius-sm: 8px;
      --shadow-xl: 0 20px 60px rgba(0, 0, 0, 0.2);
      --gradient-primary: linear-gradient(135deg, var(--primary), var(--secondary));
      --transition: 0.3s ease;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.7;
      color: var(--dark);
      background-color: var(--light);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .detail-container {
      width: 100%;
      max-width: 900px;
      background: var(--white);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-xl);
      overflow: hidden;
      position: relative;
      animation: fadeIn 0.6s ease-out;
    }

    .detail-container::before {
      content: '';
      position: absolute; top: 0; left: 0; width: 100%; height: 6px;
      background: var(--gradient-primary);
    }

    .detail-header {
      padding: 50px 50px 30px;
      text-align: center;
    }

    .badge-level {
      display: inline-block;
      padding: 6px 16px;
      background: rgba(37, 99, 235, 0.1);
      color: var(--primary);
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      text-transform: uppercase;
      margin-bottom: 15px;
      letter-spacing: 1px;
    }

    .detail-header h1 {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 10px;
    }

    .meta-info {
      display: flex;
      justify-content: center;
      gap: 25px;
      color: var(--gray);
      font-weight: 500;
    }

    .meta-item { display: flex; align-items: center; gap: 8px; }
    .meta-item i { color: var(--primary); }

    .image-section {
      padding: 0 50px;
      margin-bottom: 40px;
    }

    .achievement-image {
      width: 100%;
      border-radius: var(--radius-md);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      display: block;
      object-fit: cover;
      max-height: 500px;
    }

    .content-section {
      padding: 0 50px 50px;
    }

    .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.3rem;
      color: var(--dark);
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .description-text {
      color: var(--gray);
      font-size: 1.1rem;
      white-space: pre-line; /* Menjaga line break dari textarea */
      background: var(--light);
      padding: 30px;
      border-radius: var(--radius-md);
      border-left: 4px solid var(--primary);
    }

    .detail-actions {
      display: flex;
      gap: 15px;
      margin-top: 40px;
      padding-top: 30px;
      border-top: 1px solid var(--gray-light);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 14px 28px;
      font-weight: 600;
      border-radius: var(--radius-md);
      text-decoration: none;
      transition: var(--transition);
      font-family: 'Poppins', sans-serif;
      flex: 1;
    }

    .btn-back {
      background: var(--light);
      color: var(--gray);
      border: 1px solid var(--gray-light);
    }

    .btn-back:hover {
      background: var(--gray-light);
      color: var(--dark);
    }

    .btn-edit {
      background: var(--gradient-primary);
      color: var(--white);
    }

    .btn-edit:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .detail-header { padding: 40px 25px 20px; }
      .detail-header h1 { font-size: 1.8rem; }
      .image-section, .content-section { padding: 0 25px 30px; }
      .detail-actions { flex-direction: column; }
    }
  </style>
</head>
<body>

  <div class="detail-container">
    <div class="detail-header">
      <span class="badge-level">{{ $achievement->level }}</span>
      <h1>{{ $achievement->title }}</h1>
      <div class="meta-info">
        <div class="meta-item">
          <i class="fas fa-calendar-alt"></i>
          <span>Tahun {{ $achievement->year }}</span>
        </div>
        <div class="meta-item">
          <i class="fas fa-trophy"></i>
          <span>Tingkat {{ $achievement->level }}</span>
        </div>
      </div>
    </div>

    <div class="image-section">
      @if($achievement->image)
        <img src="{{ asset('storage/' . $achievement->image) }}" alt="{{ $achievement->title }}" class="achievement-image">
      @else
        <div class="achievement-image" style="background: var(--gray-light); height: 300px; display: flex; align-items: center; justify-content: center; color: var(--gray);">
          <i class="fas fa-image fa-4x"></i>
        </div>
      @endif
    </div>

    <div class="content-section">
      <h2 class="section-title">
        <i class="fas fa-align-left"></i> Deskripsi Prestasi
      </h2>
      <div class="description-text">
        {{ $achievement->description }}
      </div>

      <div class="detail-actions">
        <a href="{{ route('admin.achievements.index') }}" class="btn btn-back">
          <i class="fas fa-arrow-left"></i> Kembali ke Daftar
        </a>
        <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="btn btn-edit">
          <i class="fas fa-edit"></i> Edit Prestasi
        </a>
      </div>
    </div>
  </div>

</body>
</html>
