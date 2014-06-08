
<div id="content" class="clearfix">
<div class="map-wrapper">
    <div class="map">


        <script type="text/javascript">

            var infoBoxes = [];

            var property1 = '<div class="infobox clearfix"><div class="close"><img src="assets/img/close.png" alt=""></div><div class="image"><a href="properties/property-detail" ><img src="assets/img/property/17.jpg" alt="677 Cottage Terrace" width="130px"></a><div class="contract-type">For sale</div></div><div class="info"><div class="title"><a href="properties/property-detail">677 Cottage Terrace</a></div><div class="location">Spring Valley</div><div class="property-info clearfix"><div class="area"><i class="icon icon-normal-cursor-scale-up"></i>650m<sup>2</sup></div><div class="bedrooms"><i class="icon icon-normal-bed"></i>1</div><div class="bathrooms"><i class="icon icon-normal-shower"></i>1</div></div><div class="price">59,600 €</div><div class="link"><a href="properties/property-detail">View more</a></div></div></div>';
            var property2 = '<div class="infobox clearfix"><div class="close"><img src="assets/img/close.png" alt=""></div><div class="image"><a href="properties/property-detail"><img src="assets/img/property/19.jpg" alt="643 37th Ave" width="130px"></a><div class="contract-type">For sale</div></div><div class="info"><div class="title"><a href="properties/property-detail">643 37th Ave</a></div><div class="location">Burrville</div><div class="property-info clearfix"><div class="area"><i class="icon icon-normal-cursor-scale-up"></i>800m<sup>2</sup></div><div class="bedrooms"><i class="icon icon-normal-bed"></i>2</div><div class="bathrooms"><i class="icon icon-normal-shower"></i>2</div></div><div class="price">Contact us</div><div class="link"><a href="properties/property-detail">View more</a></div></div></div>';
            var property3 = '<div class="infobox clearfix"><div class="close"><img src="assets/img/close.png" alt=""></div><div class="image"><a href="properties/property-detail" ><img src="assets/img/property/17.jpg" alt="677 Cottage Terrace" width="130px"></a>                  <div class="contract-type">For sale</div></div><div class="info"><div class="title"><a href="properties/property-detail">677 Cottage Terrace</a></div><div class="location">Spring Valley</div><div class="property-info clearfix"><div class="area"><i class="icon icon-normal-cursor-scale-up"></i>650m<sup>2</sup></div><div class="bedrooms"><i class="icon icon-normal-bed"></i>1</div><div class="bathrooms"><i class="icon icon-normal-shower"></i>1</div></div><div class="price">59,600 €</div><div class="link"><a href="properties/property-detail">View more</a></div></div></div>';

            for (var i=0;i< 15 ;i++)
            {
                infoBoxes.push(property1);
                infoBoxes.push(property2);
                infoBoxes.push(property3);
            }

            jQuery(document).ready(function ($) {
                var map = $('#map').aviators_map({
                    locations: new Array([38.951399, -76.958463], [38.942855, -76.959149], [38.935945, -76.954085], [38.924194, -76.962497], [38.929335, -76.966402], [38.950131, -76.975286], [38.941386, -76.976745], [38.912975, -76.973269], [38.927266, -76.985156], [38.936813, -76.987173], [38.941653, -76.995885], [38.929235, -76.995627], [38.922024, -77.001378], [38.920788, -77.020304], [38.926531, -77.007558], [38.939384, -77.018115], [38.939217, -77.070257], [38.931539, -77.103517], [38.942454, -77.05352], [38.930571, -77.086007], [38.947194, -77.109696], [38.949864, -77.094762], [38.940685, -77.095964], [38.932474, -77.026441], [38.932941, -77.034165], [38.932641, -77.044079], [38.932908, -77.061674], [38.931372, -77.07781], [38.926665, -77.101457], [38.929135, -77.101671], [38.919086, -77.108538], [38.910103, -77.104504], [38.920221, -77.084033], [38.915513, -77.089741], [38.918752, -77.095105], [38.912073, -77.00597], [38.90486, -77.024724], [38.918418, -77.010605], [38.928868, -77.021377], [38.920154, -77.010562], [38.915847, -77.069699], [38.926164, -77.056739], [38.925045, -77.040063], [38.922591, -77.034291]),
                    types: new Array('family-house', 'villa', 'cottage', 'single-home', 'family-house', 'cottage', 'apartment', 'building-area', 'apartment', 'family-house', 'villa', 'family-house', 'villa', 'single-home', 'cottage', 'villa', 'condo', 'apartment', 'single-home', 'cottage', 'family-house', 'villa', 'apartment', 'apartment', 'villa', 'villa', 'apartment', 'cottage', 'villa', 'family-house', 'building-area', 'family-house', 'family-house', 'cottage', 'apartment', 'cottage', 'family-house', 'villa', 'cottage', 'condo', 'building-area', 'family-house', 'single-home', 'apartment'),
                    contents: infoBoxes,
                    transparentMarkerImage: 'assets/img/marker-transparent.png',
                    transparentClusterImage: 'assets/img/markers/cluster-transparent.png',
                    zoom: 14,
                    center: {
                        latitude: 38.932307,
                        longitude: -77.034258
                    },
                    filterForm: '.map-filtering',
                    enableGeolocation: '',
                    pixelOffsetX: -75,
                    pixelOffsetY: -200
                });
            });
        </script>

        <div id="map" class="map-inner" style="height: 700px"></div>
        <!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span12">

                    <div class="property-filter widget filter-horizontal">
                        <div class="content">
                            <form method="get" action="javascript:void(0);" class="form-inline map-filtering">

                                <div class="property-types" style="height:1px !important; overflow: hidden;">
                                    <div class="property-type apartment">
                                        <label for="filter_type_6">
                                            <input type="checkbox" name="filter_type[]" title="Apartment"
                                                   id="filter_type_6" class="no-ezmark" value="6"> Apartment
                                        </label>
                                    </div>
                                    <div class="property-type building-area ">
                                        <label for="filter_type_42">
                                            <input type="checkbox" name="filter_type[]" title="Building Area"
                                                   id="filter_type_42" class="no-ezmark" value="42"> Building Area
                                        </label>
                                    </div>
                                    <div class="property-type condo ">
                                        <label for="filter_type_43">
                                            <input type="checkbox" name="filter_type[]" title="Condo"
                                                   id="filter_type_43" class="no-ezmark" value="43"> Condo
                                        </label>
                                    </div>
                                    <div class="property-type cottage ">
                                        <label for="filter_type_44">
                                            <input type="checkbox" name="filter_type[]" title="Cottage"
                                                   id="filter_type_44" class="no-ezmark" value="44"> Cottage
                                        </label>
                                    </div>
                                    <div class="property-type family-house ">
                                        <label for="filter_type_41">
                                            <input type="checkbox" name="filter_type[]" title="Family House"
                                                   id="filter_type_41" class="no-ezmark" value="41"> Family House
                                        </label>
                                    </div>
                                    <div class="property-type single-home ">
                                        <label for="filter_type_40">
                                            <input type="checkbox" name="filter_type[]" title="Single Home"
                                                   id="filter_type_40" class="no-ezmark" value="40"> Single Home
                                        </label>
                                    </div>
                                    <div class="property-type villa ">
                                        <label for="filter_type_45">
                                            <input type="checkbox" name="filter_type[]" title="Villa"
                                                   id="filter_type_45" class="no-ezmark" value="45"> Villa
                                        </label>
                                    </div>
                                </div>
                                <!-- /.property-types -->
                                <div class="general">
                                    <select name="filter_location" id="inputLocation-" class="location">
                                        <option value="">Lieu</option>
                                        <option value="7">Barney Circle</option>
                                        <option value="56">Benning</option>
                                        <option value="54">Benning Heights</option>
                                        <option value="55">Benning Ridge</option>
                                        <option value="57">Burrville</option>
                                        <option value="47">Capitol Hill</option>
                                        <option value="58">Capitol View</option>
                                        <option value="59">Central Northeast</option>
                                        <option value="60">Civic Betterment</option>
                                        <option value="48">Judiciary Square</option>
                                        <option value="49">Kingman Park</option>
                                        <option value="50">Navy Yard</option>
                                        <option value="51">Near Northeast</option>
                                        <option value="65">Spring Valley</option>
                                        <option value="52">Sursum Corda</option>
                                        <option value="53">Swampoodle</option>
                                    </select>

                                    <select name="filter_bedrooms" id="inputBeds-" class="beds">
                                        <option value="">Lits</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>

                                    <select name="filter_bathrooms" id="inputBaths-" class="baths">
                                        <option value="">Salle de bain</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>

                                    <select name="filter_price_from" id="inputPriceFrom-" class="price-from">
                                        <option value="">Prix de</option>
                                        <option value="1000">1,000 €</option>
                                        <option value="20000">20,000 €</option>
                                        <option value="50000">50,000 €</option>
                                        <option value="100000">100,000 €</option>
                                    </select>

                                    <select name="filter_price_to" id="inputPriceTo-" class="price-to">
                                        <option value="">Prix jusqu'à</option>
                                        <option value="1000">1,000 €</option>
                                        <option value="20000">20,000 €</option>
                                        <option value="50000">50,000 €</option>
                                        <option value="100000">100,000 €</option>
                                    </select>

                                    <input type="text" value="" name="filter_area_from" id="inputAreaFrom-"
                                           placeholder="Zone de">

                                    <input type="text" value="" name="filter_area_to" id="inputAreaTo-"
                                           placeholder="Zone à">

                                    <button class="btn btn-primary btn-large">Filtrer!</button>
                                </div>
                                <!-- /.general -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.property-filter -->                        </div>
                <!-- /.span12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->        </div>
    <!-- /.map -->
</div>

<!-- /.map-wrapper -->
<div class="container">
<div class="row">

<div class="sidebar span3">
<div id="quick-search" class="widget widget-search"><h2>Recherche rapide</h2>

    <div class="content">
        <form method="get" class="site-search" action="javascript:void(0);">
            <input class="search-query form-text" placeholder="Recherche" type="text" name="s" id="s" value="">
            <button type="submit" class="btn"> Rechercher </button>
        </form>
        <!-- /.site-search -->
    </div>
    <!-- /.inner -->
</div>                               <div id="mostrecentproperties_widget-2" class="widget properties">

    <h2>Les récentes propriétés</h2>

    <div class="content">
        <div class="property clearfix">
            <div class="image">
                <a href="properties/property-detail.html">
                    <img width="570" height="425" src="assets/img/property/19.jpg"
                         class="thumbnail-image " alt="19"/>
                </a>
            </div>
            <!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3><a href="properties/property-detail.html">
                            643 37th Ave
                        </a></h3>
                </div>
                <!-- /.title -->

                <div class="location">Burrville</div>
                <!-- /.location -->

                <div class="price">
                    Nous contacter
                </div>
                <!-- /.price -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                800m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                2
            </div>
            <!-- /.bedrooms -->

        </div>
        <!-- /.info -->
        <div class="property clearfix">
            <div class="image">
                <a href="properties/property-detail.html">
                    <img width="570" height="425" src="assets/img/property/20.jpg"
                         class="thumbnail-image " alt="20"/>
                </a>
            </div>
            <!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3><a href="properties/property-detail.html">
                            2459 Tilden St
                        </a></h3>
                </div>
                <!-- /.title -->

                <div class="location">Judiciary Square</div>
                <!-- /.location -->

                <div class="price">
                    500 € <span class="suffix">/ par mois</span></div>
                <!-- /.price -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                1030m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                12
            </div>
            <!-- /.bedrooms -->

            <div class="bathrooms">
                <i class="icon icon-normal-shower"></i>
                6
            </div>
            <!-- /.bathrooms -->
        </div>
        <!-- /.info -->
        <div class="property clearfix">
            <div class="image">
                <a href="properties/property-detail.html">
                    <img width="570" height="425" src="assets/img/property/17.jpg"
                         class="thumbnail-image " alt="17"/>
                </a>
            </div>
            <!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3><a href="properties/property-detail.html">
                            677 Cottage Terrace
                        </a></h3>
                </div>
                <!-- /.title -->

                <div class="location">Spring Valley</div>
                <!-- /.location -->

                <div class="price">
                    59,600 €
                </div>
                <!-- /.price -->
            </div>
            <!-- /.wrapper -->
        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                650m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                1
            </div>
            <!-- /.bedrooms -->

            <div class="bathrooms">
                <i class="icon icon-normal-shower"></i>
                1
            </div>
            <!-- /.bathrooms -->
        </div>
        <!-- /.info -->
    </div>
    <!-- /.content -->

