@extends('client.backoffice.template')
 
@section('content')
@if (session()->has('success'))
        <p class="text-white">{{ session()->get('success') }}</p>
    @endif
    <div class="mt-4 card">
        <header class="card-header">
            <h1 class="card-header-title">Clients</h1>
            
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client['civilite']['libelle'] }}</td>
                                <td>{{ $client['prenom'] }}</td>
                                <td>{{ $client['nom'] }}</td>
                                <td>{{ $client['tel'] }}</td>
                                <td>{{ $client['email'] }}</td>
                                <td>
                                    <a href="/client/{{ $client['id'] }}/edit" class="btn btn-primary">Modifier</a>


                                </td>
                                <td>
                                    <form action="{{ route('client.destroy', $client['id']) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach





                    </tbody>




                </table>
            </div>
        </div>
    @endsection
