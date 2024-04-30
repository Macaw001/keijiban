<?php
	$user = Auth::user();
?>



<?php $__env->startSection('title', '投稿用フォラーム'); ?>

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

	<form class="form-control-lg" action="/post/create" method="post"> 
	 <?php echo csrf_field(); ?>
	<div  class="mb-3 row justify-content-center">
		<div class="col-12">
			タイトル<input type="text" name="title">
		</div>
	</div>
	<div  class="mb-3 row justify-content-center">
		<div class="col-12">
			投稿内容<textarea name="comment"></textarea> <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
		</div>
	</div>
	<div  class="row justify-content-end">
		<div class="d-flex justify-content-center">
			<button type="submit">投稿する</button>	
		</div>	
	</div>
	 </form>
	</div>
	</div>	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/post/create.blade.php ENDPATH**/ ?>