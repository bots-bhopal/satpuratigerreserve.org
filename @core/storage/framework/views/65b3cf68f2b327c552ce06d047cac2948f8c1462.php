<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Notice Area Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Notice Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.home09.notice.area')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-item nav-link <?php if($key == 0): ?> active <?php endif; ?>"
                                            data-toggle="tab" href="#nav-home-<?php echo e($lang->slug); ?>" role="tab"
                                            aria-selected="true"><?php echo e($lang->name); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </nav>
                            <div class="tab-content margin-top-30" id="nav-tabContent">
                                <?php $__currentLoopData = $all_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>"
                                        id="nav-home-<?php echo e($lang->slug); ?>" role="tabpanel">
                                        <div class="form-group">
                                            <label
                                                for="notice_title_<?php echo e($lang->slug); ?>_notice_title_text"><?php echo e(__('Notice Area Title')); ?></label>
                                            <input type="text" class="form-control"
                                                id="notice_title_<?php echo e($lang->slug); ?>_notice_title_text"
                                                name="notice_title_<?php echo e($lang->slug); ?>_notice_title_text"
                                                value="<?php echo e(get_static_option('notice_title_' . $lang->slug . '_notice_title_text')); ?>"
                                                placeholder="<?php echo e(__('Notice Area Title')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_title_<?php echo e($lang->slug); ?>_notice_board_title_text"><?php echo e(__('Notice Board Header Title')); ?></label>
                                            <input type="text" class="form-control"
                                                id="notice_board_title_<?php echo e($lang->slug); ?>_notice_board_title_text"
                                                name="notice_board_title_<?php echo e($lang->slug); ?>_notice_board_title_text"
                                                value="<?php echo e(get_static_option('notice_board_title_' . $lang->slug . '_notice_board_title_text')); ?>"
                                                placeholder="<?php echo e(__('Notice Board Header Title')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="notice_about_section_<?php echo e($lang->slug); ?>_description"><?php echo e(__('Description')); ?></label>
                                            <input type="hidden" name="notice_about_section_<?php echo e($lang->slug); ?>_description" >
                                            <div class="summernote" data-content='<?php echo e(get_static_option('notice_about_section_'.$lang->slug.'_description')); ?>'></div>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_button_title_<?php echo e($lang->slug); ?>_notice_board_button_title_text"><?php echo e(__('Notice Board Button Title Text')); ?></label>
                                            <input type="text" class="form-control"
                                                id="notice_board_button_title_<?php echo e($lang->slug); ?>_notice_board_button_title_text"
                                                name="notice_board_button_title_<?php echo e($lang->slug); ?>_notice_board_button_title_text"
                                                value="<?php echo e(get_static_option('notice_board_button_title_' . $lang->slug . '_notice_board_button_title_text')); ?>"
                                                placeholder="<?php echo e(__('Notice Board Button Title Text')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="notice_board_message_<?php echo e($lang->slug); ?>_notice_board_message_text"><?php echo e(__('Notice Board Message Text')); ?></label>
                                            <input type="text" class="form-control"
                                                id="notice_board_message_<?php echo e($lang->slug); ?>_notice_board_message_text"
                                                name="notice_board_message_<?php echo e($lang->slug); ?>_notice_board_message_text"
                                                value="<?php echo e(get_static_option('notice_board_message_' . $lang->slug . '_notice_board_message_text')); ?>"
                                                placeholder="<?php echo e(__('Notice Board Message Text')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="visitor_month_header_title_<?php echo e($lang->slug); ?>_visitor_month_header_title_text"><?php echo e(__('Pic of the Month by Visitor Header Title')); ?></label>
                                            <input type="text" class="form-control"
                                                id="visitor_month_header_title_<?php echo e($lang->slug); ?>_visitor_month_header_title_text"
                                                name="visitor_month_header_title_<?php echo e($lang->slug); ?>_visitor_month_header_title_text"
                                                value="<?php echo e(get_static_option('visitor_month_header_title_' . $lang->slug . '_visitor_month_header_title_text')); ?>"
                                                placeholder="<?php echo e(__('Pic of the Month by Visitor Header Title')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="visitor_month_footer_title_<?php echo e($lang->slug); ?>_visitor_month_footer_title_text"><?php echo e(__('Pic of the Month by Visitor Footer Title')); ?></label>
                                            <input type="text" class="form-control"
                                                id="visitor_month_footer_title_<?php echo e($lang->slug); ?>_visitor_month_footer_title_text"
                                                name="visitor_month_footer_title_<?php echo e($lang->slug); ?>_visitor_month_footer_title_text"
                                                value="<?php echo e(get_static_option('visitor_month_footer_title_' . $lang->slug . '_visitor_month_footer_title_text')); ?>"
                                                placeholder="<?php echo e(__('Pic of the Month by Visitor Footer Title')); ?>">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="submit"
                                class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Notice Page Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 200,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/pages/home/construction/notice-area.blade.php ENDPATH**/ ?>