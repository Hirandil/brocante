<div id="content" class="clearfix">

    <div class="container">


        <h1 class="page-header"><?php if($update) echo "Modifier mon actualité";
            else echo 'Nouvelle actualité' ?></h1>
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
                    <?php if($update) echo '<input type="hidden" name="id" value="'.$news->getId().'">';?>
                    <div class="control-group">
                        <label class="control-label" for="title">Titre :</label>

                        <div class="controls">
                            <input type="text" name="title" id="title" onkeyup="verif(this)" <?php if($update){echo 'value="'.$news->getTitle().'"';}?>>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="content"> Contenu : </label>

                        <div class="controls">
                            <textarea name="content" id="content" style="height: 150px;" ><?php if($update){echo $news->getContent();}?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="image">
                            Image
                        </label>

                        <div class="controls">
                            <input type="file" name="image" id="image">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" style="margin-left: 85%;margin-top: 50px;"> <?php if($update){echo 'Mettre à jour';}else{ echo 'Poster';}?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    verif = function(chars) {
        // Caractères autorisés
        //var regex = new RegExp("[a-z0-9-éè',\ !?/()+=]", "i");
        var regex = new RegExp("[^_]","i");
        var valid;
        for (x = 0; x < chars.value.length; x++) {
            valid = regex.test(chars.value.charAt(x));
            if (valid == false) {
                chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1); x--;
            }
        }
    }

</script>




