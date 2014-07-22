<div id="content" class="clearfix">

<div class="container">


        <h1 class="page-header"> Nouvelle actualité </h1>
<br>
<div class="row">
<div class="span6">
    <form method="POST" <?php if(!$update)
        echo 'action="index.php?section=News&action=create"';
    else
        echo 'action="index.php?section=News&action=update"';
    ?>
          class="submission-form form-vertical"
          enctype="multipart/form-data">

        <div class="control-group">
            <label class="control-label" for="title">Titre :</label>
            <div class="controls">
                <input type="text" name="title" id="title">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="content"> Contenu </label>
            <div class="controls">
                <input type="text" name="content" id="content">
            </div>
        </div>
        <button type="submit"> Envoyer</button>
    </form>
</div>
</div>
</div>
        </div>





