<hr>
<h2 class="text-center">Our Customers Reviews</h2>
<div class="row">
    <div class="col-md-3">
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-12">
                    <label><small>Name</small></label>
                    <input type="text" class="form-control form-control-sm" id="name_review">
                    <div class="invalid-feedback">
                        <span id="name_message_review"></span>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label><small>Email (Optional)</small></label>
                    <input type="text" class="form-control form-control-sm" id="email_review">
                    <div class="invalid-feedback">
                        <span id="email_message_review"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class=""><small>Review</small></label>
                <textarea class="form-control" id="review" rows="3"></textarea>
                <div class="invalid-feedback">
                    <span id="description_message_review"></span>
                </div>
            </div>
            <div class="form-group">
                <label><small>Rating</small></label>
                <div class="star-rating">
                    <input id="star-5" type="radio" name="rating" value="5">
                    <label for="star-5" title="5 stars">
                        <i class="active fa fa-star" aria-hidden="true"></i>
                    </label>
                    <input id="star-4" type="radio" name="rating" value="4">
                    <label for="star-4" title="4 stars">
                        <i class="active fa fa-star" aria-hidden="true"></i>
                    </label>
                    <input id="star-3" type="radio" name="rating" value="3">
                    <label for="star-3" title="3 stars">
                        <i class="active fa fa-star" aria-hidden="true"></i>
                    </label>
                    <input id="star-2" type="radio" name="rating" value="2">
                    <label for="star-2" title="2 stars">
                        <i class="active fa fa-star" aria-hidden="true"></i>
                    </label>
                    <input id="star-1" type="radio" name="rating" value="1">
                    <label for="star-1" title="1 star">
                        <i class="active fa fa-star" aria-hidden="true"></i>
                    </label>
                </div><br>
                <small>
                    <label id="rating_review" class="text-danger d-none"></label>
                </small>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="agree" id="agree_review">
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        <span id="agree_message_review"></span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" id="loading_review" style="display: none">
                <div class="spinner-border" role="status"></div>
            </button>
            <button class="btn btn-primary" id="submitReview" type="button">Submit review</button>
        </form>
        <div class="mt-3">
            <hr>
            <div class="row">
                <div class="col">
                    <label>
                        <span>5</span>
                        <label for="star-2" title="2 stars">
                            <i class="active fa fa-star text-primary" aria-hidden="true"></i>
                        </label>
                    </label>
                </div>
                <div class="col">
                    <label>
                        <span>4</span>
                        <label for="star-2" title="2 stars">
                            <i class="active fa fa-star text-success" aria-hidden="true"></i>
                        </label>
                    </label>
                </div>
                <div class="col">
                    <label>
                        <span>3</span>
                        <label for="star-2" title="2 stars">
                            <i class="active fa fa-star text-info" aria-hidden="true"></i>
                        </label>
                    </label>
                </div>
                <div class="col">
                    <label>
                        <span>2</span>
                        <label for="star-2" title="2 stars">
                            <i class="active fa fa-star text-warning" aria-hidden="true"></i>
                        </label>
                    </label>
                </div>
                <div class="col">
                    <label>
                        <span>1</span>
                        <label for="star-2" title="2 stars">
                            <i class="active fa fa-star text-danger" aria-hidden="true"></i>
                        </label>
                    </label>
                </div>
            </div>

            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width:0%" id="star-5-percent">
                    <label id="star-5-label"></label>
                </div>
            </div>
            <div class="progress mt-2">
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%" id="star-4-percent">
                    <label id="star-4-label"></label>
                </div>
            </div>
            <div class="progress mt-2">
                <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%" id="star-3-percent">
                    <label id="star-3-label"></label>
                </div>
            </div>
            <div class="progress mt-2">
                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 0%" id="star-2-percent">
                    <label id="star-2-label"></label>
                </div>
            </div>
            <div class="progress mt-2">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%" id="star-1-percent">
                    <label id="star-1-label"></label>
                </div>
            </div>
        </div>
    </div>
    <?php require "reviewDescription.php"; ?>
