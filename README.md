| Atribut         | Keterangan            |
| --------------- | --------------------- |
| **Nama**        | Muhammad Arif Mulyanto   |
| **NIM**         | 312310359           |
| **Kelas**       | TI.23.A.5             |
| **Mata Kuliah** | Pemrograman Website 2 |

##  Tujuan Praktikum

Dalam praktikum ini, tujuan utama yang ingin dicapai adalah sebagai berikut:

- Memahami Konsep Dasar Framework
- Memahami Konsep MVC (Model-View-Controller)
- Mampu Menggunakan CodeIgniter 4 untuk Pengembangan Aplikasi Web
- Mampu Menggunakan CLI (Command Line Interface) dalam CodeIgniter 4
- Mengaktifkan dan Menggunakan Mode Debugging dalam CodeIgniter 4
- Mampu Membuat dan Mengelola Routing dalam CodeIgniter 4
- Mengimplementasikan Layout dan Tampilan Web dengan CSS di CodeIgniter 4

##  Langkah-Langkah Praktikum

###  1. Instalasi dan Konfigurasi Web Server

- Gunakan XAMPP sebagai web server.
  
  ![{C334ACFA-057C-4309-906C-A76F351DF138}](https://github.com/user-attachments/assets/0ac43ff5-37b4-49fe-ab50-4e76180809bd)

- Aktifkan ekstensi PHP yang diperlukan dalam php.ini:

  ![{A5EB7495-B46D-482E-91CA-72B8D93291FE}](https://github.com/user-attachments/assets/2845bf90-bf97-42f0-a055-1f9a47f645e7)

### 2. Instalasi CodeIgniter 4

- Unduh CodeIgniter 4 dari situs resmi: https://codeigniter.com/download
- Ekstrak file ke direktori htdocs/lab11_ci.
- Ubah nama direktori framework menjadi ci4.
- Buka browser dan akses: http://localhost/lab11_ci/ci4/public/ untuk memastikan instalasi berhasil.

![WhatsApp Image 2025-03-06 at 05 10 23_85a7087f](https://github.com/user-attachments/assets/4120daf5-e7f3-4fc1-a8f3-44f0dcec9100)

### 3. Menjalankan CLI (Command Line Interface)

![{24EFBD5C-81A7-4BA3-BE72-7E341BB249B8}](https://github.com/user-attachments/assets/6487e4f7-5f51-4c78-87e4-12d1b6e60427)

Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk mengakses CLI buka Shell pada XAMPP dan Arahkan ke cd htdocs/lab11_ci/ci4

## Php Sprak 

![{2AF08B0F-960E-4AE5-8E95-29C0D3E0529F}](https://github.com/user-attachments/assets/3e10a382-bfb4-44d3-94e1-19e270753f5a)

### 4. Menjalankan Mode Debugging 

- Jika fitur debugging belum aktif maka akan terjadi error pada aplikasi yang akan ditampilkan pesan kesalahan seperti berikut :

![WhatsApp Image 2025-03-06 at 05 39 58_98d16132](https://github.com/user-attachments/assets/0e37f67b-a239-4baf-b263-f5088f000dc4)

- Semua jenis error akan ditampilkan sama. Untuk memudahkan mengetahui jenis errornya, maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment variable CI_ENVIRONMENT menjadi development. 

![{870114AE-C1D3-423B-96D7-3A56EF561482}](https://github.com/user-attachments/assets/69c98516-0efd-4e20-828e-f44f966fea50)

- setelah itu nanti akan muncul seperti ini :

  ![{BB137384-DC77-42F1-9655-7C70531D293C}](https://github.com/user-attachments/assets/d9005d95-ce86-4983-a1a7-1d7fdfd786bb)

- Contoh error yang terjadi. Untuk mencoba error tersebut, ubah kode pada file
app/Controller/Home.php hilangkan titik koma pada akhir kode.
