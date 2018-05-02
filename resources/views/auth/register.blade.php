
<form class="register" role="form" method="POST" action="{{ route('register') }}">
    <input type="hidden" value="register" name="tab" />
    {{ csrf_field() }}

    <h2>Rejoigner le réseau social de L'ECE</h2>

    <div class="row">
        
        <div class=" col-md-4 {{ $errors->has('gender') ? ' has-error' : '' }}">
                 <label for="name" class="control-label">Sexe</label>
                 
                    <div class="col-md-12">
                        <select name="gender" id="gender" class="form-control"> 
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                        </select>

                        @if($errors->has('gender'))
                            <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                             </span>
                        @endif
                    </div>
            
        </div>


        <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
                <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>
                                <input id="name" type="text" class="form-control" placeholder="Chris"  name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                     </div>
                </div>
        </div>



        <div class="col-md-12 {{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="lastname" class="control-label">Lastname</label>
                <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-circle-o"></i> </span>
                                <input id="lastname" type="text" class="form-control" placeholder="Chris"  name="lastname" value="{{ old('lastname') }}" required>
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                     </div>
                </div>
        </div>



        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>
                <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                                <input id="email" type="text" class="form-control" placeholder="Chris.Roberts@email.com"  name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                     </div>
                </div>
        </div>


       
        <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Password</label>
                <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>
                                <input id="password" type="password" class="form-control" placeholder="****************"  name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                     </div>
                </div>
        </div>

       

        <div class="col-md-12">
            <label for="password-confirm" class="control-label">Confirm password</label>
                <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>
                                <input id="password-confirm" type="password" class="form-control"   name="password_confirmation" required>
                     </div>
                </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-register">
                    Register
                </button>
            </div>
        </div>
    </div>
</form>

