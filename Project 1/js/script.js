function validateLogin() {
  // Mendapatkan nilai email dan password dari input
  var email = document.getElementById('loginEmail').value;
  var password = document.getElementById('loginPassword').value;

  // Validasi sederhana, Anda dapat menyesuaikan dengan aturan validasi yang Anda butuhkan
  if (email === 'daulah@islami.id' && password === '22552011256') {
    // Login berhasil, pindahkan ke halaman home (gantilah dengan URL yang sesuai)
    alert('Login berhasil!');
    window.location.href = 'index.html';
    return false; // Mencegah form untuk submit (dapat dihapus jika tidak diperlukan)
  } else {
    // Login gagal, tampilkan pesan kesalahan (Anda dapat menyesuaikan pesan)
    alert('Login gagal. Periksa kembali email dan password Anda.');
    return false; // Mencegah form untuk submit (dapat dihapus jika tidak diperlukan)
  }
}