</div>
<script>
    $(function() {
        fetchStar();
        $("#submitReview").click(function() {
            event.preventDefault();
            $('#loading_review').css({
                'display': 'inline'
            });
            $('#submitReview').hide();
            name = $('#name_review').val();
            email = $('#email_review').val();
            review = $('#review').val();
            star = $("input[name='rating']:checked").val();
            agree = $("input[name='agree']:checked").val();
            data = {
                'name': name,
                'email': email,
                'review': review,
                'star': star,
                'agree': agree
            }
            $.ajax({
                type: "post",
                url: "db/sendReview.php",
                data: data,
                success: function(response) {
                    $('#loading_review').css({
                        'display': 'none'
                    });
                    $('#submitReview').show();
                    if (response == 'success') {
                        alert('Thank you!');
                        clearAll();
                        fetchStar();
                    } else {
                        if (response == 'failed') {
                            alert('Something went wrong. Please try again later!');
                        } else {
                            data = JSON.parse(response);
                            validationReview(data);
                        }
                    }
                }
            });
        });
    });

    function fetchStar() {
        $.ajax({
            url: "db/calculate_star_percentage.php",
            success: function(response) {
                data = JSON.parse(response);
                showStarPercentage(data);
            }
        });
    }

    function showStarPercentage(data) {
        for (i = 0; i < data.length; i++) {
            if (data[i].star_name == 'star-1') {
                $('#star-1-percent').css({
                    'width': data[i].percentage
                });
                $('#star-1-label').text(Math.round(parseInt(data[i].percentage)) + '%');
            }
            if (data[i].star_name == 'star-2') {
                $('#star-2-percent').css({
                    'width': data[i].percentage
                });
                $('#star-2-label').text(Math.round(parseInt(data[i].percentage)) + '%');
            }
            if (data[i].star_name == 'star-3') {
                $('#star-3-percent').css({
                    'width': data[i].percentage
                });
                $('#star-3-label').text(Math.round(parseInt(data[i].percentage)) + '%');
            }
            if (data[i].star_name == 'star-4') {
                $('#star-4-percent').css({
                    'width': data[i].percentage
                });
                $('#star-4-label').text(Math.round(parseInt(data[i].percentage)) + '%');
            }
            if (data[i].star_name == 'star-5') {
                $('#star-5-percent').css({
                    'width': data[i].percentage
                });
                $('#star-5-label').text(Math.round(parseInt(data[i].percentage)) + '%');
            }
        }
    }

    function clearAll() {
        $("#review").removeClass("is-invalid");
        $("#name_review").removeClass("is-invalid");
        $("#email_review").removeClass("is-invalid");
        $("#agree_review").removeClass("is-invalid");
        $("#review").removeClass("is-valid");
        $("#name_review").removeClass("is-valid");
        $("#email_review").removeClass("is-valid");
        $("#agree_review").removeClass("is-valid");
        $('#rating_review').addClass('d-none');
        $('#rating_review').removeClass('d-inline');
        // $('#name_review').val('');
        $('#email_review').val('');
        $('#review').val('');
        // $("input[name='rating']").prop("checked", false);
        // $("input[name='agree']").prop("checked", false);
        getReview();
    }

    function validationReview(data) {
        $("#review").removeClass("is-invalid");
        $("#name_review").removeClass("is-invalid");
        $("#email_review").removeClass("is-invalid");
        $("#agree_review").removeClass("is-invalid");
        $('#rating_review').addClass('d-none');
        $('#rating_review').removeClass('d-inline');
        for (i = 0; i < data.length; i++) {
            $("#name_review").addClass("is-valid");
            if (data[i].field_name == 'name') {
                $('#name_message_review').text(data[i].message);
                $("#name_review").addClass("is-invalid");
            }

            $("#email_review").addClass("is-valid");
            if (data[i].field_name == 'email') {
                $('#email_message_review').text(data[i].message);
                $("#email_review").addClass("is-invalid");
            }

            $("#review").addClass("is-valid");
            if (data[i].field_name == 'review') {
                $('#description_message_review').text(data[i].message);
                $("#review").addClass("is-invalid");
            }

            $("#agree_review").addClass("is-valid");
            if (data[i].field_name == 'agree') {
                $('#agree_message_review').text(data[i].message);
                $("#agree_review").addClass("is-invalid");
            }

            if (data[i].field_name == 'rating') {
                $('#rating_review').removeClass('d-none');
                $('#rating_review').addClass('d-inline');
                $('#rating_review').text(data[i].message);
            }
        }
    }
</script>