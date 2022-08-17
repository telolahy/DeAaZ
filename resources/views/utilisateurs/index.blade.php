@extends('dashboard.template')
@section('contenu')
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-start justify-content-start mx-0 ">
            
            <div class="col-md-12  mt-3 mx-3"> 
                <div class="d-flex justify-content-between align-items-center mx-5  ">
                    <h3>Liste des utilisateurs</h3>
                    {{-- <a href="{{route('eleve.create')}}" class="btn btn-success">ajouter eleve</a> --}}
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($utilisateurs as $utilisateur)
                            <tr>
                                <th scope="row">{{$utilisateur->id}}</th>
                                <td>{{$utilisateur->name}}</td>
                                <td>{{$utilisateur->email}}</td>
                                <td>
                                    <a href="{{route('utilisateur.show',$utilisateur->id)}}" class="btn btn-info m-2">voir</a>
                                </td>
                                {{-- <td>
                                    <button type="button" class="btn btn-secondary m-2">editer</button>
                                </td> --}}
                                <td>
                                    {{-- <a href="{{route('utilisateur.destroy',$utilisateur->id)}}"   class="btn btn-danger m-2">supprimer</a> --}}
                                    <form action="{{route('utilisateur.destroy',$utilisateur->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-2">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p class="text-info bg-dark">aucune enregistrement</p>
                        @endforelse
                    </tbody>
                </table>
                {{ $utilisateurs->links()}}
            </div>
        </div>
    </div>
    <!-- Blank End -->
@endsection     