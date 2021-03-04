@extends('layouts.app')

@section('content')
           

    <div class="col-lg-3">
        <div class="card mb-5" style="width: 18rem;">
                <img class="card-img-top" src="https://picsum.photos/seed/picsum/300/200" alt="Card image cap">
                <div class="card-body">
                    <p><h2>{{ $annoucement->title }}</h2> <br><span>{{ $annoucement->content }}</span></p>
                    <p>Le {{ $annoucement->created_at }} <p>
                    <p> {{ $annoucement->price }} €</p>                            
                </div>
        </div>
    </div>

    <div class="col-lg-3">
    @foreach($comments as $comments)
        <div class="card mb-5" style="width: 18rem;">
                <h2>Commentaire</h2>
                <div class="card-body">
                    <p>{{ $comments->content }}</p>
                    <p>Le {{ $comments->created_at }} <p>                       
                </div>
        </div>
    @endforeach
    </div>

@endsection