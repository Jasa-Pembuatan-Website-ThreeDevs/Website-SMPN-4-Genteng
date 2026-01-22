        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mainNav = document.getElementById('mainNav');
        const dropdowns = document.querySelectorAll('.has-dropdown');
        

        
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
        
        // Page tabs functionality
        const pageTabs = document.querySelectorAll('.page-tab');
        const pages = {
            'vision-mission': document.getElementById('vision-mission'),
            'headmaster': document.getElementById('headmaster'),
            'dudika': document.getElementById('dudika')
        };
        
        const pageTitles = {
            'vision-mission': {
                title: 'Visi & Misi',
                desc: 'Mengenal lebih dalam tentang visi, misi, dan tujuan pendidikan SMPN 4 Genteng'
            },
            'headmaster': {
                title: 'Kepala Sekolah',
                desc: 'Profil dan kepemimpinan Dr. Suryadi, M.Pd. sebagai Kepala SMPN 4 Genteng'
            },
            'dudika': {
                title: 'DUDIKA',
                desc: 'Kemitraan strategis dengan dunia usaha, industri, dan dunia kerja'
            }
        };
        
        pageTabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                const pageId = tab.getAttribute('data-page');
                
                // Update active tab
                pageTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Hide all pages
                Object.values(pages).forEach(page => {
                    page.style.display = 'none';
                });
                
                // Show selected page
                pages[pageId].style.display = 'block';
                
                // Update page header
                document.getElementById('pageTitle').textContent = pageTitles[pageId].title;
                document.getElementById('pageDescription').textContent = pageTitles[pageId].desc;
                document.getElementById('currentPage').textContent = pageTitles[pageId].title;
                
                // Smooth scroll to top of page content
                window.scrollTo({
                    top: document.querySelector('.page-header').offsetHeight + 100,
                    behavior: 'smooth'
                });
            });
        });
        
        // Form submission
        const partnershipForm = document.getElementById('partnershipForm');
        
        partnershipForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = {
                companyName: document.getElementById('companyName').value,
                sector: document.getElementById('sector').value,
                contactPerson: document.getElementById('contactPerson').value,
                position: document.getElementById('position').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                partnershipType: document.getElementById('partnershipType').value,
                proposal: document.getElementById('proposal').value
            };
            
            // In a real application, you would send this data to a server
            // For now, we'll just show an alert
            alert('Terima kasih! Proposal kemitraan Anda telah berhasil dikirim. Tim kami akan menghubungi Anda dalam waktu 1-3 hari kerja.');
            
            // Reset form
            partnershipForm.reset();
            
            // Scroll to top of form
            partnershipForm.scrollIntoView({ behavior: 'smooth' });
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
        
        // URL hash handling for direct page access
        window.addEventListener('load', () => {
            const hash = window.location.hash.substring(1);
            
            if (hash && pages[hash]) {
                // Find the corresponding tab and click it
                const correspondingTab = document.querySelector(`.page-tab[data-page="${hash}"]`);
                if (correspondingTab) {
                    correspondingTab.click();
                }
            }
        });