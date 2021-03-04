@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-lg-2-12">
               <div class="mb-5">
                   @can ('create-vehicle')
                       <a class="btn btn-primary" href="{{ route('vehicles.create') }}">Ajouter un véhicule</a>
                   @endcan
               </div>
           </div>
       </div>
       <div class="container">
            <a class="btn btn-primary" href="{{ route('user.see.anouncements') }}">Voir la liste des annonces</a>
       </div>
       <div class="row">
           @foreach($vehicles as $vehicle)
               <div class="col-lg-3">
                   <div class="card mb-5" style="width: 18rem;">
                       <img class="card-img-top" src="https://picsum.photos/seed/picsum/300/200" alt="Card image cap">
                       <div class="card-body">
                           <p><span>{{ $vehicle->name }}</span> <span>{{ $vehicle->brand->name }}</span></p>
                           <p>{{ $vehicle->odometer }} Km - {{ $vehicle->price }} €</p>
                            <a href="{{ route('vehicles.reserved', $vehicle) }}" class="btn btn-primary">Réserver</a>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
