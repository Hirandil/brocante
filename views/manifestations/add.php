<div id="content" class="clearfix">

<div class="container">
<div class="row">


<div id="main" class="span12">
<?php
    if($_GET['action'] == 'add')
    {
        $update = false;
        echo '<h1 class="page-header">Ajouter une brocante</h1>';
    }
    else
    {
        $update = true;
        echo  '<h1 class="page-header">Modifier une brocante</h1>';
    }
?>



<div class="progressbar">
    <div class="progressbar-inner">
        <div class="row">
            <div class="item span4">
                <div class="number">1</div>
                <strong>Info</strong>
            </div>
            <!-- /.item  -->

            <div class="item span4">
                <div class="number">2</div>
                <strong>Date et Type</strong>
            </div>
            <!-- /.item  -->

            <div class="item span4">
                <div class="number">3</div>
                <strong>Details</strong>
            </div>
            <!-- /.item  -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.progressbar-inner -->
</div>
<!-- /.progressbar -->

<form method="POST" <?php if(!$update)
                            echo 'action="/Manifestation/add"';
                          else
                            echo 'action="/Manifestation/update"';
                    ?>
                    class="submission-form form-vertical"
                    enctype="multipart/form-data">
<div class="row">
<div class="span4">
    <?php
       if($update){
         echo '<input type="hidden" name="manifId" value="'.$manifestation->getId().'">';
       }
    ?>
    <input type="hidden" name="post_type" value="">
    <div class="control-group">
        <label class="control-label" for="address">
            Nom de la manifestation
        </label>

        <div class="controls">
            <input type="text" name="title" size="30" id="title" autocomplete="off" required="required" onkeyup="verif(this)" <?php if($update){echo 'value="'.$manifestation->getName().'"';}?>>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="address">
            Rue / Voie
        </label>

        <div class="controls">
            <input type="text" name="route" size="30" id="addressGoogle" autocomplete="off" required="required" onchange="completeOthers()" <?php if($update){echo 'value="'.$manifestation->getAddress().'"';}?>>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Ville
        </label>

        <div class="controls">
            <input type="text" name="city" size="30" id="cityGoogle" required="required" <?php if($update){echo 'value="'.$manifestation->getCity().'"';}?> >
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Région
        </label>

        <div class="controls">
            <select id="selectRegion" name="region" required="required">
                <option <?php if($update){echo 'value="'.$manifestation->getRegion().'"';}else{echo 'value="null"';}?>><?php if($update){echo $manifestation->getRegion();}else{echo 'Selectionner une région';}?></option>
                <?php
                foreach((array)$regions as $r)
                {
                    ?>
                    <option value="<?php echo $r->getName()?>" id="<?php echo $r->getId()?>"><?php echo $r->getName()?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Département
        </label>

        <div class="controls">
            <select id="selectDepartment" name="department">
                <option <?php if($update){echo 'value="'.$manifestation->getDepartment().'"';}else{echo 'value="null"';}?>><?php if($update){echo $manifestation->getDepartment();}else{echo 'Selectionner un departement';}?></option>
                <?php if(!$update){ ?>
                    <option value="null">Selectionner un departement</option>
                <?php } ?>
            </select>
        </div>
    </div>


</div>

<div class="span4">
    <div class="control-group">
        <label class="control-label" for="inputDate">
            Date de début
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <input type="text" name="dateStart" id="dateStart" required="required" <?php if($update){echo 'value="'.$manifestation->getStart().'"';}?>>
        </div>
        <!-- /.controls -->
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDate">
            Date de fin
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <input type="text" name="dateEnd" id="dateEnd" required="required" <?php if($update){echo 'value="'.$manifestation->getEnd().'"';}?>>
        </div>
        <!-- /.controls -->
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDate">
            Heure de début
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <input type="time" name="timeStart" id="inputDate"  required="required" <?php if($update){echo 'value='.$start;}?>>
        </div>
        <!-- /.controls -->
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDate">
            Heure de fin
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <input type="time" name="timeEnd" id="inputDate"  required="required" <?php if($update){echo 'value='.$end;}?>>
        </div>
        <!-- /.controls -->
    </div>

    <div class="control-group">
        <label class="control-label">
            Type de manifestation
        </label>

        <div class="controls">

            <select name="type">
                <?php
                foreach($types as $t)
                {
                    if($update){
                        if($manifestation->getType() == $t->getId()){
                            echo '<option value="'.$t->getId().'" selected = true >.'.$t->getLibelle().'</option>';

                        }
                        else{
                            echo '<option value="'.$t->getId().'">.'.$t->getLibelle().'</option>';
                        }
                    }
                    else {
                        echo '<option value="'.$t->getId().'">.'.$t->getLibelle().'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <br>
    <div class="control-group">
        <label class="control-label" for="contact">
            Numéro de contact
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <div class="input-append">
            <input type="text" name="contact" id="contact" <?php if($update){echo 'value='.$manifestation->getContact();}?>>
            </div>
        </div>
        <!-- /.controls -->
    </div>
</div>


<div class="span4">
    <div class="control-group">
        <label class="control-label">
            Prix d'entrée </label>

        <div class="controls">
            <div class="input-append">
                <input type="number" name="price" <?php if($update){echo 'value="'.$manifestation->getPrice().'"';}?>>
                <span class="add-on">€</span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Nombre d'exposants </label>

        <div class="controls">
            <div class="input-append">
                <input type="text" name="exhibitorNumber" <?php if($update){echo 'value="'.$manifestation->getExhibitorNumber().'"';}?>>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Tarif d'exposants </label>

        <div class="controls">
            <div class="input-append">
                <input type="text" name="exhibitorPrice" <?php if($update){echo 'value="'.$manifestation->getExhibitorPrice().'"';}?>>
            </div>
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


    <div class="control-group">
        <label class="control-label" for="address">
            Site internet
        </label>

        <div class="controls">
            <input type="text" name="site" size="30" id="site" autocomplete="off" <?php if($update){echo 'value="'.$manifestation->getSite().'"';}?>>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="description">
            Informations complémentaires
        </label>

        <div class="controls">
            <textarea id="description" class="mceNoEditor" rows="4" name="content" style="min-height:150px;"> <?php if($update){echo $manifestation->getInformations();}?></textarea>
        </div>
    </div>

</div>

<div class="form-actions">
    <?php
        if($_GET['action'] == 'add')
        {
            echo '<input type="submit" class="btn btn-primary" value="Ajouter">';
        }
        else
        {
            $update = true;
            echo  '<input type="submit" class="btn btn-primary" value="Modifier">';
        }
    ?>
</div>
<?php if($update){echo '<input type="hidden" name="idManif" value="'.$manifestation->getId().'"></input>';}?>
</form>

<div class="container" style="-webkit-columns: 6;
			-moz-columns: 6;
			columns: 6;
			column-width: 40px;
			column-gap: 10px;
			display: none">
    <ul id="listDepartment">
        <?php
        foreach((array)$departments as $d)
        {
            ?>
            <li style="display: table;font-size: 13px;margin: 5px">
                <?php echo "<input type=\"hidden\" id=".$d->getId()." value=".$d->getRegion()."></input>
                    <a href=\"/Manifestation/department/".$d->getZipCode()."\">(".$d->getZipCode().")"." ".$d->getName()."</a>"?></li>
        <?php
        }
        ?>
    </ul>
</div>

</div>
<!-- /#main -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>

        <script>
            $( document ).ready(function() {

                $(function() {
                    $( "#dateEnd" ).datepicker();
                    $( "#dateStart" ).datepicker();
                });

                var availableTags = [];

                var options = {
                   // types: ['(regions)'],
                    componentRestrictions: {country: 'fr'}
                };
                var input = /** @type {HTMLInputElement} */(
                        document.getElementById('addressGoogle'));
                var autocomplete = new google.maps.places.Autocomplete(input,options);

                completeOthers = function(){
                    setTimeout(function() {
                        var address_components = autocomplete.gm_accessors_.place.Nc.place.address_components;

                        //document.getElementById('cityGoogle').value = address_components[2].long_name;
                        //document.getElementById('departmentGoogle').value = address_components[3].long_name;
                        //document.getElementById('regionGoogle').value = address_components[4].long_name;
                        ;
                    }, 200);

                }

                $( "#selectRegion" )
                    .change(function () {
                        var str = "";
                        var output = [];
                        $( "#selectRegion option:selected" ).each(function() {
                            if($(this)[0].value == 'null' ){
                                $('#selectDepartment').trigger("liszt:updated");
                            }
                            else{
                                var RegionID = $(this).attr('id')

                                $("#listDepartment li input").each(function(){
                                    if( $(this)[0].value == RegionID){
                                        var departmentName = $(this).next()[0].text.match(/.*\).(.*)/)[1]
                                        output.push('<option value="'+ departmentName +'">'+ $(this).next()[0].text +'</option>');
                                    }
                                })
                                $('#selectDepartment').html(output.join(''));

                                $('#selectDepartment').trigger("liszt:updated");
                            }
                            //str += $( this ).text() + " ";
                        });


                    })

                verif = function(chars) {
                    // Caractères autorisés
                    var regex = new RegExp("[^-]", "i");
                    var valid;
                    for (x = 0; x < chars.value.length; x++) {
                        valid = regex.test(chars.value.charAt(x));
                        if (valid == false) {
                            chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1); x--;
                        }
                    }
                }


                $( "#cityGoogle" )
                    .keypress(function () {
                        if ($(this).val().length < 1){
                        }
                        else{
                            $.ajax({
                                url: "http://www.123Brocante.com/autocomplete.php",
                                type: 'POST',
                                data: {
                                    'key': $(this).val()
                                }
                            })
                                .done(function( data ) {
                                    availableTags.slice(0)
                                    availableTags = JSON.parse(data)
                                    $( "#cityGoogle" ).autocomplete({
                                        source: availableTags
                                    });

                                });
                        }
                    })
                    .change();


            });


        </script>