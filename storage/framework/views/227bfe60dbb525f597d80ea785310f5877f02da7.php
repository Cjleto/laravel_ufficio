<?php $__env->startSection('content'); ?>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Data creazione</th>
        <th>Title</th>
        <th>Album</th>
        <th>Thumbnail</th>
        <th> - </th>
    </tr>
    <?php $__empty_1 = true; $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($image->id); ?></td>
            <td><?php echo e($image->created_at); ?></td>
            <td><?php echo e($image->name); ?></td>
            <td><?php echo e($album->album_name); ?></td>
            <td>
                <img src="<?php echo e(asset($image->img_path)); ?>" width="150" >
            </td>
            <td>
                <a href="<?php echo e(route('photos.destroy',$image->id)); ?>" class="btn btn-danger">DELETE</a>
                <a href="<?php echo e(route('photos.edit',$image->id)); ?>" class="btn btn-primary">MODIFY</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5">
                Nessuna immagine trovata
            </td>
        </tr>
    <?php endif; ?>
</table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
    <script>
        $('document').ready(function () {

            //$('div.alert').fadeOut(3000);

            $('table').on('click','a.btn-danger',function(ele){
                ele.preventDefault();
                var urlImg = $(this).attr('href');
                var tr = ele.target.parentNode.parentNode;
                //console.log(urlImg);
                $.ajax(
                    urlImg,
                    {
                        method: 'DELETE',
                        data: {
                            '_token': '<?php echo e(csrf_token()); ?>'
                        },
                        complete: function (resp) {
                            console.log(resp);
                            if(resp.responseText == 1){
                                tr.parentNode.removeChild(tr);
                            } else {
                                alert('Problema ajax albumsimages.blade');
                            }
                        }
                    }
                ) //fine ajax

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>