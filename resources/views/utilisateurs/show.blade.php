@extends('dashboard.template')
@section('contenu')
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-start justify-content-start mx-0 ">
            
            <div class="col-md-12 text-center mt-3 mx-3"> 
                {{-- <div class="d-flex justify-content-between align-items-center mx-5  ">
                    <h3>liste des eleves classe de {{$classe->classe}}</h3>
                    <a href="{{route('classe.create')}}" class="btn btn-success">ajouter classe</a>
                </div> --}}
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th scope="col">roles</th>
                            <th scope="col">attribuer</th>
                            <th scope="col">detacher</th>
    
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($roles as $role)
                       <tr>
                        <td>{{$role->role}}</td>
                        <td>
                            <a href="{{route('attributionRoles',[$utilisateur->id,$role->id])}}"  class="btn btn-success m-2">{{$role->role}}</a>
                        </td>
                        <td>
                            <a href="{{route('detacherRoles',[$utilisateur->id,$role->id])}}"  class="btn btn-danger m-2">{{$role->role}}</a>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                   
                </table>
               
            </div>
            <div >
                <h1> {{$utilisateur->name}} est: </h1>
                       <ul>
                            @foreach ($utilisateur->roles as $role)
                                <li>{{$role->role}}</li>
                            @endforeach
                       </ul>
            </div>
        </div>
        
    </div>
    
    <!-- Blank End -->
@endsection     