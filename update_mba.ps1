# Script to update MBA.html for offline use

$htmlPath = "MBA.html"
$content = Get-Content -Path $htmlPath -Raw

Write-Host "Downloading missing images for MBA.html..."

# Get list of existing images
$existingImages = Get-ChildItem "assets\images" -Name

# Image URLs to download
$imageUrls = @(
    "https://amityonline.com/_s/amity_logo_c_white_ffbfeced80.svg",
    "https://amityonline.com/_s/Frame_74a003a71b.svg",
    "https://amityonline.com/_s/call_c76612c277.webp",
    "https://amityonline.com/_s/whatsapp_768d8d3ae9.webp",
    "https://amityonline.com/_s/banner_new_1_ea98fca339_bd43c40533.webp",
    "https://amityonline.com/_s/Group_48099189_9930e37399.svg",
    "https://amityonline.com/_s/years_40683bcf2d.svg",
    "https://amityonline.com/_s/years_40683bcf2d_5d79dc2c4d.svg",
    "https://amityonline.com/_s/amity_logo_5ee70d67b4_f4e929fb4a_df29242913.svg",
    "https://amityonline.com/_s/Group_4e8152da89_c0de058c55.svg",
    "https://amityonline.com/_s/fb_2x_47e530d220_eb7edea109.svg",
    "https://amityonline.com/_s/ig_2x_89bf18eff6_0d19c420b3.svg",
    "https://amityonline.com/_s/linked_in_2x_1bccd37919_1d46befd18.svg",
    "https://amityonline.com/_s/youtube_2x_962b252650_eb42ace467.svg",
    "https://amityonline.com/_s/x_logo_8ba59ccf0d.png",
    "https://amityonline.com/_s/MBA_79e476779b.webp",
    "https://amityonline.com/_s/Master_of_Business_Administration_2b444be7d2_cf2b3ad261.webp",
    "https://amityonline.com/_s/Master_of_Computer_Applications_2a376aee25_f1411ceb75.webp",
    "https://amityonline.com/_s/Bachelor_of_Computer_Applications_8dd37b71ed.webp",
    "https://amityonline.com/_s/BBA_681x648_copy_67ad2531fb.webp",
    "https://amityonline.com/_s/B_Com_681x648_copy_9cc8fa3d1a.webp",
    "https://amityonline.com/_s/Bachelors_of_Arts_BA_copy_e5520981fc.webp",
    "https://amityonline.com/_s/BA_Journalism_and_Mass_Communication_681x648_copy_56a6acbf05.webp",
    "https://amityonline.com/_s/MA_Journalism_and_Mass_Communication_681x648_copy_639e65bb4d.webp",
    "https://amityonline.com/_s/M_Com_Fiancial_Management_681x648_copy_f160dc3d0a.webp",
    "https://amityonline.com/_s/MA_Public_Policy_and_Governance_681x648_copy_3e76d4a458.webp",
    "https://amityonline.com/_s/icon_b5fcd2a6e4.webp",
    "https://amityonline.com/_s/icon2_56fb744843.webp",
    "https://amityonline.com/_s/icon3_f57565e840.webp",
    "https://amityonline.com/_s/download_arrow_1104bfe734.png",
    "https://amityonline.com/_s/Group_2_9d511c405a.png",
    "https://amityonline.com/_s/image_1fcb53f029_bdba48a875.png",
    "https://amityonline.com/_s/Group_48099786_0e1a8f89e0.png",
    "https://amityonline.com/_s/Group_48100136_3_15ca31e17f.png",
    "https://amityonline.com/_s/Group_48100220_1_46aa4333f7.png",
    "https://amityonline.com/_s/Group_48100244_2_df763ec694.png",
    "https://amityonline.com/_s/Group_48100244_3_62fd7cc0fe.png",
    "https://amityonline.com/_s/Group_48100244_4_e24ad035cd.png",
    "https://amityonline.com/_s/Group_48100400_1_7f87a82209.png",
    "https://amityonline.com/_s/Group_48100400_4_0750d83af5.png",
    "https://amityonline.com/_s/Group_48099358_122a6f7697_9660292a61.png",
    "https://amityonline.com/_s/virtual_classroom_study_space_1_c2ac1e0a17.webp",
    "https://amityonline.com/_s/student_class_looking_course_2_e2422e8a21_547b5eb689.webp",
    "https://amityonline.com/_s/people_graduating_with_diplomas_close_up_1_3b59fea383_45c12ec65d.webp",
    "https://amityonline.com/_s/front_view_stacked_books_earth_globe_open_book_pencils_education_day_1_9fa23e9918.webp",
    "https://amityonline.com/_s/Rectangle_20431_2732d9767e.webp",
    "https://amityonline.com/_s/over1_dark_1e8948dba0_dca4b72e0a.webp",
    "https://amityonline.com/_s/over3_dark_35ce8c5eec_62d5224326.webp",
    "https://amityonline.com/_s/over5_dark_c95b24917d_813accfbaa.webp",
    "https://amityonline.com/_s/over7_dark_f133d67259_d1f37333c9.webp",
    "https://amityonline.com/_s/over8_dark_caa52b8629_295f1c14c1.webp",
    "https://amityonline.com/_s/over9_dark_c6cd0d262e_9a52d15954.webp",
    "https://amityonline.com/_s/gamified_2495bb1569_8209f35e51.webp",
    "https://amityonline.com/_s/personalised_981432fdf9_8334803b4e.webp",
    "https://amityonline.com/_s/ai_certification_2acc9304df_839a7ed4e6.webp",
    "https://amityonline.com/_s/ai_enabled_d47bb12cfe_9ef9f2dcda.webp",
    "https://amityonline.com/_s/industry_learning_14225e5bf2_9516d4ce5d.webp",
    "https://amityonline.com/_s/Group_d_e0d7930d98_7ad3fb946a.webp",
    "https://amityonline.com/_s/ami_9e5d074af7_88bbe279de.webp",
    "https://amityonline.com/_s/Group_48100099_b61ec01896_746d9f3811.webp",
    "https://amityonline.com/_s/Group_48100678_c5b20977b9_d592e71acb.webp",
    "https://amityonline.com/_s/Frame_1000001899_2_437f090901_8d104d7813.webp",
    "https://amityonline.com/_s/Frame_1000001923_96e58e1423_8eb42f1d79.webp",
    "https://amityonline.com/_s/Frame_1000001968_0ff53522df_02cf918a97.webp",
    "https://amityonline.com/_s/Frame_1000001968_0ff53522df_b0e1afe985.webp",
    "https://amityonline.com/_s/Frame_1000001969_801b8412c7_5fbe000c68.webp",
    "https://amityonline.com/_s/Group_48099322_5_83d4ff011f_0e02ae7bbf.webp",
    "https://amityonline.com/_s/Group_48099322_6_d7697ecc09_3fdc1fe03c.webp",
    "https://amityonline.com/_s/Group_48099322_7_b4ea241570_bd194db15d.webp",
    "https://amityonline.com/_s/Convocation_99229c4414.webp",
    "https://amityonline.com/_s/Samagam_be8d24d9fc.webp",
    "https://amityonline.com/_s/Campus_Classes_826612ba6b.webp",
    "https://amityonline.com/_s/Industry_Visit_3e74e0144b.webp",
    "https://amityonline.com/_s/Mid_Year_cd4defa14d.webp",
    "https://amityonline.com/_s/On_Campus_bfd83d685f.webp",
    "https://amityonline.com/_s/Sangathan_9b94e96b21.webp",
    "https://amityonline.com/_s/Workshop_49caafcf1a.webp",
    "https://amityonline.com/_s/Journey_d4942082ba.webp",
    "https://amityonline.com/_s/image_10134_d8c4e7eb2f_bdbadeccfb.webp",
    "https://amityonline.com/_s/image_10135_6040bd8742_48391742c0.webp",
    "https://amityonline.com/_s/image_10136_ec714781ff_c2aa81da6b.webp",
    "https://amityonline.com/_s/image_10137_4d740ef08a_01c1a85249.webp",
    "https://amityonline.com/_s/sachit_paliwal_ae4bf7ed73.webp",
    "https://amityonline.com/_s/sunil_kumar_35e3366dd3.webp",
    "https://amityonline.com/_s/shakshi_babbar_d1f71b025e.webp",
    "https://amityonline.com/_s/Coral_Barboza_431bdc3292.webp",
    "https://amityonline.com/_s/Divya_Bansal_a5042d169a.webp",
    "https://amityonline.com/_s/Harshita_bd9ce67ee3.webp",
    "https://amityonline.com/_s/Maitri_222f683f53_a1f236c8b1.webp",
    "https://amityonline.com/_s/Mona_a759d1ef3c_1ab8bcc0c1.webp",
    "https://amityonline.com/_s/Pragati_baf7c9d3f8_7377e19cde.webp",
    "https://amityonline.com/_s/Rashmi_8b49fa929f_0da32a8dc8.webp",
    "https://amityonline.com/_s/Tanupreet_Sabarwal_c334480ef6.webp"
)

