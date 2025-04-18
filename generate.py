import os

feature_name = input("Masukkan nama fitur: ")

folders = [
    f"src/features/{feature_name.lower()}/models",
    f"src/features/{feature_name.lower()}/views",
    f"src/features/{feature_name.lower()}/controllers",
    "public",
]

# Membuat folder sesuai dengan struktur yang sudah ditentukan
for folder in folders:
    if not os.path.exists(folder):
        os.makedirs(folder)

files = {
    f"src/features/{feature_name}/models/{feature_name}.php": f"""<?php
namespace Uas_ProgWeb\\features\\{feature_name}\\models;

class {feature_name}
{{

}}
""",
    f"src/features/{feature_name}/views/{feature_name}View.php": f"""<?php
namespace Uas_ProgWeb\\features\\{feature_name}\\views;

class {feature_name}View
{{

}}
""",
    f"src/features/{feature_name}/controllers/{feature_name}Controller.php": f"""<?php
namespace Uas_ProgWeb\\features\\{feature_name}\\controllers;


class {feature_name}Controller
{{


}}
""",
}

# Membuat file dengan konten yang sudah ditentukan
for file_path, content in files.items():
    # Membuat folder terlebih dahulu jika belum ada
    file_dir = os.path.dirname(file_path)
    if not os.path.exists(file_dir):
        os.makedirs(file_dir)

    # Membuat file dan menulis konten
    with open(file_path, "w") as file:
        file.write(content)

print(f"Folder dan file untuk fitur {feature_name} telah berhasil dibuat!")
