<div class="form-group">
    <label for="">Thumbnail</label>
    <input type="file" class="form-control" name="album_thumb" id="album_thumb" placeholder="Album Thumbnail" >
</div>
<?php if($album->album_thumb): ?>
    <div class="form-group">
        <img src="<?php echo e(asset($album->path)); ?>" name="<?php echo e($album->album_name); ?>" title="<?php echo e($album->album_name); ?>" width="300" >
    </div>
<?php endif; ?>