# Static subdomain images
$staticImageUrls = @(
    "https://static.amityonline.com/_s/accenture_4228edf2ec.webp",
    "https://static.amityonline.com/_s/aditya_birla_group_a31995c61d.webp",
    "https://static.amityonline.com/_s/amazon_ad97400ada.webp",
    "https://static.amityonline.com/_s/apple_e6c370def7.webp",
    "https://static.amityonline.com/_s/axis_bank_9c7936ad0f.webp",
    "https://static.amityonline.com/_s/bank_0f_baroda_0fd61be7e1.webp",
    "https://static.amityonline.com/_s/barclay_766b322011.webp",
    "https://static.amityonline.com/_s/capgemini_2ceffeb45b.webp",
    "https://static.amityonline.com/_s/car_dekho_104208a0e7.webp",
    "https://static.amityonline.com/_s/cipla_725cdcb38f.webp",
    "https://static.amityonline.com/_s/cisco_fa28552a73.webp",
    "https://static.amityonline.com/_s/cognizant_80767f58fd.webp",
    "https://static.amityonline.com/_s/dbs_9fda93ca94.webp",
    "https://static.amityonline.com/_s/delhivery_21f59d3bcf.webp",
    "https://static.amityonline.com/_s/dell_technologies_e252013d7c.webp",
    "https://static.amityonline.com/_s/dhl_f14f8df4e5.webp",
    "https://static.amityonline.com/_s/ernst_young_486f8547bd.webp",
    "https://static.amityonline.com/_s/federal_bank_cb688f0f4c.webp",
    "https://static.amityonline.com/_s/flipkart_e577197fe3.webp",
    "https://static.amityonline.com/_s/gail_a1476f2959.webp",
    "https://static.amityonline.com/_s/google_855c99de43.webp",
    "https://static.amityonline.com/_s/grant_thronton_6bb45f0851.webp",
    "https://static.amityonline.com/_s/Group_48100511_ee8e218674_b8a2ff8c7b.webp",
    "https://static.amityonline.com/_s/Group_48100512_2eda748696_6f054941b7.webp",
    "https://static.amityonline.com/_s/Group_48100513_ab28110901_ef7ae586cf.webp",
    "https://static.amityonline.com/_s/Group_48100514_717f07b14d_4f03dbe2d1.webp",
    "https://static.amityonline.com/_s/Group_48100515_344aaae406_b5ffed7b3a.webp",
    "https://static.amityonline.com/_s/hcltech_6a6ebb4cc2.webp",
    "https://static.amityonline.com/_s/hdfc_75e1e13a82.webp",
    "https://static.amityonline.com/_s/hero_8069edb396.webp",
    "https://static.amityonline.com/_s/hindustan_unilever_ef69b24b71.webp",
    "https://static.amityonline.com/_s/hitachi_vantara_4f43434588.webp",
    "https://static.amityonline.com/_s/hsbc_480ab4c6d0.webp",
    "https://static.amityonline.com/_s/ICICI_Bank_de613e29ba.webp",
    "https://static.amityonline.com/_s/iffco_tokio_ba0ca0e2fd.webp",
    "https://static.amityonline.com/_s/infosys_154feeaa4e.webp",
    "https://static.amityonline.com/_s/jp_morgan_8d4586ce0d.webp",
    "https://static.amityonline.com/_s/kpmg_15b04c4131.webp",
    "https://static.amityonline.com/_s/l_and_t_infotech_42a3295b55.webp",
    "https://static.amityonline.com/_s/mahindra_group_5153634c9b.webp",
    "https://static.amityonline.com/_s/maxlife_6370f12cf8.webp",
    "https://static.amityonline.com/_s/medium_shot_graduate_student_1_054c237147_8a2c8536ee.webp",
    "https://static.amityonline.com/_s/pwc_a1ecc8548f.webp",
    "https://static.amityonline.com/_s/qatar_airways_2f68f618ab.webp",
    "https://static.amityonline.com/_s/reliance_industries_limited_2baf8ef73a.webp",
    "https://static.amityonline.com/_s/samsung_fc88911e0c.webp",
    "https://static.amityonline.com/_s/sbi_47818db2e9.webp",
    "https://static.amityonline.com/_s/siemens_9a2af15e99.webp",
    "https://static.amityonline.com/_s/t_series_cf4aa255cb.webp",
    "https://static.amityonline.com/_s/tata_1mg_758c9371f0.webp",
    "https://static.amityonline.com/_s/tata_power_4562440574.webp",
    "https://static.amityonline.com/_s/tata_steel_1edb2f9fe4.webp",
    "https://static.amityonline.com/_s/tcs_31bbcf8b23.webp",
    "https://static.amityonline.com/_s/techmahindra_14d9b4f362.webp",
    "https://static.amityonline.com/_s/test1_ad71c3ef33_f9a8e3108c.webp",
    "https://static.amityonline.com/_s/test2_7a0ba6153d_c239df62bb.webp",
    "https://static.amityonline.com/_s/vedanta_863a2b0624.webp",
    "https://static.amityonline.com/_s/Vi_log_9faa518967.webp",
    "https://static.amityonline.com/_s/wipro_77b7c2de0a.webp",
    "https://static.amityonline.com/_s/2_b5dc53274c_1b415a4ee9.webp",
    "https://static.amityonline.com/_s/4_copy_77ca6db522_58e0c874b6.webp",
    "https://static.amityonline.com/_s/Anushka_Pathak_4c588c17f8_d0d3748404.webp",
    "https://static.amityonline.com/_s/avatar_nerd_man_vector_42477860_removebg_preview_68cec19df4_d0073b7893.webp",
    "https://static.amityonline.com/_s/Shalu_Sharma_67029ffbe0_02a49262de.webp",
    "https://static.amityonline.com/_s/Tanya_Luthra_cc04d9de2a_36521a1841.webp"
)

