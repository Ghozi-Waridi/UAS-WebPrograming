
document.addEventListener('DOMContentLoaded', function () {
    const categoryForm = document.getElementById('categoryForm');
    const beritaByCategory = document.getElementById('beritaByCategory');

    // Ketika formulir dikirimkan, mencegah pengiriman standar dan menangani logika
    categoryForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah pengiriman formulir

        const formData = new FormData(categoryForm);
        const categoryId = formData.get('categoryId'); // Ambil kategori yang dipilih

        // Buat URL baru dengan categoryId
        const url = new URL(window.location.href);
        url.searchParams.set('categoryId', categoryId);

        // Ambil data dari server dengan menggunakan URL baru
        fetch(url)
            .then(response => response.text())
            .then(data => {
                // Perbarui konten artikel berdasarkan data yang diterima
                beritaByCategory.innerHTML = data;
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
    });
});

