<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('announcement_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('announcement_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('announcement_page_' . $user_select_lang_slug . '_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('announcement_page_' . $user_select_lang_slug . '_meta_tags')); ?>">
    <?php echo render_og_meta_image_by_attachment_id(get_static_option('announcement_page_' . $user_select_lang_slug . '_meta_image')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-60">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-white mb-0">
                                <?php echo e(get_static_option('aboard_page_' . $user_select_lang_slug . '_title')); ?>

                            </h4>
                        </div>
                        <div class="card-body">
                            <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <p class="card-text text-justify" style="padding: 4px 4px;">
                                    <?php if($announcement->url): ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/www.png')); ?>"
                                            width="30" class="img-circle" />
                                        <a href="<?php echo e($announcement->url); ?>" target="_blank"
                                            style="color:#135e2a; font-weight: 800!important;"><?php echo e($announcement->title); ?></a>
                                        <?php if($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                class="img-circle" />
                                        <?php endif; ?>
                                    <?php elseif($announcement->url == '' && !$announcement->file_extension == 'pdf'): ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/file.png')); ?>" width="30" class="img-circle" />
                                        <span style="color:#135e2a; font-weight: 800!important;"><?php echo e($announcement->title); ?></span>
                                        <?php if($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                class="img-circle" />
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($announcement->file_extension == 'pdf'): ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/pdf.png')); ?>" width="30"
                                            class="img-circle" />
                                        <a href="<?php echo e(route('user.download', $announcement->original_filename)); ?>" target="_blank"
                                            style="color:#135e2a; font-weight: 800!important;"><?php echo e($announcement->title); ?></a>
                                        <?php if($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>" class="img-circle" />
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($announcement->file_extension == 'doc' || $announcement->file_extension == 'docx'): ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/word.png')); ?>" width="30"
                                            class="img-circle" />
                                        <a href="<?php echo e(route('user.download', $announcement->original_filename)); ?>" target="_blank"
                                            style="color:#135e2a; font-weight: 800!important;"><?php echo e($announcement->title); ?></a>
                                        <?php if($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>" class="img-circle" />
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($announcement->file_extension == 'xls' || $announcement->file_extension == 'xlsx'): ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/excel.png')); ?>" width="30"
                                            class="img-circle" />
                                        <a href="<?php echo e(route('user.download', $announcement->original_filename)); ?>" target="_blank"
                                            style="color:#135e2a; font-weight: 800!important;"><?php echo e($announcement->title); ?></a>
                                        <?php if($announcement->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>" class="img-circle" />
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="card-text" style="padding: 4px 4px 0 4px;">
                                <h4 style="font-weight: 800; text-align: center; color:red;">
                                    <?php echo e(get_static_option('aboard_message_' . $user_select_lang_slug. '_text_here')); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/frontend/pages/aboard/announcement.blade.php ENDPATH**/ ?>