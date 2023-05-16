<?php
$strevent_img = null;
$strevent_image = get_attachment_image_by_id($strevent->image, 'full', false);
$strevent_img = !empty($strevent_image) ? $strevent_image['img_url'] : '';
?>

<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url" content="<?php echo e(route('frontend.strevent.single', $strevent->slug)); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo e($strevent->title); ?>" />
    <meta property="og:image" content="<?php echo e($strevent_img); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($strevent->meta_description); ?>">
    <meta name="tags" content="<?php echo e($strevent->meta_tag); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($strevent->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($strevent->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-details-content-area padding-top-100 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="blog-details-item">
                        <div class="thumb">
                            <?php
                                
                            ?>
                            <?php if(!empty($strevent_image)): ?>
                                <img src="<?php echo e($strevent_image['img_url']); ?>" alt="<?php echo e(__($strevent->title)); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="entry-content">
                            <ul class="post-meta">
                                <li><i class="fas fa-calendar-alt"></i> <?php echo e(date_format($strevent->created_at, 'd M Y')); ?>

                                </li>
                                <li><i class="fas fa-user"></i> <?php echo e($strevent->author); ?></li>
                            </ul>
                            <div class="content-area">
                                <?php echo $strevent->content; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/frontend/pages/strevents/event-single.blade.php ENDPATH**/ ?>