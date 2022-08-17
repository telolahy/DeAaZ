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
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <th scope="row">{{$utilisateur->id}}</th>
                                <td>{{$utilisateur->name}}</td>
                                <td>{{$utilisateur->email}}</td>
                                <td>
                                    <a href="{{route('attributionCours',[$utilisateur->id,$utilisateur->name])}}"  class="btn btn-success m-2">admin</a>
                                </td>
                                
                            </tr>
                      
                    </tbody>
                   
                </table> --}}

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">cours</th>
                            <th scope="col">attribue</th>
                            {{-- <th scope="col">email</th>
                            <th scope="col"></th> --}}
                            {{-- <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{$course->course}}</th>
                            {{-- <td>{{$utilisateur->name}}</td>
                            <td>{{$utilisateur->email}}</td> --}}
                            <td>
                                <a href="{{route('attributionCours',[$utilisateur->id,$course->id])}}"  class="btn btn-success m-2">Attribuer</a>
                            </td>
                            <td>
                                <a href="{{route('detacherCours',[$utilisateur->id,$course->id])}}"  class="btn btn-danger m-2">Detacher</a>
                            </td>
                        
                    </tr>
                       @endforeach
                            
                      
                    </tbody>
                   
                </table>
                {{ $courses->links()}}
            </div>

            <div >
                <h1> {{$utilisateur->name}} est assigne au cours de: </h1>
                       <ul>
                            @foreach ($utilisateur->courses as $course)
                                <li>{{$course->course}}</li>
                            @endforeach
                       </ul>
            </div>
        </div>
        
    </div>
    
    <!-- Blank End -->
@endsection