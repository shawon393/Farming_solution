<div class="card border-0 shadow-sm rounded">
    <div class="card-header">
        <h3 class="fs-16 fw-600 mb-0"><?php echo e(translate('Summary')); ?></h3>
        <div class="text-right">
            <span class="badge badge-inline badge-primary">
                <?php echo e(count($carts)); ?> 
                <?php echo e(translate('Items')); ?>

            </span>
        </div>
    </div>

    <div class="card-body">
        <?php if(addon_is_activated('club_point')): ?>
            <?php
                $total_point = 0;
            ?>
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $product = \App\Models\Product::find($cartItem['product_id']);
                    $total_point += $product->earn_point * $cartItem['quantity'];
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <div class="rounded px-2 mb-2 bg-soft-primary border-soft-primary border">
                <?php echo e(translate("Total Club point")); ?>:
                <span class="fw-700 float-right"><?php echo e($total_point); ?></span>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th class="product-name"><?php echo e(translate('Product')); ?></th>
                    <th class="product-total text-right"><?php echo e(translate('Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $subtotal = 0;
                    $tax = 0;
                    $shipping = 0;
                    $product_shipping_cost = 0;
                    $shipping_region = $shipping_info['city'];
                ?>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = \App\Models\Product::find($cartItem['product_id']);
                        $subtotal += $cartItem['price'] * $cartItem['quantity'];
                        $tax += $cartItem['tax'] * $cartItem['quantity'];
                        $product_shipping_cost = $cartItem['shipping_cost'];
                        
                        $shipping += $product_shipping_cost;
                        
                        $product_name_with_choice = $product->getTranslation('name');
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variant'];
                        }
                    ?>
                    <tr class="cart_item">
                        <td class="product-name">
                            <?php echo e($product_name_with_choice); ?>

                            <strong class="product-quantity">
                                × <?php echo e($cartItem['quantity']); ?>

                            </strong>
                        </td>
                        <td class="product-total text-right">
                            <span class="pl-4 pr-0"><?php echo e(single_price($cartItem['price']*$cartItem['quantity'])); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <table class="table">

            <tfoot>
                <tr class="cart-subtotal">
                    <th><?php echo e(translate('Subtotal')); ?></th>
                    <td class="text-right">
                        <span class="fw-600"><?php echo e(single_price($subtotal)); ?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th><?php echo e(translate('Tax')); ?></th>
                    <td class="text-right">
                        <span class="font-italic"><?php echo e(single_price($tax)); ?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th><?php echo e(translate('Total Shipping')); ?></th>
                    <td class="text-right">
                        <span class="font-italic"><?php echo e(single_price($shipping)); ?></span>
                    </td>
                </tr>

                <?php if(Session::has('club_point')): ?>
                    <tr class="cart-shipping">
                        <th><?php echo e(translate('Redeem point')); ?></th>
                        <td class="text-right">
                            <span class="font-italic"><?php echo e(single_price(Session::get('club_point'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if($carts->sum('discount') > 0): ?>
                    <tr class="cart-shipping">
                        <th><?php echo e(translate('Coupon Discount')); ?></th>
                        <td class="text-right">
                            <span class="font-italic"><?php echo e(single_price($carts->sum('discount'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php
                    $total = $subtotal+$tax+$shipping;
                    if(Session::has('club_point')) {
                        $total -= Session::get('club_point');
                    }
                    if ($carts->sum('discount') > 0){
                        $total -= $carts->sum('discount');
                    }
                ?>

                <tr class="cart-total">
                    <th><span class="strong-600"><?php echo e(translate('Total')); ?></span></th>
                    <td class="text-right">
                        <strong><span><?php echo e(single_price($total)); ?></span></strong>
                    </td>
                </tr>
            </tfoot>
        </table>

        <?php if(addon_is_activated('club_point')): ?>
            <?php if(Session::has('club_point')): ?>
                <div class="mt-3">
                    <form class="" action="<?php echo e(route('checkout.remove_club_point')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <div class="form-control"><?php echo e(Session::get('club_point')); ?></div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><?php echo e(translate('Remove Redeem Point')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                
            <?php endif; ?>
        <?php endif; ?>

        <?php if(Auth::check() && get_setting('coupon_system') == 1): ?>
            <?php if($carts[0]['discount'] > 0): ?>
                <div class="mt-3">
                    <form class="" id="remove-coupon-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="owner_id" value="<?php echo e($carts[0]['owner_id']); ?>">
                        <div class="input-group">
                            <div class="form-control"><?php echo e($carts[0]['coupon_code']); ?></div>
                            <div class="input-group-append">
                                <button type="button" id="coupon-remove" class="btn btn-primary"><?php echo e(translate('Change Coupon')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="mt-3">
                    <form class="" id="apply-coupon-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="owner_id" value="<?php echo e($carts[0]['owner_id']); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" name="code" onkeydown="return event.key != 'Enter';" placeholder="<?php echo e(translate('Have coupon code? Enter here')); ?>" required>
                            <div class="input-group-append">
                                <button type="button" id="coupon-apply" class="btn btn-primary"><?php echo e(translate('Apply')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/partials/cart_summary.blade.php ENDPATH**/ ?>