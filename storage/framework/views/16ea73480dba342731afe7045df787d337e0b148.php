

<?php $__env->startSection('content'); ?>

<section class="pt-5 mb-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="row aiz-steps arrow-divider">
                    <div class="col done">
                        <div class="text-center text-success">
                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block "><?php echo e(translate('1. My Cart')); ?></h3>
                        </div>
                    </div>
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-map"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block "><?php echo e(translate('2. Shipping info')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 "><?php echo e(translate('3. Delivery info')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 "><?php echo e(translate('4. Payment')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50 "><?php echo e(translate('5. Confirmation')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-4 gry-bg">
    <div class="container">
        <div class="row cols-xs-space cols-sm-space cols-md-space">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <form class="form-default" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php if(Auth::check()): ?>
                        <div class="shadow-sm bg-white p-4 rounded mb-4">
                            <div class="row gutters-5">
                                <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 mb-3">
                                        <label class="aiz-megabox d-block bg-white mb-0">
                                            <input type="radio" name="address_id" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?>
                                                checked
                                            <?php endif; ?> required>
                                            <span class="d-flex p-3 aiz-megabox-elem">
                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                <span class="flex-grow-1 pl-3 text-left">
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('Address')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e($address->address); ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('Postal Code')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e($address->postal_code); ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('City')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e(optional($address->city)->name); ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('State')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e(optional($address->state)->name); ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('Country')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e(optional($address->country)->name); ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="opacity-60"><?php echo e(translate('Phone')); ?>:</span>
                                                        <span class="fw-600 ml-2"><?php echo e($address->phone); ?></span>
                                                    </div>
                                                </span>
                                            </span>
                                        </label>
                                        <div class="dropdown position-absolute right-0 top-0">
                                            <button class="btn bg-gray px-2" type="button" data-toggle="dropdown">
                                                <i class="la la-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" onclick="edit_address('<?php echo e($address->id); ?>')">
                                                    <?php echo e(translate('Edit')); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="checkout_type" value="logged">
                                <div class="col-md-6 mx-auto mb-3" >
                                    <div class="border p-3 rounded mb-3 c-pointer text-center bg-white h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                        <i class="las la-plus la-2x mb-3"></i>
                                        <div class="alpha-7"><?php echo e(translate('Add New Address')); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                            <a href="<?php echo e(route('home')); ?>" class="btn btn-link">
                                <i class="las la-arrow-left"></i>
                                <?php echo e(translate('Return to shop')); ?>

                            </a>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <button type="submit" class="btn btn-primary fw-600"><?php echo e(translate('Continue to Delivery Info')); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('frontend.partials.address_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/shipping_info.blade.php ENDPATH**/ ?>