# SVG icons from _sb subdomain
$svgUrls = @(
    "https://amityonline.com/_sb/Group_48100220_378a46643d.svg",
    "https://amityonline.com/_sb/Group_48100243_438c08dd11.svg",
    "https://amityonline.com/_sb/Group_48100243_50a0301c51.svg",
    "https://amityonline.com/_sb/Group_48100243_da0f8c5b12.svg",
    "https://amityonline.com/_sb/Group_48100244_145c9e69a0.svg",
    "https://amityonline.com/_sb/Group_48100400_d4dca6f2ec.svg",
    "https://amityonline.com/_sb/Group_48100400_e1bb89563f.svg",
    "https://amityonline.com/_sb/Group_dbdb7b7343.svg",
    "https://amityonline.com/_sb/Group_f011b06199.svg",
    "https://amityonline.com/_sb/Program_919ef7c9c1_53009a56d1.svg",
    "https://amityonline.com/_sb/spec1_d656549eb9_6ffb1ff11d.svg"
)

# Download images
foreach ($url in $imageUrls) {
    $filename = $url.Split("/")[-1]
    $dest = "assets\images\$filename"
    if (-not (Test-Path $dest)) {
        Write-Host "Downloading $filename..."
        try {
            Invoke-WebRequest -Uri $url -OutFile $dest -TimeoutSec 30
        } catch {
            Write-Host "  Failed: $($_.Exception.Message)"
        }
    }
}

