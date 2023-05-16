<div class="blog-classic-item-01 <?php echo e($margin ? 'margin-bottom-60' : ''); ?>">
    <div class="thumbnail">
        <?php echo render_image_markup_by_attachment_id($strevent->image); ?>

    </div>
    <div class="content">
        <ul class="post-meta">
            <li><a href="<?php echo e(route('frontend.strevent.single', $strevent->slug)); ?>"><i class="fa fa-user"></i>
                    <?php echo e($strevent->author); ?></a></li>
            <li><a href="<?php echo e(route('frontend.strevent.single', $strevent->slug)); ?>"><i class="far fa-clock"></i>
                    <?php echo e(date_format($strevent->created_at, 'd M y')); ?></a></li>
        </ul>
        <h4 class="title"><a href="<?php echo e(route('frontend.strevent.single', $strevent->slug)); ?>"><?php echo e($strevent->title); ?></a></h4>
        <p><?php echo e($strevent->excerpt); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.strevent.single', $strevent->slug)); ?>"
                class="boxed-btn reverse-color"><?php echo e(get_static_option('event_page_' . $user_select_lang_slug . '_read_more_btn_text')); ?></a>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/components/frontend/strevent/grid.blade.php ENDPATH**/ ?>