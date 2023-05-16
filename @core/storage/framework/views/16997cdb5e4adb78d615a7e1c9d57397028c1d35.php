

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Documents & Links')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .website-url {
            display: none
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
                    <div class="col-lg-12">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h4 class="header-title"><?php echo e(__('Documents & Links')); ?></h4>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php $a=0; ?>
                                    <?php $__currentLoopData = $dlinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dlink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if($a == 0): ?> active <?php endif; ?>"
                                                data-toggle="tab" href="#slider_tab_<?php echo e($key); ?>" role="tab"
                                                aria-controls="home"
                                                aria-selected="true"><?php echo e(get_language_by_slug($key)); ?></a>
                                        </li>
                                        <?php $a++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="tab-content margin-top-40">
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default" id="all_docs_table">
                                            <thead>
                                                <th><?php echo e(__('ID')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th><?php echo e(__('File Name')); ?></th>
                                                <th><?php echo e(__('URL')); ?></th>
                                                <th><?php echo e(__('Action')); ?></th>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $dlinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dlink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($dlink->id ?? ''); ?></td>
                                                        <td><?php echo e($dlink->title ?? ''); ?></td>
                                                        <td><?php echo e($dlink->original_filename ?? ''); ?></td>
                                                        <td><?php echo e($dlink->url ?? ''); ?></td>
                                                        <td class="text-center">
                                                            <a href="<?php echo e(route('admin.dlink.edit', $dlink->id)); ?>"
                                                                class="btn btn-sm btn-primary mt-1" data-toggle="tooltip"
                                                                data-placement="top" title="Edit"
                                                                style="font-size: 14px; font-weight: 500;"><i
                                                                    class="far fa-edit"></i> Edit</a>

                                                            <button type="button" class="btn btn-sm btn-danger mt-1"
                                                                onclick="deleteTender(<?php echo e($dlink->id); ?>)"
                                                                data-toggle="tooltip" data-placement="top" title="Delete"
                                                                style="font-size: 14px; font-weight: 500;"><i
                                                                    class="fa fa-trash-alt"></i> Delete</button>
                                                            <form id="delete-form-<?php echo e($dlink->id); ?>"
                                                                action="<?php echo e(route('admin.dlink.destroy', $dlink->id)); ?>"
                                                                method="POST" style="display: none;">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                            </form>

                                                            
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="overflow-y: unset;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirmation')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo e(__('Do you really want to delete this record?')); ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="button" class="btn btn-danger" id="delTender"><?php echo e(__('Yes')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        // Delete Function
        function deleteTender(id) {
            $("#delModal").modal('show');

            document.getElementById("delTender").addEventListener("click", function() {
                event.preventDefault();
                document.getElementById('delete-form-' + id).submit();
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\satpuratigerreserve.org\@core\resources\views/backend/pages/dlink/index.blade.php ENDPATH**/ ?>