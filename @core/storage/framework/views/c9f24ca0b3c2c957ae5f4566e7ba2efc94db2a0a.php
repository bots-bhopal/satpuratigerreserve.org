<div class="construction-support-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="support-inner">
                    <div class="left-content-wrap">
                        <img src="<?php echo e(asset('assets/uploads/str-logo.jpg')); ?>" alt="satpura-logo">
                    </div>
                    <div class="center-content-wrap">
                        <img src="<?php echo e(asset('assets/uploads/satpura-banner.png')); ?>" alt="satpura-banner">
                    </div>
                    <div class="right-content-wrap">
                        <img src="<?php echo e(asset('assets/uploads/MPFD-Logo.png')); ?>" alt="MPFD-Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-style-03  header-variant-<?php echo e($home_page_variant); ?>">
    <nav class="navbar navbar-area navbar-expand-lg">
        <div class="container nav-container">
            <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                <ul class="navbar-nav">
                    <?php echo render_frontend_menu($primary_menu); ?>

                </ul>
            </div>
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper" style="float: right;">
                    <ul class="navbar-nav">
                        <?php if(!empty(filter_static_option_value('language_select_option', $global_static_field_data))): ?>
                            <li>
                                <select id="langchange">
                                    <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($user_select_lang_slug == $lang->slug): ?> selected <?php endif; ?>
                                            value="<?php echo e($lang->slug); ?>" class="lang-option">
                                            <?php echo e(explode('(', $lang->name)[0] ?? $lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</div>


<?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/frontend/partials/navbar-variant/navbar-01.blade.php ENDPATH**/ ?>