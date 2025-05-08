
  <!-- Modal Content -->
    <div class="modal-container bg-white w-11/12 md:max-w-4xl mx-auto rounded-lg shadow-lg z-50 overflow-hidden">
      <!-- Modal Header -->
      <div class="modal-header py-4 px-6 bg-gray-50 border-b flex items-center justify-between">
        <div class="flex items-center">
          <i class="fas fa-edit text-blue-500 text-xl mr-3"></i>
          <h3 class="text-2xl font-semibold text-gray-800">Editor Artikel</h3>
        </div>
        <button id="closeModalBtn" class="modal-close text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body p-6 max-h-[70vh] overflow-y-auto">
        <!-- Form untuk mengirim artikel -->
        <form action="" method="POST" enctype="multipart/form-data" id="articleForm" class="space-y-5">
          
          <!-- Judul Artikel -->
          <div>
            <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
            <input type="text" name="judul" id="judul" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan judul artikel" required>
          </div>
          
          <!-- Grid untuk Kategori dan Tags -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Kategori -->
            <div>
              <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
              <div class="relative">
                <select name="kategori" id="kategori" class="w-full p-3 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" required>
                  <option value="" disabled selected>Pilih kategori</option>
                  <option value="teknologi">Teknologi</option>
                  <option value="kesehatan">Kesehatan</option>
                  <option value="pendidikan">Pendidikan</option>
                  <option value="bisnis">Bisnis</option>
                  <option value="gaya-hidup">Gaya Hidup</option>
                  <option value="hiburan">Hiburan</option>
                  <option value="olahraga">Olahraga</option>
                  <option value="lainnya">Lainnya</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </div>
            </div>
            
            <!-- Tag/Keyword -->
            <div>
              <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">Tags/Keyword</label>
              <input type="text" name="tags" id="tags" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Dipisahkan dengan koma (contoh: web, teknologi)">
            </div>
          </div>
          
          <!-- Upload Gambar -->
          <div>
            <label for="gambar" class="block text-gray-700 text-sm font-bold mb-2">Gambar Thumbnail</label>
            <div class="flex items-center justify-center w-full">
              <label for="gambar" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300">
                <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-placeholder">
                  <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                  <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau seret dan lepas</p>
                  <p class="text-xs text-gray-500">SVG, PNG, JPG atau GIF (Maks. 2MB)</p>
                </div>
                <div id="image-preview" class="hidden w-full h-full">
                  <img id="preview-img" src="" alt="Preview" class="w-full h-full object-contain">
                </div>
                <input id="gambar" name="gambar" type="file" accept="image/*" class="hidden" />
              </label>
            </div>
          </div>
          
          <!-- Editor Konten -->
          <div>
            <label for="editor" class="block text-gray-700 text-sm font-bold mb-2">Konten Artikel</label>
            <textarea name="editor" id="editor" class="w-full min-h-[250px] p-2 border border-gray-300 rounded-lg" placeholder="Tulis artikel Anda di sini"></textarea>
          </div>
          
          <!-- Ringkasan Artikel -->
          <div>
            <label for="ringkasan" class="block text-gray-700 text-sm font-bold mb-2">Ringkasan Artikel</label>
            <textarea name="ringkasan" id="ringkasan" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tulis ringkasan singkat artikel Anda"></textarea>
          </div>
          
          <!-- Status Publikasi -->
          <div>
            <label class="block text-gray-700 text-sm font-bold mb-2">Status Publikasi</label>
            <div class="flex space-x-6">
              <div class="flex items-center">
                <input type="radio" id="publish" name="status" value="publish" class="h-4 w-4 border-gray-300 focus:ring-blue-500" checked>
                <label for="publish" class="ml-2 block text-sm text-gray-700">Publikasikan</label>
              </div>
              <div class="flex items-center">
                <input type="radio" id="draft" name="status" value="draft" class="h-4 w-4 border-gray-300 focus:ring-blue-500">
                <label for="draft" class="ml-2 block text-sm text-gray-700">Simpan Sebagai Draft</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      
      <!-- Modal Footer -->
      <div class="modal-footer py-4 px-6 border-t bg-gray-50 flex justify-end space-x-4">
        <button id="cancelBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300">
          Batal
        </button>
        <button id="saveBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 flex items-center">
          <i class="fas fa-save mr-2"></i> Simpan Artikel
        </button>
      </div>
    </div>

  <script>
    // Inisialisasi CKEditor
    ClassicEditor
      .create(document.querySelector('#editor'), {
        // Konfigurasi tambahan
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo']
      })
      .catch(error => {
        console.error(error);
      });

    const inputGambar = document.getElementById('gambar');
    const previewImg = document.getElementById('preview-img');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const imagePreview = document.getElementById('image-preview');

    inputGambar.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
          previewImg.src = e.target.result;
          uploadPlaceholder.classList.add('hidden');
          imagePreview.classList.remove('hidden');
        }

        reader.readAsDataURL(file);
      }
    });
  </script>

