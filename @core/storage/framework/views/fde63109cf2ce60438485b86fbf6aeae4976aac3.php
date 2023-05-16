

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Create Category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="margin-top-40"></div>
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                    <!-- right column -->
                    <div class="col-md-8 offset-md-2">
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header bg-dark text-white">
                                <h3 class="card-title mb-0"><?php echo e(__('Create Category')); ?></h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form action="<?php echo e(route('admin.ntcategory.store')); ?>" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                <?php echo csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputCategory"
                                            class="col-sm-2 col-form-label"><?php echo e(__('Category Name')); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control <?php echo e($errors->any() && $errors->first('cname') ? 'is-invalid' : ''); ?>"
                                                id="name" name="name" value="<?php echo e(old('name')); ?>"
                                                placeholder="<?php echo e(__('Enter Category Name')); ?>" autocomplete="off">
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                    <button type="submit" class="btn btn-info"><?php echo e(__('Add Category')); ?></button>
                                    
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/pages/ntender/category/create.blade.php ENDPATH**/ ?>