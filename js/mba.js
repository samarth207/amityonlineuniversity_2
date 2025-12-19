// ========================================
// MBA PAGE - JavaScript
// ========================================

// Quick Apply Form Handlers
document.addEventListener('DOMContentLoaded', function() {
    // Hero Form Handler
    const heroForm = document.getElementById('heroApplyForm');
    
    if (heroForm) {
        heroForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const consent = document.getElementById('hero_consent').checked;
            const submitBtn = heroForm.querySelector('button[type="submit"]');
            
            if (!consent) {
                alert('Please accept the consent to proceed with your application. We respect your privacy and will only use your information to provide you with program details.');
                return;
            }
            
            // Show loading state
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;
            
            try {
                const formData = {
                    formType: 'apply',
                    name: document.getElementById('hero_name')?.value || '',
                    phone: document.getElementById('hero_phone')?.value || '',
                    email: document.getElementById('hero_email')?.value || '',
                    consent: consent,
                    course: 'MBA'
                };
                
                const response = await fetch('submit-form.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    sessionStorage.setItem('formSubmitted', 'true');
                    window.location.href = 'thank-you';
                } else {
                    alert('We apologize for the inconvenience. There was an issue submitting your application. Please try again or contact our MBA admissions team directly at +91 92663 01200.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            } catch (error) {
                console.error('Form submission error:', error);
                alert('We apologize for the inconvenience. There was a connection error. Please check your internet connection and try again, or contact our MBA admissions team at +91 92663 01200.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // Quick Apply Form Handler
    const quickForm = document.getElementById('quickApplyForm');
    
    if (quickForm) {
        quickForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const name = document.getElementById('quick_name').value;
            const phone = document.getElementById('quick_phone').value;
            const email = document.getElementById('quick_email').value;
            const consent = document.getElementById('quick_consent').checked;
            const submitBtn = quickForm.querySelector('button[type="submit"]');
            
            if (!name || !phone || !email) {
                alert('Please fill in all required fields (Name, Phone, and Email) to proceed with your application.');
                return;
            }
            
            if (!consent) {
                alert('Please accept the consent to proceed. We respect your privacy and will only use your information to provide you with MBA program details.');
                return;
            }
            
            // Show loading state
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';
            submitBtn.disabled = true;
            
            try {
                const formData = {
                    formType: 'apply',
                    name: name,
                    phone: phone,
                    email: email,
                    consent: consent,
                    course: 'MBA'
                };
                
                const response = await fetch('submit-form.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    sessionStorage.setItem('formSubmitted', 'true');
                    window.location.href = 'thank-you';
                } else {
                    alert('We apologize for the inconvenience. There was an issue submitting your application. Please try again or contact our MBA admissions team directly at +91 92663 01200.');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }
            } catch (error) {
                console.error('Form submission error:', error);
                alert('We apologize for the inconvenience. There was a connection error. Please check your internet connection and try again, or contact our MBA admissions team at +91 92663 01200.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
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
                alert('Thank you for your interest! Your MBA brochure download will begin shortly. Please check your downloads folder. If the download doesn\'t start, please contact us at +91 92663 01200.');
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
