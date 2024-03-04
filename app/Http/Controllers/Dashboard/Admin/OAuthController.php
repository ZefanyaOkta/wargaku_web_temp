<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;


class OAuthController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ClientRepository::class, 'oauth');
    }

    public function index(Request $request)
    {
        $clients = $request->user()->clients;

        return view('pages.dashboard.admin.oauth', compact('clients'));
    }

    public function store(Request $request, ClientRepository $clientRepository)
    {
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
        $client = Auth::user()->clients->find($id);

        $client->tokens->each(function ($token) {
            $token->delete();
        });

        $client->delete();

        return redirect()->route('dashboard.admin.oauth.index');
    }
}
