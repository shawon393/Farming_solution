

<?php $__env->startSection('panel_content'); ?>
    <div class="aiz-titlebar mt-2 mb-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <b class="h4"><?php echo e(translate('Create Blog')); ?></b>
            </div>
        </div>
    </div>

    <div class="row gutters-5">
        <form id="add_form" class="form-horizontal" action="<?php echo e(route('customer.blog.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    <?php echo e(translate('Blog Title')); ?>

                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-9">
                    <input type="text" placeholder="<?php echo e(translate('Blog Title')); ?>" onkeyup="makeSlug(this.value)" id="title" name="title" class="form-control" required>
                </div>
            </div>
            <div class="form-group row" id="category">
                <label class="col-md-3 col-from-label">
                    <?php echo e(translate('Category')); ?> 
                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-9">
                    <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
                        <option>--</option>
                        <?php $__currentLoopData = $blog_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>">
                            <?php echo e($category->category_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label"><?php echo e(translate('Slug')); ?>

                    <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input type="text" placeholder="<?php echo e(translate('Slug')); ?>" name="slug" id="slug" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="signinSrEmail">
                    <?php echo e(translate('Banner')); ?> 
                    <small>(1300x650)</small>
                </label>
                <div class="col-md-9">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                <?php echo e(translate('Browse')); ?>

                            </div>
                        </div>
                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                        <input type="hidden" name="banner" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    <?php echo e(translate('Short Description')); ?>

                    <span class="text-danger">*</span>
                </label>
                <div class="col-md-9">
                    <textarea name="short_description" rows="5" class="form-control" required=""></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-from-label">
                    <?php echo e(translate('Description')); ?>

                </label>
                <div class="col-md-9">
                    <textarea class="aiz-text-editor" name="description"></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label"><?php echo e(translate('Meta Title')); ?></label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="meta_title" placeholder="<?php echo e(translate('Meta Title')); ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="signinSrEmail">
                    <?php echo e(translate('Meta Image')); ?> 
                    <small>(200x200)+</small>
                </label>
                <div class="col-md-9">
                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                <?php echo e(translate('Browse')); ?>

                            </div>
                        </div>
                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                        <input type="hidden" name="meta_img" class="selected-files">
                    </div>
                    <div class="file-preview box sm">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label"><?php echo e(translate('Meta Description')); ?></label>
                <div class="col-md-9">
                    <textarea name="meta_description" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label">
                    <?php echo e(translate('Meta Keywords')); ?>

                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="<?php echo e(translate('Meta Keywords')); ?>">
                </div>
            </div>
            
            <div class="form-group mb-0 text-right">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(translate('Save')); ?>

                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    function makeSlug(val) {
        let str = val;
        let output = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(output);
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Farming_solution\resources\views/frontend/blog/create.blade.php ENDPATH**/ ?>