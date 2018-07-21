<?php $__env->startSection('content'); ?>
    <h1>EDIT PHOTO</h1>

    <form action="<?php echo e(route('photos.update', $photo->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PATCH')); ?>

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($photo->name); ?>"  placeholder="Img Name" >
        </div>
        <input type="hidden" name="album_id" value="<?php echo e($photo->album_id); ?>" >
        <?php echo $__env->make('images.partial.fileupload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Img Description"><?php echo e($photo->description); ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>