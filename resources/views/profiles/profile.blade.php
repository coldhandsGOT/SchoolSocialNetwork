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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Vos informations</h5>
            </div>

            <div class="modal-body">
                <form id="form-profile-information">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control " name="gender">
                                    <option value="0" @if($user->gender == 1){{ 'selected' }}@endif>Male</option>
                                    <option value="1" @if($user->gender == 0){{ 'selected' }}@endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birthday</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                                    <input type="text" class="form-control datepicker" name="birthday" value="@if($user->profile->birthday){{ $user->birthday->format('Y-m-d') }}@endif" aria-describedby="basic-addon1" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-mobile"></i></span>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control">{{ $user->profile->bio}}</textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="saveInformation()">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
	
		


@endsection

@section('footer')
   
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection