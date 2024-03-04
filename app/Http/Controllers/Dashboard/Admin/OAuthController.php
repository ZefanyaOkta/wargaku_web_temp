<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class OAuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Client::class, 'oauth');
    // }

    public function index(Request $request)
    {
        $this->authorize('lihat konfigurasi oauth', Client::class);

        $clients = $request->user()->clients;

        return view('pages.dashboard.admin.oauth', compact('clients'));
    }

    public function store(Request $request, ClientRepository $clientRepository)
    {
        $this->authorize('tambah konfigurasi oauth', Client::class);

        $request->validate([
            'name' => 'required',
            'redirect' => 'required|url',
        ]);

        $clientRepository->create(
            $request->user()->id,
            $request->name,
            $request->redirect
        );

        return redirect()->route('dashboard.admin.oauth.index');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit konfigurasi oauth', Client::class);

        $request->validate([
            'name' => 'required',
            'redirect' => 'required|url',
        ]);

        $client = $request->user()->clients->find($id);

        $client->name = $request->name;
        $client->redirect = $request->redirect;

        $client->save();

        return redirect()->route('dashboard.admin.oauth.index');
    }

    public function destroy($id)
    {
        $this->authorize('hapus konfigurasi oauth', Client::class);

        $client = Auth::user()->clients->find($id);

        $client->tokens->each(function ($token) {
            $token->delete();
        });

        $client->delete();

        return redirect()->route('dashboard.admin.oauth.index');
    }
}
