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
                                        Location
                                    </label>

                                    <div class="controls">
                                        <select name="filter_location">
                                            <option>-</option>
                                            <option>Barney Circle</option>
                                            <option>Benning</option>
                                            <option>Benning Heights</option>
                                            <option>Benning Ridge</option>
                                            <option>Burrville</option>
                                            <option>Capitol Hill</option>
                                            <option>Capitol View</option>
                                            <option>Central Northeast</option>
                                            <option>Civic Betterment</option>
                                            <option>Judiciary Square</option>
                                            <option>Kingman Park</option>
                                            <option>Navy Yard</option>
                                            <option>Near Northeast</option>
                                            <option>Spring Valley</option>
                                            <option>Sursum Corda</option>
                                            <option>Swampoodle</option>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label">
                                        Type
                                    </label>

                                    <div class="controls">
                                        <select name="filter_type">
                                            <option>-</option>
                                            <option>Apartment</option>
                                            <option>Building Area</option>
                                            <option>Condo</option>
                                            <option>Cottage</option>
                                            <option>Family House</option>
                                            <option>Single Home</option>
                                            <option>Villa</option>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->


                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" value="rent"> Rent
                                        </label>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" value="sale"> Sale
                                        </label>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label">
                                        Price From
                                    </label>

                                    <div class="controls">
                                        <select name="filter_price_from">
                                            <option value="">-</option>
                                            <option value="1000">1,000 €</option>
                                            <option value="20000">20,000 €</option>
                                            <option value="50000">50,000 €</option>
                                            <option value="100000">100,000 €</option>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label">
                                        Price To
                                    </label>

                                    <div class="controls">
                                        <select name="filter_price_to">
                                            <option value="">-</option>
                                            <option value="1000">1,000 €</option>
                                            <option value="20000">20,000 €</option>
                                            <option value="50000">50,000 €</option>
                                            <option value="100000">100,000 €</option>
                                        </select>
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="area-from control-group">
                                    <label class="control-label">
                                        Area From
                                    </label>

                                    <div class="controls">
                                        <input type="text" value="" name="filter_area_from">
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="area-to control-group">
                                    <label class="control-label">
                                        Area To
                                    </label>

                                    <div class="controls">
                                        <input type="text" value="" name="filter_area_to">
                                    </div>
                                    <!-- /.controls -->
                                </div>
                                <!-- /.control-group -->

                                <div class="form-actions">
                                    <button class="btn btn-primary btn-large">Filter now!</button>
                                </div>
                                <!-- /.form-actions -->
                            </form>
                        </div>
                        <!-- /.content -->
                    </div><!-- /.property-filter -->                    </div>
            </div>
        </div>

        <div id="francemap" class="map-inner" style="height: 750px"></div>
        <!-- /.map-inner -->
    </div>
    <!-- /.map -->
</div>

<!-- /.map-wrapper -->
<div class="container">
<div class="row">

<div class="sidebar span3">
<div id="quick-search" class="widget widget-search"><h2>Quick Search</h2>

    <div class="content">
        <form method="get" class="site-search" action="javascript:void(0);">
            <input class="search-query form-text" placeholder="Search" type="text" name="s" id="s" value="">
            <button type="submit" class="btn">Search</button>
        </form>
        <!-- /.site-search -->
    </div>
    <!-- /.inner -->
</div>                <div id="partners_widget-2" class="widget partners">

    <h2>Partners</h2>

    <div class="partners">
        <div class="row">
            <div class="span3">
                <div class="partner">
                    <a href="http://www.facebook.com">
                        <img width="270" height="70" src="assets/img/partners/themeforest.png"
                             class="thumbnail-image" alt="themeforest"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.partners -->
</div>                <div id="mostrecentproperties_widget-2" class="widget properties">

    <h2>Most Recent Properties</h2>

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
                    Contact us
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
                    500 € <span class="suffix">/ per month</span></div>
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

    <h2>Agencies</h2>

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
                        <span class="number">2</span> properties
                    </div>
                    <!-- /.properties-count -->

                    <a href="default.htm" class="btn">View profile</a>
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
                <a href="mailto:sample@example.com">sample@example.com</a>
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
                        <span class="number">6</span> properties
                    </div>
                    <!-- /.properties-count -->

                    <a href="default.htm" class="btn">View profile</a>
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
                <a href="mailto:sample@example.com">sample@example.com</a>
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

<h2>Featured Properties</h2>
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
    <a href="properties/default.htm">Show all</a>
</div>                <hr>

<h1 class="page-header">Recent Properties</h1>
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
    <a href="properties/default.htm">Show all</a>
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

                            <p>Properta allows your users to add their own properties in real front-end
                                page.</p>

                            <p><a href="default.htm">Show All<i class="icon icon-normal-right-arrow-circle"></i></a>
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

                            <p>Translate Properta to your language using PO files or WPML</p>

                            <p><a href="default.htm">Show All<i class="icon icon-normal-right-arrow-circle"></i></a>
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

                            <p>Properta supports leading IDX/MLS real estate search WP plugin.</p>

                            <p><a href="default.htm">Show All<i class="icon icon-normal-right-arrow-circle"></i></a>
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
<h2>Carousel Properties</h2>
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
                900 € <span class="suffix">per Month</span></div>
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

<div id="partners_widget-3" class="widget partners">

    <h2>Partners</h2>

    <div class="partners">
        <div class="row">
            <div class="span3">
                <div class="partner">
                    <a href="http://www.facebook.com">
                        <img width="270" height="70" src="assets/img/partners/themeforest.png"
                             class="thumbnail-image " alt="themeforest"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
            <div class="span3">
                <div class="partner">
                    <a href="../www.activeden.net/default.htm">
                        <img width="270" height="70" src="assets/img/partners/activeden.png"
                             class="thumbnail-image " alt="activeden"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
            <div class="span3">
                <div class="partner">
                    <a href="../www.3docean.net/default.htm">
                        <img width="270" height="70" src="assets/img/partners/3docean.png"
                             class="thumbnail-image " alt="3docean"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
            <div class="span3">
                <div class="partner">
                    <a href="../www.codecanyon.net/default.htm">
                        <img width="270" height="70" src="assets/img/partners/code-canyon.png"
                             class="thumbnail-image " alt="code-canyon"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
            <div class="span3">
                <div class="partner">
                    <a href="../www.photodune.net/default.htm">
                        <img width="270" height="70" src="assets/img/partners/photo-dune.png"
                             class="thumbnail-image " alt="photo-dune"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
            <div class="span3">
                <div class="partner">
                    <a href="../www.graphicriver.net/default.htm">
                        <img width="270" height="70" src="assets/img/partners/graphic-river.png"
                             class="thumbnail-image " alt="graphic-river"/>
                    </a>
                </div>
            </div>
            <!-- /.span3 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.partners -->
</div>            </div>
<!-- /#main -->

</div>
<!-- /.row -->
</div>
<!-- /.container -->

</div>