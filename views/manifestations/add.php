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
                            echo 'action="/index.php?section=Manifestation&action=add"';
                          else
                            echo 'action="/index.php?section=Manifestation&action=update"';
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
            <input type="text" name="title" size="30" id="title" autocomplete="off" required="required" <?php if($update){echo 'value="'.$manifestation->getName().'"';}?>>
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
            Département
        </label>

        <div class="controls">
            <input type="text" name="department" size="30"  id="departmentGoogle" required="required" <?php if($update){echo 'value="'.$manifestation->getDepartment().'"';}?>>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Région
        </label>

        <div class="controls">
            <input type="text" name="region" size="30" id="regionGoogle" required="required" <?php if($update){echo 'value="'.$manifestation->getRegion().'"';}?> >
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
            <input type="date" name="dateStart" id="inputDate" required="required" <?php if($update){echo 'value="'.$manifestation->getStart().'"';}?>>
        </div>
        <!-- /.controls -->
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDate">
            Date de fin
            <!--<span class="form-required" title="This field is required.">*</span>-->
        </label>

        <div class="controls">
            <input type="date" name="dateEnd" id="inputDate" required="required" <?php if($update){echo 'value="'.$manifestation->getEnd().'"';}?>>
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
                <input type="number" name="exhibitorNumber" <?php if($update){echo 'value="'.$manifestation->getExhibitorNumber().'"';}?>>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Tarif d'exposants </label>

        <div class="controls">
            <div class="input-append">
                <input type="number" name="exhibitorPrice" <?php if($update){echo 'value="'.$manifestation->getExhibitorPrice().'"';}?>>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="address">
            Image
        </label>

        <div class="controls">
            <input type="file" name="image" id="image">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            Parking à proximité </label>

        <div class="controls">

            <ul class="unstyled">
                <li>
                    <label>
                        <input type="radio" name="_property_meta[contract_type]" value="rent"/>
                        &nbsp;&nbsp;Oui </label>
                </li>

                <li>
                    <label>
                        <input type="radio" name="_property_meta[contract_type]" value="sale"/>
                        &nbsp;&nbsp;Non </label>
                </li>
            </ul>
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
            <textarea id="description" rows="4" name="content" style="min-height:150px;"></textarea>
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
</form>

</div>
<!-- /#main -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>

        <script>
            $( document ).ready(function() {
                var options = {
                   // types: ['(regions)'],
                    componentRestrictions: {country: 'fr'}
                };
                var input = /** @type {HTMLInputElement} */(
                        document.getElementById('addressGoogle'));
                var autocomplete = new google.maps.places.Autocomplete(input,options);

                completeOthers = function(){
                    console.log('CompleteOthers')
                    setTimeout(function() {
                        console.log(autocomplete);
                        var address_components = autocomplete.gm_accessors_.place.Nc.place.address_components;

                        document.getElementById('cityGoogle').value = address_components[2].long_name;
                        document.getElementById('departmentGoogle').value = address_components[3].long_name;
                        document.getElementById('regionGoogle').value = address_components[4].long_name;
                        ;
                    }, 200);

                }

            });


        </script>