foreach ($url in $staticImageUrls) {
    $filename = $url.Split("/")[-1]
    $dest = "assets\images\$filename"
    if (-not (Test-Path $dest)) {
        Write-Host "Downloading $filename..."
        try {
            Invoke-WebRequest -Uri $url -OutFile $dest -TimeoutSec 30
        } catch {
            Write-Host "  Failed: $($_.Exception.Message)"
        }
    }
}

foreach ($url in $svgUrls) {
    $filename = $url.Split("/")[-1]
    $dest = "assets\icons\$filename"
    if (-not (Test-Path $dest)) {
        Write-Host "Downloading $filename..."
        try {
            Invoke-WebRequest -Uri $url -OutFile $dest -TimeoutSec 30
        } catch {
            Write-Host "  Failed: $($_.Exception.Message)"
        }
    }
}

Write-Host "`nUpdating MBA.html paths..."

# Remove VWO script
$content = $content -replace '<script type="text/javascript" id="vwoCode">.*?</script>', ''

# Remove GTM iframe
$content = $content -replace '<noscript><iframe src="https://www\.googletagmanager\.com[^>]*></iframe></noscript>', ''

# Update CSS paths
$content = $content -replace 'href="/_next/static/css/', 'href="assets/css/'

# Update JS paths
$content = $content -replace 'src="/_next/static/chunks/webpack', 'src="assets/js/webpack'
$content = $content -replace 'src="/_next/static/chunks/polyfills', 'src="assets/js/polyfills'
$content = $content -replace 'src="/_next/static/chunks/main-app', 'src="assets/js/main-app'
$content = $content -replace 'src="/_next/static/chunks/fd9d1056', 'src="assets/js/fd9d1056'
$content = $content -replace 'src="/_next/static/chunks/aaea2bcf', 'src="assets/js/aaea2bcf'
$content = $content -replace 'src="/_next/static/chunks/(\d+-[a-f0-9]+\.js)', 'src="assets/js/$1'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/\(primary\)/layout', 'src="assets/js/layout'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/layout', 'src="assets/js/layout'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/\(primary\)/page', 'src="assets/js/page'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/error', 'src="assets/js/error'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/\[\.\.\.slugs\]/error-6605065059251538\.js', 'src="assets/js/error-6605065059251538.js'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/\[\.\.\.slugs\]/not-found', 'src="assets/js/not-found'
$content = $content -replace 'src="/_next/static/chunks/app/\[device\]/\[country\]/\[\.\.\.slugs\]/page', 'src="assets/js/page'
$content = $content -replace 'href="/_next/static/chunks/webpack', 'href="assets/js/webpack'

