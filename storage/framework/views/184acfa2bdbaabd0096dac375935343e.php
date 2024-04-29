<?php $__env->startSection('content'); ?>

	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
		<h3 style="margin: 10px"><?php echo e($post->title); ?></h3>
		<ul><li><?php echo e($post->comment); ?></li></ul>
		<ul><li><a href="./edit?id=<?php echo e($post->id); ?>">編集する</a></li></ul>
	</div>
	<a href="post/create">投稿をする</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/post/show.blade.php ENDPATH**/ ?>