// Form Validation and Country Codes
// =================================

// All Country Codes (sorted: India first, then alphabetical)
const countryCodes = [
    { code: '+91', country: 'IN', name: 'India' },
    { code: '+93', country: 'AF', name: 'Afghanistan' },
    { code: '+355', country: 'AL', name: 'Albania' },
    { code: '+213', country: 'DZ', name: 'Algeria' },
    { code: '+1684', country: 'AS', name: 'American Samoa' },
    { code: '+376', country: 'AD', name: 'Andorra' },
    { code: '+244', country: 'AO', name: 'Angola' },
    { code: '+1264', country: 'AI', name: 'Anguilla' },
    { code: '+1268', country: 'AG', name: 'Antigua & Barbuda' },
    { code: '+54', country: 'AR', name: 'Argentina' },
    { code: '+374', country: 'AM', name: 'Armenia' },
    { code: '+297', country: 'AW', name: 'Aruba' },
    { code: '+61', country: 'AU', name: 'Australia' },
    { code: '+43', country: 'AT', name: 'Austria' },
    { code: '+994', country: 'AZ', name: 'Azerbaijan' },
    { code: '+1242', country: 'BS', name: 'Bahamas' },
    { code: '+973', country: 'BH', name: 'Bahrain' },
    { code: '+880', country: 'BD', name: 'Bangladesh' },
    { code: '+1246', country: 'BB', name: 'Barbados' },
    { code: '+375', country: 'BY', name: 'Belarus' },
    { code: '+32', country: 'BE', name: 'Belgium' },
    { code: '+501', country: 'BZ', name: 'Belize' },
    { code: '+229', country: 'BJ', name: 'Benin' },
    { code: '+1441', country: 'BM', name: 'Bermuda' },
    { code: '+975', country: 'BT', name: 'Bhutan' },
    { code: '+591', country: 'BO', name: 'Bolivia' },
    { code: '+387', country: 'BA', name: 'Bosnia & Herzegovina' },
    { code: '+267', country: 'BW', name: 'Botswana' },
    { code: '+55', country: 'BR', name: 'Brazil' },
    { code: '+246', country: 'IO', name: 'British Indian Ocean Territory' },
    { code: '+1284', country: 'VG', name: 'British Virgin Islands' },
    { code: '+673', country: 'BN', name: 'Brunei' },
    { code: '+359', country: 'BG', name: 'Bulgaria' },
    { code: '+226', country: 'BF', name: 'Burkina Faso' },
    { code: '+257', country: 'BI', name: 'Burundi' },
    { code: '+855', country: 'KH', name: 'Cambodia' },
    { code: '+237', country: 'CM', name: 'Cameroon' },
    { code: '+1', country: 'CA', name: 'Canada' },
    { code: '+238', country: 'CV', name: 'Cape Verde' },
    { code: '+1345', country: 'KY', name: 'Cayman Islands' },
    { code: '+236', country: 'CF', name: 'Central African Republic' },
    { code: '+235', country: 'TD', name: 'Chad' },
    { code: '+56', country: 'CL', name: 'Chile' },
    { code: '+86', country: 'CN', name: 'China' },
    { code: '+57', country: 'CO', name: 'Colombia' },
    { code: '+269', country: 'KM', name: 'Comoros' },
    { code: '+242', country: 'CG', name: 'Congo' },
    { code: '+243', country: 'CD', name: 'Congo (DRC)' },
    { code: '+682', country: 'CK', name: 'Cook Islands' },
    { code: '+506', country: 'CR', name: 'Costa Rica' },
    { code: '+225', country: 'CI', name: "Côte d'Ivoire" },
    { code: '+385', country: 'HR', name: 'Croatia' },
    { code: '+53', country: 'CU', name: 'Cuba' },
    { code: '+599', country: 'CW', name: 'Curaçao' },
    { code: '+357', country: 'CY', name: 'Cyprus' },
    { code: '+420', country: 'CZ', name: 'Czech Republic' },
    { code: '+45', country: 'DK', name: 'Denmark' },
    { code: '+253', country: 'DJ', name: 'Djibouti' },
    { code: '+1767', country: 'DM', name: 'Dominica' },
    { code: '+1809', country: 'DO', name: 'Dominican Republic' },
    { code: '+593', country: 'EC', name: 'Ecuador' },
    { code: '+20', country: 'EG', name: 'Egypt' },
    { code: '+503', country: 'SV', name: 'El Salvador' },
    { code: '+240', country: 'GQ', name: 'Equatorial Guinea' },
    { code: '+291', country: 'ER', name: 'Eritrea' },
    { code: '+372', country: 'EE', name: 'Estonia' },
    { code: '+268', country: 'SZ', name: 'Eswatini' },
    { code: '+251', country: 'ET', name: 'Ethiopia' },
    { code: '+500', country: 'FK', name: 'Falkland Islands' },
    { code: '+298', country: 'FO', name: 'Faroe Islands' },
    { code: '+679', country: 'FJ', name: 'Fiji' },
    { code: '+358', country: 'FI', name: 'Finland' },
    { code: '+33', country: 'FR', name: 'France' },
    { code: '+594', country: 'GF', name: 'French Guiana' },
    { code: '+689', country: 'PF', name: 'French Polynesia' },
    { code: '+241', country: 'GA', name: 'Gabon' },
    { code: '+220', country: 'GM', name: 'Gambia' },
    { code: '+995', country: 'GE', name: 'Georgia' },
    { code: '+49', country: 'DE', name: 'Germany' },
    { code: '+233', country: 'GH', name: 'Ghana' },
    { code: '+350', country: 'GI', name: 'Gibraltar' },
    { code: '+30', country: 'GR', name: 'Greece' },
    { code: '+299', country: 'GL', name: 'Greenland' },
    { code: '+1473', country: 'GD', name: 'Grenada' },
    { code: '+590', country: 'GP', name: 'Guadeloupe' },
    { code: '+1671', country: 'GU', name: 'Guam' },
    { code: '+502', country: 'GT', name: 'Guatemala' },
    { code: '+224', country: 'GN', name: 'Guinea' },
    { code: '+245', country: 'GW', name: 'Guinea-Bissau' },
    { code: '+592', country: 'GY', name: 'Guyana' },
    { code: '+509', country: 'HT', name: 'Haiti' },
    { code: '+504', country: 'HN', name: 'Honduras' },
    { code: '+852', country: 'HK', name: 'Hong Kong' },
    { code: '+36', country: 'HU', name: 'Hungary' },
    { code: '+354', country: 'IS', name: 'Iceland' },
    { code: '+62', country: 'ID', name: 'Indonesia' },
    { code: '+98', country: 'IR', name: 'Iran' },
    { code: '+964', country: 'IQ', name: 'Iraq' },
    { code: '+353', country: 'IE', name: 'Ireland' },
    { code: '+972', country: 'IL', name: 'Israel' },
    { code: '+39', country: 'IT', name: 'Italy' },
    { code: '+1876', country: 'JM', name: 'Jamaica' },
    { code: '+81', country: 'JP', name: 'Japan' },
    { code: '+962', country: 'JO', name: 'Jordan' },
    { code: '+7', country: 'KZ', name: 'Kazakhstan' },
    { code: '+254', country: 'KE', name: 'Kenya' },
    { code: '+686', country: 'KI', name: 'Kiribati' },
    { code: '+383', country: 'XK', name: 'Kosovo' },
    { code: '+965', country: 'KW', name: 'Kuwait' },
    { code: '+996', country: 'KG', name: 'Kyrgyzstan' },
    { code: '+856', country: 'LA', name: 'Laos' },
    { code: '+371', country: 'LV', name: 'Latvia' },
    { code: '+961', country: 'LB', name: 'Lebanon' },
    { code: '+266', country: 'LS', name: 'Lesotho' },
    { code: '+231', country: 'LR', name: 'Liberia' },
    { code: '+218', country: 'LY', name: 'Libya' },
    { code: '+423', country: 'LI', name: 'Liechtenstein' },
    { code: '+370', country: 'LT', name: 'Lithuania' },
    { code: '+352', country: 'LU', name: 'Luxembourg' },
    { code: '+853', country: 'MO', name: 'Macau' },
    { code: '+261', country: 'MG', name: 'Madagascar' },
    { code: '+265', country: 'MW', name: 'Malawi' },
    { code: '+60', country: 'MY', name: 'Malaysia' },
    { code: '+960', country: 'MV', name: 'Maldives' },
    { code: '+223', country: 'ML', name: 'Mali' },
    { code: '+356', country: 'MT', name: 'Malta' },
    { code: '+692', country: 'MH', name: 'Marshall Islands' },
    { code: '+596', country: 'MQ', name: 'Martinique' },
    { code: '+222', country: 'MR', name: 'Mauritania' },
    { code: '+230', country: 'MU', name: 'Mauritius' },
    { code: '+262', country: 'YT', name: 'Mayotte' },
    { code: '+52', country: 'MX', name: 'Mexico' },
    { code: '+691', country: 'FM', name: 'Micronesia' },
    { code: '+373', country: 'MD', name: 'Moldova' },
    { code: '+377', country: 'MC', name: 'Monaco' },
    { code: '+976', country: 'MN', name: 'Mongolia' },
    { code: '+382', country: 'ME', name: 'Montenegro' },
    { code: '+1664', country: 'MS', name: 'Montserrat' },
    { code: '+212', country: 'MA', name: 'Morocco' },
    { code: '+258', country: 'MZ', name: 'Mozambique' },
    { code: '+95', country: 'MM', name: 'Myanmar' },
    { code: '+264', country: 'NA', name: 'Namibia' },
    { code: '+674', country: 'NR', name: 'Nauru' },
    { code: '+977', country: 'NP', name: 'Nepal' },
    { code: '+31', country: 'NL', name: 'Netherlands' },
    { code: '+687', country: 'NC', name: 'New Caledonia' },
    { code: '+64', country: 'NZ', name: 'New Zealand' },
    { code: '+505', country: 'NI', name: 'Nicaragua' },
    { code: '+227', country: 'NE', name: 'Niger' },
    { code: '+234', country: 'NG', name: 'Nigeria' },
    { code: '+683', country: 'NU', name: 'Niue' },
    { code: '+850', country: 'KP', name: 'North Korea' },
    { code: '+389', country: 'MK', name: 'North Macedonia' },
    { code: '+47', country: 'NO', name: 'Norway' },
    { code: '+968', country: 'OM', name: 'Oman' },
    { code: '+92', country: 'PK', name: 'Pakistan' },
    { code: '+680', country: 'PW', name: 'Palau' },
    { code: '+970', country: 'PS', name: 'Palestine' },
    { code: '+507', country: 'PA', name: 'Panama' },
    { code: '+675', country: 'PG', name: 'Papua New Guinea' },
    { code: '+595', country: 'PY', name: 'Paraguay' },
    { code: '+51', country: 'PE', name: 'Peru' },
    { code: '+63', country: 'PH', name: 'Philippines' },
    { code: '+48', country: 'PL', name: 'Poland' },
    { code: '+351', country: 'PT', name: 'Portugal' },
    { code: '+1787', country: 'PR', name: 'Puerto Rico' },
    { code: '+974', country: 'QA', name: 'Qatar' },
    { code: '+262', country: 'RE', name: 'Réunion' },
    { code: '+40', country: 'RO', name: 'Romania' },
    { code: '+7', country: 'RU', name: 'Russia' },
    { code: '+250', country: 'RW', name: 'Rwanda' },
    { code: '+590', country: 'BL', name: 'Saint Barthélemy' },
    { code: '+290', country: 'SH', name: 'Saint Helena' },
    { code: '+1869', country: 'KN', name: 'Saint Kitts & Nevis' },
    { code: '+1758', country: 'LC', name: 'Saint Lucia' },
    { code: '+590', country: 'MF', name: 'Saint Martin' },
    { code: '+508', country: 'PM', name: 'Saint Pierre & Miquelon' },
    { code: '+1784', country: 'VC', name: 'Saint Vincent & Grenadines' },
    { code: '+685', country: 'WS', name: 'Samoa' },
    { code: '+378', country: 'SM', name: 'San Marino' },
    { code: '+239', country: 'ST', name: 'São Tomé & Príncipe' },
    { code: '+966', country: 'SA', name: 'Saudi Arabia' },
    { code: '+221', country: 'SN', name: 'Senegal' },
    { code: '+381', country: 'RS', name: 'Serbia' },
    { code: '+248', country: 'SC', name: 'Seychelles' },
    { code: '+232', country: 'SL', name: 'Sierra Leone' },
    { code: '+65', country: 'SG', name: 'Singapore' },
    { code: '+1721', country: 'SX', name: 'Sint Maarten' },
    { code: '+421', country: 'SK', name: 'Slovakia' },
    { code: '+386', country: 'SI', name: 'Slovenia' },
    { code: '+677', country: 'SB', name: 'Solomon Islands' },
    { code: '+252', country: 'SO', name: 'Somalia' },
    { code: '+27', country: 'ZA', name: 'South Africa' },
    { code: '+82', country: 'KR', name: 'South Korea' },
    { code: '+211', country: 'SS', name: 'South Sudan' },
    { code: '+34', country: 'ES', name: 'Spain' },
    { code: '+94', country: 'LK', name: 'Sri Lanka' },
    { code: '+249', country: 'SD', name: 'Sudan' },
    { code: '+597', country: 'SR', name: 'Suriname' },
    { code: '+46', country: 'SE', name: 'Sweden' },
    { code: '+41', country: 'CH', name: 'Switzerland' },
    { code: '+963', country: 'SY', name: 'Syria' },
    { code: '+886', country: 'TW', name: 'Taiwan' },
    { code: '+992', country: 'TJ', name: 'Tajikistan' },
    { code: '+255', country: 'TZ', name: 'Tanzania' },
    { code: '+66', country: 'TH', name: 'Thailand' },
    { code: '+670', country: 'TL', name: 'Timor-Leste' },
    { code: '+228', country: 'TG', name: 'Togo' },
    { code: '+690', country: 'TK', name: 'Tokelau' },
    { code: '+676', country: 'TO', name: 'Tonga' },
    { code: '+1868', country: 'TT', name: 'Trinidad & Tobago' },
    { code: '+216', country: 'TN', name: 'Tunisia' },
    { code: '+90', country: 'TR', name: 'Turkey' },
    { code: '+993', country: 'TM', name: 'Turkmenistan' },
    { code: '+1649', country: 'TC', name: 'Turks & Caicos Islands' },
    { code: '+688', country: 'TV', name: 'Tuvalu' },
    { code: '+256', country: 'UG', name: 'Uganda' },
    { code: '+380', country: 'UA', name: 'Ukraine' },
    { code: '+971', country: 'AE', name: 'UAE' },
    { code: '+44', country: 'GB', name: 'United Kingdom' },
    { code: '+1', country: 'US', name: 'United States' },
    { code: '+598', country: 'UY', name: 'Uruguay' },
    { code: '+998', country: 'UZ', name: 'Uzbekistan' },
    { code: '+678', country: 'VU', name: 'Vanuatu' },
    { code: '+379', country: 'VA', name: 'Vatican City' },
    { code: '+58', country: 'VE', name: 'Venezuela' },
    { code: '+84', country: 'VN', name: 'Vietnam' },
    { code: '+1340', country: 'VI', name: 'U.S. Virgin Islands' },
    { code: '+681', country: 'WF', name: 'Wallis & Futuna' },
    { code: '+967', country: 'YE', name: 'Yemen' },
    { code: '+260', country: 'ZM', name: 'Zambia' },
    { code: '+263', country: 'ZW', name: 'Zimbabwe' }
];

