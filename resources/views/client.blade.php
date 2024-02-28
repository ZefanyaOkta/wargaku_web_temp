<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- CSS --}}
    <style>
        input {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    {{-- Create Stylized form plzz, field is client id and callback url --}}
    <form action="/oauth/clients/" method="post">
        @csrf
        Create Client OAuth2
        <div>
            <label for="client_id">Client ID</label>
            <input type="text" name="name" id="client_id" placeholder="Client ID">
        </div>
        <div>
            <label for="callback_url">Callback URL</label>
            <input type="text" name="redirect" id="callback_url" placeholder="Callback URL">
        </div>
        <button type="submit">Submit</button>
    </form>

    <br>

    {{-- Display all clients --}}
    <h1>Clients</h1>
    <ul>
        @foreach ($clients as $client)
            <li>
                <strong>{{ $client->name }}</strong>
                <p>{{ $client->redirect }}</p>
                <p>{{ $client->id }}</p>
                <p>{{ $client->secret }}</p>
            </li>
        @endforeach
</body>

</html>
