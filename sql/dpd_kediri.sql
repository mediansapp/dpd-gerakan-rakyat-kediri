CREATE DATABASE dpd_kediri;
USE dpd_kediri;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO admin (username, password) VALUES ('admin', MD5('admin123'));

CREATE TABLE berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    isi TEXT,
    tanggal DATE,
    gambar VARCHAR(255)
);

CREATE TABLE pengurus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    jabatan VARCHAR(100),
    foto VARCHAR(255)
);

CREATE TABLE galeri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    gambar VARCHAR(255),
    tanggal DATE
);

CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    alamat TEXT,
    no_hp VARCHAR(20),
    email VARCHAR(100),
    tanggal_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
