


  <div class="col-md-6">
               <div class="clearfix"></div>

<div class="panel panel-default new-post-box">
    <div class="panel-body">
        
      
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend>
            Poster votre photo ou video :
              </legend><br />

                <div class = "corps">
                              <!-- Sélectionner la photo -->
                              <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                              <label>Choisissez une photo ou une vidéo</label><br />
                              <input type="file" name="avatar" id="fileToUpload">
                              <br /><br />
                              <!-- Insérer la description de la publication-->
                              <label id="description"> Description :</label><br />
                              <textarea name="Description" ></textarea><br /><br />
                              
                              <label id="confidentialite"> Confidentialite :</label><br />
                                  <select class="" name="confidentialite">
                                      <option value="0">Public</option>
                                      <option value="1">Seulement les amis</option>
                                      <option value="2">Moi-même</option>
                                  </select>
                              <br><br>

                            <div class ="bouton">
                                 <button class="button" name="submit" ><span>Poster</span></button>
                           </div>           
                </div>
    </fieldset>
    </form>

    </div>
</div>
</div>