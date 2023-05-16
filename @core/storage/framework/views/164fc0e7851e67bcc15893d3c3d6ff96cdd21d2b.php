<div class="blog-classic-item-01 <?php echo e($margin ? 'margin-bottom-60' : ''); ?>">
    <div class="thumbnail">
        <?php echo render_image_markup_by_attachment_id($news->image); ?>

    </div>
    <div class="content">
        <ul class="post-meta">
            <li><a href="<?php echo e(route('frontend.news.single', $news->slug)); ?>"><i class="fa fa-user"></i>
                    <?php echo e($news->author); ?></a></li>
            <li><a href="<?php echo e(route('frontend.news.single', $news->slug)); ?>"><i class="far fa-clock"></i>
                    <?php echo e(date_format($news->created_at, 'd M y')); ?></a></li>
        </ul>
        <h4 class="title"><a href="<?php echo e(route('frontend.news.single', $news->slug)); ?>"><?php echo e($news->title); ?></a></h4>
        <p><?php echo e($news->excerpt); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.news.single', $news->slug)); ?>"
                class="boxed-btn reverse-color"><?php echo e(get_static_option('news_page_' . $user_select_lang_slug . '_read_more_btn_text')); ?></a>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/components/frontend/news/grid.blade.php ENDPATH**/ ?>