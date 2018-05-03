 <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading">Modifier vos informations</div>


                <div class="panel-body">
                    <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="avatar"> upload photo </label>
                            <input type="file" name ="avatar"  class="form-control" accept="image/*">
                        </div>


                       
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control datepicker" name="birthday" value="{{ $information->birthday}}">
                                
                        </div>
                        


                        <div class="form-group">
                            <label for="location"> localisation </label>
                            <input type="text" name ="location" value="{{ $information->location}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone"> phone </label>
                            <input type="phone" name ="phone" value="{{ $information->phone}}" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="bio"> résumé </label>
                            <textarea name ="bio" id="bio"  cols="40" rows ="9" class="form-control" >{{ $information->bio}}</textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-center">
                                <button class ="btn btn-primary btn-lg" type="submit">save your information</button>
                            </p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>



