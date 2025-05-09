<?php ob_start(); ?>

<div class="px-6 py-10 md:px-12 lg:px-16 bg-gray-50">
  <!-- LogOut Button -->
  <div class="container flex justify-end my-5">
    <a href="/logout" class="bg-red-500 text-white p-3 rounded-xl font-semibold hover:bg-red-600 transition duration-300">LogOut</a>
  </div>

  <!-- Profile Form Section -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Your Profile</h2>
      <?php if (isset($_SESSION['error2']) && !empty($_SESSION['error2'])): ?>
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <?= $_SESSION['error2'];
          unset($_SESSION['error2']); ?>
        </div>
      <?php endif; ?>

      <form action="/profile" method="POST" enctype="multipart/form-data">

        <!-- Profile Picture -->
        <div class="mb-6">
          <label for="profile-picture" class="block text-lg font-medium text-gray-700 mb-2">Profile Picture</label>
          <input type="file" id="profile-picture" name="profile-picture" class="file:border-2 file:border-gray-300 file:bg-white file:text-gray-800 file:py-2 file:px-4 file:rounded-md hover:file:bg-gray-100">
        </div>

        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="block text-lg font-medium text-gray-700 mb-1">Name</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['nickname'] ?>">
        </div>

        <!-- Public Email -->
        <div class="mb-4">
          <label for="email" class="block text-lg font-medium text-gray-700 mb-1">Public Email</label>
          <input type="email" id="email" name="email" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['email'] ?>">
        </div>

        <!-- Bio -->
        <div class="mb-4">
          <label for="bio" class="block text-lg font-medium text-gray-700 mb-1">Bio</label>
          <textarea id="bio" name="bio" rows="4" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"><?= $profileUser['bio'] ?></textarea>
        </div>

        <!-- Pronouns -->
        <div class="mb-4">
          <label for="pronouns" class="block text-lg font-medium text-gray-700 mb-1">Pronouns</label>
          <select id="pronouns" name="pronouns" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <option value="">Don't specify</option>
            <option value="he/him" <?= $profileUser['pronouns'] == 'he/him' ? 'selected' : '' ?>>He/Him</option>
            <option value="she/her" <?= $profileUser['pronouns'] == 'she/her' ? 'selected' : '' ?>>She/Her</option>
            <option value="they/them" <?= $profileUser['pronouns'] == 'they/them' ? 'selected' : '' ?>>They/Them</option>
          </select>
        </div>

        <!-- URL -->
        <div class="mb-4">
          <label for="url" class="block text-lg font-medium text-gray-700 mb-1">URL</label>
          <input type="url" id="url" name="url" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['url'] ?>">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <input type="submit" name="saveProfile" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md transition" value="Save Profile">
        </div>
      </form>
    </div>

    <!-- Profile Picture Preview Section -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Profile Picture</h2>
      <div class="flex justify-center mb-6">


        <?php
        if (isset($profileUser['image']) && !empty($_SESSION['imageProfile'])):
        ?>
          <img src="/uploads/profile/<?= htmlspecialchars($profileUser['image']) ?>" class="object-cover rounded-full border-4 border-gray-300 w-32 h-32" alt="Profile Picture">
        <?php else: ?>
          <!-- Fallback image if session imageProfile is not set -->
          <img src="/uploads/profile/profile.png" alt="Profile Picture" class="object-cover rounded-full border-4 border-gray-300 w-32 h-32">
        <?php endif; ?>



      </div>

      <!-- Password Change Form -->
      <div>
        <h3 class="text-xl font-semibold text-gray-800 mb-5">Change Your Password</h3>

        <!-- Error Message for Password -->
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
          <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <?= $_SESSION['error'];
            unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?>

        <!-- Password Form -->
        <form action="/profile" method="POST">
          <div class="mb-4">
            <label for="currentpass" class="block text-lg font-medium text-gray-700 mb-1">Current Password</label>
            <input type="password" id="currentpass" name="currentpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="mb-4">
            <label for="newpass" class="block text-lg font-medium text-gray-700 mb-1">New Password</label>
            <input type="password" id="newpass" name="newpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="mb-4">
            <label for="confirmpass" class="block text-lg font-medium text-gray-700 mb-1">Confirm New Password</label>
            <input type="password" id="confirmpass" name="confirmpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="flex justify-end">
            <input type="submit" name="savePass" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md transition" value="Save Password">
          </div>
        </form>
      </div>
    </div>
  </div>




  <!-- Modal Dialog Editor Artikel -->
  <div id="articleModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <!-- Overlay -->
    <div class="modal-overlay absolute inset-0" id="modalOverlay"></div>



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
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['erroreditor']) && !empty($_SESSION['erroreditor'])): ?>
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg flex items-center space-x-3" role="alert">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-5l-1-1 4-4-4-4 1-1 5 5-5 5z" clip-rule="evenodd" />
      </svg>
      <span><?= htmlspecialchars($_SESSION['erroreditor']) ?></span>
      <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-100" onclick="this.parentElement.style.display='none';">
        <span class="sr-only">Close</span>
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
    <?php unset($_SESSION['erroreditor']); ?>
  <?php endif; ?>

  <!-- Form untuk mengirim artikel -->
  <form action="/editing" method="POST" enctype="multipart/form-data" id="articleForm" class="space-y-5">
    <input type="hidden" name="article_id" id="article_id" value="">
    <input type="hidden" name="form_submitted" value="1">

    <div>
      <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
      <input type="text" name="judul" id="judul" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan judul artikel" required>
    </div>

    <!-- Kategori -->
    <div>
      <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
      <div class="relative">
        <select name="kategori" id="kategori" class="w-full p-3 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white" required>
          <option value="" disabled>Pilih kategori</option>
          <?php foreach ($category as $cat): ?>
            <option value="<?= htmlspecialchars($cat['id']) ?>"><?= htmlspecialchars($cat['name']) ?></option>
          <?php endforeach; ?>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <i class="fas fa-chevron-down"></i>
        </div>
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

    <!-- Modal Footer -->
    <div class="modal-footer py-4 px-6 border-t bg-gray-50 flex justify-end space-x-4">
      <button id="cancelBtn" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg transition duration-300">
        Batal
      </button>
      <input type="submit" id="saveBtn" name="saveBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 flex items-center" value="Simpan">
    </div>
  </form>
