@extends('layouts.app')


@section('content')

<div class="container">
	<div class="col-lg-4">

                    @include('widgets.flashmessage');

		<div class="panel panel-default">
			<div class="panel-heading">
				<p class="text-center">	{{$user->name}} {{$user->lastname}} </p>
			</div> 

			<div class="panel-body">
				<center>
				<img src="{{ Storage::url($user->avatar) }}" width="250" height="250" style="border-radius: 4%;" alt="">
				</center>
		    </div>
		</div>
		<div class="panel panel-default">
			<div class="body">
				<friend :profile_id="{{ $user->id}}">  </friend>
			</div>
		</div>
 

<div class="profile-information">
	@if(Auth::id()==$user->id) 
        <div class="edit-button">
            <div class="button-frame">
                <a href="{{ route('profile.edit') }}" data-toggle="modal" data-target="#info">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
            </div>
        </div>
    @endif
<ul class="list-group">
        <li class="list-group-item">
            @if($user->gender == 1)
                <i class="fa fa-mars">Male</i>
            @else
                <i class="fa fa-venus">Females</i>
            @endif
        </li>

		 <li class="list-group-item">
        
        		 <i class="fa fa-birthday-cake"></i>
					{{$user->profile->birthday}} 
		</li>
        
        <li class="list-group-item">
        	
        		 <i class="fa fa-map-marker"></i>
					{{$user->profile->location}} 
		</li>
		 <li class="list-group-item">
        		 <i class="fa fa-mobile"></i>
					{{$user->profile->phone}} 
		</li>

		<li class="list-group-item">
        	
        		 <i class="fa fa-info-circle"></i>
					{{ $user->profile->bio}} 
		</li>   

    </ul>

	</div>
</div>

</div>



@if(Auth::id()==$user->id) 
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
        </div>
    </div>
</div>
@endif
	
		


@endsection

@section('footer')
   
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection