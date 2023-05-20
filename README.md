# [ TUGAS PRAKTIKUM 3 PRAKTIKUM DPBO ]

## Identitas:
- NIM   : 2102313
- Nama  : Muhammad Kamal Robbani
- Kelas : C1'21

## Janji:
Saya [Muhammad Kamal Robbani] dengan nim 2102313 mengerjakan Tugas Praktikum 3 DPBO dalam mata kuliah 
[Desain Pemrograman Berorientasi Objek] untuk keberkahan-Nya maka saya tidak melakukan 
kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Requirements Soal:
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel


## Desain Program:
![desain_db](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/b4fb28f1-047a-49d4-a85e-43f0c5722ee5)

## Alur Program:
- User dapat melakukan pengurutan data dengan mengklik button "A - Z" (Ascending) atau button "Z - A" (Descending).
- User dapat melakukan searching data dengan memasukkan keyword pada search field, lalu mengklik button 'Cari'. 
- User dapat masuk ke page list anggota band dengan mengklik link 'Home' atau logo pada bagian navbar.
- User dapat melihat detail anggota band dengan mengklik card yang ada.
- User dapat melakukan CRUD anggota band:
  - (Create)
    - Klik link 'Tambah Anggota Band' pada navbar.
    - Mengisi data (foto, nama, role, band).
    - Klik button 'Tambah Data'.
    - Save foto album ke folder 'assets/images'.
    - Menjalankan query insert data into database.
    - END.
  - (Update)
    - Pilih card yang ingin di-update, lalu klik button 'Ubah Data'.
    - Ubah data.
    - Klik button 'Tambah Data'.
    - Save foto album baru (jika diubah).
    - Menjalankan query save data into database.
    - END.
  - (Delete)
    - Pilih card yang ingin dihapus, lalu klik button 'Hapus Data'.
    - Menjalankan query delete data from database.
    - END.
- User dapat masuk ke page list band band dengan mengklik link 'Daftar Band' pada bagian navbar.
- User dapat melakukan CRUD band:
  - (Create)
    - Mengisi data pada form (nama band).
    - Klik button 'Tambah'.
    - Menjalankan query insert data into database.
    - END.
  - (Update)
    - Pilih data yang ingin di-update, lalu klik icon ubah data.
    - Ubah data.
    - Klik button 'Simpan'.
    - Menjalankan query save data into database.
    - END.
  - (Delete)
    - Pilih data yang ingin dihapus, lalu klik icon hapus data.
    - Menjalankan query delete data from database.
    - END.
- User dapat masuk ke page list role anggota dengan mengklik link 'Daftar Role' pada bagian navbar.
- User dapat melakukan CRUD role anggota band:
  - (Create)
    - Mengisi data pada form (nama role).
    - Klik button 'Tambah'.
    - Menjalankan query insert data into database.
    - END.
  - (Update)
    - Pilih data yang ingin di-update, lalu klik icon ubah data.
    - Ubah data.
    - Klik button 'Simpan'.
    - Menjalankan query save data into database.
    - END.
  - (Delete)
    - Pilih data yang ingin dihapus, lalu klik icon hapus data.
    - Menjalankan query delete data from database.
    - END.

## Dokumentasi (Untuk record dapat dilihat pada file 'video_preview.mp4'):
- Anggota:<br>
  - Page List Anggota Band:<br>
![image](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/f8efb612-09aa-493f-b8b7-9bafbd66e490)
  - Pengurutan Data Anggota:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/c36163c5-5467-4a83-923b-c000ed40c6b5)
  - Searching Data Anggota:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/1de6f69a-e9a5-4982-8084-4c0a6db70efd)
  - Detail Anggota:<br>
![image](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/0d0ee748-949b-42d3-8abb-e6a25aadbc74)
  - Add Data Anggota:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/10d01ef3-fe41-43a7-8780-318292679c61)
  - Ubah Data Anggota:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/bb42d8bb-dfe5-4183-a564-7b37737b91b9)
  - Delete Data Anggota:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/86bd51d2-4b0e-40f0-a545-66e251bf326e)

- Band:<br>
![image](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/ef2c6886-2e3e-40dc-b622-efe498c2ae87)
  - Searching Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/0874d113-5b59-439d-b82d-f15b36635b59)
  - Pengurutan Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/82015e2d-a263-407c-8efe-ad7a6e06062f)
  - Add Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/7466e2f9-5e8d-4639-9036-031d938bc79b)
  - Update Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/8a0c29de-8e1f-45a2-89e6-b85fec1e0c5c)
  - Delete Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/48aca732-b5be-4acb-9cda-5b0944916449)

- Role:<br>
![image](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/e852014d-b6d0-4874-8c5b-6d07c73a0fdc)
  - Searching Data Role:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/ab7b2905-7e27-4390-9f95-64016fbd2713)
  - Pengurutan Data Band:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/dfb242f1-d0bf-48ac-baa1-2009f0f62f13)
  - Add Data Role:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/2e8df293-76cf-4e31-9194-ddacb6f68c3f)
  - Update Data Role:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/ddb3d8b8-618d-4237-895c-fdf0fc46b906)
  - Delete Data Role:<br>
![animation](https://github.com/kkamall/TP3DPBO2023C1/assets/101335350/2c6e1b93-fe51-4ba0-915c-fe2b3dccafaf)
