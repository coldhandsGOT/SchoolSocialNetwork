@extends('layouts.app')



@section('content')
    <div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
               @include('widgets.sidebar')  <!-- menu de la page d'acueil -->
            </div>
            
            <div class="col-md-6">
                @include('widgets.wall')  <!-- mur de la page d'acueil -->
            </div>
        </div>
    </div>
@endsection

@section('footer')
   
@endsection