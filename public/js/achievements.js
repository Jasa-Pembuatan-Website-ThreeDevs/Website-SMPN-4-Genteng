// Achievements Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize search and filter functionality
    initSearchAndFilter();
    
    // Initialize tooltips
    initTooltips();
    
    // Initialize image modals
    initImageModals();
});

// Search and Filter Functionality
function initSearchAndFilter() {
    const searchInput = document.getElementById('searchInput');
    const levelFilter = document.getElementById('levelFilter');
    const yearFilter = document.getElementById('yearFilter');
    const achievementRows = document.querySelectorAll('.achievement-row');
    
    function filterAchievements() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedLevel = levelFilter.value;
        const selectedYear = yearFilter.value;
        
        achievementRows.forEach(row => {
            const title = row.getAttribute('data-title');
            const level = row.getAttribute('data-level');
            const year = row.getAttribute('data-year');
            
            const matchesSearch = !searchTerm || title.includes(searchTerm);
            const matchesLevel = !selectedLevel || level === selectedLevel;
            const matchesYear = !selectedYear || year === selectedYear;
            
            if (matchesSearch && matchesLevel && matchesYear) {
                row.style.display = '';
                row.classList.add('fade-in');
            } else {
                row.style.display = 'none';
            }
        });
        
        // Check if all rows are hidden
        const visibleRows = document.querySelectorAll('.achievement-row[style=""]');
        if (visibleRows.length === 0) {
            showNoResultsMessage();
        } else {
            removeNoResultsMessage();
        }
    }
    
    // Add CSS for fade-in animation
    const style = document.createElement('style');
    style.textContent = `
        .fade-in {
            animation: fadeInRow 0.3s ease;
        }
        
        @keyframes fadeInRow {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Add event listeners
    if (searchInput) searchInput.addEventListener('input', filterAchievements);
    if (levelFilter) levelFilter.addEventListener('change', filterAchievements);
    if (yearFilter) yearFilter.addEventListener('change', filterAchievements);
}

// No Results Message
function showNoResultsMessage() {
    if (!document.getElementById('noResultsMessage')) {
        const message = document.createElement('div');
        message.id = 'noResultsMessage';
        message.className = 'empty-state';
        message.innerHTML = `
            <div class="empty-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3>Tidak Ada Hasil</h3>
            <p>Tidak ditemukan prestasi yang sesuai dengan kriteria pencarian</p>
            <button class="btn btn-secondary" onclick="resetFilters()">
                <i class="fas fa-redo"></i> Reset Filter
            </button>
        `;
        
        const tableContainer = document.querySelector('.table-responsive');
        if (tableContainer) {
            tableContainer.parentNode.insertBefore(message, tableContainer.nextSibling);
        }
    }
}

function removeNoResultsMessage() {
    const message = document.getElementById('noResultsMessage');
    if (message) {
        message.remove();
    }
}

function resetFilters() {
    const searchInput = document.getElementById('searchInput');
    const levelFilter = document.getElementById('levelFilter');
    const yearFilter = document.getElementById('yearFilter');
    
    if (searchInput) searchInput.value = '';
    if (levelFilter) levelFilter.value = '';
    if (yearFilter) yearFilter.value = '';
    
    // Trigger filter function
    const achievementRows = document.querySelectorAll('.achievement-row');
    achievementRows.forEach(row => {
        row.style.display = '';
        row.classList.add('fade-in');
    });
    
    removeNoResultsMessage();
}

// Tooltips
function initTooltips() {
    const tooltipElements = document.querySelectorAll('[title]');
    
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function(e) {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = this.title;
            
            document.body.appendChild(tooltip);
            
            const rect = this.getBoundingClientRect();
            tooltip.style.left = rect.left + window.scrollX + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = rect.top + window.scrollY - tooltip.offsetHeight - 10 + 'px';
            
            this._tooltip = tooltip;
        });
        
        element.addEventListener('mouseleave', function() {
            if (this._tooltip) {
                this._tooltip.remove();
                delete this._tooltip;
            }
        });
    });
    
    // Add tooltip styles
    const tooltipStyle = document.createElement('style');
    tooltipStyle.textContent = `
        .tooltip {
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            z-index: 10000;
            pointer-events: none;
            white-space: nowrap;
            animation: tooltipFadeIn 0.2s ease;
        }
        
        .tooltip:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.8);
        }
        
        @keyframes tooltipFadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(tooltipStyle);
}

// Image Modals
function initImageModals() {
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    if (imageModal && modalImage) {
        // Close modal when clicking outside
        imageModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
                closeDeleteModal();
            }
        });
    }
}

function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    if (modal && modalImage) {
        modalImage.src = imageSrc;
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Delete Confirmation Modal
let currentDeleteForm = null;

function confirmDelete(button) {
    const form = button.closest('.delete-form');
    const modal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');
    
    if (form && modal && deleteForm) {
        currentDeleteForm = form;
        deleteForm.action = form.action;
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        currentDeleteForm = null;
    }
}

// Handle delete form submission
document.addEventListener('submit', function(e) {
    if (e.target.id === 'deleteForm') {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
        submitBtn.disabled = true;
        
        // Submit the original form
        if (currentDeleteForm) {
            const formData = new FormData(currentDeleteForm);
            
            fetch(currentDeleteForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload page on success
                    window.location.reload();
                } else {
                    alert('Gagal menghapus data');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    closeDeleteModal();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus data');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                closeDeleteModal();
            });
        }
    }
});

// Export data functionality (optional)
function exportData(format = 'csv') {
    const data = [];
    const headers = ['No', 'Judul', 'Tingkat', 'Tahun', 'Deskripsi'];
    
    // Collect data from table
    document.querySelectorAll('.achievement-row').forEach((row, index) => {
        if (row.style.display !== 'none') {
            const rowData = [
                index + 1,
                row.querySelector('.achievement-title strong').textContent,
                row.querySelector('.level-badge').textContent,
                row.querySelector('.year-badge').textContent,
                row.querySelector('.description-truncate').textContent.trim()
            ];
            data.push(rowData);
        }
    });
    
    if (format === 'csv') {
        exportToCSV(headers, data);
    } else if (format === 'excel') {
        exportToExcel(headers, data);
    }
}

function exportToCSV(headers, data) {
    let csvContent = headers.join(',') + '\n';
    
    data.forEach(row => {
        csvContent += row.map(cell => `"${cell}"`).join(',') + '\n';
    });
    
    const blob = new Blob(['\uFEFF' + csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    
    link.setAttribute('href', url);
    link.setAttribute('download', `prestasi_smpn4genteng_${new Date().toISOString().split('T')[0]}.csv`);
    link.style.visibility = 'hidden';
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}