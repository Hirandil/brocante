
<div id="content" class="clearfix">

<div class="map-wrapper">
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
                        var message = 'Département : "'
                            + region
                            + '" || Code : "'
                            + code
                            + '"';

                        alert(message);
                    }
                });
            });
        </script>

        <div class="container" style="height:0px;">
            <div class="row">
                <div class="span3">
                    <div class="property-filter widget">
                        <div class="content">
                            <form method="get" action="javascript:void(0);">
                                <div class="location control-group">
                                    <label class="control-label">
                                        Région
                                    </label>

                                    <div class="controls">
                                        <input type="text" id="regionGoogle" name="region" >
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label">
                                        Departement
                                    </label>

                                    <div class="controls">
                                    <input type="text" id="departmentGoogle" name="department" >


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
                                    <button class="btn btn-primary btn-large"> Filtrer !</button>
                                </div>
                                <!-- /.form-actions -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div><!-- /.property-filter -->                    </div>
            </div>
        </div>

        <div id="francemap" class="map-inner" style="height: 750px;margin-top: 150px;"></div>
        <!-- /.map-inner -->
    </div>
    <!-- /.map -->
</div>

<!-- /.map-wrapper -->

<!-- /.container -->

</div>

<script>
    $( document ).ready(function() {
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

    });


</script>