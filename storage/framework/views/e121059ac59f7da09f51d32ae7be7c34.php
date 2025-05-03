<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
</head>
<body>
    <h1>Single Image Upload</h1>
    <form action="<?php echo e(route('photos.store.single')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h1>Multiple Images Upload</h1>
    <form action="<?php echo e(route('photos.store.multiple')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <h2>Uploaded Images</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div style="text-align: center;">
                <img src="<?php echo e(asset('images/' . $photo->image)); ?>" width="200" height="auto" style="border: 1px solid #ccc;">
                <form action="<?php echo e(route('photos.destroy', $photo->id)); ?>" method="POST" onsubmit="return confirm('Delete this image?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" style="margin-top: 5px;">Delete</button>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div style="margin-top: 20px;">
        <?php echo e($photos->links()); ?>

        <p>Showing <?php echo e($photos->firstItem()); ?> to <?php echo e($photos->lastItem()); ?> of <?php echo e($photos->total()); ?> results</p>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\KENN Folder\Upload Images Activity4\resources\views/upload.blade.php ENDPATH**/ ?>