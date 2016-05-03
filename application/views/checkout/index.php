<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- beginning of pledge row -->


<?php

//    print_r($user);
//    die;

?>


<?php if($this->cart->total_items()>0){

    $attributes = array('id' => 'cart-form');
    echo form_open('/cart', $attributes); ?>

    <div class="container-fluid checkout">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Checkout</h1>

                <p>Fill in all the details below and then select your payment method.</p>

                <?php echo form_open('', array('role'=>'form')); ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default" id="details-section">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="true" aria-controls="collapseOne">
                                    Your Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="row">
                                    <?php // first name ?>
                                    <div class="form-group col-sm-4<?php echo form_error('first_name') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('First name', 'first_name', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'first_name', 'value'=>set_value('first_name', (isset($user['first_name']) ? $user['first_name'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>

                                    <?php // last name ?>
                                    <div class="form-group col-sm-4<?php echo form_error('last_name') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Last name', 'last_name', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'last_name', 'value'=>set_value('last_name', (isset($user['last_name']) ? $user['last_name'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php // email ?>
                                    <div class="form-group col-sm-8<?php echo form_error('email') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Email Address', 'email', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'email', 'value'=>set_value('email', (isset($user['email']) ? $user['email'] : '')), 'class'=>'form-control form-validate', 'type'=>'email')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="true" aria-controls="collapseOne">
                                    Billing Address
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body" id="billing-address-section">
                                <div class="row">
                                    <?php // billing_street_address1 ?>
                                    <div class="form-group col-sm-5<?php echo form_error('billing_street_address1') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Street Address 1', 'billing_street_address1', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'billing_street_address1', 'value'=>set_value('billing_street_address1', (isset($user['billing_street_address1']) ? $user['billing_street_address1'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>
                                    <?php // billing_street_address2 ?>
                                    <div class="form-group col-sm-5<?php echo form_error('billing_street_address2') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Street Address 2', 'billing_street_address2', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'billing_street_address2', 'value'=>set_value('billing_street_address2', (isset($user['billing_street_address2']) ? $user['billing_street_address1'] : '')), 'class'=>'form-control')); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php // billing_suburb ?>
                                    <div class="form-group col-sm-6<?php echo form_error('billing_suburb') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Suburb/Town', 'billing_suburb', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'billing_suburb', 'value'=>set_value('billing_suburb', (isset($user['billing_suburb']) ? $user['billing_suburb'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>
                                    <?php // billing_postcode ?>
                                    <div class="form-group col-sm-4<?php echo form_error('billing_postcode') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Postcode', 'billing_postcode', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'billing_postcode', 'value'=>set_value('billing_postcode', (isset($user['billing_postcode']) ? $user['billing_postcode'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>

                                </div>

                                <div class="row">
                                    <?php // billing_state ?>
                                    <div class="form-group col-sm-4<?php echo form_error('billing_state') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('State/Province', 'billing_state', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo form_input(array('name'=>'billing_state', 'value'=>set_value('billing_state', (isset($user['billing_state']) ? $user['billing_state'] : '')), 'class'=>'form-control form-validate')); ?>
                                    </div>

                                    <?php // billing_country ?>
                                    <div class="form-group col-sm-6<?php echo form_error('billing_country') ? ' has-error' : ''; ?>">
                                        <?php echo form_label('Country', 'billing_country', array('class'=>'control-label')); ?>
                                        <span class="required">*</span>
                                        <?php echo country_dropdown('billing_country', 'billing_country', 'form-control', (isset($user['billing_country']) ? $user['billing_country'] : '') , array('AU','US','CA','GB'), ''); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false" aria-controls="collapseTwo">
                                    Delivery Address
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="row">
                                    <?php // delivery_street_address1 ?>
                                    <div class="form-group col-sm-5">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" checked id="copy_billing_address" value="1" aria-label="copy_billing_address">
                                                Use Billing Address
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="delivery-address-section">
                                    <div class="row">
                                        <?php // delivery_street_address1 ?>
                                        <div class="form-group col-sm-5<?php echo form_error('delivery_street_address1') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('Street Address 1', 'delivery_street_address1', array('class'=>'control-label')); ?>
                                            <span class="required">*</span>
                                            <?php echo form_input(array('name'=>'delivery_street_address1', 'value'=>set_value('delivery_street_address1', (isset($user['delivery_street_address1']) ? $user['delivery_street_address1'] : '')), 'class'=>'form-control form-validate')); ?>
                                        </div>
                                        <?php // delivery_street_address2 ?>
                                        <div class="form-group col-sm-5<?php echo form_error('delivery_street_address2') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('Street Address 2', 'delivery_street_address2', array('class'=>'control-label')); ?>
                                            <?php echo form_input(array('name'=>'delivery_street_address2', 'value'=>set_value('delivery_street_address2', (isset($user['delivery_street_address2']) ? $user['delivery_street_address2'] : '')), 'class'=>'form-control')); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php // delivery_suburb ?>
                                        <div class="form-group col-sm-6<?php echo form_error('delivery_suburb') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('Suburb/Town', 'delivery_suburb', array('class'=>'control-label')); ?>
                                            <span class="required">*</span>
                                            <?php echo form_input(array('name'=>'delivery_suburb', 'value'=>set_value('delivery_suburb', (isset($user['delivery_suburb']) ? $user['delivery_suburb'] : '')), 'class'=>'form-control form-validate')); ?>
                                        </div>
                                        <?php // delivery_postcode ?>
                                        <div class="form-group col-sm-4<?php echo form_error('delivery_postcode') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('Postcode', 'delivery_postcode', array('class'=>'control-label')); ?>
                                            <?php echo form_input(array('name'=>'delivery_postcode', 'value'=>set_value('delivery_postcode', (isset($user['delivery_postcode']) ? $user['delivery_postcode'] : '')), 'class'=>'form-control form-validate')); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php // delivery_state ?>
                                        <div class="form-group col-sm-4<?php echo form_error('delivery_state') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('State/Province', 'delivery_state', array('class'=>'control-label')); ?>
                                            <span class="required">*</span>
                                            <?php echo form_input(array('name'=>'delivery_state', 'value'=>set_value('delivery_state', (isset($user['delivery_state']) ? $user['delivery_state'] : '')), 'class'=>'form-control form-validate')); ?>
                                        </div>

                                        <?php // delivery_country ?>
                                        <div class="form-group col-sm-6<?php echo form_error('delivery_country') ? ' has-error' : ''; ?>">
                                            <?php echo form_label('Country', 'delivery_country', array('class'=>'control-label')); ?>
                                            <span class="required">*</span>
                                            <?php echo country_dropdown('delivery_country', 'delivery_country', 'form-control', (isset($user['delivery_country']) ? $user['delivery_country'] : '') , array('AU','US','CA','GB'), ''); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#" aria-expanded="false" aria-controls="collapseThree">
                                    Cart and Payment Type
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
 
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Reward</th>
                                            <th>Qty</th>
                                            <th style="text-align:right">Item Price</th>
                                            <th style="text-align:right">Sub-Total</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        <?php foreach ($cart as $items): ?>
                                            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                            <tr>
                                                <td>
                                                    <h4><?php echo $items['name']; ?></h4>
                                                    <p><?php echo  $items['project_reward']['teaser_text']?></p>
                                                    <a href="/project/<?php echo $items['project']['stub']; ?>"><?php echo $items['project']['title']; ?></a>
                                                </td>
                                                <td><?php echo $items['qty']; ?> </td>
                                                <td style="text-align:right">$<?php echo $this->cart->format_number($items['price']); ?></td>
                                                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                            </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="2"> </td>
                                            <td style="text-align:right"><strong>Total</strong></td>
                                            <td style="text-align:right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                        </tr>
                                    </table> 
                                </div>     

                               <a id="paypal-checkout-btn" class="checkout-btn" href="#"><img src="https://www.paypal-marketing.com/paypal/html/partner/na/portal-v2/img/hero_express_checkout_300x74.png" /></a>
                                &nbsp;
                               <a id="eway-checkout-btn" class="checkout-btn" href="#"><img src="https://www.paypal-marketing.com/paypal/html/partner/na/portal-v2/img/hero_express_checkout_300x74.png" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
            <div class="col-md-2"></div>
        </div>            
    </div>
    <?php echo form_close(); ?>
    <!-- end of pledge row -->

    <script type="text/javascript">
        $(document).ready(function() {
            $("#billing-address-section input").change(function() {
                if($("#copy_billing_address").is(":checked")) {
                    field_name = $(this).attr('name').replace('billing_','delivery_');
                    field_val = $(this).val();
                    $("#delivery-address-section input[name='"+field_name+"']").val(field_val);
                }
                validate_form();
            });

            $("#billing-address-section select").change(function() {
                if($("#copy_billing_address").is(":checked")) {
                    field_name = $(this).attr('name').replace('billing_','delivery_');
                    field_val = $(this).val();
                    $("#delivery-address-section select[name='"+field_name+"']").val(field_val);
                }
            });

            $("#details-section input").change(function() {
                validate_form();
            });

            $("#delivery-address-section input").change(function() {
                validate_form();
            });

            $("#copy_billing_address").change(function() {
                build_delivery_address();
            });
            
            build_delivery_address();

            $(".checkout-btn").click(function(){
                validate_form();
            })

        });

        function validate_form(){
            var error = 0;

            $("#details-section input.form-validate").each(function(){
                if($(this).val().length < 1){
                    $(this).parent().addClass("has-error");
                    error = 1;
                }
            })

            $("#billing-address-section input.form-validate").each(function(){
                console.log($(this).val());
                if($(this).val().length < 1){
                    $(this).parent().addClass("has-error");
                    error = 1;
                }
            })

            $("#delivery-address-section input.form-validate").each(function(){
                console.log($(this).val());
                if($(this).val().length < 1){
                    $(this).parent().addClass("has-error");
                    error = 1;
                }
            })
        }

        function build_delivery_address(){
            if($("#copy_billing_address").is(":checked")) {
                $("input[name='delivery_street_address1']").val($("input[name='billing_street_address1']").val());
                $("input[name='delivery_street_address2']").val($("input[name='billing_street_address2']").val());
                $("input[name='delivery_suburb']").val($("input[name='billing_suburb']").val());
                $("input[name='delivery_postcode']").val($("input[name='billing_postcode']").val());
                $("input[name='delivery_state']").val($("input[name='billing_state']").val());
                $("input[name='delivery_country']").val($("input[name='billing_country").val());
                $("#delivery-address-section input, #delivery-address-section select").attr("disabled","disabled");
            } else {
                $("#delivery-address-section input, #delivery-address-section select").removeAttr("disabled");                    
            }
        }

    </script>
<?php } else { ?>
    <div class="container-fluid checkout">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Rewards Shopping Bag</h1>
                <div id="add-alert" class="alert alert-warning" role="alert">
                    Whoa! You have no rewards in your shopping bag, better go back to the <a href="/">home page</a> and start adding some pledges for a project!
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>            
    </div>

<?php } ?>

    