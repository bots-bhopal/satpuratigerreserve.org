

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Documents & Links')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .website-url {
            display: none;
        }
    </style>
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

                    <!-- column -->
                    <div class="col-lg-8 offset-lg-2">
                        <!-- form start -->
                        <form action="<?php echo e(route('admin.dlink.store')); ?>" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <!-- Horizontal Form -->
                            <div class="card card-info mb-5">
                                <div class="card-header bg-dark text-white">
                                    <h3 class="card-title mb-0">Documents & Links</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pb-3">
                                    <div class="form-group">
                                        <label for="inputTitle" class="col-form-label"><?php echo e(__('Title')); ?></label>

                                        <input type="title" class="form-control" id="title" name="title"
                                            value="" placeholder="<?php echo e(__('Enter Title')); ?>">
                                    </div>


                                    <div class="form-group">
                                        <label>Select Categories</label>
                                        <select name="categories" id="category"
                                            class="form-control <?php echo e($errors->any() && $errors->first('categories') ? 'is-invalid' : ''); ?>">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="file-group">
                                        <div class="form-group">
                                            <label>Choose File</label>
                                            <input type="file" class="form-control-file col-12 pl-0" name="file">
                                        </div>
                                    </div>

                                    <div class="form-group url mb-0">
                                        <label for="url">Do you have a Website URL?</label>
                                        <input id="url" type="checkbox" name="url" value="1" />
                                    </div>

                                    <div class="form-group website-url">
                                        <label for="inputUrl" class="col-form-label"><?php echo e(__('Enter URL')); ?></label>

                                        <input type="url" class="form-control" id="customurl" name="customurl"
                                            value="" placeholder="<?php echo e(__('https://www.example.com')); ?>"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-dark">
                                    <button type="submit" class="btn btn-success float-left"><i
                                            class="nav-icon fas fa-upload" style="margin-right: 8px;"></i>UPLOAD</button>
                                    
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </form>
                        <!-- /.form end-->
                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(function() {
            $("#url").on("click", function() {
                $(".website-url").toggle(this.checked);
                $(".file-group").toggle(this.unchecked);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/pages/dlink/create.blade.php ENDPATH**/ ?>