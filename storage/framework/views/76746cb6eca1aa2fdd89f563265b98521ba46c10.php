

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
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-truck"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('3. Delivery info')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50"><?php echo e(translate('4. Payment')); ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50"><?php echo e(translate('5. Confirmation')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 gry-bg">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <form class="form-default" action="<?php echo e(route('checkout.store_delivery_info')); ?>" role="form" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php
                        $admin_products = array();
                        $seller_products = array();
                        foreach ($carts as $key => $cartItem){
                            $product = \App\Models\Product::find($cartItem['product_id']);

                            if($product->added_by == 'admin'){
                                array_push($admin_products, $cartItem['product_id']);
                            }
                            else{
                                $product_ids = array();
                                if(isset($seller_products[$product->user_id])){
                                    $product_ids = $seller_products[$product->user_id];
                                }
                                array_push($product_ids, $cartItem['product_id']);
                                $seller_products[$product->user_id] = $product_ids;
                            }
                        }
						
						$pickup_point_list = array();
						if (get_setting('pickup_point') == 1) {
							$pickup_point_list = \App\Models\PickupPoint::where('pick_up_status',1)->get();
						}
                    ?>

                    <?php if(!empty($admin_products)): ?>
                    <div class="card mb-3 shadow-sm border-0 rounded">
                        <div class="card-header p-3">
                            <h5 class="fs-16 fw-600 mb-0"><?php echo e(get_setting('site_name')); ?> <?php echo e(translate('Products')); ?></h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $admin_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = \App\Models\Product::find($cartItem);
                                ?>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <span class="mr-2">
                                            <img
                                                src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                class="img-fit size-60px rounded"
                                                alt="<?php echo e($product->getTranslation('name')); ?>"
                                            >
                                        </span>
                                        <span class="fs-14 opacity-60"><?php echo e($product->getTranslation('name')); ?></span>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            
                            <div class="row border-top pt-3">
                                <div class="col-md-6">
                                    <h6 class="fs-15 fw-600"><?php echo e(translate('Choose Delivery Type')); ?></h6>
                                </div>
                                <div class="col-md-6">
                                    <div class="row gutters-5">
                                        <div class="col-6">
                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                <input
                                                    type="radio"
                                                    name="shipping_type_<?php echo e(\App\Models\User::where('user_type', 'admin')->first()->id); ?>"
                                                    value="home_delivery"
                                                    onchange="show_pickup_point(this)"
                                                    data-target=".pickup_point_id_admin"
                                                    checked
                                                >
                                                <span class="d-flex p-3 aiz-megabox-elem">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Home Delivery')); ?></span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php if($pickup_point_list): ?>
                                        <div class="col-6">
                                            <label class="aiz-megabox d-block bg-white mb-0">
                                                <input
                                                    type="radio"
                                                    name="shipping_type_<?php echo e(\App\Models\User::where('user_type', 'admin')->first()->id); ?>"
                                                    value="pickup_point"
                                                    onchange="show_pickup_point(this)"
                                                    data-target=".pickup_point_id_admin"
                                                >
                                                <span class="d-flex p-3 aiz-megabox-elem">
                                                    <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                    <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Local Pickup')); ?></span>
                                                </span>
                                            </label>
                                        </div>
                                        <?php endif; ?>
                                    </div>
									<?php if($pickup_point_list): ?>
                                    <div class="mt-4 pickup_point_id_admin d-none">
                                        <select
                                            class="form-control aiz-selectpicker"
                                            name="pickup_point_id_<?php echo e(\App\Models\User::where('user_type', 'admin')->first()->id); ?>"
                                            data-live-search="true"
                                        >
                                                <option><?php echo e(translate('Select your nearest pickup point')); ?></option>
                                            <?php $__currentLoopData = $pickup_point_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($pick_up_point->id); ?>"
                                                    data-content="<span class='d-block'>
                                                                    <span class='d-block fs-16 fw-600 mb-2'><?php echo e($pick_up_point->getTranslation('name')); ?></span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> <?php echo e($pick_up_point->getTranslation('address')); ?></span>
                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i><?php echo e($pick_up_point->phone); ?></span>
                                                                </span>"
                                                >
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
									<?php endif; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($seller_products)): ?>
                        <?php $__currentLoopData = $seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-3 shadow-sm border-0 rounded">
                                <div class="card-header p-3">
                                    <h5 class="fs-16 fw-600 mb-0"><?php echo e(\App\Models\Shop::where('user_id', $key)->first()->name); ?> <?php echo e(translate('Products')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <?php $__currentLoopData = $seller_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product = \App\Models\Product::find($cartItem);
                                        ?>
                                        <li class="list-group-item">
                                            <div class="d-flex">
                                                <span class="mr-2">
                                                    <img
                                                        src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                        class="img-fit size-60px rounded"
                                                        alt="<?php echo e($product->getTranslation('name')); ?>"
                                                    >
                                                </span>
                                                <span class="fs-14 opacity-60"><?php echo e($product->getTranslation('name')); ?></span>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    
                                    <div class="row border-top pt-3">
                                        <div class="col-md-6">
                                            <h6 class="fs-15 fw-600"><?php echo e(translate('Choose Delivery Type')); ?></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row gutters-5">
                                                <div class="col-6">
                                                    <label class="aiz-megabox d-block bg-white mb-0">
                                                        <input
                                                            type="radio"
                                                            name="shipping_type_<?php echo e($key); ?>"
                                                            value="home_delivery"
                                                            onchange="show_pickup_point(this)"
                                                            data-target=".pickup_point_id_<?php echo e($key); ?>"
                                                            checked
                                                        >
                                                        <span class="d-flex p-3 aiz-megabox-elem">
                                                            <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                            <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Home Delivery')); ?></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <?php if($pickup_point_list): ?>
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_<?php echo e($key); ?>"
                                                                value="pickup_point"
                                                                onchange="show_pickup_point(this)"
                                                                data-target=".pickup_point_id_<?php echo e($key); ?>"
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Local Pickup')); ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if($pickup_point_list): ?>
                                                <div class="mt-4 pickup_point_id_<?php echo e($key); ?> d-none">
                                                    <select
                                                        class="form-control aiz-selectpicker"
                                                        name="pickup_point_id_<?php echo e($key); ?>"
                                                        data-live-search="true"
                                                    >
                                                        <option><?php echo e(translate('Select your nearest pickup point')); ?></option>
                                                            <?php $__currentLoopData = $pickup_point_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option
                                                                value="<?php echo e($pick_up_point->id); ?>"
                                                                data-content="<span class='d-block'>
                                                                                <span class='d-block fs-16 fw-600 mb-2'><?php echo e($pick_up_point->getTranslation('name')); ?></span>
                                                                                <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> <?php echo e($pick_up_point->getTranslation('address')); ?></span>
                                                                                <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i><?php echo e($pick_up_point->phone); ?></span>
                                                                            </span>"
                                                            >
                                                            </option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="pt-4 d-flex justify-content-between align-items-center">
                        <a href="<?php echo e(route('home')); ?>" >
                            <i class="la la-angle-left"></i>
                            <?php echo e(translate('Return to shop')); ?>

                        </a>
                        <button type="submit" class="btn fw-600 btn-primary"><?php echo e(translate('Continue to Payment')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el) {
        	var value = $(el).val();
        	var target = $(el).data('target');

            // console.log(value);

        	if(value == 'home_delivery'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
        	}else{
        		$(target).removeClass('d-none');
        	}
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/delivery_info.blade.php ENDPATH**/ ?>