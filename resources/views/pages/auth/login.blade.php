@extends('layouts.auth', ['title' => 'Login-Page'])

@section('content')

<div class="bg-coverlogin">
    <div class="login-container">
    <h1>LOGIN</h1>
        <form action={{ route('login')}} method="POST">
            @csrf
            <p class="label-login">Username atau Email</p>
            <input class="input-field" name="email" type="text" placeholder="Masukkan username atau email anda...">
            <p class="label-login">Password</p>
            <input class="input-field" name="password" type="password" placeholder="Masukkan password anda...">
            <a class="forgot-password-link" href=#>Lupa Password?</a>
            <button class="login-button">MASUK</button>
            <a class="dont-have">Belum punya akun?</a>
            <a class="registration-link" href={{route('register')}}>Silahkan Register Disini</a>
        </form>
    </div>
</div>



<!-- <div class="split right">
    <div class="centered">
        <img class="w-100 ml-2 mr-1" src="{{ url('images/logo/wargaku_photo.png') }}" alt="Logo"/>
        <h1>LOGIN</h1>
        <form action={{ route('login')}} method="POST">
            @csrf
            <p class="label-login">Username atau Email</p>
            <input class="input-field" name="email" type="text" placeholder="Masukkan username atau email anda...">
            <p class="label-login">Password</p>
            <input class="input-field" name="password" type="password" placeholder="Masukkan password anda...">
            <a class="forgot-password-link" href=#>Lupa Password?</a>
            <button class="login-button">MASUK</button>
            <a class="dont-have">Belum punya akun?</a>
            <a class="registration-link" href={{route('register')}}>Silahkan Register Disini</a>
        </form>
    </div>
</div> -->
