<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- beginning of pledge row -->


<?php

//    print_r($user);
//    die;

?>
    <div class="container-fluid checkout">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php if($payment_success){ ?>
                    <h1>Payment - Success</h1>
                    <p>Payment was successful, thanks for supporting CG projects through CG Starter. Delivery time for your reward will vary from project to project 
                        but project Team Leaders are encouraged to keep you up-to-date with how their project is travelling so expect to hear from them soon.</p>
                    <p>For your records we have sent an email with this transaction to your email address. Your Order Reference is:</p>
                    <h2><?php echo $this->session->order_ref ?></h2>
                    <p>From everyone here at CGStarter we thank you for supporting the CG community.</p>

                    <p><em>cheers,<br />
                        The CGStarter Team</em></p>
                <?php
                    } else {
                ?>
                    <h1>Payment - Failed</h1>
                    <div id="add-alert" class="alert alert-danger" role="alert">
                        Error - Sorry but there seems to be an issue with your credit card. We suggest contacting your bank to see if there is something they can do at their end.
                    </div>
                    <p>If you think there was a typo with your card details, why not <a href="/checkout/">go back and try again</a></p>
                <?php
                    } 
                ?>
            </div>
            <div class="col-md-2"></div>
        </div>            
    </div>

    