
<?php $__env->startSection('content'); ?>
    <h1>EDIT ALBUM</h1>

    <form action="/albums/<?php echo e($album->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Album Name" value="<?php echo e($album->album_name); ?>">
        </div>
        <?php echo $__env->make('albums.partial.fileupload', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Album Description"><?php echo e($album->description); ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>