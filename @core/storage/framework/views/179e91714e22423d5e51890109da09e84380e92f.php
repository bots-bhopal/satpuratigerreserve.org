<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Section Manage')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Section Manage')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.section.manage')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="home_page_about_us_section_status"><strong><?php echo e(__('About Us Section Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="home_page_about_us_section_status"  <?php if(!empty(get_static_option('home_page_about_us_section_status'))): ?> checked <?php endif; ?> id="home_page_about_us_section_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="home_page_case_study_section_status"><strong><?php echo e(__('Gallery Section Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="home_page_case_study_section_status"  <?php if(!empty(get_static_option('home_page_case_study_section_status'))): ?> checked <?php endif; ?> id="home_page_case_study_section_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="home_page_latest_news_section_status"><strong><?php echo e(__('Latest News Section Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="home_page_latest_news_section_status"  <?php if(!empty(get_static_option('home_page_latest_news_section_status'))): ?> checked <?php endif; ?> id="home_page_latest_news_section_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                
                                
                                
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/pages/section-manage.blade.php ENDPATH**/ ?>