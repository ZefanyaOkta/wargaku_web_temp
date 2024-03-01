@extends('layouts.auth', ['title' => 'Forgot-Password-Page'])

@section('content')
<div>
    <h1 class="label-daftar">Lupa Password</h1>
    <form class="login-form" action={{ route('password.email')}} method="POST">
        @csrf
        <!-- <img src="{{ asset('storage/images/wargaku_gambar.png') }}" alt=""> -->
        <p>Email</p>
        <input class="input-field" name="email" type="text" placeholder="Email Anda">
        <button class="login-button">KIRIM EMAIL</button>
      </form>
</div>
