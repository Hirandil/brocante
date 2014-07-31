<div id="content" class="clearfix">

    <div class="container">


        <h1 class="page-header"> Nouvelle actualité </h1>
        <br>

        <div class="row">
            <div class="span10 box-search">
                <form method="POST" <?php if (!$update)
                    echo 'action="/Informations/create"';
                else
                    echo 'action="/Informations/update"';
                ?>
                      class="submission-form form-vertical"
                      enctype="multipart/form-data">

                    <div class="control-group">
                        <label class="control-label" for="title">Titre :</label>

                        <div class="controls">
                            <input type="text" name="title" id="title" <?php if($update){echo 'value="'.$news->getTitle().'"';}?>>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="content"> Contenu </label>

                        <div class="controls">
                            <textarea name="content" id="content" style="height: 150px;" <?php if($update){echo 'value="'.$news->getContent().'"';}?>></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="margin-left: 85%;margin-top: 50px;"> <?php if($update){echo 'Mettre à jour';}else{ echo 'Poster';}?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>





