<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid general-content-container" >
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php echo form_open('', array('role'=>'form')); ?>
                <h1>Forgot your password?</h1>
                <div class="row">
                    <?php // email ?>
                    <div class="form-group col-sm-6<?php echo form_error('email') ? ' has-error' : ''; ?>">
                        <?php echo form_label(lang('users input email'), 'email', array('class'=>'control-label')); ?>
                        <span class="required">*</span>
                        <?php echo form_input(array('name'=>'email', 'value'=>set_value('email', (isset($user['email']) ? $user['email'] : '')), 'class'=>'form-control', 'type'=>'email')); ?>
                    </div>
                </div>

                <?php // buttons ?>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <a class="btn btn-default" href="<?php echo $cancel_url; ?>"><?php echo lang('core button cancel'); ?></a>
                        <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?php echo lang('users button reset_password'); ?></button>
                    </div>
                </div>

            <?php echo form_close(); ?>
        </div>
        <div class="col-md-2"></div>
    </div>        
</div> 