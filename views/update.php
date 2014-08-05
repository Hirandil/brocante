<div id="content" class="clearfix">
<!-- /.map-wrapper -->
<div class="container">
<div class="row">


<!-- /#sidebar -->

<div id="main" class="span12">

<h1 class="page-header"><?php echo "Profil de ". $user->getLastName()." ". $user->getFirstName() ?></h1>

<div class="agent">
    <div class="row">
        <div class="image span2">
            <img width="270" height="270" src="../assets/img/profil-default.png" class="thumbnail-image" alt="profil">
        </div><!-- /.image -->

        <div class="span10">
        <div class="row">
            <form method="post"
                  action="/User/update">
        <div class="body span5">
            <div class="property-filter widget" style=" padding-bottom: 20px; ">
                <div class="content">

                        <div class="control-group">
                            <label class="control-label">
                                Nom
                            </label>

                            <div class="controls">
                                <input type="text" required="required" name="lastName" value= "<?php echo $user->getLastName() ?>">
                            </div>
                            <!-- /.controls -->
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                Prénom
                            </label>

                            <div class="controls">
                                <input type="text" required="required" name="firstName" value= "<?php echo $user->getFirstName() ?>">
                            </div>
                            <!-- /.controls -->
                        </div>

                        <div class="control-group">
                            <label class="control-label">
                                E-mail
                            </label>

                            <div class="controls">
                                <input type="email" required="required" name="userLogin" value= "<?php echo $user->getEmail() ?>">
                            </div>
                            <!-- /.controls -->
                        </div>


                        <div class="control-group">
                            <label class="control-label">
                                Téléphone
                            </label>

                            <div class="controls">
                                <input type="text" required="required" name="phone" value= "<?php echo $user->getPhone() ?>">
                            </div>
                            <!-- /.controls -->
                        </div>

                        <!-- /.form-actions -->

                </div>
                <!-- /.content -->
            </div>
        </div><!-- /.body -->

        <div class="info span5">
            <div class="property-filter widget" style=" padding-bottom: 20px; ">
                <div class="content">

                        <div class="control-group">
                            <label class="control-label">
                                Nouveau mot de passe
                            </label>

                            <div class="controls">
                                <input type="password" name="newPassword">
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

                        <!-- /.form-actions -->

                </div>
                <!-- /.content -->
            </div>
        </div><!-- /.info -->
        </div>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-primary btn-large">Mettre à jour</button>
        </div>
        </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.agent -->


</div>

<!-- /#main -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>
