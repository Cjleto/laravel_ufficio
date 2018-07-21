<?php $__env->startSection('title',$title); ?>


<?php $__env->startSection('content'); ?>	
	<?php $__env->startComponent('components.card',
					[
						'img_title' => 'Image Blog',
						'img_url' => 'https://picsum.photos/200/300/?random'
					]
				); ?>
		
		<p>Simple image with description</p>

	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('components.card'); ?>
		<?php $__env->slot('img_url','https://picsum.photos/200/300/?random'); ?>
		<?php $__env->slot('img_title','Altro modo di passare variabili al component'); ?>	
		<p>Simple image with description</p>

	<?php echo $__env->renderComponent(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
	##parent-placeholder-d7eb6b340a11a367a1bec55e4a421d949214759f## 
	<script type="text/javascript">
		console.log('appendo alla sezione footer dichiarata nel layout');
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>