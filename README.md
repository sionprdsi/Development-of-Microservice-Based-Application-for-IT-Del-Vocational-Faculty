# MicroService Fakultas Vokasi

### <summary><strong>Tools:</strong></summary>
<p>
    <img src="https://img.shields.io/badge/Back-end-Go-blue?logo=go" />
    <img src="https://img.shields.io/badge/Back-end-Node.js-green?logo=node.js" />
    <img src="https://img.shields.io/badge/Front-end-PHP-orange?logo=php" />
    <img src="https://img.shields.io/badge/Framework-Laravel-red?logo=laravel" />
    <img src="https://img.shields.io/badge/Architecture-Microservices-yellow?logo=docker" />
    <img src="https://img.shields.io/badge/Database-MySQL-blue?logo=mysql" />
    <img src="https://img.shields.io/badge/Service-REST%20API-purple?logo=swagger" />
    <img src="https://img.shields.io/badge/Service-Docker-lightgrey?logo=docker" />
    <img src="https://img.shields.io/badge/Editor-VS%20Code-blue?logo=visualstudiocode" />
</p>

Aplikasi berbasis web ini dikembangkan untuk sistem informasi Fakultas Vokasi IT Del. Aplikasi ini memungkinkan pengguna untuk mengakses informasi mengenai Fakultas Vokasi IT Del. 

## Teknologi yang Digunakan

Aplikasi ini dibangun menggunakan dua bahasa pemrograman:

- **Back-end:** Go dan Node.js
- **Front-end:** PHP dengan framework Laravel

## Arsitektur Aplikasi

### Arsitektur Monolithic

Arsitektur monolithic mengacu pada aplikasi tunggal mandiri yang menampung semua fungsi, database, dan tampilan pengguna dalam satu kode. Pendekatan ini menawarkan kesederhanaan dan kemudahan pengembangan, namun bisa menjadi rumit dan sulit dipertahankan seiring perkembangan aplikasi. Selain itu, semua fungsi, database, dan tampilan pengguna yang tergabung dalam satu kode dapat memperlambat proses pengembangan. Hal ini juga dapat menghambat skalabilitas dan ketangguhan aplikasi terhadap perubahan yang cepat dan permintaan pengguna.

### Arsitektur Microservice

Aplikasi ini menggunakan arsitektur microservice untuk membagi layanan menjadi bagian yang lebih kecil. Setiap service memiliki database-nya masing-masing, memastikan bahwa satu service tidak memengaruhi service lainnya. Namun, meskipun berdiri sendiri, setiap service tetap saling terhubung dan berkomunikasi melalui HTTP Request berstandar REST API.

#### Service yang Tersedia

1. **Dashboard Service** - Dapat diakses di `localhost:8001/admin/beranda`
2. **About Service** - Dapat diakses di `localhost:8002/admin/tentang`
3. **Study Program Service** - Dapat diakses di `localhost:8003/admin/prodi`
4. **Authentication Service** - Dapat diakses di `localhost:7009/admin/autentikasi`

Setiap service berjalan secara tunggal dan menggunakan port yang berbeda untuk memastikan pemisahan yang jelas antara setiap layanan. Jika salah satu service mengalami masalah, service lainnya tetap dapat beroperasi tanpa terganggu.

## Database

Pada bagian back-end, setiap service memiliki database-nya masing-masing. Dalam aplikasi web ini terdapat empat service dan empat database. Setiap service dirancang menggunakan port yang berbeda untuk menghindari konflik.

### Diagram Arsitektur

Pada gambar terlampir, Anda dapat melihat arsitektur microservice yang digunakan dalam pengembangan aplikasi website Fakultas Vokasi. REST API digunakan sebagai penghubung antara web UI dengan service yang tersedia, memungkinkan service diakses oleh beberapa platform tanpa terbatas pada satu bahasa pemrograman.

## Kesimpulan

Aplikasi web ini menggabungkan berbagai teknologi dan pendekatan arsitektur untuk menciptakan sistem informasi yang efisien dan mudah dikelola untuk Fakultas Vokasi IT Del. Penggunaan arsitektur microservice memastikan aplikasi tetap scalable dan robust terhadap perubahan dan permintaan pengguna yang cepat.