</div>                <div id="agencies_widget-2" class="widget agencies">

    <h2>Les agences</h2>

    <div class="content">
        <div class="agency clearfix">
            <div class="header">
                <div class="image">
                    <a href="agencies/agency-detail.html">
                        <img src="assets/img/agency-small-tmp.png" alt="Beverly Hills Real Estate">
                    </a>
                </div>
                <!-- /.image -->

                <div class="info">
                    <h2>Beverly Hills Real Estate</h2>

                    <div class="properties-count">
                        <span class="number">2</span> Propriétés
                    </div>
                    <!-- /.properties-count -->

                    <a href="index.htm" class="btn">Voir le profil</a>
                </div>
                <!-- /.info -->
            </div>
            <!-- /.header -->

            <div class="address">
                4265 Broadway Avenue<br/>
                Johnson City, TN 37601
            </div>
            <!-- /.address -->

            <div class="email">
                <a href="mailto:sample@example.com">exemple@exemple.com</a>
            </div>
            <!-- /.email -->

            <div class="phone">
                (401) 852-987
            </div>
            <!-- /.phone -->

        </div>
        <!-- /.agency -->
        <div class="agency clearfix">
            <div class="header">
                <div class="image">
                    <a href="agencies/agency-detail.html">
                        <img src="assets/img/agency-small-tmp.png" alt="Colombia Real Estate">
                    </a>
                </div>
                <!-- /.image -->

                <div class="info">
                    <h2>Colombia Real Estate</h2>

                    <div class="properties-count">
                        <span class="number">6</span> Propriétés
                    </div>
                    <!-- /.properties-count -->

                    <a href="index.htm" class="btn">Voir le profil</a>
                </div>
                <!-- /.info -->
            </div>
            <!-- /.header -->

            <div class="address">
                485 Shinn Avenue<br/>
                Pittsburgh, PA 15222
            </div>
            <!-- /.address -->

            <div class="email">
                <a href="mailto:sample@example.com">exemple@exemple.com</a>
            </div>
            <!-- /.email -->

            <div class="phone">
                (401) 458-965
            </div>
            <!-- /.phone -->

        </div>
        <!-- /.agency -->
    </div>
    <!-- /.content -->

