@extends('layouts.auth', ['title' => 'Register-Page'])

@section('content')
<div class="bg-coverregis">
    <div class="main-container-regis">
        <img class="img-sby-regis" src="{{ url('images/illustration/sby.png') }}" alt="sby" />
        <div class="registration-container">
            <h1 class="regis-title">DAFTAR</h1>
            <form action={{ route('register') }} method="POST">
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
                <div class="reg-container">
                    <div class="reg-left">
                        <div class="input-container-register">
                            <p>Email</p>
                            <input class="input-field-register" name="email" type="text"
                                placeholder="Email atau Username Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>NIK</p>
                            <input class="input-field-register" name="nik" type="text" placeholder="NIK Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>Nama</p>
                            <input class="input-field-register" name="name" type="text" placeholder="Nama Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>Nomor Telepon</p>
                            <input class="input-field-register" name="phone" type="text"
                                placeholder="Nomor Telepon Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>Tanggal Lahir</p>
                            <input class="input-field-register" name="date_of_birth" type="date"
                                placeholder="Tanggal Lahir Anda...">
                        </div>
                    </div>

                    <div class="reg-rightside">
                        <div class="input-container-register">
                            <p>Alamat</p>
                            <input class="input-field-register" name="address" type="text" placeholder="Alamat Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>Jenis Kelamin</p>
                            <select class="select-field-register" name="jenis_kelamin" id="jenisKelamin">
                                <option value="" selected>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="input-container-register">
                            <p>Kecamatan</p>
                            <select class="select-field-register" class="select-field" name="kecamatan" id="kecamatan">
                                @foreach ($kecamatan as $k)
                                <option value="{{$k->id}}" @if ($k->id == 0) selected @endif>{{$k->name}}</option>
                                @endforeach
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
                            <input class="input-field-register" name="password" type="password"
                                placeholder="Password Anda...">
                        </div>
                        <div class="input-container-register">
                            <p>Konfirmasi Password</p>
                            <input class="input-field-register" name="password_confirmation" type="password"
                                placeholder="Konfirmasi Password Anda...">
                        </div>
                    </div>
                </div>

                <p class="agreement-text">Dengan Klik Tombol "REGISTER", Anda Setuju Dengan Kebijakan Privasi Tentang
                    Penggunaan WargaKu</p>
                <button class="regis-button">Register</button>
                <a class="alr-have">Sudah punya akun?</a>
                <a class="login-link" href={{route('login')}}>Login Disini</a>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#kecamatan').change(function () {
            var kecamatan_id = $(this).val();
            if (kecamatan_id) {
                $.ajax({
                    type: "GET",
                    url: "{{url('kelurahan')}}/" + kecamatan_id,
                    success: function (res) {
                        if (res) {
                            //Delete index 0
                            $("#kelurahan").empty();
                            $("#kelurahan").append(
                                `<option value="${res[0]['id']}" disabled selected>${res[0]['name']}</option>`
                                );
                            res.shift();
                            $.each(res, function (key, value) {
                                console.log(value);
                                $("#kelurahan").append(
                                    `<option value="${value['id']}">${value['name']}</option>`
                                    );
                            });
                        } else {
                            $("#kelurahan").empty();
                        }
                    }
                });
            } else {
                $("#kelurahan").empty();
            }
        });
    });

</script>
@endpush
