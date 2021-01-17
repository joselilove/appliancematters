<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "partial/head.php"; ?>
</head>

<style>
  .section2 {
    border-bottom: 1px solid #dcdada;
    margin-bottom: 10px;
  }

  .section2:hover {
    background-color: #f1f0f0;
    border-bottom: 1px solid #ffc1c9;
    cursor: pointer;
    color: #f25d5d;
  }

  .rounded-circle {
    background-color: #fcd116;
    width: 80px;
    height: 80px;
    /* margin-bottom: 50%; */
  }

  .rounded-circle:hover {
    background-color: #eb3c19;
  }

  .rounded-circle img {
    margin: 7px;
  }

  .display-5 {
    font-size: 1.5rem;
  }

  .lead {
    font-size: 15px;
    font-weight: 300;
  }

  p {
    margin-top: 0px;
    margin-bottom: 14%;
  }

  .product-logo img {
    width: 80%;
    height: 80%;
  }
</style>

<body data-gr-c-s-loaded="true">

  <?php
  include 'partial/nav_bar.php';
  ?>

  <div class="hero-wrap background_intro position-relative overflow-hidden p-md-5 m-md-12 text-center bg-light" style="background-image: url('images/background/op_33.jpg'); margin-top:-4%; padding-bottom:1%; margin-bottom:8%;">
    <div class="row">
      <div class="col-md-7 p-lg-5 my-5">
        <div class="col-md-12 ">
          <br><br><br>
          <h5 class="display-5 text-danger ">Appliance Repair Service</h5>
          <h1 class="display-4 text-left">Fast, easy, and hassle-free</h1>
          <blockquote class="blockquote">
            <p class="mb-0 text-left">
              Don't know what to do with your broken home appliances? We got your back. Get your home appliances repaired by our trusted and experienced experts.
            </p>
          </blockquote>
          <a class="btn btn-outline-danger" href="tel:587-894-6180"> <span class="icon-phone"></span> 111-111-1111</a>
          <a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#upload"> <span class="icon-screen-smartphone"></span> Request Now!</a>
        </div>
      </div>

      <div class="col-md-5 p-lg-5 my-5">
        <img src="images/background/machine.jpg" class="img-fluid">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col">
        <h4 class="text-secondary font-weight-bold text-center">
          "Free Estimate Repair"
        </h4>
      </div>
      <div class="col">
        <h4 class="text-secondary font-weight-bold text-center">
          "Affordable Pricing"
        </h4>
      </div>
      <div class="col">
        <h4 class="text-secondary font-weight-bold text-center">
          "Licensed And Insured"
        </h4>
      </div>
      <div class="col">
        <h4 class="text-secondary font-weight-bold text-center">
          "Fast Same Day Service"
        </h4>
      </div>
    </div>
  </div>

  <div class="page-wrapper">
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-md-11 heading-section text-center" style="background-color: #e8edf3;">
          <span class="subheading">Repair</span>
          <h2 class="mb-2">For Major Home Appliances.</h2>
          <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-7">
              <blockquote class="blockquote">
                <p class="mb-0 text-justify" style="font-size: 1.0rem;">
                  "Everyone knows how much trouble a broken or malfunctioning home appliance can cause. The problem with a refrigerator can end up spoiling all your food, while a malfunctioning stove in your kitchen may cause preparing your meals to become quite a hard task.
                  <br><br>Not only does it complicate your life significantly, but trouble with any household appliance can be very hard to deal with. Even an individual who is technically skilled may find it hard an appliance. They can even cause a worse problem when trying to fix it, if they don’t know exactly what they’re doing – and since there’s so many different major brands and models, it’s hard to be a hundred percent sure.
              </blockquote>
            </div>

            <div class="col-md-4">
              <img src="images/content/refrigerator.jpg" class="img-fluid">
            </div>
          </div>
        </div>


        <div class="row justify-content-center">
          <div class="col-md-11 heading-section text-center" style="margin-top: 4%;">
            <span class="subheading">Appliance</span>
            <h2 class="mb-2">What we offer</h2>
            <blockquote class="blockquote">
              <p class="mb-0 text-center">
                Our experts are capable of performing all sorts of service calls on a wide variety of refrigeration, electronics and gas equipment, including</p>
            </blockquote>
          </div>
        </div>

        <div class="container">
          <div class="row" style="margin-top: 3%;">
            <div class="col-md-3 section2 repairModal" data-value="Dishwasher" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/dishwasher.png" style="width:50px; height:50px;">
              Dishwasher Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Dryer" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/dryer.png" style="width:50px; height:50px;">
              Dryer Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Freezer" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/freezer.png" style="width:50px; height:50px;">
              Freezer Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Microwave" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/microwave.png" style="width:50px; height:50px;">
              Microwave
            </div>
          </div>

          <div class="row" style="margin-top: 3%;">
            <div class="col-md-3 section2 repairModal" data-value="Oven" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/oven.png" style="width:50px; height:50px;">
              Oven Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Refrigerator" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/refrigerator.png" style="width:50px; height:50px;">
              Refrigerator Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Electric Stove" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/stove.png" style="width:50px; height:50px;">
              Electric Stove Repair
            </div>
            <div class="col-md-3 section2 repairModal" data-value="Washing Machine" data-toggle="modal" data-target="#repairService">
              <img src="images/icon/washer.png" style="width:50px; height:50px;">
              Washing Machine
            </div>
          </div>
        </div>

        <div class="page-wrapper">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-11 heading-section text-center" style="margin-top: 4%;">
                <span class="subheading">Why choose us?</span>
                <h2 class="mb-2">Certified Service Technicians</h2>
              </div>
            </div>

            <div class="container">
              <div class="row">

                <div class="col-md-6" style="margin-bottom:5%;">
                  <img src="images/background/machine.jpg" class="img-fluid">
                </div>

                <div class="col-md-6 iconic">
                  <div class="row">
                    <div class="col-4 col-sm-2">
                      <div class="rounded-circle">
                        <img src="images\icon\truck.png" alt="...">
                      </div>
                    </div>
                    <div class="col-8 col-sm-10">
                      <h1 class="display-5">Fast Service</h1>
                      <p class="lead">
                        Technicians standing by to service you quickly.
                      </p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4 col-sm-2">
                      <div class="rounded-circle">
                        <img src="images\icon\calendar.png" alt="...">
                      </div>
                    </div>
                    <div class="col-8 col-sm-10">
                      <h1 class="display-5">Always Available</h1>
                      <p class="lead">
                        Same Day, Next Day and Weekend Appointments Available.
                      </p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4 col-sm-2">
                      <div class="rounded-circle">
                        <img src="images\icon\peace.png" alt="...">
                      </div>
                    </div>
                    <div class="col-8 col-sm-10">
                      <h1 class="display-5">Peace Of Mind</h1>
                      <p class="lead">
                        Experienced Technicians. Warranty On Parts & Labor.
                      </p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-4 col-sm-2">
                      <div class="rounded-circle">
                        <img src="images\icon\technician.png" alt="...">
                      </div>
                    </div>
                    <div class="col-8 col-sm-10">
                      <h1 class="display-5">Expert Technician</h1>
                      <p class="lead">
                        Only Top Rated Professional Appliance Technician.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center" style="margin-top: 4%; margin-bottom:4%">
                  <span class="subheading">Fix</span>
                  <h2 class="mb-2">Brands We Repair</h2>
                  <blockquote class="blockquote">
                    <p class="mb-0 text-center">
                      We offer repair service at the lowest possible cost</p>
                  </blockquote>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2 product-logo">
                    <img src="images/samsung.png" class="mx-auto d-block" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/dacor.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/kitchenaid.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/lg.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/maytag.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2 product-logo">
                    <img src="images/moffat.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/inglis.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/whirlpool.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/bosch.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/frigidaire.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-2 product-logo">
                    <img src="images/kenmore.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/jennair.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/hotpoint.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/ge.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-2 product-logo">
                    <img src="images/electrolux.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-1"></div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-2 product-logo">
                    <img src="images/amana.png" class="mx-auto d-block" alt="Snow">
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </div>
            </div>
          </div>

          <?php require 'partial/reviewArea.php' ?>
          <?php require 'partial/repairModal.php'; ?>
          <?php require 'partial/requestForm.php'; ?>
          <?php require 'partial/messenger.php'; ?>
</body>
<?php include "partial/footer.php"; ?>
<script>
  $(document).ready(function() {
    $(".index").addClass("text-danger");
    $(".index").removeClass("text-dark");
  });
</script>

</html>