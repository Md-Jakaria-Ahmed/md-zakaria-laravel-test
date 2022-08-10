<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<div style="margin-top:100px"></div>
<div class="container">
  
  <div class="row">

  <div class="col-md-8 m-auto">
    <div class="card">
      <div class="card-header">
        <h6 class="font-weight-bold">Update Post</h6>
      </div>
  <?php if(session('success')): ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo e(session('success')); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <?php endif; ?>

      <div class="card-body">
        
        <form action="<?php echo e(url('post/update/'.$data->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
              <label for="title">Post title</label>
              <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title"  name="title" value="<?php echo e($data->title); ?>">
              <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <strong class="text-danger"><?php echo e($message); ?></strong>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group mb-2">
              <label for="des">Description</label>
              <input  type="text" class="form-control  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="des" value="<?php echo e($data->description); ?>" name="description">
            
               <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <strong class="text-danger"><?php echo e($message); ?></strong>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

</div>

</body>
</html><?php /**PATH C:\xampp\htdocs\LARAVEL\blog\resources\views/edit.blade.php ENDPATH**/ ?>