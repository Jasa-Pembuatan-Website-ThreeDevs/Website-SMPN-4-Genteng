<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 4 Genteng - Visi Misi</title>
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
            --gradient-dark: linear-gradient(135deg, var(--dark), #1e293b);
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
            background-color: var(--white);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1.3;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition-fast);
        }

        ul {

            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .section {
            padding: 100px 0;
            position: relative;
        }

        .section-light {
            background-color: var(--light);
        }

        .section-dark {
            background: var(--gradient-dark);
            color: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.8rem;
            margin-bottom: 16px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .section-dark .section-title h2 {
            background: linear-gradient(135deg, var(--accent), #a5b4fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-title p {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-dark .section-title p {
            color: var(--gray-light);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 32px;
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

        .btn-lg {
            padding: 18px 40px;
            font-size: 1.1rem;
        }

        /* Modern Header & Navigation */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .header.scrolled {
            box-shadow: var(--shadow-md);
            background-color: rgba(255, 255, 255, 0.98);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.8rem;
            box-shadow: var(--shadow-md);
        }

        .logo-text h1 {
            font-size: 1.6rem;
            color: var(--dark);
            line-height: 1.2;
        }

        .logo-text p {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-list {
            display: flex;
            gap: 6px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            padding: 12px 20px;
            font-weight: 500;
            border-radius: var(--radius-md);
            transition: var(--transition-fast);
            color: var(--dark);
        }

        .nav-link:hover {
            background-color: rgba(37, 99, 235, 0.08);
            color: var(--primary);
        }

        .nav-link.active {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow-sm);
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 220px;
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 100;
            padding: 8px;
        }

        .dropdown-item {
            padding: 12px 16px;
            display: block;
            border-radius: var(--radius-sm);
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .dropdown-item:hover {
            background-color: rgba(37, 99, 235, 0.08);
            color: var(--primary);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mobile-menu-btn {
            display: none;
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: var(--gradient-primary);
            color: var(--white);
            border: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.4rem;
            box-shadow: var(--shadow-sm);
        }

        /* Page Header */
        .page-header {
            padding: 160px 0 80px;
            background: var(--gradient-primary);
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') center/cover no-repeat;
            opacity: 0.1;
        }

        .page-header h1 {
            font-size: 3.5rem;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .page-header p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .breadcrumb a {
            color: rgba(255, 255, 255, 0.9);
            transition: var(--transition-fast);
        }

        .breadcrumb a:hover {
            color: var(--white);
            text-decoration: underline;
        }

        .breadcrumb .separator {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Vision Mission Page */
        .vision-mission-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .vision-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 60px;
            box-shadow: var(--shadow-lg);
            margin-bottom: 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .vision-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--gradient-primary);
        }

        .vision-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto 30px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 2.5rem;
        }

        .vision-card h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .vision-card p {
            font-size: 1.3rem;
            color: var(--gray);
            font-weight: 500;
            line-height: 1.6;
        }

        .vision-card p.highlight {
            color: var(--primary);
            font-weight: 600;
        }

        .mission-list {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .mission-item {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: flex-start;
            gap: 25px;
            transition: var(--transition);
        }

        .mission-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .mission-number {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--gradient-primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            box-shadow: var(--shadow-md);
        }

        .mission-content h3 {
            font-size: 1.5rem;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .mission-content p {
            color: var(--gray);
        }

        /* Headmaster Page */
        .headmaster-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 60px;
            align-items: start;
        }

        .headmaster-profile {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            position: sticky;
            top: 120px;
        }

        .headmaster-photo {
            width: 200px;
            height: 200px;
            margin: 0 auto 25px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--white);
            box-shadow: var(--shadow-md);
        }

        .headmaster-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .headmaster-name {
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .headmaster-position {
            font-size: 1.1rem;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 20px;
        }

        .headmaster-details {
            text-align: left;
            margin-top: 30px;
        }

        .detail-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .headmaster-bio {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 50px;
            box-shadow: var(--shadow-lg);
        }

        .headmaster-bio h2 {
            font-size: 2rem;
            margin-bottom: 25px;
            color: var(--dark);
            position: relative;
            padding-bottom: 15px;
        }

        .headmaster-bio h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .headmaster-bio p {
            margin-bottom: 20px;
            color: var(--gray);
        }

        .headmaster-quote {
            background: rgba(37, 99, 235, 0.05);
            border-left: 4px solid var(--primary);
            padding: 25px;
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
            margin: 40px 0;
            font-style: italic;
            font-size: 1.1rem;
            color: var(--dark);
        }

        .headmaster-quote i {
            color: var(--primary);
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .headmaster-achievements {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .achievement-item {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 25px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
            text-align: center;
            transition: var(--transition);
        }

        .achievement-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .achievement-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
        }

        /* DUDIKA Page */
        .dudika-intro {
            max-width: 900px;
            margin: 0 auto 80px;
            text-align: center;
        }

        .dudika-intro h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .dudika-intro p {
            font-size: 1.1rem;
            color: var(--gray);
        }

        .dudika-partners {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .partner-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-md);
            text-align: center;
            transition: var(--transition);
            border: 1px solid var(--gray-light);
        }

        .partner-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary);
        }

        .partner-logo {
            width: 120px;
            height: 120px;
            margin: 0 auto 25px;
            border-radius: var(--radius-md);
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-light);
        }

        .partner-logo img {
            max-width: 100%;
            max-height: 100%;
        }

        .partner-name {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .partner-sector {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .partner-benefits {
            margin-top: 25px;
            text-align: left;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
        }

        .benefit-icon {
            color: var(--success);
            font-size: 0.9rem;
            margin-top: 5px;
            flex-shrink: 0;
        }

        .collaboration-form {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 60px;
            box-shadow: var(--shadow-lg);
            max-width: 800px;
            margin: 0 auto;
        }

        .collaboration-form h3 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: var(--dark);
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: var(--transition-fast);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: var(--white);
            padding: 80px 0 30px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 50px;
            margin-bottom: 60px;
        }

        .footer-logo .logo-text h1 {
            color: var(--white);
        }

        .footer-logo .logo-text p {
            color: var(--gray-light);
            margin-top: 16px;
        }

        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 24px;
            color: var(--white);
            position: relative;
            padding-bottom: 12px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 3px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-link {
            color: var(--gray-light);
            transition: var(--transition-fast);
        }

        .footer-link:hover {
            color: var(--primary);
            padding-left: 8px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }

        .social-links {
            display: flex;
            gap: 16px;
            margin-top: 24px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--gradient-primary);
            transform: translateY(-5px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray-light);
            font-size: 0.9rem;
        }

        /* Tabs untuk Navigasi Antar Halaman */
        .page-tabs {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 40px 0 60px;
        }

        .page-tab {
            padding: 14px 28px;
            background: var(--white);
            border-radius: var(--radius-md);
            font-weight: 600;
            color: var(--gray);
            border: 2px solid var(--gray-light);
            transition: var(--transition);
        }

        .page-tab:hover {
            color: var(--primary);
            border-color: var(--primary);
        }

        .page-tab.active {
            background: var(--gradient-primary);
            color: var(--white);
            border-color: transparent;
            box-shadow: var(--shadow-md);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .headmaster-container {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            
            .headmaster-profile {
                position: static;
            }
            
            .page-header h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: flex;
            }
            
            .nav {
                position: fixed;
                top: 100px;
                left: 0;
                width: 100%;
                background: var(--white);
                padding: 24px;
                box-shadow: var(--shadow-lg);
                border-radius: 0 0 var(--radius-lg) var(--radius-lg);
                opacity: 0;
                visibility: hidden;
                transform: translateY(-20px);
                transition: var(--transition);
            }
            
            .nav.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            
            .nav-list {
                flex-direction: column;
                gap: 8px;
            }
            
            .dropdown {
                position: static;
                box-shadow: none;
                opacity: 1;
                visibility: visible;
                transform: none;
                background: transparent;
                padding: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            
            .dropdown.active {
                max-height: 500px;
                margin-top: 8px;
                padding-left: 20px;
            }
            
            .page-header {
                padding: 140px 0 60px;
            }
            
            .page-header h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2.4rem;
            }
            
            .section {
                padding: 80px 0;
            }
            
            .vision-card {
                padding: 40px 30px;
            }
            
            .vision-card h2 {
                font-size: 1.8rem;
            }
            
            .vision-card p {
                font-size: 1.1rem;
            }
            
            .mission-item {
                flex-direction: column;
                text-align: center;
                padding: 30px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .collaboration-form {
                padding: 40px 30px;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 120px 0 50px;
            }
            
            .page-header h1 {
                font-size: 2.2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .section {
                padding: 60px 0;
            }
            
            .container {
                padding: 0 20px;
            }
            
            .vision-card {
                padding: 30px 20px;
            }
            
            .headmaster-profile,
            .headmaster-bio {
                padding: 30px 20px;
            }
            
            .partner-card {
                padding: 30px 20px;
            }
        }

        /* Animation Effects */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
  @include('components.navbar')

    <main class="main-content">
        <!-- Page Header -->
        <section class="page-header" id="pageHeader">
            <div class="container">
                <h1 id="pageTitle">Visi & Misi</h1>
                <p id="pageDescription">Mengenal lebih dalam tentang visi, misi, dan tujuan pendidikan SMPN 4 Genteng</p>
                
                <div class="breadcrumb">
                    <a href="index.html">Beranda</a>
                    <span class="separator">/</span>
                    <a href="#about">Tentang</a>
                    <span class="separator">/</span>
                    <span id="currentPage">Visi & Misi</span>
                </div>
            </div>
        </section>

        <!-- Visi Misi Content -->
        <section class="section" id="vision-mission" style="display: block;">
            <div class="container vision-mission-container">
                <div class="section-title animate-on-scroll">
                    <h2>Visi Kami</h2>
                    <p>Menjadi sekolah unggulan yang melahirkan generasi cerdas, berkarakter mulia, berwawasan global, dan berjiwa kepemimpinan.</p>
                </div>
                
                <div class="vision-card animate-on-scroll">
                    <div class="vision-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h2>"Terwujudnya Peserta Didik yang Berprestasi, Berakhlak Mulia, Terampil, dan Peduli Lingkungan."</h2>
                    <p class="highlight">Visi ini mencerminkan komitmen SMPN 4 Genteng untuk mengembangkan potensi akademik dan non-akademik siswa secara seimbang.</p>
                </div>
                
                <div class="section-title animate-on-scroll">
                    <h2>Misi Kami</h2>
                    <p>Langkah-langkah strategis untuk mencapai visi pendidikan SMPN 4 Genteng</p>
                </div>
                
                <div class="mission-list">
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">1</div>
                        <div class="mission-content">
                            <h3>Meningkatkan Kualitas Pembelajaran</h3>
                            <p>Menyelenggarakan proses pembelajaran yang inovatif, kreatif, efektif, dan berbasis teknologi untuk mengoptimalkan potensi akademik siswa.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">2</div>
                        <div class="mission-content">
                            <h3>Membentuk Karakter Unggul</h3>
                            <p>Membangun lingkungan sekolah yang religius, berbudaya, dan menjunjung tinggi nilai-nilai Pancasila untuk membentuk siswa berakhlak mulia.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">3</div>
                        <div class="mission-content">
                            <h3>Mengembangkan Potensi Non-Akademik</h3>
                            <p>Menyediakan beragam kegiatan ekstrakurikuler dan pembinaan bakat untuk mengembangkan keterampilan dan minat siswa.</p>
                        </div>
                    </div>
                    
                    <div class="mission-item animate-on-scroll">
                        <div class="mission-number">4</div>
                        <div class="mission-content">
                            <h3>Meningkatkan Kepedulian Lingkungan</h3>
                            <p>Menerapkan program Adiwiyata untuk menumbuhkan kesadaran dan kepedulian siswa terhadap kelestarian lingkungan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
   @include('components.footer')
    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        const dropdowns = document.querySelectorAll('.has-dropdown');
        
        mobileMenuBtn.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            mobileMenuBtn.innerHTML = mainNav.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Mobile dropdown functionality
        dropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.dropdown');
            
            dropdown.addEventListener('click', (e) => {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    dropdownMenu.classList.toggle('active');
                }
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.nav') && !e.target.closest('.mobile-menu-btn')) {
                mainNav.classList.remove('active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                
                dropdowns.forEach(dropdown => {
                    const dropdownMenu = dropdown.querySelector('.dropdown');
                    dropdownMenu.classList.remove('active');
                });
            }
        });
        
        // Header scroll effect
        const header = document.querySelector('.header');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);
        
        // Observe all animate-on-scroll elements
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>