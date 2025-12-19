from PIL import Image, ImageDraw, ImageFont
import os

# Create output directory if it doesn't exist
output_dir = 'assets/images/course_images'
os.makedirs(output_dir, exist_ok=True)

def create_course_image(filename, title, color1, color2):
    """Create a professional gradient course image"""
    width, height = 800, 600
    
    # Create image with gradient
    image = Image.new('RGB', (width, height))
    draw = ImageDraw.Draw(image)
    
    # Create gradient background
    for i in range(height):
        # Calculate gradient color
        r = int(color1[0] + (color2[0] - color1[0]) * i / height)
        g = int(color1[1] + (color2[1] - color1[1]) * i / height)
        b = int(color1[2] + (color2[2] - color1[2]) * i / height)
        draw.rectangle([(0, i), (width, i+1)], fill=(r, g, b))
    
    # Add semi-transparent overlay for depth
    overlay = Image.new('RGBA', (width, height), (0, 0, 0, 50))
    image = image.convert('RGBA')
    image = Image.alpha_composite(image, overlay)
    
    # Add diagonal lines pattern for texture
    draw = ImageDraw.Draw(image)
    for i in range(-height, width, 100):
        draw.line([(i, 0), (i+height, height)], fill=(255, 255, 255, 30), width=2)
    
    # Convert back to RGB
    image = image.convert('RGB')
    
    # Save image
    image.save(os.path.join(output_dir, filename), 'WEBP', quality=85)
    print(f'✅ Created {filename}')

# Create images for the courses
courses = [
    ('digital-marketing.webp', 'Digital Marketing', (45, 55, 139), (100, 75, 200)),  # Navy to Purple
    ('business-analytics.webp', 'Business Analytics', (30, 60, 114), (0, 120, 215)),  # Dark Blue to Light Blue
    ('finance.webp', 'Finance', (17, 94, 89), (0, 150, 136)),  # Teal gradient
]

print('Creating course images...\n')

for filename, title, color1, color2 in courses:
    create_course_image(filename, title, color1, color2)

print('\n✅ All course images created successfully!')
