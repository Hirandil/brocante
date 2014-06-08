<div id="content" class="clearfix">
    <div class="container">
        <div class="row">

            <div id="main" class="span12">

                <div class="login-register">

                    <div class="row">
                        <div class="span4 offset4">
                            <ul class="tabs nav nav-tabs">
                                <li class="active" > Mes coordonnées </li>
                            </ul>


                            <div class="tab-pane " id="register">
                                <form method="post"
                                      action="/index.php?section=User&action=update">

                                    <div class="control-group">
                                        <label class="control-label">
                                            Nom
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="text" required="required" name="lastName" value= "<?php echo $user->getLastName() ?>">
                                        </div>
                                        <!-- /.controls -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">
                                            Prénom
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="text" required="required" name="firstName" value= "<?php echo $user->getFirstName() ?>">
                                        </div>
                                        <!-- /.controls -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">
                                            E-mail
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="email" required="required" name="userLogin" value= "<?php echo $user->getEmail() ?>">
                                        </div>
                                        <!-- /.controls -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">
                                            Adresse
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="text" required="required" name="address" value= "<?php echo $user->getAddress() ?>">
                                        </div>
                                        <!-- /.controls -->
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">
                                            Téléphone
                                            <span class="form-required" title="This field is required.">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="text" required="required" name="phone" value= "<?php echo $user->getPhone() ?>">
                                        </div>
                                        <!-- /.controls -->
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label">
                                            Nouveau mot de passe
                                            <span class="form-required">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="password" name="newPassword" required="required" >
                                        </div>
                                        <!-- /.controls -->
                                    </div>
                                    <!-- /.control-group -->

                                    <div class="control-group">
                                        <label class="control-label">
                                            Confirmer avec votre mot de passe
                                            <span class="form-required">*</span>
                                        </label>

                                        <div class="controls">
                                            <input type="password" name="password" required="required">
                                        </div>
                                        <!-- /.controls -->
                                    </div>
                                    <!-- /.control-group -->

                                    <div class="form-actions">
                                        <input type="submit" value="Mettre à jour" class="btn btn-primary arrow-right">
                                    </div>
                                    <!-- /.form-actions -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
