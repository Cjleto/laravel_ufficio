
<?php $__env->startSection('content'); ?>

    <h1>ALBUMS</h1>
    <?php if(session()->has('message')): ?>
        <?php $__env->startComponent('components.alert-info'); ?>
            <?php echo e(session()->get('message')); ?>

        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>
    <form>
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>" >

        <ul class="list-group">
            <?php echo e(csrf_token()); ?>

            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item justify-content-between ">
                    <?php echo e($album->id); ?> <?php echo e($album->album_name); ?>

                    <div class="float-right">
                        <a href="/albums/<?php echo e($album->id); ?>/edit" class="btn btn-primary edit">EDIT</a>
                        <a href="/albums/<?php echo e($album->id); ?>" class="btn btn-danger delete">DELETE</a>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    ##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f##
    <script>
        $('document').ready(function () {

            $('div.alert').fadeOut(3000);

            $('ul').on('click','a.delete',function(ele){
                 ele.preventDefault();
                 var urlAlbum = $(this).attr('href');
                 var li = ele.target.parentNode.parentNode;
                 //console.log(li);
                 $.ajax(
                     urlAlbum,
                     {
                         method: 'DELETE',
                         data: {
                             '_token': $('#_token').val()
                         },
                         complete: function (resp) {
                             if(resp.responseText == 1){
                                 $(li).remove();
                             } else {
                                 alert('Problema ajax albums.blade');
                             }
                         }
                     }
                 ) //fine ajax

            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>