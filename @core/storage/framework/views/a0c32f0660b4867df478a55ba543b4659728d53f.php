<style>
    .card-box{
        height: 768px;
        overflow-y: auto;
    }

    .card-box::-webkit-scrollbar {
        width: 8px;
    }

    .card-box::-webkit-scrollbar-thumb {
        background-color: #088c46;
        border-radius: 50px;
        border: 3px solid #088c46;
    }

    .card-box::-webkit-scrollbar-track {
        background: #CFD8DC;
    }

    .badge-mix{
        background: #088c46;
        background-image: linear-gradient(to right, rgba(0,85,10,1) 0%, rgba(0,139,65,1) 51%, rgba(0,85,10,1) 100%);
        color: #FFFFFF;
        transition: 0.5s!important;
        background-size: 200% auto;
        padding: 0.4em 0.4em!important;
    }

    .badge.badge-mix:hover{
        background-position: right center;
        color: #fff;
    }
</style>


<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('ntender_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('ntender_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('ntender_page_' . $user_select_lang_slug . '_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('ntender_page_' . $user_select_lang_slug . '_meta_tags')); ?>">
    <?php echo render_og_meta_image_by_attachment_id(get_static_option('ntender_page_' . $user_select_lang_slug . '_meta_image')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-60">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-white mb-0">
                                <?php echo e(get_static_option('ntender_page_' . $user_select_lang_slug . '_title')); ?>

                            </h4>
                        </div>
                        <div class="card-body card-box">
                            <?php $__empty_1 = true; $__currentLoopData = $ntenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <span class="badge badge-mix rounded-1" style="font-size: 14px;"><?php echo e($ntender->name); ?></span>
                                <?php $__currentLoopData = $ntender->ntender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul class="text-left">
                                    <li class="news-item" style="padding: 4px 4px;">
                                        <?php if($ntender->url): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/www.png')); ?>"
                                                width="30" class="img-circle" />
                                            <a href="<?php echo e($ntender->url); ?>" target="_blank"
                                                style="color:#135e2a; font-weight: 800!important;"><?php echo e($ntender->title); ?></a>
                                            <?php if($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                                <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                    class="img-circle" />
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($ntender->file_extension == 'pdf'): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/pdf.png')); ?>"
                                                width="30" class="img-circle" />
                                            <a href="<?php echo e(route('user.download', $ntender->original_filename)); ?>"
                                                target="_blank"
                                                style="color:#135e2a; font-weight: 800!important;"><?php echo e($ntender->title); ?></a>
                                            <?php if($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                                <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                    class="img-circle" />
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($ntender->file_extension == 'doc' || $ntender->file_extension == 'docx'): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/word.png')); ?>"
                                                width="30" class="img-circle" />
                                            <a href="<?php echo e(route('user.download', $ntender->original_filename)); ?>"
                                                target="_blank"
                                                style="color:#135e2a; font-weight: 800!important;"><?php echo e($ntender->title); ?></a>
                                            <?php if($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                                <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                    class="img-circle" />
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($ntender->file_extension == 'xls' || $ntender->file_extension == 'xlsx'): ?>
                                            <img src="<?php echo e(asset('assets/frontend/img/excel.png')); ?>"
                                                width="30" class="img-circle" />
                                            <a href="<?php echo e(route('user.download', $ntender->original_filename)); ?>"
                                                target="_blank"
                                                style="color:#135e2a; font-weight: 800!important;"><?php echo e($ntender->title); ?></a>
                                            <?php if($ntender->expired_at > Carbon\Carbon::now()->toDateTimeString()): ?>
                                                <img src="<?php echo e(asset('assets/frontend/img/new.gif')); ?>"
                                                    class="img-circle" />
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <ul>
                                    <li class="news-item" style="padding: 4px 4px 0 4px;">
                                        <h4 style="font-weight: 800; text-align: center; color:red;">
                                            <?php echo e(get_static_option('ntender_message_' . $user_select_lang_slug. '_text_here')); ?>

                                        </h4>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/frontend/pages/ntender/ntenders.blade.php ENDPATH**/ ?>