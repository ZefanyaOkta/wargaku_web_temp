@extends('layouts.auth', ['title' => 'Register-Page'])

@section('content')
<div class="registration-container">
    <h1 class="label-daftar">DAFTAR</h1>
    <form class="registration-form" action=# method=#>
        @csrf
        <div class="input-container-register">
            <p>Email</p>
            <input class="input-field-register" name="email" type="text" placeholder="Email atau Username Anda...">
        </div>
        <div class="input-container-register">
            <p>NIK</p>
            <input class="input-field-register" name="nik" type="text" placeholder="NIK Anda...">
        </div>
        <div class="input-container-register">
            <p>Nama</p>
            <input class="input-field-register" name="nama" type="text" placeholder="Nama Anda...">
        </div>
        <div class="input-container-register">
            <p>Nomor Telepon</p>
            <input class="input-field-register" name="phone" type="text" placeholder="Nomor Telepon Anda...">
        </div>
        <div class="input-container-register">
            <p>Tanggal Lahir</p>
            <input class="input-field-register" name="date_of_birth" type="date" placeholder="Tanggal Lahir Anda...">
        </div>
        <div class="input-container-register">
            <p>Alamat</p>
            <input class="input-field-register" name="address" type="text" placeholder="Alamat Anda...">
        </div>
        <div class="input-container-register">
            <p>Jenis Kelamin</p>
            <select class="select-field-register" name="jenis_kelamin" id="jenisKelamin">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div class="input-container-register">
            <p>Kecamatan</p>
            <select class="select-field-register" class="select-field" name="kecamatan" id="kecamatan">
                <option value="" disabled selected>Pilih Kecamatan</option>
            </select>
        </div>
        <div class="input-container-register">
            <p>Kelurahan</p>
            <select class="select-field-register" name="kelurahan" id="kelurahan">
                <option value="" disabled selected>Pilih Kelurahan</option>
            </select>
        </div>
        <div class="input-container-register">
            <p>Password</p>
            <input class="input-field-register" name="password" type="password" placeholder="Password Anda...">
        </div>
        <div class="input-container-register">
            <p>Konfirmasi Password</p>
            <input class="input-field-register" name="password" type="password" placeholder="Konfirmasi Password Anda...">
        </div>
        <br>
        <p class="agreement-text">Dengan Klik Tombol "REGISTER", Anda Setuju Dengan Kebijakan Privasi Tentang
            Penggunaan WargaKu</p>
        <button class="submit-button">REGISTER</button>
    </form>
</div>
