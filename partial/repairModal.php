<style>
    .hide_icon {
        display: none;
    }
</style>
<div class="modal" id="repairService" tabindex="-1" role="dialog" aria-labelledby="repairServiceTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="font-size:12px">Diagnose and repair your existing <span id="app_name"></span>. Technician will quote on site based on the issue, if customer decides to go ahead with the repair, service call fee is waved..</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col">
                    <div class="modal-body">
                        <div class="text-center">
                            <center><img src="images/appliance/dishwasher.jpg" height="400" class="hide_icon" id="icon_dish_washer"></center>
                            <center><img src="images/appliance/dryer.jpg" height="400" class="hide_icon" id="icon_dryer"></center>
                            <center><img src="images/appliance/freezer.jpg" height="400" class="hide_icon" id="icon_freezer"></center>
                            <center><img src="images/appliance/microwave.jpg" height="400" class="hide_icon" id="icon_microwave"></center>
                            <center><img src="images/appliance/oven.jpg" height="400" class="hide_icon" id="icon_oven"></center>
                            <center><img src="images/appliance/refrigerator.jpg" height="400" class="hide_icon" id="icon_ref"></center>
                            <center><img src="images/appliance/stove.jpg" height="400" class="hide_icon" id="icon_stove"></center>
                            <center><img src="images/appliance/washing_machine.jpg" height="400" class="hide_icon" id="icon_washing_machine"></center>
                            <h3 class="font-weight-bold"><span class="repairTitle"></span></h3>
                            <h5>$85.00</h5>
                            <button class="btn-danger" id="minus">-</button>
                            <input type="number" id="qty" class="form-control-sm text-center" value="1">
                            <button class="btn-primary" id="plus">+</button>
                            <h2>Total: $<span id="total_price">85</span> </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="tel:587-894-6180" type="button" class="btn btn-light">Contact Us</a>
                <button type="button" class="btn btn-light" data-toggle="modal" data-dismiss="modal" data-target="#upload" id="sendRequest">Send Request</button>
            </div>
        </div>
    </div>
</div>

<script>
    qty = 1;
    appliance = '';
    totalPrice = '$85.00';
    $(".repairModal").click(function() {
        hideIcon()
        $('.repairTitle').text($(this).attr('data-value'));
        $('#app_name').text($(this).attr('data-value'));
        appliance = $(this).attr('data-value');
        if ($(this).attr('data-value') == 'Dishwasher') {
            $('#icon_dish_washer').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == 'Dryer') {
            $('#icon_dryer').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Freezer") {
            $('#icon_freezer').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Microwave") {
            $('#icon_microwave').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Oven") {
            $('#icon_oven').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Refrigerator") {
            $('#icon_ref').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Electric Stove") {
            $('#icon_stove').css({
                'display': 'inline'
            });
        } else if ($(this).attr('data-value') == "Washing Machine") {
            $('#icon_washing_machine').css({
                'display': 'inline'
            });
        }
    });

    $("#plus").click(function() {
        qty++;
        setValueQtyAndTotal(qty)
    });
    $("#minus").click(function() {
        qty--;
        if (qty <= 1) {
            qty = 1;
        }
        setValueQtyAndTotal(qty)
    });

    $('#sendRequest').click(function() {
        setEmailMessage({
            'appliance': appliance,
            'qty': qty,
            'total': `${totalPrice}`
        });
    })

    function setValueQtyAndTotal(totalQty) {
        totalPrice = 85 * totalQty;
        $('#total_price').text(totalPrice);
        $('#qty').val(totalQty);
    }

    function hideIcon() {
        $('.hide_icon').css({
            'display': 'none'
        })
    }

    function setEmailMessage(data) {
        display = `
            Appliance: ${data.appliance} \n 
            Quantity: ${data.qty} \n 
            Total Price: ${data.total}
        `;
        $('#appliance_name').val(data.appliance);
        $('#appliance_name').css({
            'font-weight': 'bold'
        });
        $('#quantity').val(data.qty);
        $('#quantity').css({
            'font-weight': 'bold'
        });
    }
</script>