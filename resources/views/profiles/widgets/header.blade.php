<div class="container-fluid">
    <div class="row">
        <div class="cover" style="background-image: url('{{ $user->getCover() }}') ">
           
                <div class="loading-cover">
                    <img src="{{ asset('images/rolling.gif') }}" alt="">
                </div>
           
            <div class="bar">
                <div class="container">
                    <div class="profile-image @if($user->sex == 1){{ 'female' }}@endif">
                       
                            <div class="loading-image">
                                <img src="{{ asset('images/rolling.gif') }}" alt="">
                            </div>
                            <form id="form-upload-profile-photo" enctype="multipart/form-data">
                                <div class="change-image">
                                    <a href="javascript:;" class="upload-button" onclick="uploadProfilePhoto()"><i class="fa fa-upload"></i> Upload Photo</a>
                                    <input type="file" accept="image/*" name="profile-photo" class="profile_photo_input">
                                </div>
                            </form>
                       
                        <a data-fancybox="group" href="{{ $user->getPhoto() }}">
                            <img class="image-profile" src="{{ $user->getPhoto(200, 200) }}" alt="" />
                        </a>
                    </div>
                    <div class="profile-text">
                        <h2>{{ $user->name }} {{ $user->lastname }}</h2>
                        
                        
                            
                      
                    </div>
                    
                        <form id="form-upload-cover" enctype="multipart/form-data">
                            <div class="profile-upload-cover">
                                <a href="javascript:;" class="btn btn-info upload-button" onclick="uploadCover()"><i class="fa fa-upload"></i> Change Cover</a>
                                <input type="file" accept="image/*" name="cover" class="cover_input">
                            </div>
                        </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>