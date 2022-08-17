@extends('dashboard.template')
@section('contenu')
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-start justify-content-start mx-0 ">
            
            <div class="col-md-12 text-center mt-3 mx-3"> 
                <div class="d-flex justify-content-between align-items-center mx-5  ">
                    <h3>Liste des formateurs</h3>
                    {{-- <a href="{{route('classe.create')}}" class="btn btn-success">ajouter classe</a> --}}
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nom</th>
                            <th scope="col">email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role->users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('etudiant.show',$user->id)}}" class="btn btn-info m-2">voir</a>
                                </td>
                                <td>
                                    <form action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button   type="submit" class="btn btn-danger m-2">supprimer</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
               
            </div>
        </div>
    </div>
    <!-- Blank End -->
@endsection     