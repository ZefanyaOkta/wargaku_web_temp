<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login',['admin' => 0]);
    }

    public function adminLogin()
    {
        return view('pages.auth.login', ['admin' => 1]);
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'admin' => 'boolean|required'
        ]);

        if($request->admin){
            $credentials = $request->only('username', 'password');

            if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);

        }

        $credentials = $request->only('username', 'password');

        $client = new \GuzzleHttp\Client();

        try{
            $response = $client->post('https://api-mc.surabaya.go.id/api/mediacenter/login', [
                'form_params' => [
                    'user' => $request->username,
                    'password' => $request->password,
                ]
            ]);

            $res_body = json_decode($response->getBody());

            if($res_body->status == 'success'){
                session()->put([
                    'user' => $res_body,
                    'access_token' => $res_body->access_token,
                ]);

                return redirect()->intended('dashboard');
            }
        }catch(\GuzzleHttp\Exception\ClientException $e){
            return back()->withErrors([
                'email' => $e->getMessage(),
            ]);
        }



        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
