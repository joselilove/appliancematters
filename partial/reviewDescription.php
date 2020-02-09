<style>
    /* CSS Test begin */
    .comment-box {
        margin-top: 30px !important;
    }

    /* CSS Test end */

    .comment-box img {
        width: 50px;
        height: 50px;
    }

    .comment-box .media-left {
        padding-right: 10px;
        width: 65px;
    }

    .comment-box .media-body p {
        border: 1px solid #ddd;
        padding: 10px;
    }

    .comment-box .media-body .media p {
        margin-bottom: 0;
    }

    .comment-box .media-heading {
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        padding: 7px 10px;
        position: relative;
        margin-bottom: -1px;
    }

    .comment-box .media-heading:before {
        content: "";
        width: 12px;
        height: 12px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-width: 1px 0 0 1px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        position: absolute;
        top: 10px;
        left: -6px;
    }
</style>
<div class="col-md-9">
    <div class="container">
        <div class="row">
            <div class="media comment-box" style="width: 100%">
                <div class="media-body">
                    <div class="spinner-border" role="status" id="list_review"></div>
                    <div id="display-reviews"></div>
                    <div class="add-display-reviews"></div>
                </div>
            </div>
        </div>
        <div class="spinner-border" role="status" id="loading_show_review" style="display:none"></div>
        <button type="button" id="nextButton" class="btn btn-primary" onclick="nextPage()">
            Load More
            <span class="active fa fa-bars" aria-hidden="true"></span>
        </button>
    </div>
</div>

<script>
    $(document).ready(function() {
        getReview();
    });
    offset = 0;

    function getReview() {
        data = {
            'page': 1
        };
        $.ajax({
            type: "post",
            data: data,
            url: "db/fetch_review_description.php",
            success: function(response) {
                data = JSON.parse(response);
                displayReview(data, true)
            }
        });
    }

    function nextPage() {
        $('#nextButton').css({
            'display': 'none'
        });
        $('#loading_show_review').css({
            'display': 'block'
        });
        offset += 5;
        data = {
            'offset': offset
        }
        $.ajax({
            type: "post",
            url: "db/nextPage.php",
            data: data,
            success: function(response) {
                data = JSON.parse(response);
                $('#nextButton').css({
                    'display': 'block'
                });
                $('#loading_show_review').css({
                    'display': 'none'
                });
                if (data.length == 0) {
                    $('#nextButton').hide();
                }
                displayReview(data, false)
            }
        });
    }

    function displayReview(data, iden) {
        let display = '';
        for (i = 0; i < data.length; i++) {
            display += `<div class="media">
                        <div class="media-left">
                            <a>
                                <img class="img-responsive user-photo" src="images/icon/person.png">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <small>
                                    <span>${data[i]['name']}</span>
                                    <span class="float-right" style="font-size:12px;">
                                        ${getStar(data[i]['star'])}
                                    </span>
                                </small>
                            </h4>
                            <p style="font-size:12px;">
                                ${data[i]['description']}
                            </p>
                            <div style="font-size:10px;">
                            <span>${data[i]['created']}</span>
                            <span class="float-right">${data[i]['timeString']}</span>
                            </div>
                        </div>
                    </div><br>`;
        }
        if (iden === true) {
            $('#display-reviews').html(display);
        } else if (iden === false) {
            $('.add-display-reviews').append(display);
        }
        $('#list_review').css({
            'display': 'none'
        });
    }

    function getStar(star) {
        starData = '';
        for (a = 0; a < parseInt(star); a++) {
            starData += '<span class="active fa fa-star text-warning" aria-hidden="true"></span>';
        }
        return starData;
    }
</script>