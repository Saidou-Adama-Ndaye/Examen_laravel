<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/resources">
    </head>

    <body>
        
        <center>
            <div style="background:#AED6F1; border-radius:10px;padding:5px">
                <h1 style="font-size:50px; color:white">Liste des candidats</h1>
                <nav class="nav nav-pills flex-column flex-sm-row">
                    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="{{route('welcome')}}">Accueil</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="{{route('candidat.create')}}">Postuler</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white" href="#">Link</a>
                    <a class="flex-sm-fill text-sm-center nav-link bg-primary text-white">Disabled</a>
                </nav>
            </div>
            <br>
            <br>
            <br>
            <div style="background-color: #AED6F1; width:80%">
                <div style="background-color: white; width:60%">
            <table class="table table-bordered bg-white text-center" style="width: 100%" border=1>
                <tr style="background-color:#AED6F1; color:white; font-size:20px;padding:5px">
                    <td>NOM</td>
                    <td>PRENOM</td>
                    <td>EMAIL</td>
                    <td>AGE</td>
                    <td>NIVEAU D'ETUDE</td>
                </tr>

                
            @if ($candidats->count() > 0)
                        @foreach ($candidats as $candidat) 
                            <tr>
                                <td>{{ $candidat->nom }}</td>
                                <td> {{ $candidat->prenom }} </td>
                                <td> {{ $candidat->email }} </td>
                                <td> {{$candidat->age }} </td>
                                <td> {{$candidat->niveauEtude }} </td>
                                {{-- <td>
                                    <form method="POST" action="{{route('candidat.destroy', $candidat)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="color:red" type="submit">DEL🗑</button>
                                    </form>
                                    <a href="{{route('candidat.edit', $candidat)}}">UPD✏</a>
                                </td> --}}
                            </tr>
                        @endforeach
                  @else 
                        <span>Aucun candidat  dans la base</span>
            @endif 
                
            </table>
            <br>
            <br>
            {{-- <a style="border:1px solid; background:#AED6F1; border-radius:10px; padding:10px;
            font-size:20px;marging-bottom:10px; color:white" href="{{route('candidat.create')}}">
            Postuler</a> --}}
                </div>
        </div>

        </center>
    </body>