</div>            </div>
<!-- /#sidebar -->

<div id="main" class="span9">

<h2>Meilleurs propriétés </h2>
<div class="properties-grid featured">
<div class="row">
    <div class="span3">
        <div class="property">
            <div class="image">
                <div class="content">
                    <a href="properties/property-detail.html">
                        <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel
                                nulla nunc. Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non
                                scelerisque erat suscipit eu. Nunc vel congue tellus, e ...</p></div>
                        <img src="assets/img/property/1.jpg" alt="20th St NE">
                    </a>
                </div>
                <!-- /.content -->

                <div class="rent-sale">
                    Sale
                </div>
                <!-- /.rent-sale -->

                <div class="price">
                    85,600 €
                </div>
                <!-- /.price -->

            </div>
            <!-- /.image -->

            <div class="info">
                <div class="title clearfix">
                    <h2><a href="properties/property-detail.html">
                            20th St NE
                        </a></h2>
                </div>
                <!-- /.title -->

                <div class="location">Benning</div>
                <!-- /.location -->
            </div>
            <!-- /.info -->

        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                450m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                1
            </div>
            <!-- /.bedrooms -->

            <div class="bathrooms">
                <i class="icon icon-normal-shower"></i>
                2
            </div>
            <!-- /.bathrooms -->
        </div>
        <!-- /.property-info -->

    </div>
    <!-- /.span4 -->
    <div class="span3">
        <div class="property">
            <div class="image">
                <div class="content">
                    <a href="properties/property-detail.html">
                        <div class="description"><p>Nam convallis consequat dui. Suspendisse sit amet augue
                                nunc. Quisque eget ligula quis diam viverra volutpat. Aliquam nec neque a metus
                                blandit lobortis vitae vitae quam. Fusce ultricies molestie veli ...</p></div>
                        <img src="assets/img/property/12.jpg" alt="246 Varnum Pl NE">
                    </a>
                </div>
                <!-- /.content -->

                <div class="rent-sale">
                    Sale
                </div>
                <!-- /.rent-sale -->

                <div class="price">
                    32,500 €
                </div>
                <!-- /.price -->

            </div>
            <!-- /.image -->

            <div class="info">
                <div class="title clearfix">
                    <h2><a href="properties/property-detail.html">
                            246 Varnum Pl NE
                        </a></h2>
                </div>
                <!-- /.title -->

                <div class="location">Kingman Park</div>
                <!-- /.location -->
            </div>
            <!-- /.info -->

        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                500m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                2
            </div>
            <!-- /.bedrooms -->

            <div class="bathrooms">
                <i class="icon icon-normal-shower"></i>
                3
            </div>
            <!-- /.bathrooms -->
        </div>
        <!-- /.property-info -->

    </div>
    <!-- /.span4 -->
    <div class="span3">
        <div class="property">
            <div class="image">
                <div class="content">
                    <a href="properties/property-detail.html">
                        <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu
                                ornare. Donec id egestas arcu. Suspendisse auctor condimentum ligula ultricies
                                cursus. Vestibulum vel orci vel lacus rhoncus sagittis sed vitae ...</p></div>
                        <img src="assets/img/property/6.jpg" alt="Randolph St NW">
                    </a>
                </div>
                <!-- /.content -->

                <div class="rent-sale">
                    Sale
                </div>
                <!-- /.rent-sale -->

                <div class="price">
                    97,400 €
                </div>
                <!-- /.price -->

                <div class="reduced">
                    Reduced
                </div>
                <!-- /.reduced -->
            </div>
            <!-- /.image -->

            <div class="info">
                <div class="title clearfix">
                    <h2><a href="properties/property-detail.html">
                            Randolph St NW
                        </a></h2>
                </div>
                <!-- /.title -->

                <div class="location">Civic Betterment</div>
                <!-- /.location -->
            </div>
            <!-- /.info -->

        </div>
        <!-- /.property -->

        <div class="property-info clearfix">
            <div class="area">
                <i class="icon icon-normal-cursor-scale-up"></i>
                680m<sup>2</sup>
            </div>
            <!-- /.area -->

            <div class="bedrooms">
                <i class="icon icon-normal-bed"></i>
                3
            </div>
            <!-- /.bedrooms -->

            <div class="bathrooms">
                <i class="icon icon-normal-shower"></i>
                2
            </div>
            <!-- /.bathrooms -->
        </div>
        <!-- /.property-info -->

    </div>
    <!-- /.span4 -->
