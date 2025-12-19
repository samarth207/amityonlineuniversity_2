// ========================================
// MBA PAGE - JavaScript
// ========================================

// Quick Apply Form Handlers
document.addEventListener('DOMContentLoaded', function() {
    // Hero Form Handler
    const heroForm = document.getElementById('heroApplyForm');
    
    if (heroForm) {
        heroForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const consent = document.getElementById('hero_consent').checked;
            
            if (consent) {
                alert('Thank you for your interest! Our MBA counsellor will contact you within 24 hours.');
                heroForm.reset();
            } else {
                alert('Please accept the consent to proceed.');
            }
        });
    }
    
    // Quick Apply Form Handler
    const quickForm = document.getElementById('quickApplyForm');
    
    if (quickForm) {
        quickForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('quick_name').value;
            const phone = document.getElementById('quick_phone').value;
            const email = document.getElementById('quick_email').value;
            const consent = document.getElementById('quick_consent').checked;
            
            if (name && phone && email && consent) {
                alert('Thank you for your interest! Our MBA counsellor will contact you within 24 hours.');
                quickForm.reset();
            } else {
                alert('Please fill all required fields and accept consent.');
            }
        });
    }
    
    // ========================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#lightbox') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offset = 80;
                    const targetPosition = target.offsetTop - offset;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // ========================================
    // DOWNLOAD BROCHURE HANDLER
    // ========================================
    document.querySelectorAll('a[href="#"]').forEach(link => {
        if (link.textContent.includes('Download Brochure')) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                alert('MBA Brochure download will start shortly. Please check your downloads folder.');
                // In production, this would trigger actual PDF download
                // window.location.href = 'assets/brochures/mba-brochure.pdf';
            });
        }
    });
    
    // ========================================
    // STICKY FORM BEHAVIOR
    // ========================================
    const stickyForm = document.querySelector('.sticky-form');
    const heroSection = document.querySelector('section[style*="linear-gradient"]');
    
    if (stickyForm && heroSection) {
        window.addEventListener('scroll', function() {
            const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
            
            if (window.scrollY > heroBottom - 100) {
                stickyForm.style.position = 'fixed';
                stickyForm.style.top = '80px';
            } else {
                stickyForm.style.position = 'relative';
                stickyForm.style.top = 'auto';
            }
        });
    }
    
    // ========================================
    // WHAT MAKES THIS MBA DIFFERENT CAROUSEL
    // ========================================
    const mbaCarouselTrack = document.querySelector('.mba-carousel-track');
    const mbaCarouselCards = document.querySelectorAll('.mba-carousel-card');
    const mbaCarouselDots = document.querySelectorAll('.mba-carousel-dot');
    
    if (mbaCarouselTrack && mbaCarouselCards.length > 0) {
        let mbaCurrentIndex = 0;
        let mbaDirection = 1; // 1 for left to right, -1 for right to left
        const mbaCardWidth = 320; // Card width
        const mbaGap = 20; // Gap between cards
        const mbaTotalCards = mbaCarouselCards.length;
        const mbaMaxIndex = mbaTotalCards - 2; // Show 2 cards at a time
        
        function updateMBACarousel() {
            const offset = mbaCurrentIndex * (mbaCardWidth + mbaGap);
            mbaCarouselTrack.style.transition = 'transform 1s ease-in-out';
            mbaCarouselTrack.style.transform = `translateX(-${offset}px)`;
            
            // Update dots
            mbaCarouselDots.forEach((dot, index) => {
                if (index === Math.floor(mbaCurrentIndex)) {
                    dot.style.background = 'white';
                    dot.style.width = '30px';
                } else {
                    dot.style.background = 'rgba(255,255,255,0.5)';
                    dot.style.width = '12px';
                }
            });
        }
        
        function autoPlayMBACarousel() {
            mbaCurrentIndex += mbaDirection;
            
            // Reverse direction at boundaries
            if (mbaCurrentIndex >= mbaMaxIndex) {
                mbaDirection = -1;
            } else if (mbaCurrentIndex <= 0) {
                mbaDirection = 1;
            }
            
            updateMBACarousel();
        }
        
        // Auto-play every 3 seconds
        let mbaAutoPlayInterval = setInterval(autoPlayMBACarousel, 3000);
        
        // Pause on hover
        const mbaCarouselWrapper = document.querySelector('.mba-carousel-wrapper');
        if (mbaCarouselWrapper) {
            mbaCarouselWrapper.addEventListener('mouseenter', () => {
                clearInterval(mbaAutoPlayInterval);
            });
            
            mbaCarouselWrapper.addEventListener('mouseleave', () => {
                mbaAutoPlayInterval = setInterval(autoPlayMBACarousel, 3000);
            });
        }
        
        // Dot click functionality
        mbaCarouselDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                mbaCurrentIndex = index;
                updateMBACarousel();
            });
        });
        
        // Initialize
        updateMBACarousel();
    }
});
