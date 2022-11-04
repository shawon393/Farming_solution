<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-block text-left">
                <?php if(get_setting('system_logo_white') != null): ?>
                    <img class="mw-100" src="<?php echo e(uploaded_asset(get_setting('system_logo_white'))); ?>" class="brand-icon" alt="<?php echo e(get_setting('site_name')); ?>">
                <?php else: ?>
                    <img class="mw-100" src="<?php echo e(static_asset('assets/img/logo.png')); ?>" class="brand-icon" alt="<?php echo e(get_setting('site_name')); ?>">
                <?php endif; ?>
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="<?php echo e(translate('Search in menu')); ?>" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Dashboard')); ?></span>
                    </a>
                </li>

            <!-- Product -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions))): ?>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Products')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="<?php echo e(route('products.create')); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Add New product')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('products.all')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('All Products')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('categories.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Category')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('brands.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])); ?>" >
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Brand')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('attributes.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Attribute')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('colors')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Colors')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('reviews.index')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Product Reviews')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>




                 <!-- Sale -->
                 <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Sales')); ?></span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <?php if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions))): ?>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('all_orders.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['all_orders.index', 'all_orders.show'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('All Orders')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>



            <!-- Customers -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions))): ?>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Customers')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('customers.index')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Customer list')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                

                <?php if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions))): ?>
                    <li class="aiz-side-nav-item">
                        <a href="<?php echo e(route('uploaded-files.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['uploaded-files.create'])); ?>">
                            <i class="las la-folder-open aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Uploaded Files')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                

                <?php if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions))): ?>
                <!--Blog System-->
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Informatoin Center')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('blog.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['blog.create', 'blog.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('All Posts')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('blog-category.index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['blog-category.create', 'blog-category.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Categories')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


            <!-- Website Setup -->
                <?php if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions))): ?>
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.footer', 'website.header'])); ?>" >
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text"><?php echo e(translate('Website Setup')); ?></span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('website.header')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Header')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('website.footer', ['lang'=>  App::getLocale()] )); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.footer'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Footer')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('website.pages')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])); ?>">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Pages')); ?></span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="<?php echo e(route('website.appearance')); ?>" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text"><?php echo e(translate('Appearance')); ?></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


            <!-- Staffs -->
                

                <li class="aiz-side-nav-item">
                    <a href="<?php echo e(route('support_ticket.admin_index')); ?>" class="aiz-side-nav-link <?php echo e(areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])); ?>">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text"><?php echo e(translate('Farmer Help Center')); ?></span>
                    </a>
                </li>

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
<?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/backend/inc/admin_sidenav.blade.php ENDPATH**/ ?>