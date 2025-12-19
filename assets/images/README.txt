/* ============================================
   HERO BACKGROUND IMAGE GUIDE
   ============================================

   This file contains instructions for adding your hero background image.
   
   RECOMMENDED SPECIFICATIONS:
   ---------------------------
   - Format: JPG or PNG
   - Dimensions: 1920x1080px (Full HD)
   - File size: Under 500KB (optimized)
   - Content: Students studying with laptops, virtual classroom, graduation theme
   
   WHERE TO GET IMAGES:
   --------------------
   1. Stock Photo Sites:
      - Unsplash (https://unsplash.com) - Free high-quality images
      - Pexels (https://pexels.com) - Free stock photos
      - Pixabay (https://pixabay.com) - Free images
   
   2. Search Terms:
      - "online learning"
      - "students with laptops"
      - "virtual classroom"
      - "distance education"
      - "graduation ceremony"
   
   HOW TO ADD:
   -----------
   1. Download your chosen image
   2. Optimize it (compress to reduce file size)
   3. Rename it to: hero-bg.jpg
   4. Place it in: assets/images/hero-bg.jpg
   5. The CSS is already configured to use it!
   
   CURRENT SETUP:
   --------------
   The hero section currently uses a gradient background.
   Once you add hero-bg.jpg, it will automatically display
   with a dark overlay for text readability.
   
   OPTIMIZATION TIPS:
   ------------------
   - Use online tools like TinyPNG or Squoosh.app
   - Convert to WebP format for better compression
   - Consider multiple sizes for responsive images
   - Use lazy loading for below-fold images
   
   ALTERNATIVE:
   ------------
   If you prefer to use the gradient only (no image),
   the current setup already looks professional!
   
   ============================================ */

/* 
   Example CSS in styles.css (already implemented):
   
   .hero {
     background: linear-gradient(135deg, rgba(10, 46, 115, 0.9), rgba(10, 46, 115, 0.7)),
                 url('../assets/images/hero-bg.jpg') center/cover;
     color: var(--white);
     padding: var(--spacing-xl) 0;
     text-align: center;
   }
   
   This creates a dark blue overlay on your image for perfect text contrast.
*/
