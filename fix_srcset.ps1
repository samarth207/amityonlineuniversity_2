# Read the HTML file
$content = Get-Content "index.html" -Raw

# Remove all srcSet attributes and fix src attributes with encoded URLs
# Pattern 1: Remove srcSet attributes entirely
$content = $content -replace '\s+srcSet="[^"]*"', ''

# Pattern 2: Fix src attributes that have encoded URLs
$content = $content -replace 'src="/_next/image\?url=https%3A%2F%2F[^&]+&[^"]*"', ''
$content = $content -replace 'src="/_next/image\?url=[^"]*"', ''

# Save the file
Set-Content "index.html" -Value $content -NoNewline

Write-Host "Fixed all srcSet attributes and encoded src URLs"
Write-Host "Total lines: $((Get-Content index.html).Count)"
