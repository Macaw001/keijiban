<?php
	$user = Auth::user();
?>



<?php $__env->startSection('content'); ?>
	<!-- flash message -->
	<?php if(session('flash_message')): ?>
		<div class="flash_message">
			<?php echo e(session('flash_message')); ?>

		</div>
	<?php endif; ?>
	
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
		<a href="/post/show?id=<?php echo e($post->id); ?>"><h3 style="margin: 10px"><?php echo e($post->title); ?></h3></a>
		<ul><li><?php echo e($post->comment); ?></li></ul>

		<!-- 返信コメントの表示 -->	
		<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div style="margin: 10px; padding:0px; border:solid black 1px; width:80%;">
		<ul><li><?php echo e($comment->comment); ?></li></ul>
		<?php if($comment->user_id === $user->id): ?>
			<a href="/comment/edit?id=<?php echo e($comment->id); ?>">編集する</a>
			<li>comment_user_id:<?php echo e($comment->user_id); ?></li>
			<li>user_id:<?php echo e($user->id); ?></li>

			<form action="/comment/edit" method="post">
			<?php echo csrf_field(); ?>
			<?php echo method_field('DELETE'); ?>
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="<?php echo e($comment->id); ?>">
			<button type="submit">削除</button>
			</input>
			</form>	
		<?php endif; ?>
		</div>
	       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<a href="/comment?id=<?php echo e($post->id); ?>">この投稿にコメントする</a>

		<?php if($post->user_id === $user->id): ?>
		<ul>
			<li><a href="/post/edit?id=<?php echo e($post->id); ?>">編集する</a></li>
			<form action="./post" method="post">
			<?php echo csrf_field(); ?>
			<?php echo method_field('DELETE'); ?>
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="<?php echo e($post->id); ?>">
			<button type="submit">削除</button>
			</input>
			</form>	
		<?php endif; ?>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<a href="/post/create">投稿をする</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/post/index.blade.php ENDPATH**/ ?>