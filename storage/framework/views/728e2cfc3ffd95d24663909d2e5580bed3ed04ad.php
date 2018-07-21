
<?php $__env->startSection('content'); ?>
    <h1>NEW ALBUM</h1>

    <form action="<?php echo e(route('album.save')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="" placeholder="Album Name" >
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Album Description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>