</div>
</div>
<!-- /.properties-grid -->

<div class="show-all">
    <a href="properties/default.htm">Montrer tout</a>
</div>                <hr>

<h1 class="page-header">Propriétés récentes </h1>
<div class="properties-grid">
<div class="row-fluid">
<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu ornare.
                            Donec id egestas arcu. Suspendisse auctor condimentum ligula ultricies cursus. Vestibulum
                            vel orci vel lacus rhoncus sagittis sed vitae ...</p></div>
                    <img src="assets/img/property/19.jpg" alt="643 37th Ave">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                Contact us
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        643 37th Ave
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Burrville</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            800m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Nam convallis consequat dui. Suspendisse sit amet augue nunc.
                            Quisque eget ligula quis diam viverra volutpat. Aliquam nec neque a metus blandit lobortis
                            vitae vitae quam. Fusce ultricies molestie veli ...</p></div>
                    <img src="assets/img/property/20.jpg" alt="2459 Tilden St">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Rent
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                500 € <span class="suffix">/ par mois</span></div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        2459 Tilden St
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Judiciary Square</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            1030m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            12
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            6
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            et risus vitae lectus dapibus sagittis sit amet eu eros. Pellentesque accumsan mi nec
                            tristique vehicula. Suspendisse potenti. Cras f ...</p></div>
                    <img src="assets/img/property/17.jpg" alt="677 Cottage Terrace">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                59,600 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        677 Cottage Terrace
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Spring Valley</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            650m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            1
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Etiam ut est in odio tempor tincidunt vitae sed sem. Nullam
                            dignissim lorem et erat dictum, cursus posuere lorem pretium. In leo elit, luctus vel
                            vehicula vel, accumsan quis velit. Ut sagittis commodo ...</p></div>
                    <img src="assets/img/property/21.jpg" alt="126 31st Pl NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                48,000 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        126 31st Pl NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Civic Betterment</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            950m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

