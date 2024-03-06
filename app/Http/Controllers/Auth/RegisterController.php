<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();

        $kecamatan = json_decode($client->request('GET', 'https://api-mc.surabaya.go.id/api/mediacenter/kecamatan')->getBody());

        return view('pages.auth.register', [
            'kecamatan' => $kecamatan->result,
        ]);
    }

    public function getKelurahan($id_kec)
    {
        $client = new \GuzzleHttp\Client();

        $kelurahan = json_decode($client->request('GET', 'https://api-mc.surabaya.go.id/api/mediacenter/kelurahan/?id_kec='.$id_kec)->getBody());

        return response()->json($kelurahan->result);
    }

    public function register(array $input){
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => $this->passwordRules(),
            'nik' => [
                'required',
                'string',
                'max:16',
            ],
            'phone' => ['required', 'string', 'regex:/^(^08)\d{8,11}$/', 'max:14'],
            'date_of_birth' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kelurahan' => ['required', 'string', 'max:255'],
        ])->validate();

        $client = new \GuzzleHttp\Client();



    }
}