// Populate country code dropdowns
function populateCountryDropdowns() {
    const selects = document.querySelectorAll('.country-code-select');
    selects.forEach(select => {
        // Clear existing options
        select.innerHTML = '';
        
        // Add country code options
        countryCodes.forEach(item => {
            const option = document.createElement('option');
            option.value = item.code;
            option.textContent = `${item.country} ${item.code}`;
            if (item.code === '+91' && item.country === 'IN') {
                option.selected = true;
            }
            select.appendChild(option);
        });
    });
}

// Validate phone number (10 digits)
function validatePhone(phone) {
    const phoneRegex = /^\d{10}$/;
    return phoneRegex.test(phone.replace(/\s/g, ''));
}

// Validate email
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validate name (at least 2 characters, only letters and spaces)
function validateName(name) {
    const nameRegex = /^[a-zA-Z\s]{2,}$/;
    return nameRegex.test(name);
}

// Show error message
function showError(input, message) {
    let errorDiv = input.parentElement.querySelector('.error-message');
    if (!errorDiv) {
        errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.style.color = '#ef4444';
        errorDiv.style.fontSize = '0.75rem';
        errorDiv.style.marginTop = '4px';
        input.parentElement.appendChild(errorDiv);
    }
    errorDiv.textContent = message;
    input.style.borderColor = '#ef4444';
}

