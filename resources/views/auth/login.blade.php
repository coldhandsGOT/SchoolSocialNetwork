<form role="form" method="POST" action="{{ route('login') }}">
    <input type="hidden" value="login" name="tab" />
    
  {{ csrf_field() }}
    <h2>Connecter vous à L'ECE Social Network</h2>



    <div class="row">
       <div class="col-md-12" {{ $errors->has('email') ? ' has-error' : '' }}>

            <label for="email" class="control-label">Adresse E-Mail </label>

            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value=""{{ old('email') }}"" required>
              
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong> {{ $errors->first('email') }}</strong>
                    </span>
                @endif
        
            </div>

        <div class="col-md-12">
            <label for="password" class="control-label">Password</label>

            <div  class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-unlock-alt"></i> </span>

                <input id="password" type="password" placeholder="*********" class="form-control" name="password" required>


            </div>

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
           
        </div>

        <div class="form-group col-md-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox2" type="checkbox" name="remember">
                <label for="checkbox2">
                    Remember Me
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-login">
                    Log In
                </button>
            </div>
        </div>


        <div class="clearfix"></div>

        <div class="sub-title">
            <hr />
            <span>or</span>
        </div>


        <div class="form-group">
            <div class="col-md-8 col-md-offset-2">
                <button type="submit" class="btn btn-primary btn-facebook">
                    <i class="fa fa-facebook-square"></i> Connect with Facebook
                </button>
            </div>
        </div><br> <br> <br> <br> <br> <br> 
         <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                   <br> Forgot Your Password?
                                </a>



    </div>
</form>