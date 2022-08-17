@extends('dashboard.template')
@section('contenu')
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-start justify-content-start mx-0 ">
            
            <div class="col-md-12  mt-3 mx-3"> 
                <div class="d-flex justify-content-between align-items-center mx-5  ">
                    <h3>Liste des Cours</h3>
                    <a href="{{route('cours.create')}}" class="btn btn-success">ajouter cours</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">cours</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <th scope="row">{{$course->id}}</th>
                                <td>{{$course->course}}</td>
    
                                <td>
                                    <a href="{{route('cours.show',$course->id)}}" class="btn btn-info m-2">voir</a>
                                </td>
                                <td>
                                    <a href="{{route('cours.edit',$course->id)}}" class="btn btn-info m-2">Editer</a>
                                </td>
                                <td>
                            
                                    <form action="{{route('cours.destroy',$course->id)}}" method="post">
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
                {{ $courses->links()}}
            </div>
        </div>
    </div>
    <!-- Blank End -->
@endsection     