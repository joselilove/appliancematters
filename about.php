<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partial/head.php"; ?>
    <style>
        #img_address {
            width: 100%;
        }

        #service_map {
            width: 50%;
        }

        #img_address:hover {
            width: 101%;
            border-style: solid;
            border-width: 2px;
            border-color: red;
        }

        @media only screen and (max-width: 1069px) {
            #img_address {
                width: 200%;
                margin-left: -50%;
            }

            #img_address:hover {
                width: 201%;
                border-style: solid;
                border-width: 2px;
                border-color: red;
            }

            #service_map {
                width: 60%;
            }

            .aboutus {
                margin-top: 10%;
            }

        }
    </style>
</head>

<body data-gr-c-s-loaded="true">

    <?php
    include 'partial/nav_bar.php';
    ?>

    <div class="hero-wrap background_intro position-relative overflow-hidden p-md-5 m-md-12 text-center bg-light">
        <div class=container-fluid>
            <div class="row">
                <div class="col-md-4 p-lg-5 my-5">
                    <div class="aboutus text-justify">
                        <h2 class="aboutus-title">About Us</h2>
                        <h4>APPLIANCE MATTERS</h4>
                        <p class="aboutus-text">Has been providing the best Appliance repair company in Calgary and surrounding areas in the province of Alberta. We have gained an outstanding reputation due to our Top quality Appliance repair services. We are well aware of the importance of Appliance in our daily lives.</p>
                        <p class="aboutus-text">APPLIANCE MATTERS., is a one stop shop for all Appliance repairs . We are equipped with the latest tools and Our technicians are continuously trained with the new appliances and new technology in the market. Nothing is too big or too small for us. We are dedicated to treat every customer of ours equally and professionally. The best thing is that we offer Appliance repair at very competitive prices and do not charge any hidden cost.</p>
                    </div>
                </div>

                <div class="col-md-4 p-lg-5 my-5">
                    <img src="images/background/repair-man.jpg" class="img-fluid">
                </div>

                <div class="col-md-4 p-lg-5 my-5">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset" style="background-color: #f8f9fa">
                                    <span class="fa fa-cog icon fa-2x"></span>
                                </div>
                                <div class="feature-content text-justify">
                                    <h4>Trusted Company</h4>
                                    <p>We are fully bonded, licensed and insured business. Our team is fully trained and experienced in appliance repair industry.</p>
                                </div>
                            </div>
                        </div>

                        <div class="feature-box text-justify">
                            <div class="clearfix">
                                <div class="iconset" style="background-color: #f8f9fa">
                                    <span class="fa fa-cog icon fa-2x"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Warranty on Parts & Labor</h4>
                                    <p>That’s Right! We provide you with a full warranty on all of the Parts and Labor.So you can trust that you are getting the very best service.</p>
                                </div>
                            </div>
                        </div>

                        <div class="feature-box text-justify">
                            <div class="clearfix">
                                <div class="iconset" style="background-color: #f8f9fa; margin-top:10%">
                                    <span class="fa fa-cog icon fa-2x"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>100% Customer Satisfaction</h4>
                                    <p>Our customers’ satisfaction is our number one priority. We are here to help you with all of your appliance repair needs. It doesn’t matter if you have a broken Washing Machine, Dryer or a Refrigerator not cooling. We will help you with the best quality appliance repair service. Our technicians will explain all necessary repairs and cost of labor before they begin working on your appliances. Whether it is a refrigerator, dryer, washer, stove, dishwasher, oven, microwave. We will do our best to ensure your appliances work perfectly without recurring problems.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col text-center">
            <hr>
            <p class="font-weight-bold h4">Our Address</p>
            <span class="font-weight-bold">7708 Hunterview Drive North West Calgalry</span>
            <a href="javascript:void"><img id="img_address" src="images/map/map1.PNG"></a>
            <a href="javascript:void"><img src="images/map/map2.PNG" style="display: none"></a>
            <a href="javascript:void"><img src="images/map/map3.PNG" style="display: none"></a>
            <a href="javascript:void"><img src="images/map/map4.PNG" style="display: none"></a>
        </div>
        <div class="col"></div>
    </div>
    <div class="row mt-3">
        <div class="col"></div>
        <div class="col-md-9">
            <hr>
            <div class="text-center">
                <span class="font-weight-bold h4">Service Area</span>
            </div>
            <div class="text-center">
                <br>
                <div class="col">
                    <i class="fa fa-map-marker"> Whole Calgary and Surrounding Areas</i>
                </div>
            </div>
            <div class="row text-center">
                <div class="col"></div>
                <img src="images/map/map.PNG" id="service_map">
                <div class="col"></div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</body>
<?php require 'partial/messenger.php'; ?>
<?php include "partial/footer.php"; ?>

</html>

<script>
    let image = 0;
    let imageList = ['images/map/map1.PNG', 'images/map/map2.PNG', 'images/map/map3.PNG', 'images/map/map4.PNG'];
    let zoomStatus = false;
    $(document).ready(function() {
        $(".about").addClass("text-danger");
        $(".about").removeClass("text-dark");
        $('#img_address').click(function() {
            if (zoomStatus) {
                zoomOut()
            } else {
                zoomIn()
            }
        });
    });

    function zoomIn() {
        image = (image > 3) ? 4 : image + 1;
        zoomStatus = (image == 3) ? true : false;
        if (image == 4) {
            zoomStatus = true;
        }
        $('#img_address').attr("src", imageList[image]);
    }

    function zoomOut() {
        image = (image < 0) ? 0 : image - 1;
        zoomStatus = (image == 0) ? false : true;
        $('#img_address').attr("src", imageList[image]);
    }
</script>