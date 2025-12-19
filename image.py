import json
import os
import requests
import zipfile

JSON_FILE = "C:\\Users\\samth\\Downloads\\brand-logos.json"
OUT_DIR = "brand_logos"
ZIP_NAME = "brand_logos.zip"

os.makedirs(OUT_DIR, exist_ok=True)

with open(JSON_FILE, "r", encoding="utf-8") as f:
    brands = json.load(f)

saved = []

for brand in brands:
    filename = brand["filename"]
    url = brand["image_url"]
    path = os.path.join(OUT_DIR, filename)

    try:
        print(f"⬇ Downloading {filename}")
        r = requests.get(url, timeout=30)
        r.raise_for_status()

        with open(path, "wb") as f:
            f.write(r.content)

        saved.append(path)

    except Exception as e:
        print(f"❌ Failed {filename}: {e}")

with zipfile.ZipFile(ZIP_NAME, "w", zipfile.ZIP_DEFLATED) as zipf:
    for file in saved:
        zipf.write(file, arcname=os.path.basename(file))

print("\n✅ DONE")
print(f"📁 Folder: {OUT_DIR}")
print(f"🗜 ZIP: {ZIP_NAME}")
