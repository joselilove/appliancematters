<script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="uploadLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-12 heading-section text-center" style="">
                            <span class="subheading">Email us here</span>
                        </div>
                    </div>
                    <form enctype="multipart/form-data" id="myform">
                        <div class="col-md-12 mt-1">
                            <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="name" placeholder="Name" required>
                            <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                <span id="name-message"></span>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="subject" placeholder="Subject (Optional)" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="subject-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="number" class="form-control form-control-sm" style="font-size: 12px" id="phone-number" placeholder="Phone number" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="phone-number-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="address" placeholder="Address" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="address-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="model" placeholder="Appliance Model" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="model-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="email" class="form-control form-control-sm" style="font-size: 12px" id="email" placeholder="Email (Optional)" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="email-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="appliance_name" placeholder="Appliance: (Optional)" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="appliance-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <input type="text" class="form-control form-control-sm" style="font-size: 12px" id="quantity" placeholder="Quantity: (Optional)" required>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="quantity-message"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12 mt-1">
                                <textarea type="text" id="message" class="form-control form-control-sm" style="font-size: 12px" cols="30" rows="7" placeholder="Problem description"></textarea>
                                <div class="invalid-feedback form-control-sm" style="font-size: 11px">
                                    <span id="message-message"></span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:shoeImageUpload()" class="font-weight-bold text-warning form-control-sm" style="font-size: 12px">Upload Image (Optional)
                            <span id="image_file" class="text-danger" style=" display: none; font-size:10px">Invalid Image</span>
                        </a>
                    </form>
                    <form id="uploadImage" style="display:none;" action="" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="file" id="file" name="file" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="png jpg gif jpeg" />
                        </div>
                    </form>
                    <button type="button" class="loading btn-primary btn-lg btn-block col-md-12" style="display: none">
                        <div class="spinner-border" role="status"></div>
                    </button>
                    <button type="button" id="send" class="btn-primary btn-sm btn-block col-md-12">Send request</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.dropify').dropify();
    });

    function shoeImageUpload() {
        if ($('#uploadImage').css('display') == 'none') {
            $('#uploadImage').css({
                'display': 'inline'
            });
        } else {
            $('#uploadImage').css({
                'display': 'none'
            });
        }
    }

    sendingStatus = 'hasError';


    $("#send").click(function() {
        event.preventDefault();
        setUpEmail();
    });

    function setUpEmail() {
        clearValidation();
        $('.loading').css({
            'display': 'inline'
        });
        $('#send').hide();
        file = uploadImage();
        name = $('#name').val();
        subject = $('#subject').val();
        email = $('#email').val();
        message = $('#message').val();
        phone_number = $('#phone-number').val();
        address = $('#address').val();
        model = $('#model').val();
        appliance_name = $('#appliance_name').val();
        quantity = $('#quantity').val();
        data = {
            'name': name,
            'subject': subject,
            'email': email,
            'message': message,
            'phone_number': phone_number,
            'address': address,
            'model': model,
            'appliance_name': appliance_name,
            'quantity': quantity,
            'file': file,
            'status': sendingStatus
        };
        if (file == 'failed') {
            $('#image_file').css({
                'display': 'inline'
            });
        } else {
            sendEmail(data);
        }
    }

    function sendEmail(data) {
        $.ajax({
            data: data,
            type: 'post',
            url: 'mail/index.php',
            success: function(response) {
                $('.loading').css({
                    'display': 'none'
                });
                $('#send').show();
                if (response == true) {
                    sendingStatus = 'noError';
                    setUpEmail();
                }
                if (response == 'success') {
                    alert('Successfully send!');
                    window.location.href = "index.php";
                } else {
                    if (response == 'failed') {
                        console.log(response);
                    } else {
                        data = JSON.parse(response);
                        validation(data);
                    }
                }
            }
        });
    }

    function uploadImage() {
        file_data = '';
        if ($('#file').val() != '' && sendingStatus == 'noError') {
            file = document.getElementById("file").files[0].name;
            form_data = new FormData();
            form_data.append("file", document.getElementById('file').files[0]);

            $.ajax({
                url: "ajax_php_file.php",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                async: false,
                success: function(response) {
                    if (response == 'failed') {
                        file_data = 'failed';
                    } else {
                        data = JSON.parse(response);
                        file_data = data.file;
                    }
                }
            });
        }
        return file_data;
    }

    function validation(data) {
        for (i = 0; i < data.length; i++) {
            $("#name").addClass("is-valid");
            if (data[i].field_name == 'name') {
                $('#name-message').html(data[i].message);
                $("#name").addClass("is-invalid");
            }
            $("#subject").addClass("is-valid");
            if (data[i].field_name == 'subject') {
                $('#subject-message').html(data[i].message);
                $("#subject").addClass("is-invalid");
            }
            $("#email").addClass("is-valid");
            if (data[i].field_name == 'email') {
                $('#email-message').html(data[i].message);
                $("#email").addClass("is-invalid");
            }
            $("#message").addClass("is-valid");
            if (data[i].field_name == 'message') {
                $('#message-message').html(data[i].message);
                $("#message").addClass("is-invalid");
            }
            $("#phone-number").addClass("is-valid");
            if (data[i].field_name == 'phone_number') {
                $('#phone-number-message').html(data[i].message);
                $("#phone-number").addClass("is-invalid");
            }
            $("#address").addClass("is-valid");
            if (data[i].field_name == 'address') {
                $('#address-message').html(data[i].message);
                $("#address").addClass("is-invalid");
            }
            $("#model").addClass("is-valid");
            if (data[i].field_name == 'model') {
                $('#model-message').html(data[i].message);
                $("#model").addClass("is-invalid");
            }
            $("#quantity").addClass("is-valid");
            if (data[i].field_name == 'quantity') {
                $('#quantity-message').html(data[i].message);
                $("#quantity").addClass("is-invalid");
            }
            $("#appliance_name").addClass("is-valid");
        }
    }

    function clearValidation() {
        $('#name-message').html();
        $("#name").removeClass("is-invalid");

        $('#subject-message').html();
        $("#subject").removeClass("is-invalid");

        $('#email-message').html();
        $("#email").removeClass("is-invalid");

        $('#message-message').html();
        $("#message").removeClass("is-invalid");

        $('#phone-number-message').html();
        $("#phone-number").removeClass("is-invalid");

        $('#address-message').html();
        $("#address").removeClass("is-invalid");

        $('#model-message').html();
        $("#model").removeClass("is-invalid");

        $('#quantity-message').html();
        $("#quantity").removeClass("is-invalid");
    }
</script>