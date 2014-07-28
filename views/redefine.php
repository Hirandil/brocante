<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 28/07/14
 * Time: 18:49
 */
?>


<div id="content" class="clearfix">
    <div class="container">
        <div class="row">

            <div id="main" class="span12">

                <div class="login-register">
                    <h2>Redéfinition de mot de passe</h2>
                    <br>
                    <div class="row">
                        <div class="span6 offset3">

                            <?php if(!isset($_GET['token'])){
                            ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="login">
                                    <form method="post" action="/User/redefine">
                                    <p> Un email vous sera envoyer afin de redéfinir votre mot de passe</p>
                                        <div class="control-group">
                                            <label class="control-label">
                                                Email
                                                <span class="form-required">*</span>
                                            </label>

                                            <div class="controls">
                                                <input type="text" name="email" required="required">
                                            </div>
                                            <!-- /.controls -->
                                        </div>
                                        <!-- /.control-group -->


                                        <div class="form-actions">
                                            <input type="submit" value="Envoyer"
                                                   class="btn btn-primary arrow-right">
                                        </div>
                                        <!-- /.form-actions -->
                                    </form>
                                </div>
                                <!-- /.tab-pane -->


                                <!-- /.tab-pane -->
                            </div>
                            <?php
                            }
                            else{
                            ?>
                            <div class="tab-content">
                                <div class="tab-pane active" id="login">
                                    <form method="post" action="/User/redefine">
                                    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                                        <div class="control-group">
                                            <label class="control-label">
                                                Nouveau mot de passe
                                                <span class="form-required">*</span>
                                            </label>

                                            <div class="controls">
                                                <input type="password" name="newPassword" required="required">
                                            </div>
                                            <!-- /.controls -->
                                        </div>
                                        <!-- /.control-group -->

                                        <div class="control-group">
                                            <label class="control-label">
                                                Confirmer le mot de passe
                                                <span class="form-required">*</span>
                                            </label>

                                            <div class="controls">
                                                <input type="password" name="newPassword2" required="required">
                                            </div>
                                            <!-- /.controls -->
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" value="Valider"
                                                   class="btn btn-primary arrow-right">
                                        </div>
                                        <!-- /.form-actions -->
                                    </form>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- /.tab-content -->
                            <hr>
                        </div>
                        <!-- /.span4-->




                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.login-register -->

            </div>
            <!-- /#main -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
