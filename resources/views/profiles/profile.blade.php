@extends('layouts.app')


@section('content')

<div class="container">
	<div class="col-lg-4">


		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">	{{$user->name}} {{$user->lastname}} </p>
			</div> 

			<div class="panel-body">
				<center>
				<img src="{{ Storage::url($user->avatar) }}" width="170px" height="170" style="border-radius: 50%;" alt="">
				</center>
				<br>

			

				<p class="text-center">
					{{$user->profile->location}} 
				</p> 

				<br>

				<p class="text-center">
					@if(Auth::id()==$user->id)  <!-- edition sur son profile permise que par la personne loggué avec le même profile -->
				<a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit profile </a>
					@endif
				</p> 
		    </div>
		</div>




		<div class="panel panel-default">
			<div class="body">
				<friend :profile_id="{{ $user->id}}">  </friend>
			</div>
		</div>
 




		<div class="panel panel-default">
			<div class="panel-heading" >
				<p class="text-center"> about me </p>
			</div> 

			<div class="panel-body">
				<p class="text-center"> {{ $user->profile->about }}  </p>
			</div> 
			
		</div>

		
	</div>
</div>

@endsection