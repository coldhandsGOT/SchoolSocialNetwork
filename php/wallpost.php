


  <div class="col-md-6">
               <div class="clearfix"></div>

<div class="panel panel-default new-post-box">
    <div class="panel-body">

                        <form id="form-new-post" action="upload.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                      <input type="hidden" name="group_id" value="">
                                          <div><textarea rows="5" cols="58" name="Description" placeholder="Share what you think or photos"></textarea></div>
                                      <div class="image-area">
                                          <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                                          <img src="" />
                                      </div>

                                      <hr />

                                      <div class="row">
                                          <div class="col-xs-4">
                                            <label>Choisissez une photo ou une vidéo</label><br />
                                              <input type="file" accept="image/*" class="image-input" name="avatar" id="fileToUpload">
                                          </div>

                                          <div class="col-xs-4">
                                               <label id="confidentialite"> Confidentialite :</label><br />
                                                <select class="" name="confidentialite">
                                                    <option value="0">Public</option>
                                                    <option value="1">Seulement les amis</option>
                                                    <option value="2">Moi-même</option>
                                            </select>
                                        <br><br>
                                          </div>


                                          <div class="col-xs-4">
                                              <button name="upPhoto" class="btn btn-primary btn-submit pull-right" onclick="">
                                                 Upload photo
                                              </button>
                                              <button name="upStat" class="btn btn-primary btn-submit pull-right" onclick="">
                                                 post status
                                              </button>
                                        </div>

                                    </div>
                             </fieldset>




                        </form>
                 

    </div>
            </div>

</div>
</div>