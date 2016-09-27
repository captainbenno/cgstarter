<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-6 text-left">
                <h3 class="panel-title">Orders</h3>
            </div>
            <!--div class="col-md-6 text-right">
                <a class="btn btn-success tooltips" href="<?php echo base_url('admin/users/add'); ?>" title="<?php echo lang('users tooltip add_new_user') ?>" data-toggle="tooltip"><span class="glyphicon glyphicon-plus-sign"></span> <?php echo lang('users button add_new_user'); ?></a>
            </div -->
        </div>
    </div>

    <table class="table table-striped table-hover-warning">
        <thead>

            <?php // sortable headers ?>
            <tr>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=order_ref&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>">Order Ref</a>
                    <?php if ($sort == 'order_ref') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=payment_gateway&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>">Gateway</a>
                    <?php if ($sort == 'payment_gateway') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=payment_auth_code&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>">Payment Auth</a>
                    <?php if ($sort == 'payment_auth_code') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=email_address&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>">Customer Email</a>
                    <?php if ($sort == 'email_address') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=status&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>"><?php echo lang('admin col status'); ?></a>
                    <?php if ($sort == 'status') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo current_url(); ?>?sort=create_date&dir=<?php echo (($dir == 'asc' ) ? 'desc' : 'asc'); ?>&limit=<?php echo $limit; ?>&offset=<?php echo $offset; ?><?php echo $filter; ?>">Order Date</a>
                    <?php if ($sort == 'create_date') : ?><span class="glyphicon glyphicon-arrow-<?php echo (($dir == 'asc') ? 'up' : 'down'); ?>"></span><?php endif; ?>
                </td>
                <td class="pull-right">
                    <?php echo lang('admin col actions'); ?>
                </td>
            </tr>

            <?php // search filters ?>
            <tr>
                <?php echo form_open("{$this_url}?sort={$sort}&dir={$dir}&limit={$limit}&offset=0{$filter}", array('role'=>'form', 'id'=>"filters")); ?>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th<?php echo ((isset($filters['email_address'])) ? ' class="has-success"' : ''); ?>>
                        <?php echo form_input(array('name'=>'email_address', 'id'=>'email_address', 'class'=>'form-control input-sm', 'email address', 'value'=>set_value('username', ((isset($filters['username'])) ? $filters['username'] : '')))); ?>
                    </th>
                    <th>
                    </th>
                    <th colspan="3">
                        <div class="text-right">
                            <a href="<?php echo $this_url; ?>" class="btn btn-danger tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter_reset'); ?>"><span class="glyphicon glyphicon-refresh"></span> <?php echo lang('core button reset'); ?></a>
                            <button type="submit" name="submit" value="<?php echo lang('core button filter'); ?>" class="btn btn-success tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip filter'); ?>"><span class="glyphicon glyphicon-filter"></span> <?php echo lang('core button filter'); ?></button>
                        </div>
                    </th>
                <?php echo form_close(); ?>
            </tr>

        </thead>
        <tbody>

            <?php // data rows ?>
            <?php if ($total) : ?>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td<?php echo (($sort == 'order_ref') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['order_ref']; ?>
                        </td>
                        <td<?php echo (($sort == 'payment_gateway') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['payment_gateway']; ?>
                        </td>
                        <td<?php echo (($sort == 'payment_auth_code') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['payment_auth_code']; ?>
                        </td>
                        <td<?php echo (($sort == 'email_address') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['email_address']; ?>
                        </td>
                        <td<?php echo (($sort == 'order_status') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['order_status']; ?>
                        </td>
                        <td<?php echo (($sort == 'create_date') ? ' class="sorted"' : ''); ?>>
                            <?php echo $order['create_date']; ?>
                        </td>
                        <td>
                            <div class="text-right">
                                <div class="btn-group">
                                    <?php if ($order['order_id'] > 1) : ?>
                                        <a href="#modal-<?php echo $order['order_id']; ?>" data-toggle="modal" class="btn btn-danger" title="<?php echo lang('admin button delete'); ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    <?php endif; ?>
                                    <a href="<?php echo $this_url; ?>/edit/<?php echo $order['order_id']; ?>" class="btn btn-warning" title="<?php echo lang('admin button edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                        $this->load->model('orders_model');
                        $cart = $this->orders_model->order_by_ref($order['order_ref']);

                    ?>
                    <tr>
                        <td colspan="7">
                            <table class="table table-striped" border="1">
                                <tr>
                                    <th>Reward</th>
                                    <th>Qty</th>
                                    <th style="text-align:right">Item Price</th>
                                    <th style="text-align:right">Sub-Total</th>
                                </tr>
                                <?php
                                $i = 1;
                                $shipping = 0;
                                $items = $cart['items'];
                                $total = 0;

                               foreach ($items as $item){

                                   $item['shipping'] = 15;

                                   $shipping = $shipping +($item['shipping']*$item['qty']);

                                    echo '<tr>
                                        <td>
                                            <h4>'.$item['reward_title'].'</h4>
                                            '.$item['project_title'].'
                                        </td>
                                        <td>'.$item['qty'].'</td>
                                       <td style="text-align:right">$'.$this->cart->format_number($item['reward_cost']);

                                     if($item['shipping']>0){
                                          echo '<br />
                                            <span class="small">(inc $'.$this->cart->format_number($item['shipping']).'shipping)</span></td>';
                                     }
                                     echo '<td style="text-align:right">$'.$this->cart->format_number($item['reward_cost']*$item['qty']).'</td>
                                    </tr>';
                                   $total = $total + ($item['reward_cost']*$item['qty']);
                               }
                                ?>
                                <tr>
                                    <td colspan="2"> </td>
                                    <td style="text-align:right"><strong>Total</strong></td>
                                    <td style="text-align:right">$<?php echo $this->cart->format_number($total) ?></td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7">
                        <?php echo lang('core error no_results'); ?>
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>

    <?php // list tools ?>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-2 text-left">
                <label><?php echo sprintf(lang('admin label rows'), $total); ?></label>
            </div>
            <div class="col-md-2 text-left">
                <?php if ($total > 10) : ?>
                    <select id="limit" class="form-control">
                        <option value="10"<?php echo ($limit == 10 OR ($limit != 10 && $limit != 25 && $limit != 50 && $limit != 75 && $limit != 100)) ? ' selected' : ''; ?>>10 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="25"<?php echo ($limit == 25) ? ' selected' : ''; ?>>25 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="50"<?php echo ($limit == 50) ? ' selected' : ''; ?>>50 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="75"<?php echo ($limit == 75) ? ' selected' : ''; ?>>75 <?php echo lang('admin input items_per_page'); ?></option>
                        <option value="100"<?php echo ($limit == 100) ? ' selected' : ''; ?>>100 <?php echo lang('admin input items_per_page'); ?></option>
                    </select>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php echo $pagination; ?>
            </div>
            <div class="col-md-2 text-right">
                <?php if ($total) : ?>
                    <a href="<?php echo $this_url; ?>/export?sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?><?php echo $filter; ?>" class="btn btn-success tooltips" data-toggle="tooltip" title="<?php echo lang('admin tooltip csv_export'); ?>"><span class="glyphicon glyphicon-export"></span> <?php echo lang('admin button csv_export'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>

<?php // delete modal ?>
<?php if ($total) : ?>
    <?php foreach ($orders as $order) : ?>
        <div class="modal fade" id="modal-<?php echo $order['order_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-label-<?php echo $order['order_id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 id="modal-label-<?php echo $order['order_id']; ?>"><?php echo lang('users title user_delete');  ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo sprintf(lang('users msg delete_confirm'), $order['first_name'] . " " . $order['last_name']); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('core button cancel'); ?></button>
                        <button type="button" class="btn btn-primary btn-delete-user" data-id="<?php echo $order['order_id']; ?>"><?php echo lang('admin button delete'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
