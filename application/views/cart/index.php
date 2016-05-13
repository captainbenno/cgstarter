<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- beginning of pledge row -->

<?php if($this->cart->total_items()>0){

    $attributes = array('id' => 'cart-form');
    echo form_open('/cart', $attributes); ?>

    <div class="container-fluid checkout">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Rewards Shopping Bag</h1>
                <?php if($add_cart_alert==1){ ?>
                    <div id="add-alert" class="alert alert-success" role="alert">
                        Success - Pledge added to cart.
                    </div>
                <?php } ?>

                <?php if($remove_cart_alert==1){ ?>
                    <div id="add-alert" class="alert alert-info" role="alert">
                        Success - Item removed from cart.
                    </div>
                <?php } ?>

                <?php if($update_cart_alert==1){ ?>
                    <div id="add-alert" class="alert alert-info" role="alert">
                        Success - Cart updated.
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Reward</th>
                            <th></th>
                            <th>Qty</th>
                            <th>Del</th>
                            <th style="text-align:right">Item Price</th>
                            <th style="text-align:right">Sub-Total</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($cart as $items): ?>
                            <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                            <tr>
                                <td>
                                    <img width="100" src="<?php echo  $items['project_reward']['teaser_image']?>" />
                                </td>
                                <td>
                                    <h4><?php echo $items['name']; ?></h4>
                                    <p><?php echo  $items['project_reward']['teaser_text']?></p>
                                    <a href="/project/<?php echo $items['project']['stub']; ?>"><?php echo $items['project']['title']; ?></a>
                                </td>
                                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?> </td>
                                <td>
                                    <a href="/cart/remove_product/<?php echo $items['id'] ?>" class="del-btn">
                                      <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                </td>
                                <td style="text-align:right">$<?php echo $this->cart->format_number($items['price']); ?></td>
                                <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"> </td>
                            <td style="text-align:right"><strong>Total</strong></td>
                            <td style="text-align:right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                        </tr>
                    </table>                
                    <a role="button" href="#" id="refresh-btn" class="btn cart-btn btn-default pull-right">
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                        Update Cart</a>
                </div>
                <hr />
                <a role="button" href="/checkout" class="btn cart-btn btn-success pull-right btn-lg">Proceed To Checkout <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                <p>You will be abe to select your shipping and payment options once you proceed to the checkout.</p>
            </div>
            <div class="col-md-2"></div>
        </div>            
    </div>
    <?php echo form_close(); ?>
    <!-- end of pledge row -->

    <script type="text/javascript">
        $(document).ready(function() {
            $("#add-alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#add-alert").alert('close');
            });

            $("#refresh-btn").click(function(){
                $("#cart-form").submit();
                return false;
            });
        });
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

    