</div>
    </div>
  </div>





  <!-- User Articles Section -->
  <div class="mt-20 mb-10">
    <div class="flex justify-between bg-white p-5 rounded-xl shadow-lg">
      <p class="text-lg text-gray-600 font-medium">Your Articles:</p>

      <button id="openModalBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center">
        <i class="fas fa-plus-circle mr-2"></i> Buat Artikel Baru
      </button>
    </div>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach ($profileArticle as $article) : ?>


      <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl">
   <a href="/detail/<?= $article['id'] ?>">
          <img src="/uploads/<?= htmlspecialchars($article['picture']) ?>" alt="article image" class="w-full h-48 object-cover rounded-t-lg">
          <div class="p-6">
            <h3 class="mt-4 text-xl font-semibold text-gray-800"><?= htmlspecialchars(substr(strip_tags($article['content']), 0, 100)) ?>...</h3>
            <div class="mt-4 text-sm text-gray-500 flex justify-between items-center">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
            <?php echo $article['status'] == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'; ?>">
                <?= htmlspecialchars($article['status']) ?>
              </span> <span class="text-gray-400"><?= htmlspecialchars($article['date']) ?></span>
            </div>

          </div>
    </a> 
<button class="edit-article-btn bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-200 ease-in-out m-2" 
          data-id="<?= $article['id']?>" 
          data-title="<?= $article['title']?>" 
          data-content="<?= $article['content'] ?>" 
          data-picture="/uploads/<?= $article['picture']?>">
    Edit
  </button>

        </div>

      <?php endforeach; ?>
    </div>
  </div>
