@extends('layouts.app')


@section('content')

    <div class="profile">

        @include('profiles.widgets.header')




       
            <div class="container profile-main">
                <div class="row">
                    <div class="col-xs-12">
                        
                            <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @include('profiles.widgets.information')
                    </div>
                   
                    <div class="col-md-6">
                        @include('widgets.wall')
                    </div>
                </div>
            </div>
       
    </div>


@endsection
