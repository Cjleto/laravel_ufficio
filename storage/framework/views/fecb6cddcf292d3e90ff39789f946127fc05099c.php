<div class="form-group">
    <label for="">Thumbnail</label>
    <input type="file" class="form-control" name="img_path" id="img_path" placeholder="Img Thumbnail" >
</div>
<?php if($photo->img_path): ?>
    <div class="form-group">
        <img src="<?php echo e(asset($photo->img_path)); ?>" name="<?php echo e($photo->name); ?>" title="<?php echo e($photo->name); ?>" width="300" >
    </div>
<?php endif; ?>