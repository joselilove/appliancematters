<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partial/head.php"; ?>
    <style>
        .col:hover {
            opacity: 1 !important;
        }
    </style>
</head>

<body data-gr-c-s-loaded="true">

    <?php
    include 'partial/nav_bar.php';
    ?>
    <div class="row">
        <div class="col-md-12 p-lg-5 mx-auto my-5">
            <br><br><br>
            <h1 class="display-3 text-center font-weight-bold">Services</h1>
        </div>
    </div>

    <div class="row m-lg-5">
        <div class="col-md-3 dishwasher_content_button" style="opacity: 0.5" onclick="javascript:service().show('dishwasher_content');">
            <a href="#dishwasher_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Dishwasher</span>
                        </h5>
                        <img src="images/icon/dishwasher.png" width="97">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 dryer_content_button" style="opacity: 0.5" onclick="javascript:service().show('dryer_content');">
            <a href="#dryer_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Dryer</span>
                        </h5>
                        <img src="images/icon/dryer.png" width="100">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 microwave_content_button" style="opacity: 0.5" onclick="javascript:service().show('microwave_content');">
            <a href="#microwave_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Microwave</span>
                        </h5>
                        <img src="images/icon/microwave.png" width="99">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 oven_content_button" style="opacity: 0.5" onclick="javascript:service().show('oven_content');">
            <a href="#oven_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Oven</span>
                        </h5>
                        <img src="images/icon/oven.png" width="96">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 refrigerator_content_button" style="opacity: 0.5" onclick="javascript:service().show('refrigerator_content');">
            <a href="#refrigerator_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Freezer | Refrigerator</span>
                        </h5>
                        <!-- <img src="images/icon/refrigerator.png" width="97"> -->
                        <img src="images/icon/freezer.png" width="92">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 stove_content_button" style="opacity: 0.5" onclick="javascript:service().show('stove_content');">
            <a href="#stove_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Stove</span>
                        </h5>
                        <img src="images/icon/stove.png" width="98">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 washer_content_button" style="opacity: 0.5" onclick="javascript:service().show('washer_content');">
            <a href="#washer_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Washer</span>
                        </h5>
                        <img src="images/icon/washer.png" width="102">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 show_all_button" style="opacity: 0.5" onclick="javascript:service().show('show_all');">
            <a href="#dishwasher_content">
                <div class="shadow">
                    <div class="card-body rounded text-center">
                        <h5 class="card-title font-weight-bold">
                            <span class="text-dark">Show All</span>
                        </h5>
                        <img src="images/icon/show_all.jpg" width="194">
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid" id="list-of-service" style="display: none">
            <?php
            require 'partial/services/dishwasher.php';
            require 'partial/services/dryer.php';
            require 'partial/services/microwave.php';
            require 'partial/services/oven.php';
            require 'partial/services/refrigerator.php';
            require 'partial/services/stove.php';
            require 'partial/services/washer.php';
            ?>
        </div>
    </div>
    <?php require 'partial/messenger.php'; ?>
</body>

<?php include "partial/footer.php"; ?>

</html>

<script>
    $(document).ready(function() {
        $(".service").addClass("text-danger");
        $(".service").removeClass("text-dark");
        service().hide();
    });
</script>

<script>
    function service() {
        return {
            show: function(id) {
                if (id == 'show_all') {
                    $('#list-of-service').css({
                        'display': 'block'
                    });
                    service().show_all();
                } else {
                    service().hide();
                    service().removeOpacity();
                    service().setOpacity(id);
                    $('#list-of-service').css({
                        'display': 'block'
                    });
                    $(`#${id}`).fadeIn();
                }
            },
            show_all: function() {
                $('#dishwasher_content').fadeIn();
                $('#dryer_content').fadeIn();
                $('#freezer_content').fadeIn();
                $('#microwave_content').fadeIn();
                $('#oven_content').fadeIn();
                $('#refrigerator_content').fadeIn();
                $('#stove_content').fadeIn();
                $('#washer_content').fadeIn();
            },
            hide: function(id) {
                $('#dishwasher_content').fadeOut();
                $('#dryer_content').fadeOut();
                $('#freezer_content').fadeOut();
                $('#microwave_content').fadeOut();
                $('#oven_content').fadeOut();
                $('#refrigerator_content').fadeOut();
                $('#stove_content').fadeOut();
                $('#washer_content').fadeOut();
            },
            setOpacity: function(id) {
                $(`.${id}_button`).css({
                    'opacity': '1'
                });
            },
            removeOpacity: function() {
                $('.dishwasher_content_button').css({
                    'opacity': '0.5'
                });
                $('.dryer_content_button').css({
                    'opacity': '0.5'
                });
                $('.freezer_content_button').css({
                    'opacity': '0.5'
                });
                $('.microwave_content_button').css({
                    'opacity': '0.5'
                });
                $('.oven_content_button').css({
                    'opacity': '0.5'
                });
                $('.refrigerator_content_button').css({
                    'opacity': '0.5'
                });
                $('.stove_content_button').css({
                    'opacity': '0.5'
                });
                $('.washer_content_button').css({
                    'opacity': '0.5'
                });
            }
        }
    }
</script>