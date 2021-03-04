@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Votre annonce :</h1>
            </div>
        </div>
        <div>
             <form method="POST" action="{{ route('user.edit.annoucement.validation', ['id'=>$annoucement->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input  class="form-control" type="text" name="title" value="{{$annoucement->title}}" required>
                    <label for="content">Contenu</label>
                    <input  class="form-control" type="text" name="content" value="{{$annoucement->content}}" required>
                    <label for="price">Prix</label>
                    <input  class="form-control" type="number" name="price" value="{{$annoucement->price}}">
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour l'anonce</button>
            </form>

        </div>
    </div>
@endsection