</div>
<div class="row-fluid">
<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu ornare. Donec
                            id egestas arcu. Suspendisse auctor condimentum ligula ultricies cursus. Vestibulum vel orci
                            vel
                            lacus rhoncus sagittis sed vitae ...</p></div>
                    <img src="assets/img/property/15.jpg" alt="Carlton Ave NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                87,000 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        Carlton Ave NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Capitol Hill</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            800m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/2.jpg" alt="12 Hayden Rd">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                45,999 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        12 Hayden Rd
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Swampoodle</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            590m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            1
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/1.jpg" alt="20th St NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                85,600 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        20th St NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Benning</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            450m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            2
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

<div class="span3">
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/4.jpg" alt="359 Rand Pl NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                56,000 €
            </div>
            <!-- /.price -->

            <div class="reduced">
                Reduced
            </div>
            <!-- /.reduced -->
        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        359 Rand Pl NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Swampoodle</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            540m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</div>

</div>
<div class="row-fluid">
</div>
<!-- /.row -->
</div>
<!-- /.properties-grid -->
<div class="show-all">
    <a href="properties/default.htm">Montrer tout</a>
</div>                <hr>

<div id="features-grid" class="features-grid widget">
    <div class="textwidget">
        <div class="row">
            <div class="span3">
                <div class="content-box">
                    <div class="row">

                        <div class="span1">
                            <div class="pictopro-icon">
                                <i class="icon icon-normal-profile-male"></i>
                            </div>
                        </div>

                        <div class="content span2">
                            <h3>Real Front end submission</h3>

                            <p>CodiOne permet à vos utilisateurs d'ajouter leur propriétés</p>

                            <p><a href="index.htm">Montrer tout<i class="icon icon-normal-right-arrow-circle"></i></a>
                            </p>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.content-box --></div>
            <div class="span3">
                <div class="content-box">
                    <div class="row">

                        <div class="span1">
                            <div class="pictopro-icon">
                                <i class="icon icon-normal-globe"></i>
                            </div>
                        </div>

                        <div class="content span2">
                            <h3>Translation Ready &amp; WPML Support</h3>

                            <p>Traduit CodiOne dans ton langage avec les PO files</p>

                            <p><a href="index.htm">Montrer tout<i class="icon icon-normal-right-arrow-circle"></i></a>
                            </p>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.content-box --></div>
            <div class="span3">
                <div class="content-box">
                    <div class="row">

                        <div class="span1">
                            <div class="pictopro-icon">
                                <i class="icon icon-normal-magnifier"></i>
                            </div>
                        </div>

                        <div class="content span2">
                            <h3>dsIDXPress for WP Support</h3>


                            <p><a href="index.htm">Montrer tout<i class="icon icon-normal-right-arrow-circle"></i></a>
                            </p>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.content-box --></div>
        </div>
    </div>
