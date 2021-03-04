@extends('layouts.app')

@section('content')
<a class="btn btn-primary" href="{{ route('user.create.annoucement') }}">Ajouter une annonce</a>
       <div class="row">
           @foreach($annoucement as $annoucement)
                @if ($annoucement->enabled == true)

               <div class="col-lg-3">
                   <div class="card mb-5" style="width: 18rem;">
                       <img class="card-img-top" src="https://picsum.photos/seed/picsum/300/200" alt="Card image cap">
                       <div class="card-body">
                           <p><h2>{{ $annoucement->title }}</h2> <br><span>{{ $annoucement->content }}</span></p>
                           <p>Le {{ $annoucement->created_at }} <p>
                           <p> {{ $annoucement->price }} €</p>                            
                       </div>
                        <a class="btn btn-info" href="{{ route('user.see.annoucement', ['id'=>$annoucement->id]) }}">Voir cette annonce</a>

                       @if ($annoucement->user_id == $current_user)
                        <a class="btn btn-primary" href="{{ route('user.edit.annoucement', ['id'=>$annoucement->id]) }}">Editer cette annonce</a>

                        <a class="btn btn-danger" href="{{ route('user.suppr.annoucement', ['id'=>$annoucement->id]) }}">Supprimer cette annonce</a>
                        @endif
                   </div>
               </div>
               @endif
           @endforeach
       </div>
   </div>
@endsection