// Clear error message
function clearError(input) {
    const errorDiv = input.parentElement.querySelector('.error-message');
    if (errorDiv) {
        errorDiv.remove();
    }
    input.style.borderColor = '#d1d5db';
}

// Setup form validation
function setupFormValidation(formId) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    // Get form elements
    const phoneInput = form.querySelector('input[type="tel"]');
    const nameInput = form.querySelector('input[type="text"]');
    const emailInput = form.querySelector('input[type="email"]');
    const checkbox = form.querySelector('input[type="checkbox"]');
    
    // Real-time validation
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Allow only numbers
            this.value = this.value.replace(/\D/g, '');
            // Limit to 10 digits
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }
            if (this.value.length > 0) {
                if (validatePhone(this.value)) {
                    clearError(this);
                } else if (this.value.length === 10) {
                    showError(this, 'Please enter a valid 10-digit phone number');
                }
            } else {
                clearError(this);
            }
        });
    }
    
    if (nameInput) {
        nameInput.addEventListener('blur', function() {
            if (this.value.trim()) {
                if (validateName(this.value)) {
                    clearError(this);
                } else {
                    showError(this, 'Please enter a valid name (letters only, minimum 2 characters)');
                }
            }
        });
        
        nameInput.addEventListener('input', function() {
            clearError(this);
        });
    }
    
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (this.value.trim()) {
                if (validateEmail(this.value)) {
                    clearError(this);
                } else {
                    showError(this, 'Please enter a valid email address');
                }
            }
        });
        
        emailInput.addEventListener('input', function() {
            clearError(this);
        });
    }
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        // Validate phone
        if (phoneInput && !validatePhone(phoneInput.value)) {
            showError(phoneInput, 'Please enter a valid 10-digit phone number');
            isValid = false;
        }
        
        // Validate name
        if (nameInput && !validateName(nameInput.value)) {
            showError(nameInput, 'Please enter a valid name (letters only, minimum 2 characters)');
            isValid = false;
        }
        
        // Validate email
        if (emailInput && !validateEmail(emailInput.value)) {
            showError(emailInput, 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate checkbox
        if (checkbox && !checkbox.checked) {
            if (window.NotificationSystem) {
                NotificationSystem.warning('Please accept the consent to proceed. We respect your privacy and will only use your information to provide you with program details.');
            } else {
                alert('Please accept the consent to proceed. We respect your privacy and will only use your information to provide you with program details.');
            }
            isValid = false;
        }
        
        if (isValid) {
            submitForm(form);
        }
    });
}

