<div id="content" class="clearfix">

<div class="container">
<div class="row">


<div id="main" class="span12">

<h1 class="page-header"> Rechercher </h1>

<div class="progressbar">
    <div class="progressbar-inner">
        <div class="row">
            <div class="item span6">
                <div class="number" style="margin-left: 45%;">1</div>
                <strong>Type ou Location</strong>
            </div>
            <!-- /.item  -->

            <div class="item span6">
                <div class="number" style="margin-left: 45%;">2</div>
                <strong>Par Date</strong>
            </div>
            <!-- /.item  -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.progressbar-inner -->
</div>
<!-- /.progressbar -->
<form method="post" action="/index.php?section=Manifestation&action=search" class="submission-form form-vertical">
<div class="row">
  <div class="span6 box-search">
    <div class="control-group">
        <label class="control-label" for="region">
            Type de la manifestation
        </label>

        <div class="controls">
            <select name="type" id="region" size="30" style="width: 35%;">
                <option value="------" selected>------</option>
                <?php

                foreach($types as $t)
                {
                    ?>
                    <option value="<?php echo $t->getId() ?>" > <?php echo $t->getLibelle() ?> </option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="region">
            Région
        </label>

        <div class="controls">
            <input type="text" name="region" size="30" value="" id="region" >
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="department">
            Département
        </label>

        <div class="controls">
            <input type="text" name="department" size="30" value="" id="department" >
        </div>
    </div>




</div>
</form>
<!-- /#main -->
<div class="span6 box-search">

    <div class="control-group">
        <label class="control-label" for="inputDate">
            À partir du
        </label>


        <div class="controls">
            <input type="date" name="start" id="inputDate">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputDate">
            Jusqu'au
        </label>

        <div class="controls">
            <input type="date" name="end" id="inputDate">
        </div>
    </div>


</div>
    <button type="submit" class="btn btn-primary arrow-right" style="margin-left: 45%"> Lancer la recherche </button>
</div>

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
            setTimeout(function() {
                console.log(autocomplete.gm_accessors_.place.Sc.place);
                var address_components = autocomplete.gm_accessors_.place.Sc.place.address_components;

                ;
            }, 200);

        }

    });


</script>