<?php
	$user = Auth::user();
?>



<?php $__env->startSection('content'); ?>
	<div class="container">
	<!-- flash message -->
	<?php if(session('flash_message')): ?>
		<div class="flash_message">
			<?php echo e(session('flash_message')); ?>

		</div>
	<?php endif; ?>

	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
	
	<?php if(count($errors) > 0): ?>
	<div>
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<?php endif; ?>	
	
	
	<form class="form-control" action="./edit?id=<?php echo e($comment->id); ?>" method="post">
	<?php echo csrf_field(); ?>
	<table>
		<tr><td><textarea name="comment"><?php echo e($comment->comment); ?><?php echo e(old('comment')); ?></textarea></td></tr>		
		<input type="hidden" name="post_id" value="<?php echo e($comment->post_id); ?>">
		<input type="hidden" name="user_id"  value="<?php echo e($user->id); ?>"> <tr><td><button type="submit">更新する</button></td></tr>		
	</form>
	</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/comment/edit.blade.php ENDPATH**/ ?>