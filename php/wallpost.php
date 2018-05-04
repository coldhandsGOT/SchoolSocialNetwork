  <div class="col-md-6">
               <div class="clearfix"></div>

<div class="panel panel-default new-post-box">
    <div class="panel-body">
        <form id="form-new-post">
            <input type="hidden" name="group_id" value="">
            <div><textarea rows="5" cols="58" name="content" placeholder="Share what you think or photos"></textarea></div>
            <div class="image-area">
                <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                <img src="" />
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-4">
                  
                    <input type="file" accept="image/*" class="image-input" name="photo" onchange="previewPostImage(this)">
                </div>
                <div class="col-xs-4">
                    
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-submit pull-right" onclick="">
                        Post!
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>