// Submit form
async function submitForm(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    
    try {
        const phoneInput = form.querySelector('input[type="tel"]');
        // Get name input - prefer named input, then writable text inputs
        let nameInput = form.querySelector('input[name="fullName"]') || 
                        form.querySelector('input[type="text"]:not([readonly])');
        const emailInput = form.querySelector('input[type="email"]');
        const countrySelect = form.querySelector('select');
        const checkbox = form.querySelector('input[type="checkbox"]');
        
        // Get course/program - check for course dropdown first, then hidden program field, then any select with course values, then page title
        let course = 'General';
        const courseSelect = form.querySelector('select[name="course"]');
        const selectedProgramInput = form.querySelector('input[name="program"]');
        
        if (courseSelect && courseSelect.value) {
            course = courseSelect.value;
        } else if (selectedProgramInput && selectedProgramInput.value) {
            course = selectedProgramInput.value;
        } else {
            // Try to find any select that has MBA/BBA/MCA options (course dropdown without name)
            const allSelects = form.querySelectorAll('select');
            for (let sel of allSelects) {
                const options = Array.from(sel.options).map(o => o.value);
                if (options.some(o => ['MBA', 'BBA', 'MCA', 'BCA'].includes(o))) {
                    course = sel.value || 'General';
                    break;
                }
            }
            // Fallback to page title
            if (course === 'General') {
                const pageTitle = document.title.split('|')[0].trim();
                if (pageTitle && pageTitle !== 'General') {
                    course = pageTitle;
                }
            }
        }
        
        const formData = {
            formType: form.id.replace('Form', '').replace('hero', '').replace('Apply', 'apply').replace('Enquire', 'enquire').replace('Brochure', 'brochure').toLowerCase() || 'apply',
            name: nameInput?.value || '',
            phone: phoneInput?.value || '',
            email: emailInput?.value || '',
            consent: checkbox?.checked || false,
            course: course
        };
        
        // Normalize formType to match database enum values
        if (formData.formType.includes('apply')) formData.formType = 'apply';
        else if (formData.formType.includes('enquire')) formData.formType = 'enquire';
        else if (formData.formType.includes('brochure') || formData.formType.includes('download')) formData.formType = 'brochure';
        else formData.formType = 'apply';
        
        console.log('Form data:', formData);
        
        // Make API call to submit form
        const response = await fetch('submit-form.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });
        
        const result = await response.json();
        
        if (result.success) {
            if (window.NotificationSystem) {
                NotificationSystem.success('Thank you! Your application has been submitted successfully. Redirecting...');
            }
            sessionStorage.setItem('formSubmitted', 'true');
            setTimeout(() => {
                window.location.href = 'thank-you.html';
            }, 1500);
        } else {
            throw new Error(result.message || 'Server returned error');
        }
    } catch (error) {
        console.error('Form submission error:', error);
        if (window.NotificationSystem) {
            NotificationSystem.error('There was a connection error. Please check your internet connection and try again, or contact our admissions team at +91 8920785477.');
        } else {
            alert('There was a connection error. Please check your internet connection and try again, or contact our admissions team at +91 8920785477.');
        }
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Populate country dropdowns
    populateCountryDropdowns();
    
    // Setup validation for modal forms (hero forms are handled by script.js/mba.js with button state management)
    const formIds = ['applyNowForm', 'enquireNowForm', 'downloadBrochureForm', 'heroApplyForm'];
    formIds.forEach(formId => setupFormValidation(formId));
});
