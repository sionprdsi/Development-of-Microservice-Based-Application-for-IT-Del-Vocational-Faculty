// Mengimpor modul yang diperlukan
const express = require('express'); // Mengimpor framework Express untuk membuat server
const bodyParser = require('body-parser'); // Mengimpor middleware body-parser untuk memparsing permintaan HTTP
const axios = require('axios'); // Mengimpor modul axios untuk melakukan permintaan HTTP

// Membuat instance aplikasi Express
const app = express();
const PORT = 7009; // Menentukan port di mana server akan berjalan

// Middleware
app.use(bodyParser.json()); // Middleware untuk memparsing request dengan tipe JSON
app.use(bodyParser.urlencoded({ extended: true })); // Middleware untuk memparsing request dengan tipe URL-encoded

// Endpoint untuk memeriksa status server
app.get('/status', (req, res) => {
  res.status(200).send('Server is running'); // Mengirim respon bahwa server berjalan dengan status 200 (OK)
});

// Route login
app.post('/login', async (req, res) => {
  try {
    // Mengirim permintaan login ke database untuk memverifikasi kredensial
    const { email, password } = req.body; // Mendapatkan email dan password dari body request
    
    // Contoh: Memvalidasi kredensial terhadap database
    const user = await User.findOne({ email }); // Mencari user berdasarkan email di database

    // Jika user tidak ditemukan atau password tidak valid
    if (!user || !user.isValidPassword(password)) {
      return res.status(401).send('Email or password is incorrect'); // Mengirim respon error 401 (Unauthorized)
    }

    // Redirect ke halaman admin jika login berhasil
    res.redirect('/admin/home'); // Mengarahkan pengguna ke halaman admin
  } catch (error) {
    // Menangani error saat login
    console.error('Error during login:', error); // Mencetak error ke console
    res.status(500).send('Internal Server Error'); // Mengirim respon error 500 (Internal Server Error)
  }
}); 

// Memulai server
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`); // Menampilkan pesan bahwa server berjalan pada port yang ditentukan
});
