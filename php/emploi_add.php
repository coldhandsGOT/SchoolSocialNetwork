<?php
// Start the session
session_start();
?>

 <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading">Ajouter une offre d'emploi</div>


                <div class="panel-body">
                    <form action="emploi_offres.php" method="post">

                       
                        <div class=" col-md-4 ">
                             <label for="speciality" class="control-label">Speciality</label>
                              <div class="col-md-12">
                            <select name="speciality" id="speciality" class="form-control"> 
                                    <option value="SI">Systemes d'informations</option>
                                    <option value="F">Finances</option>
                                    <option value="R">Robotique</option>
                                    <option value="BD">Big Data</option>
                                    <option value="SE">Systèmes Embarqués</option>
                            </select>
                            </div>
                         </div>


                        <div class="form-group">
                            <label for="poste"> Poste </label>
                            <input type="text" name ="poste" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="entreprise"> Entreprise </label>
                            <input type="text" name ="entreprise" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="address"> Adresse </label>
                            <input type="phone" name ="address" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" name ="email" value="" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="contenu"> Description </label>
                            <input type="text" name ="contenu"  class="form-control" >
                        </div>


                        <div class="form-group">
                            <p class="text-center">
                                <button class ="btn btn-primary btn-lg" type="submit"> Submit </button>
                            </p>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

