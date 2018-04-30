@extends('layouts.header')



@section('content')
    <div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
               @include('widgets.sidebar')
            </div>
            <div class="col-xs-12 col-md-3 pull-right">
                <div class="hidden-sm hidden-xs">
                   
                </div>
            </div>
            <div class="col-md-6">
                @include('widgets.wall')
            </div>
        </div>
    </div>
@endsection

@section('footer')
   
@endsection