<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partial/head.php"; ?>
    <style>
        .ml10 {
            position: relative;
            font-weight: 900;
            font-size: 4em;
        }

        .ml10 .text-wrapper {
            position: relative;
            display: block;
            padding-top: 0.2em;
            padding-right: 0.05em;
            padding-bottom: 0.1em;
            overflow: hidden;
        }

        .ml10 .letter {
            display: inline-block;
            line-height: 1em;
            transform-origin: 0 0;
        }

        /* Mobile Styles */
        @media only screen and (max-width: 535px) {

            .form_title {
                margin-top: 14%;
                font-size: 40px;
            }
        }
    </style>
</head>

<body data-gr-c-s-loaded="true">

    <?php
    include 'partial/nav_bar.php';
    ?>

    <div class="hero-wrap background_intro position-relative overflow-hidden p-md-5 m-md-12 text-center bg-light" style="background-image: url('images/background/contact_2.jpg'); margin-top:-4% padding-bottom:1%">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 10%">
                <h1 class="display-3 font-weight-bold form_title">Request Service</h1>
                <div>
                    <h6 class="ml10">
                        <span class="text-wrapper">
                            <span class="letters">Now</span>
                        </span>
                    </h6>
                </div>
                <button class="btn-primary btn-lg" data-toggle="modal" data-target="#upload">Send Email</button>
            </div>
        </div>
    </div>
    <?php require 'partial/requestForm.php' ?>
</body>

<?php include "partial/footer.php"; ?>

</html>

<script>
    $(document).ready(function() {
        $(".contact").addClass("active");
        $(".request").addClass("text-danger");
        $(".request").removeClass("text-dark");
    });
</script>

<script>
    var textWrapper = document.querySelector('.ml10 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({
            loop: true
        })
        .add({
            targets: '.ml10 .letter',
            rotateY: [-90, 0],
            duration: 1300,
            delay: (el, i) => 45 * i
        }).add({
            targets: '.ml10',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
</script>