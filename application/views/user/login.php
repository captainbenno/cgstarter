<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid general-content-container" >
    <div class="row">
        <div class="col-md-2"></div>
        <?php if($this->session->userdata('redirect')=='/checkout'){ ?>
            <div class="col-md-4">
                <h1>Checkout</h1>
                <h3>Continue to checkout as a guest</h3>
                <a role="button" href="/checkout/guest" class="btn cart-btn btn-success btn-lg">Checkout as a Guest <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
            </div>
            <div class="col-md-4">
                <h1>&nbsp;</h1>
                <h3><strong>or</strong> Checkout using your CGStarter account</h3>
        <? } else { ?>
            <div class="col-md-8">
                <h1>CGStarter Login</h1>
        <?php } ?>
 
            <?php if ($ok_to_login) : ?>

                <?php echo form_open('', array('class'=>'form-signin')); ?>
                    <?php echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'form-control', 'placeholder'=>lang('users input username_email'), 'maxlength'=>256)); ?>
                    <?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>lang('users input password'), 'maxlength'=>72, 'autocomplete'=>'off')); ?>
                    <?php if( $this->session->userdata('redirect')=='/checkout'){ ?> 
                        <button class="btn cart-btn btn-success btn-lg">Checkout with Account <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
                    <?php } else { ?>
                        <?php echo form_submit(array('name'=>'submit', 'class'=>'btn btn-lg btn-success btn-block'), lang('core button login')); ?>
                    <?php } ?>
                    <p><br /><a href="<?php echo base_url('user/forgot'); ?>"><?php echo lang('users link forgot_password'); ?></a></p>
                    <p><a href="<?php echo base_url('user/register'); ?>"><?php echo lang('users link register_account'); ?></a></p>
                <?php echo form_close(); ?>

            <?php else : ?>

                <div class="alert alert-danger clearfix" role="alert">
                    <div class="col-md-9">
                        <?php echo sprintf(lang('users error too_many_login_attempts'), $this->config->item('login_max_time')); ?>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="<?php echo base_url('login'); ?>" class="btn btn-danger"><?php echo lang('users button login_try_again'); ?></a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
        <div class="col-md-2"></div>
    </div>        
</div> 