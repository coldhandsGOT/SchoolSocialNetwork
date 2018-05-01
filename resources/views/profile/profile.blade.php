@extends('layouts.app')


@section('content')

    <div class="profile">

        @include('profile.widgets.header')

            <div class="container profile-main">
         
                <div class="row">
                    <div class="col-md-3">
                        @include('profile.widgets.information')
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
    </div>


@endsection

