@extends('layouts.auth', ['title' => 'Login-Page'])

@section('content')

<div class="bg-coverlogin">
    <div class="login-container">
        <h1>LOGIN</h1>
        <form action={{ route('login')}} method="POST">
            @csrf
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
    @endif
            <p class="label-login">Username atau Email</p>
            <input class="input-field" name="email" type="text" placeholder="Masukkan username atau email anda...">
            <p class="label-login">Password</p>
            <input class="input-field" name="password" type="password" placeholder="Masukkan password anda...">
            <a class="forgot-password-link" href={{route('password.request')}}>Lupa Password?</a>
            <button class="login-button">MASUK</button>
            <a class="dont-have">Belum punya akun?</a>
            <a class="registration-link" href={{route('register')}}>Register Disini</a>
        </form>
    </div>
</div>
