<?php
	$user = Auth::user();
?>




<?php $__env->startSection('content'); ?>

<div class="container">

		<!--エラーメッセージの表示-->
		<?php if(count($errors) > 0): ?>
		<div>
			<ul class="list-unstyled">
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>	
		
		<!-- flash message -->
		<?php if(session('flash_message')): ?>
			<div class="flash_message">
				<?php echo e(session('flash_message')); ?>

			</div>
		<?php endif; ?>
		
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="p-0 m-3"  style="border: solid 1px black; margin-bottom: 2px; padding:2px;">
			 <div class="bg-dark">
				<a class="text-decoration-none" href="/post/show?id=<?php echo e($post->id); ?>"><h3 class="text-wrap text-white" style="max-width:100%"><?php echo e($post->title); ?></h3></a>
			</div>

		<!-- いいねボタンの追加 -->

			<div class="justify-content-end d-flex btn-group">
				
				<?php if($post->likes->contains('user_id', $user->id)): ?>
					<i class="fa-solid fa-heart" style="color: #c73d59;"></i><?php echo e($post->likes->count()); ?> いいね</td></tr>
				<?php else: ?>
				<form action="/like" method="post">
				<?php echo csrf_field(); ?>
					<button type="input"><i class="fa-solid fa-heart" style="color: #aeb0b2;"></i><?php echo e($post->likes->count()); ?>  いいね</button></td></tr>
					<input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
					<input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
				</form>
				<?php endif; ?>			

				<!-- likeテーブルのユーザーidとログインidが一致したら、いいねの取り消しを表示する -->	
				<?php $__currentLoopData = $post->likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($like->user_id === $user->id): ?>
						<form action="/like" method="post">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="id" value="<?php echo e($like->id); ?>">
							<td><button type="submit">いいねを取り消す</button></td>
							</input>
						</form>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>

		<!-- 掲示板のポストを表示 -->
			<table>
			<div class="alert">
				<td><?php echo e($post->comment); ?></td>
				<form action="/like" method="post">
				<td>
					<?php echo csrf_field(); ?>
					<input type="hidden" value="<?php echo e($post->id); ?>" name="post_id">
					<input type="hidden" value="<?php echo e($user->id); ?>" name="user_id">
					

			</table>
				
				<!-- 返信コメントの表示 -->	
				<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="border-top mb-0">
					<ul class="list-unstyled pt-3 pb-3 mt-3 mb-0"><li><?php echo e($comment->comment); ?></li></ul>
					<div class="d-flex justify-content-end">
					<?php if($comment->user_id === $user->id): ?>
						<a  class="btn btn-primary" href="/comment/edit?id=<?php echo e($comment->id); ?>">編集する</a>

						<form action="/comment/edit" method="post">
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="id" value="<?php echo e($comment->id); ?>">
						<button class="btn btn-danger" type="submit">削除</button>
						</input>
						</form>	
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<div class="mt-3 d-flex justify-content-between">
					<a href="/comment?id=<?php echo e($post->id); ?>">この投稿にコメントする</a>
					<!--　ログインしているヒトのみ投稿できる仕組み　-->
					<?php if($post->user_id === $user->id): ?>
					<div class="d-flix justify-content-end">
						<a class="btn btn-primary" href="/post/edit?id=<?php echo e($post->id); ?>">編集する</a>
						<form action="./post" method="post">
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="id" value="<?php echo e($post->id); ?>">
						<button class="btn btn-danger" type="submit">削除</button>
						</input>
						</form>	
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<a class="btn btn-primary" href="/post/create">投稿をする</a>
</div>	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.postapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubu-server/keijiban/keijiban/resources/views/post/index.blade.php ENDPATH**/ ?>