# Update image paths - main domain
$content = $content -replace 'https://amityonline\.com/_s/', 'assets/images/'
$content = $content -replace 'https://static\.amityonline\.com/_s/', 'assets/images/'

# Update SVG icons paths
$content = $content -replace 'https://amityonline\.com/_sb/', 'assets/icons/'

# Remove srcSet attributes
$content = $content -replace ' srcSet="[^"]*"', ''

# Remove imageSrcSet from preload links  
$content = $content -replace ' imageSrcSet="[^"]*"', ''

# Fix _next/image URLs with query strings
$content = $content -replace 'src="/_next/image\?url=https%3A%2F%2Famityonline\.com%2F_s%2F([^&]+)&[^"]*"', 'src="assets/images/$1"'
$content = $content -replace 'src="/_next/image\?url=https%3A%2F%2Fstatic\.amityonline\.com%2F_s%2F([^&]+)&[^"]*"', 'src="assets/images/$1"'
$content = $content -replace 'href="/_next/image\?url=https%3A%2F%2Famityonline\.com%2F_s%2F([^&]+)&[^"]*"', 'href="assets/images/$1"'

# Update favicon path
$content = $content -replace 'href="/favicon\.ico"', 'href="favicon.ico"'

# Remove GTM inline script
$content = $content -replace '<script>\(self\.__next_s=self\.__next_s\|\|\[\]\)\.push\(\[0,\{[^}]*gtm[^}]*\}\]\)</script>', ''

# Save updated content
Set-Content -Path $htmlPath -Value $content -NoNewline

Write-Host "MBA.html updated successfully!"
