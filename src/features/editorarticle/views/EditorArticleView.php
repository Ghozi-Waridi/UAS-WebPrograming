<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editor Artikel</title>

  <!-- Menambahkan TinyMCE dari CDN -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <style>
    /* Gaya dasar untuk halaman */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Editor Artikel</h1>

    <!-- Tempat untuk editor TinyMCE -->
    <textarea id="editor"></textarea>

    <script>
      tinymce.init({
        selector: '#editor', // Menargetkan textarea dengan id "editor"
        menubar: true, // Mengaktifkan menu bar
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | bold italic underline | fontsizeselect | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
        font_size_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt', // Ukuran font yang tersedia
      });
    </script>
  </div>
</body>

</html>
