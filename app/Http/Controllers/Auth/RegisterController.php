<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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

    public function register(Request $request){
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' =>  ['required', 'string', Password::default(), 'confirmed'],
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
        dd($request->all());

        $client = new \GuzzleHttp\Client();

        try{
            $response = $client->post('https://api-mc.surabaya.go.id/api/mediacenter/register', [
            'form_params' => [
                "user" => $request->email,
                'nik' => $request->nik,
                'name' => $request->name,
                'phone' => $request->phone,
                'tanggal_lahir' => $request->date_of_birth,
                'alamat' => $request->address,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kecamatan_id' => $request->kecamatan,
                'kelurahan_id' => $request->kelurahan,
                'password' => $request->password,
                'c_password' => $request->password,
            ]
        ]);


        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }





    }
}