</div>


<script>
// Inisialisasi CKEditor
let editor;

// Fungsi untuk membuka modal
function openModal(isEdit = false, articleData = {}) {
  const modal = document.getElementById('articleModal');
  const modalContainer = document.querySelector('.modal-container');
  document.body.classList.add('modal-open');
  modal.classList.remove('hidden');

  // Animasi modal
  setTimeout(() => {
    modalContainer.classList.add('show');
  }, 10);

  // Inisialisasi CKEditor jika belum ada
  if (!editor) {
    ClassicEditor
      .create(document.querySelector('#editor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo']
      })
      .then(newEditor => {
        editor = newEditor;
        if (isEdit) {
          populateForm(articleData);
        }
      })
      .catch(error => {
        console.error(error);
      });
  } else if (isEdit) {
    populateForm(articleData);
  }
}

// Fungsi untuk mengisi form dengan data artikel
function populateForm(articleData) {
  const articleIdInput = document.getElementById('article_id');
  const judulInput = document.getElementById('judul');
  const kategoriSelect = document.getElementById('kategori');
  const editorTextarea = document.getElementById('editor');
  const previewImg = document.getElementById('preview-img');
  const uploadPlaceholder = document.getElementById('upload-placeholder');
  const imagePreview = document.getElementById('image-preview');

  // Isi input
  articleIdInput.value = articleData.id || '';
  judulInput.value = articleData.title || '';
  kategoriSelect.value = articleData.category || '';

  // Isi CKEditor
  if (editor) {
    editor.setData(articleData.content || '');
  } else {
    editorTextarea.value = articleData.content || '';
  }

  // Tampilkan pratinjau gambar jika ada
  if (articleData.picture) {
    previewImg.src = articleData.picture;
    uploadPlaceholder.classList.add('hidden');
    imagePreview.classList.remove('hidden');
  } else {
    previewImg.src = '';
    uploadPlaceholder.classList.remove('hidden');
    imagePreview.classList.add('hidden');
  }
}

// Fungsi untuk menutup modal
function closeModal() {
  const modal = document.getElementById('articleModal');
  const modalContainer = document.querySelector('.modal-container');
  modalContainer.classList.remove('show');

  // Animasi menutup
  setTimeout(() => {
    modal.classList.add('hidden');
    document.body.classList.remove('modal-open');
  }, 300);

  // Reset form
  document.getElementById('articleForm').reset();
  if (editor) {
    editor.setData('');
  }
  const previewImg = document.getElementById('preview-img');
  const uploadPlaceholder = document.getElementById('upload-placeholder');
  const imagePreview = document.getElementById('image-preview');
  previewImg.src = '';
  uploadPlaceholder.classList.remove('hidden');
  imagePreview.classList.add('hidden');
  document.getElementById('article_id').value = '';
}

// Event listeners untuk tombol
document.getElementById('openModalBtn').addEventListener('click', () => openModal(false));
document.getElementById('closeModalBtn').addEventListener('click', closeModal);
document.getElementById('cancelBtn').addEventListener('click', closeModal);

// Event listener untuk tombol edit
document.querySelectorAll('.edit-article-btn').forEach(button => {
  button.addEventListener('click', () => {
    const articleData = {
      id: button.dataset.id,
      title: button.dataset.title,
      content: button.dataset.content,
      category: button.dataset.category,
      picture: button.dataset.picture
    };
    openModal(true, articleData);
  });
});

// Preview gambar setelah dipilih
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
    };
    reader.readAsDataURL(file);
  }
});

// Menangani submit form
document.getElementById('saveBtn').addEventListener('click', function() {
  document.getElementById('articleForm').submit();
});
</script>
<?php $profile = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
