@extends('layouts.auth', ['title' => 'Login-Page'])

@section('content')
<div>
  <h1>Login</h1>
  <form class="login-form" action=# method=#>
    @csrf
    <!-- <img src="{{ asset('storage/images/wargaku_gambar.png') }}" alt=""> -->
    <p>Email</p>
    <input class="input-field" name="email" type="text" placeholder="Username atau Email Anda">
    <p>Password</p>
    <input class="input-field" name="password" type="password" placeholder="Password Anda">
    <button class="login-button">MASUK</button>
    <a class="registration-link" href=#>Belum Punya Akun? Silahkan Register Disini</a>
    <a class="forgot-password-link" href=#>Lupa Password?</a>
  </form>
</div>
