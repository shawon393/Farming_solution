

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
                    <div class="col active">
                        <div class="text-center text-primary">
                            <i class="la-3x mb-2 las la-credit-card"></i>
                            <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('4. Payment')); ?></h3>
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
<section class="mb-4">
    <div class="container text-left">
        <div class="row">
            <div class="col-lg-8">
                <form action="<?php echo e(route('payment.checkout')); ?>" class="form-default" role="form" method="POST" id="checkout-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="owner_id" value="<?php echo e($carts[0]['owner_id']); ?>">

                    <div class="card shadow-sm border-0 rounded">
                        <div class="card-header p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                <?php echo e(translate('Select a payment option')); ?>

                            </h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-10 mx-auto">
                                    <div class="row gutters-10">
                                        <?php if(get_setting('paypal_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="paypal" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/paypal.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Paypal')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('stripe_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="stripe" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/stripe.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Stripe')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('mercadopago_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="mercadopago" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/mercadopago.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Mercadopago')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('sslcommerz_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="sslcommerz" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/sslcommerz.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('sslcommerz')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('instamojo_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="instamojo" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/instamojo.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Instamojo')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('razorpay') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="razorpay" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/rozarpay.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Razorpay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('paystack') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="paystack" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/paystack.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Paystack')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('voguepay') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="voguepay" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/vogue.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('VoguePay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('payhere') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="payhere" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/payhere.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('payhere')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('ngenius') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="ngenius" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/ngenius.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('ngenius')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('iyzico') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="iyzico" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/iyzico.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Iyzico')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('nagad') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="nagad" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/nagad.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Nagad')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('bkash') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="bkash" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/bkash.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Bkash')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('aamarpay') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="aamarpay" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/aamarpay.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Aamarpay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('authorizenet') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="authorizenet" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/authorizenet.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Authorize Net')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('payku') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="payku" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/payku.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Payku')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(addon_is_activated('african_pg')): ?>
                                            <?php if(get_setting('mpesa') == 1): ?>
                                                <div class="col-6 col-md-4">
                                                    <label class="aiz-megabox d-block mb-3">
                                                        <input value="mpesa" class="online_payment" type="radio" name="payment_option" checked>
                                                        <span class="d-block p-3 aiz-megabox-elem">
                                                            <img src="<?php echo e(static_asset('assets/img/cards/mpesa.png')); ?>" class="img-fluid mb-2">
                                                            <span class="d-block text-center">
                                                                <span class="d-block fw-600 fs-15"><?php echo e(translate('mpesa')); ?></span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(get_setting('flutterwave') == 1): ?>
                                                <div class="col-6 col-md-4">
                                                    <label class="aiz-megabox d-block mb-3">
                                                        <input value="flutterwave" class="online_payment" type="radio" name="payment_option" checked>
                                                        <span class="d-block p-3 aiz-megabox-elem">
                                                            <img src="<?php echo e(static_asset('assets/img/cards/flutterwave.png')); ?>" class="img-fluid mb-2">
                                                            <span class="d-block text-center">
                                                                <span class="d-block fw-600 fs-15"><?php echo e(translate('flutterwave')); ?></span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(get_setting('payfast') == 1): ?>
                                                <div class="col-6 col-md-4">
                                                    <label class="aiz-megabox d-block mb-3">
                                                        <input value="payfast" class="online_payment" type="radio" name="payment_option" checked>
                                                        <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/payfast.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('payfast')); ?></span>
                                                        </span>
                                                    </span>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(get_setting('paytm_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="paytm" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/paytm.jpg')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('Paytm')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('toyyibpay_payment') == 1): ?>
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="toyyibpay" class="online_payment" type="radio" name="payment_option" checked>
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15"><?php echo e(translate('ToyyibPay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('cash_payment') == 1): ?>
                                            <?php
                                                $digital = 0;
                                                $cod_on = 1;
                                                foreach($carts as $cartItem){
                                                    $product = \App\Models\Product::find($cartItem['product_id']);
                                                    if($product['digital'] == 1){
                                                        $digital = 1;
                                                    }
                                                    if($product['cash_on_delivery'] == 0){
                                                        $cod_on = 0;
                                                    }
                                                }
                                            ?>
                                            <?php if($digital != 1 && $cod_on == 1): ?>
                                                <div class="col-6 col-md-4">
                                                    <label class="aiz-megabox d-block mb-3">
                                                        <input value="cash_on_delivery" class="online_payment" type="radio" name="payment_option" checked>
                                                        <span class="d-block p-3 aiz-megabox-elem">
                                                            <img src="<?php echo e(static_asset('assets/img/cards/cod.png')); ?>" class="img-fluid mb-2">
                                                            <span class="d-block text-center">
                                                                <span class="d-block fw-600 fs-15"><?php echo e(translate('Cash on Delivery')); ?></span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Auth::check()): ?>
                                            <?php if(addon_is_activated('offline_payment')): ?>
                                                <?php $__currentLoopData = \App\Models\ManualPaymentMethod::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-6 col-md-4">
                                                        <label class="aiz-megabox d-block mb-3">
                                                            <input value="<?php echo e($method->heading); ?>" type="radio" name="payment_option" onchange="toggleManualPaymentData(<?php echo e($method->id); ?>)" data-id="<?php echo e($method->id); ?>" checked>
                                                            <span class="d-block p-3 aiz-megabox-elem">
                                                                <img src="<?php echo e(uploaded_asset($method->photo)); ?>" class="img-fluid mb-2">
                                                                <span class="d-block text-center">
                                                                    <span class="d-block fw-600 fs-15"><?php echo e($method->heading); ?></span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__currentLoopData = \App\Models\ManualPaymentMethod::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div id="manual_payment_info_<?php echo e($method->id); ?>" class="d-none">
                                                        <?php echo $method->description ?>
                                                        <?php if($method->bank_info != null): ?>
                                                            <ul>
                                                                <?php $__currentLoopData = json_decode($method->bank_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e(translate('Bank Name')); ?> - <?php echo e($info->bank_name); ?>, <?php echo e(translate('Account Name')); ?> - <?php echo e($info->account_name); ?>, <?php echo e(translate('Account Number')); ?> - <?php echo e($info->account_number); ?>, <?php echo e(translate('Routing Number')); ?> - <?php echo e($info->routing_number); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if(addon_is_activated('offline_payment')): ?>
                                <div class="bg-white border mb-3 p-3 rounded text-left d-none">
                                    <div id="manual_payment_description">

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(Auth::check() && get_setting('wallet_system') == 1): ?>
                                <div class="separator mb-3">
                                    <span class="bg-white px-3">
                                        <span class="opacity-60"><?php echo e(translate('Or')); ?></span>
                                    </span>
                                </div>
                                <div class="text-center py-4">
                                    <div class="h6 mb-3">
                                        <span class="opacity-80"><?php echo e(translate('Your wallet balance :')); ?></span>
                                        <span class="fw-600"><?php echo e(single_price(Auth::user()->balance)); ?></span>
                                    </div>
                                    <?php if(Auth::user()->balance < $total): ?>
                                        <button type="button" class="btn btn-secondary" disabled>
                                            <?php echo e(translate('Insufficient balance')); ?>

                                        </button>
                                    <?php else: ?>
                                        <button  type="button" onclick="use_wallet()" class="btn btn-primary fw-600">
                                            <?php echo e(translate('Pay with wallet')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pt-3">
                        <label class="aiz-checkbox">
                            <input type="checkbox" required id="agree_checkbox">
                            <span class="aiz-square-check"></span>
                            <span><?php echo e(translate('I agree to the')); ?></span>
                        </label>
                        <a href="<?php echo e(route('terms')); ?>"><?php echo e(translate('terms and conditions')); ?></a>,
                        <a href="<?php echo e(route('returnpolicy')); ?>"><?php echo e(translate('return policy')); ?></a> &
                        <a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(translate('privacy policy')); ?></a>
                    </div>

                    <div class="row align-items-center pt-3">
                        <div class="col-6">
                            <a href="<?php echo e(route('home')); ?>" class="link link--style-3">
                                <i class="las la-arrow-left"></i>
                                <?php echo e(translate('Return to shop')); ?>

                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" onclick="submitOrder(this)" class="btn btn-primary fw-600"><?php echo e(translate('Complete Order')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" id="cart_summary">
                <?php echo $__env->make('frontend.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $(".online_payment").click(function(){
                $('#manual_payment_description').parent().addClass('d-none');
            });
            toggleManualPaymentData($('input[name=payment_option]:checked').data('id'));
        });

        function use_wallet(){
            $('input[name=payment_option]').val('wallet');
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','<?php echo e(translate('You need to agree with our policies')); ?>');
            }
        }
        function submitOrder(el){
            $(el).prop('disabled', true);
            if($('#agree_checkbox').is(":checked")){
                $('#checkout-form').submit();
            }else{
                AIZ.plugins.notify('danger','<?php echo e(translate('You need to agree with our policies')); ?>');
                $(el).prop('disabled', false);
            }
        }

        function toggleManualPaymentData(id){
            if(typeof id != 'undefined'){
                $('#manual_payment_description').parent().removeClass('d-none');
                $('#manual_payment_description').html($('#manual_payment_info_'+id).html());
            }
        }

        $(document).on("click", "#coupon-apply",function() {
            var data = new FormData($('#apply-coupon-form')[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "<?php echo e(route('checkout.apply_coupon_code')); ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    AIZ.plugins.notify(data.response_message.response, data.response_message.message);
//                    console.log(data.response_message);
                    $("#cart_summary").html(data.html);
                }
            })
        });

        $(document).on("click", "#coupon-remove",function() {
            var data = new FormData($('#remove-coupon-form')[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "<?php echo e(route('checkout.remove_coupon_code')); ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    $("#cart_summary").html(data);
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/payment_select.blade.php ENDPATH**/ ?>