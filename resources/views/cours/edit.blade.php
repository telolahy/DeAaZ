@extends('dashboard.template')
@section('contenu')
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row vh-100 bg-secondary rounded align-items-start justify-content-start mx-0 ">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Modifier Classe</h6>
                    <form action="{{route('cours.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="course" class="form-label">Cours</label>
                            <input type="text" class="form-control" name="course" value="{{$course->course}}">
                        </div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                   
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif --}}
                </div>
            </div>
            
        </div>
    </div>
    <!-- Blank End -->
@endsection     