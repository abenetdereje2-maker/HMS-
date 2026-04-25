   // Wait for DOM to load
    document.addEventListener('DOMContentLoaded', function() {
    // Preloader
     const preloader = document.querySelector('.preloader');if (preloader) {
        setTimeout(() => {
            preloader.classList.add('fade-out');
        }, 500);
    }
    
   // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobile-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            const icon = this.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.className = 'fas fa-times';
            } else {
                icon.className = 'fas fa-bars';
            }
        });
    }
   
    // Search Overlay
    const searchIcon = document.querySelector('.search-icon');
    const searchOverlay = document.querySelector('.search-overlay');
    const closeSearch = document.querySelector('.close-search');
    
    if (searchIcon && searchOverlay) {
        searchIcon.addEventListener('click', function() {
            searchOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        closeSearch.addEventListener('click', function() {
            searchOverlay.classList.remove('show');
            document.body.style.overflow = 'auto';
        });
        
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                searchOverlay.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    }

    // Back to Top Button
    const backToTop = document.querySelector('.back-to-top');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            item.classList.toggle('active');
            
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
        });
    });

    // Active Navigation Link
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-menu a');
    
    function setActiveLink() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', setActiveLink);
    // Charts Initialization
    initializeCharts();
    // Calendar Generation
    generateCalendar();
}); 
// Charts Function
function initializeCharts() {
    // Admission Chart
    const admissionCtx = document.getElementById('admissionChart');
    if (admissionCtx) {
        new Chart(admissionCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Patient Admissions',
                    data: [65, 59, 80, 81, 56, 55, 40, 45, 62, 68, 72, 85],
                    borderColor: '#0B3B5C',
                    backgroundColor: 'rgba(11, 59, 92, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    // Department Chart
    const deptCtx = document.getElementById('departmentChart');
    if (deptCtx) {
        new Chart(deptCtx, {
            type: 'doughnut',
            data: {
                labels: ['Cardiology', 'Pediatrics', 'Emergency', 'Maternity', 'Orthopedics'],
                datasets: [{
                    data: [30, 25, 20, 15, 10],
                    backgroundColor: [
                        '#0B3B5C',
                        '#2A9D8F',
                        '#E74C3C',
                        '#F39C12',
                        '#3498DB'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }
}

// Calendar Function
function generateCalendar() {
    const daysGrid = document.querySelector('.days-grid');
    if (!daysGrid) return;
    
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    
    const firstDay = new Date(year, month, 1).getDay();
    const lastDate = new Date(year, month + 1, 0).getDate();
    
    daysGrid.innerHTML = '';
    
    // Empty cells for days before month starts
    for (let i = 0; i < firstDay; i++) {
        daysGrid.innerHTML += `<div class="calendar-day empty"></div>`;
    }
    
    // Fill days of month
    for (let i = 1; i <= lastDate; i++) {
        const isToday = i === currentDate.getDate() && 
                        month === currentDate.getMonth() && 
                        year === currentDate.getFullYear();
        
        daysGrid.innerHTML += `
            <div class="calendar-day ${isToday ? 'today' : ''}">
                ${i}
            </div>
        `;
    }
}

// Smooth Scroll for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            
            // Close mobile menu if open
            const navMenu = document.querySelector('.nav-menu');
            const mobileToggle = document.getElementById('mobile-menu');
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                mobileToggle.querySelector('i').className = 'fas fa-bars';
            }
        }
    });
});

// Form Validation
const contactForm = document.querySelector('.contact-form form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simple validation
        const inputs = this.querySelectorAll('input, textarea');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = '#E74C3C';
                isValid = false;
            } else {
                input.style.borderColor = '#27AE60';
            }
        });
        
        if (isValid) {
            // Show success message
            alert('Message sent successfully!');
            this.reset();
            
            // Reset border colors
            inputs.forEach(input => {
                input.style.borderColor = '#CED4DA';
            });
        } else {
            alert('Please fill in all fields');
        }
    });
}

// Notification Click
const notificationIcon = document.querySelector('.notification-icon');
if (notificationIcon) {
    notificationIcon.addEventListener('click', function() {
        alert('You have 3 new notifications');
    });
}

// User Profile Click
const userProfile = document.querySelector('.user-profile');
if (userProfile) {
    userProfile.addEventListener('click', function() {
        window.location.href = '#profile';
    });
}

// Add smooth hover effects to table rows
const tableRows = document.querySelectorAll('tbody tr');
tableRows.forEach(row => {
    row.addEventListener('mouseenter', function() {
        this.style.backgroundColor = '#F8F9FA';
    });
    
    row.addEventListener('mouseleave', function() {
        this.style.backgroundColor = '';
    });
});

// Dynamic counter animation for stats
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.round(current);
        }
    }, 20);
}

// Apply counter animation to stat cards
const statValues = document.querySelectorAll('.stat-details p');
statValues.forEach(stat => {
    const value = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
    if (!isNaN(value)) {
        stat.textContent = '0';
        animateCounter(stat, value);
    }
});

// Responsive table handling
function handleResponsiveTable() {
    const tables = document.querySelectorAll('table');
    tables.forEach(table => {
        const wrapper = document.createElement('div');
        wrapper.className = 'table-responsive';
        table.parentNode.insertBefore(wrapper, table);
        wrapper.appendChild(table);
    });
}

handleResponsiveTable();

// Window resize handler
window.addEventListener('resize', function() {
    // Close mobile menu on resize if open
    if (window.innerWidth > 768) {
        const navMenu = document.querySelector('.nav-menu');
        const mobileToggle = document.getElementById('mobile-menu');
        if (navMenu && navMenu.classList.contains('active')) {
            navMenu.classList.remove('active');
            if (mobileToggle) {
                mobileToggle.querySelector('i').className = 'fas fa-bars';
            }
        }
    }
});

// Tooltip initialization (simplified)
function initTooltips() {
    const actionButtons = document.querySelectorAll('.action-buttons button');
    actionButtons.forEach(button => {
        button.setAttribute('title', button.className.replace('btn-', '').toUpperCase());
    });
}

initTooltips();

// Print functionality (if needed)
function printReport() {
    window.print();
}

// Export to CSV (simplified)
function exportToCSV() {
    const table = document.querySelector('table');
    if (!table) return;
    
    const rows = table.querySelectorAll('tr');
    let csv = [];
    
    rows.forEach(row => {
        const cells = row.querySelectorAll('th, td');
        const rowData = [];
        cells.forEach(cell => {
            rowData.push(cell.textContent.trim());
        });
        csv.push(rowData.join(','));
    });
    
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'report.csv';
    a.click();
    window.URL.revokeObjectURL(url);
}

