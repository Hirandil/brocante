
<div id="content" class="clearfix">

<div class="map-wrapper" >
    <div class="map">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#francemap').vectorMap({
                    map: 'france_fr',
                    hoverOpacity: 0.5,
                    hoverColor: false,
                    backgroundColor: "#ffffff",
                    colors: couleurs,
                    borderColor: "#ffffff",
                    selectedColor: "#EC0000",
                    enableZoom: false,
                    showTooltip: true,
                    onRegionClick: function(element, code, region)
                    {
                        /*var message = 'Département : "'
                            + region
                            + '" || Code : "'
                            + code
                            + '"';

                        alert(message);*/
                        //window.location.href = "www.google.com";
                        window.location.href = "index.php?section=Manifestation&action=Department&zipCode="+code;
                    }
                });
            });
        </script>

        <div class="container" style="height:0px;">
            <div class="row">
                <div class="span3">
                    <div class="property-filter widget">
                        <div class="content">
                            <p style="color:white;border-bottom: 1px; border-style:solid">Rechercher une manifestation</p>
                            <form method="POST" action="/index.php?section=Manifestation&action=search">
                                <div class="location control-group">
                                    <label class="control-label">
                                        Région
                                    </label>

                                    <div class="controls">
                                        <select id="selectRegion" name="region">
                                            <option value="null">--------------------------</option>
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
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label">
                                        Departement
                                    </label>

                                    <div class="controls">
                                        <select id="selectDepartment" name="department">
                                            <option value="null">--------------------------</option>
                                        </select>


                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->
                                <div class="type control-group">
                                    <label class="control-label">
                                        Ville
                                    </label>

                                    <div class="controls">
                                        <input type="text" id="cityGoogle" name="city" >


                                    </div>
                                    <!-- /.controls -->
                                </div>


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary btn-large"> Filtrer !</button>
                                </div>
                                <!-- /.form-actions -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div><!-- /.property-filter -->

                    <br>


                    <div class="property-filter widget">
                        <div class="content">
                            <p style="color:white;border-bottom: 1px; border-style:solid">Abonnez-vous aux alertes</p>
                            <p style="color:white; font-size:75%;">Recevez directement dans votre boite mail la liste des ventes qui ont lieu près de chez vous</p>
                            <form method="get" action="javascript:void(0);">

                                <!-- /.control-group -->
                                <?php
                                if(!isset($_SESSION['userLogin']))
                                {
                                ?>
                                <div class="type control-group">
                                    <label class="control-label">
                                        Email
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="departmentGoogle" name="department" disabled>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->
                                <div class="type control-group">
                                    <label class="control-label">
                                        Code postal
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="cityGoogle" name="city" disabled>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <div class="form-actions">
                                    <a href="/index.php?section=User&action=register" class="btn btn-primary btn-large" > S'inscrire !</a>
                                </div>
                                <?php
                                }
                                else{
                                    ?>
                                <div class="type control-group">
                                    <label class="control-label">
                                        Email
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="departmentGoogle" name="department" >
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->
                                <div class="type control-group">
                                    <label class="control-label">
                                        Code postal
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="cityGoogle" name="city" >
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <div class="form-actions">
                                <button class="btn btn-primary btn-large"> S'inscrire !</button>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- /.form-actions -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div>


                </div>
            </div>
        </div>



        <div id="francemap" class="map-inner" style="height: 750px;margin-top: 150px; padding-left: 150px"></div>
        <!-- /.map-inner -->

    </div>
    <!-- /.map -->

</div>

<!-- /.map-wrapper -->

<!-- /.container -->
<div class="container" style="-webkit-columns: 6;
			-moz-columns: 6;
			columns: 6;
			column-width: 40px;
			column-gap: 10px;">
    <ul id="listDepartment">
        <?php
        foreach((array)$departments as $d)
        {
            ?>
            <li style="display: table;font-size: 13px;margin: 5px">
                <?php echo "<input type=\"hidden\" id=".$d->getId()." value=".$d->getRegion()."></input>
                    <a href=\"index.php?section=Manifestation&action=Department&zipCode=".$d->getZipCode()."\">(".$d->getZipCode().")"." ".$d->getName()."</a>"?></li>
        <?php
        }
        ?>
    </ul>
</div>

<script>
    $( document ).ready(function() {

        var availableTags = [];

        var options = {
            componentRestrictions: {country: 'fr'},
            types: ['cities']
        };
        var input = /** @type {HTMLInputElement} */
            (document.getElementById('regionGoogle'));
        var autocomplete = new google.maps.places.Autocomplete(input,options);

        var input2 = /** @type {HTMLInputElement} */
            (document.getElementById('cityGoogle'));
        var autocomplete2 = new google.maps.places.Autocomplete(input2,options);

        completeOthers = function(){
            setTimeout(function() {
                console.log(autocomplete.gm_accessors_.place.Sc.place);
                var address_components = autocomplete.gm_accessors_.place.Sc.place.address_components;

                document.getElementById('cityGoogle').value = address_components[2].long_name;
                document.getElementById('departmentGoogle').value = address_components[3].long_name;
                document.getElementById('regionGoogle').value = address_components[4].long_name;
                ;
            }, 200);

        }

        $( "#selectRegion" )
            .change(function () {
                var str = "";
                var output = [];
                $( "#selectRegion option:selected" ).each(function() {
                    if($(this)[0].value == 'null' )
                        $('#selectDepartment').trigger("liszt:updated");
                    else{
                        var RegionID = $(this).attr('id')

                        $("#listDepartment li input").each(function(){
                            if( $(this)[0].value == RegionID){
                                var departmentName = $(this).next()[0].text.match(/.*\).(.*)/)[1]
                                output.push('<option value="'+ departmentName +'">'+ $(this).next()[0].text +'</option>');
                            }
                        })
                        $('#selectDepartment').html(output.join(''));
//                       console.log($('#selectDepartment').chosen());

                        $('#selectDepartment').trigger("liszt:updated");
                    }
                    //str += $( this ).text() + " ";
                });


                //console.log(str)
            })
            .change();

        $( "#cityGoogle" )
            .keypress(function () {
                console.log()
                if ($(this).val().length < 1){
                    console.log('Ne rien faire');
                }
                else{
                    $.ajax({
                        url: "http://localhost/autocomplete.php",
                        type: 'POST',
                        data: {
                            'key': $(this).val()
                        }
                    })
                        .done(function( data ) {
                            console.log(JSON.parse(data))
                            availableTags.slice(0)
                            availableTags = JSON.parse(data)
                            $( "#cityGoogle" ).autocomplete({
                                source: availableTags
                            });
                            console.log(data)

                    });
                }
                //console.log(str)
            })
            .change();

        console.log(availableTags)



    });


</script>