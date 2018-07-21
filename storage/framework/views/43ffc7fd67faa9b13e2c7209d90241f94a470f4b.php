<?php $__env->startSection('title',$title); ?>


<?php $__env->startSection('content'); ?>

	<h1>
		<?php echo e($title); ?>

		Bladexs

	</h1>


	<?php if($staff): ?>
		<ul>
		<?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
			<li><?php echo e($loop->remaining); ?>  <?php echo e($person['name']); ?>  <?php echo e($person['lastname']); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	<?php else: ?>

		<h1>No Staff </h1>

	<?php endif; ?>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f## 
	<script type="text/javascript">
		console.log('appendo alla sezione footer dichiarata nel layout');
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>