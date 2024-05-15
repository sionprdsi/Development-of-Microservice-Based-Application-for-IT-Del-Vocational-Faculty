# MicroService_FakultasVokasi
Pembangunan aplikasi berbasis web ini ditujukan untuk sistem informasi Fakultas Vokasi IT Del. Aplikasi ini dapat digunakan oleh user untuk mendapatkan informasi tentang Fakultas  Vokasi IT Del. Pada aplikasi ini, user hanya dapat membaca informasi tanpa melakukan transaksi apapun.
Aplikasi ini dibangun dengan menggunakan 2 bahasa pemrograman. Bagian back-end dan front- end dibangun dengan bahasa yang berbeda. Untuk bagian back-end digunakan bahasa Go dan untuk bagian front-end menggunakan bahasa PHP,  khususnya framework Laravel.

Aplikasi ini menggunakan arsitektur microservice yang bertujuan untuk membagi layanan menjadi bagian yang lebih kecil . Dengan ini, maka setiap service akan memiliki database-nya masing-masing. Service yang ada pada aplikasi adalah Dashboard Service, About Service, dan Study Program Service. Setiap service akan berjalan secara tunggal sehingga satu service tidak akan memengaruhi service lainnya. Namun, meskipun berdiri sendiri, setiap service ini tetap saling terhubung antara satu dengan yang lainnya. Antarservice ini akan saling berkomunikasi dengan HTTP Request berstandar REST API.
Setiap database pada masing-masing service diatur untuk menggunakan port yang berbeda. Ini bertujuan agar terdapat pemisahan yang jelas antara setiap layanan. Dengan penggunaan port yang berbeda, jika salah satu service mengalami masalah dan tidak dapat beroperasi, service lainnya tetap dapat berjalan tanpa terganggu.

arsitektur microservice yang digunakan pada pembangunan aplikasi website Fakultas Vokasi. REST API digunakan sebagai penghubung antara web ui dengan service yang tersedia sehingga memungkinkan service dapat dikonsumsi oleh web ui. Hal inilah yang menyebabkan service dapat diakses oleh beberapa platform tanpa harus terbatas pada satu bahasa pemrograman saja. Sama halnya dengan pembangunan aplikasi web jual beli ini. Bahasa yang digunakan pada bagian front-end adalah bahasa PHP (framework Laravel) dan pada bagian back- end menggunakan bahasa Go. Meskipun memiliki bahasa yang berbeda, tetapi aplikasi akan tetap dapat berjalan dengan adanya REST API.