</div>
<div id="carouselproperties" class="property-carousel widget">
<h2>Propriétés </h2>
<div class="carousel">
<ul class="bxslider properties-grid unstyled">
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu ornare. Donec
                            id egestas arcu. Suspendisse auctor condimentum ligula ultricies cursus. Vestibulum vel orci
                            vel
                            lacus rhoncus sagittis sed vitae ...</p></div>
                    <img src="assets/img/property/19.jpg" alt="643 37th Ave">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                Contacter nous
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        643 37th Ave
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Burrville</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            800m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Nam convallis consequat dui. Suspendisse sit amet augue nunc. Quisque
                            eget ligula quis diam viverra volutpat. Aliquam nec neque a metus blandit lobortis vitae
                            vitae
                            quam. Fusce ultricies molestie veli ...</p></div>
                    <img src="assets/img/property/20.jpg" alt="2459 Tilden St">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Rent
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                500 € <span class="suffix">/ per month</span></div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        2459 Tilden St
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Judiciary Square</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            1030m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            12
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            6
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et
                            risus vitae lectus dapibus sagittis sit amet eu eros. Pellentesque accumsan mi nec tristique
                            vehicula. Suspendisse potenti. Cras f ...</p></div>
                    <img src="assets/img/property/17.jpg" alt="677 Cottage Terrace">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                59,600 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        677 Cottage Terrace
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Spring Valley</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            650m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            1
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Etiam ut est in odio tempor tincidunt vitae sed sem. Nullam dignissim
                            lorem et erat dictum, cursus posuere lorem pretium. In leo elit, luctus vel vehicula vel,
                            accumsan quis velit. Ut sagittis commodo ...</p></div>
                    <img src="assets/img/property/21.jpg" alt="126 31st Pl NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                48,000 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        126 31st Pl NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Civic Betterment</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            950m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu ornare. Donec
                            id egestas arcu. Suspendisse auctor condimentum ligula ultricies cursus. Vestibulum vel orci
                            vel
                            lacus rhoncus sagittis sed vitae ...</p></div>
                    <img src="assets/img/property/15.jpg" alt="Carlton Ave NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                87,000 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        Carlton Ave NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Capitol Hill</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            800m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            2
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/2.jpg" alt="12 Hayden Rd">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                45,999 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        12 Hayden Rd
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Swampoodle</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            590m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            1
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/1.jpg" alt="20th St NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                85,600 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        20th St NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Benning</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            450m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            2
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Curabitur posuere lorem in nunc rutrum consequat. Fusce vel nulla nunc.
                            Nam adipiscing purus ut posuere sodales. Morbi varius interdum urna, non scelerisque erat
                            suscipit eu. Nunc vel congue tellus, e ...</p></div>
                    <img src="assets/img/property/4.jpg" alt="359 Rand Pl NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                56,000 €
            </div>
            <!-- /.price -->

            <div class="reduced">
                Reduced
            </div>
            <!-- /.reduced -->
        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        359 Rand Pl NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Swampoodle</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            540m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            3
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Etiam ut est in odio tempor tincidunt vitae sed sem. Nullam dignissim
                            lorem et erat dictum, cursus posuere lorem pretium. In leo elit, luctus vel vehicula vel,
                            accumsan quis velit. Ut sagittis commodo ...</p></div>
                    <img src="assets/img/property/12.jpg" alt="3417 Girard St NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Rent
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                900 € <span class="suffix">par Mois</span></div>
            <!-- /.price -->

            <div class="reduced">
                Reduced
            </div>
            <!-- /.reduced -->
        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        3417 Girard St NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Near Northeast</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            90m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            1
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            1
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
<li>
    <div class="property">
        <div class="image">
            <div class="content">
                <a href="properties/property-detail.html">
                    <div class="description"><p>Quisque non dictum eros. Praesent porta vehicula arcu eu ornare. Donec
                            id egestas arcu. Suspendisse auctor condimentum ligula ultricies cursus. Vestibulum vel orci
                            vel
                            lacus rhoncus sagittis sed vitae ...</p></div>
                    <img src="assets/img/property/13.jpg" alt="2566 Quincy St NE">
                </a>
            </div>
            <!-- /.content -->

            <div class="rent-sale">
                Sale
            </div>
            <!-- /.rent-sale -->

            <div class="price">
                59,900 €
            </div>
            <!-- /.price -->

        </div>
        <!-- /.image -->

        <div class="info">
            <div class="title clearfix">
                <h2><a href="properties/property-detail.html">
                        2566 Quincy St NE
                    </a></h2>
            </div>
            <!-- /.title -->

            <div class="location">Sursum Corda</div>
            <!-- /.location -->
        </div>
        <!-- /.info -->

    </div>
    <!-- /.property -->

    <div class="property-info clearfix">
        <div class="area">
            <i class="icon icon-normal-cursor-scale-up"></i>
            900m<sup>2</sup>
        </div>
        <!-- /.area -->

        <div class="bedrooms">
            <i class="icon icon-normal-bed"></i>
            4
        </div>
        <!-- /.bedrooms -->

        <div class="bathrooms">
            <i class="icon icon-normal-shower"></i>
            4
        </div>
        <!-- /.bathrooms -->
    </div>
    <!-- /.property-info -->

</li>
</ul>
</div>


</div>


</div>
</div>
<!-- /#main -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>