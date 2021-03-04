@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Créer une annonce</h1>
            </div>
        </div>
        <div>
             <form method="POST" action="{{route('user.create.annoucement.add')}}">
                @csrf
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input  class="form-control" type="text" name="title" required>
                    <label for="content">Contenu</label>
                    <input  class="form-control" type="text" name="content" required>
                    <label for="price">Prix</label>
                    <input  class="form-control" type="number" name="price">
                </div>
                <button type="submit" class="btn btn-primary">Créer l'annonce</button>
            </form>

        </div>
    </div>
@endsection