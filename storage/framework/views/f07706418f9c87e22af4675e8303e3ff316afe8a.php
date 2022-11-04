

<?php $__env->startSection('content'); ?>
    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('1. My Cart')); ?></h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('2. Shipping info')); ?></h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('3. Delivery info')); ?></h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('4. Payment')); ?></h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('5. Confirmation')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <?php
                        $first_order = $combined_order->orders->first()
                    ?>
                    <div class="text-center py-4 mb-4">
                        <i class="la la-check-circle la-3x text-success mb-3"></i>
                        <h1 class="h3 mb-3 fw-600"><?php echo e(translate('Thank You for Your Order!')); ?></h1>
                        <p class="opacity-70 font-italic"><?php echo e(translate('A copy or your order summary has been sent to')); ?> <?php echo e(json_decode($first_order->shipping_address)->email); ?></p>
                    </div>
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Summary')); ?></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Order date')); ?>:</td>
                                        <td><?php echo e(date('d-m-Y H:i A', $first_order->date)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Name')); ?>:</td>
                                        <td><?php echo e(json_decode($first_order->shipping_address)->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Email')); ?>:</td>
                                        <td><?php echo e(json_decode($first_order->shipping_address)->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Shipping address')); ?>:</td>
                                        <td><?php echo e(json_decode($first_order->shipping_address)->address); ?>, <?php echo e(json_decode($first_order->shipping_address)->city); ?>, <?php echo e(json_decode($first_order->shipping_address)->country); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Order status')); ?>:</td>
                                        <td><?php echo e(translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status)))); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Total order amount')); ?>:</td>
                                        <td><?php echo e(single_price($combined_order->grand_total)); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Shipping')); ?>:</td>
                                        <td><?php echo e(translate('Flat shipping rate')); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600"><?php echo e(translate('Payment method')); ?>:</td>
                                        <td><?php echo e(translate(ucfirst(str_replace('_', ' ', $first_order->payment_type)))); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php $__currentLoopData = $combined_order->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <div class="text-center py-4 mb-4">
                                    <h2 class="h5"><?php echo e(translate('Order Code:')); ?> <span class="fw-700 text-primary"><?php echo e($order->code); ?></span></h2>
                                </div>
                                <div>
                                    <h5 class="fw-600 mb-3 fs-17 pb-2"><?php echo e(translate('Order Details')); ?></h5>
                                    <div>
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%"><?php echo e(translate('Product')); ?></th>
                                                    <th><?php echo e(translate('Variation')); ?></th>
                                                    <th><?php echo e(translate('Quantity')); ?></th>
                                                    <th><?php echo e(translate('Delivery Type')); ?></th>
                                                    <th class="text-right"><?php echo e(translate('Price')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td>
                                                            <?php if($orderDetail->product != null): ?>
                                                                <a href="<?php echo e(route('product', $orderDetail->product->slug)); ?>" target="_blank" class="text-reset">
                                                                    <?php echo e($orderDetail->product->getTranslation('name')); ?>

                                                                    <?php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    ?>
                                                                </a>
                                                            <?php else: ?>
                                                                <strong><?php echo e(translate('Product Unavailable')); ?></strong>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->variation); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e($orderDetail->quantity); ?>

                                                        </td>
                                                        <td>
                                                            <?php if($order->shipping_type != null && $order->shipping_type == 'home_delivery'): ?>
                                                                <?php echo e(translate('Home Delivery')); ?>

                                                            <?php elseif($order->shipping_type == 'pickup_point'): ?>
                                                                <?php if($order->pickup_point != null): ?>
                                                                    <?php echo e($order->pickup_point->getTranslation('name')); ?> (<?php echo e(translate('Pickip Point')); ?>)
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-right"><?php echo e(single_price($orderDetail->price)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-5 col-md-6 ml-auto mr-0">
                                            <table class="table ">
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo e(translate('Subtotal')); ?></th>
                                                        <td class="text-right">
                                                            <span class="fw-600"><?php echo e(single_price($order->orderDetails->sum('price'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Shipping')); ?></th>
                                                        <td class="text-right">
                                                            <span class="font-italic"><?php echo e(single_price($order->orderDetails->sum('shipping_cost'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Tax')); ?></th>
                                                        <td class="text-right">
                                                            <span class="font-italic"><?php echo e(single_price($order->orderDetails->sum('tax'))); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><?php echo e(translate('Coupon Discount')); ?></th>
                                                        <td class="text-right">
                                                            <span class="font-italic"><?php echo e(single_price($order->coupon_discount)); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th><span class="fw-600"><?php echo e(translate('Total')); ?></span></th>
                                                        <td class="text-right">
                                                            <strong><span><?php echo e(single_price($order->grand_total)); ?></span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/order_confirmed.blade.php ENDPATH**/ ?>