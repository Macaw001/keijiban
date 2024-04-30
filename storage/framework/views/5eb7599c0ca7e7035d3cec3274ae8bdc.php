<?php
	$user = Auth::user();
?>



<?php $__env->startSection('title', 'コメント用フォラーム'); ?>

<?php $__env->startSection('content'); ?>

	<div class="container">
	<?php if(count($errors) > 0): ?>
	<div>
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
	<?php endif; ?>

	 <form class="form-control" action="/comment/create" method="post">
	<table>
		<?php echo csrf_field(); ?>
		<tr><th>コメント</th><td><textarea name="comment" style="width:500px; height: 300px;"></textarea></td></tr>
		<input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
		<input type="hidden" name="post_id" value="<?php echo e($post); ?>">
		</table>
		<div class="d-flex justify-content-center">
		<button type="submit">投稿する</button>
		</div>
	</form>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/comment/create.blade.php ENDPATH**/ ?>