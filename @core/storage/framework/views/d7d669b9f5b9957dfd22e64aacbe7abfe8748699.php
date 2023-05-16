<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                <?php if(check_page_permission('admin_manage')): ?>
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card text-dark mb-3">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.new.user')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($total_admin); ?></span>
                                    <h4 class="title"><?php echo e(__('Total Admin')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(check_page_permission_by_string('news_manage')): ?>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.news.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-blackboard"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($news_count); ?></span>
                                    <h4 class="title"><?php echo e(__('Total News')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(check_page_permission_by_string('event_manage')): ?>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.strevent.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-blackboard"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($event_count); ?></span>
                                    <h4 class="title"><?php echo e(__('Total Events')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                

                <?php if(check_page_permission_by_string('dlink_manage')): ?>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.dlink.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-blackboard"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($dlinks_count); ?></span>
                                    <h4 class="title"><?php echo e(__('Total Documents & Links')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(check_page_permission_by_string('ntender_manage')): ?>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="<?php echo e(route('admin.ntender.new')); ?>" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-blackboard"></i>
                                </div>
                                <div class="content">
                                    <span class="total"><?php echo e($ntender_count); ?></span>
                                    <h4 class="title"><?php echo e(__('Total Notices & Tenders')); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                

                

                
                </div>
            </div>
        </div>

        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/admin-home.blade.php ENDPATH**/ ?>