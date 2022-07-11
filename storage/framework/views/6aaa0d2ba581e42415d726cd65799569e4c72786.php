<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wally's Widgets</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="container">
    <h1 class="text-center">Wally's Widget Company</h1>
    <div class="row">
        <div class="col-md-5">
            <form role="form" method="POST" action="<?php echo e(url('/widgets/order')); ?>">
                <?php echo e(csrf_field()); ?>

                <label>Widgets to order</label>
                <input name="order" min="0" type="number" <?php if(isset($order)): ?> value="<?php echo e($order); ?>" <?php endif; ?>/>
                <button>Calculate</button>
            </form>
            <?php if(isset($result)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pack Size</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key); ?></td>
                                <td><?php echo e($count); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pack Size Control Panel</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php $__currentLoopData = $packSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form role="form" method="POST" action="<?php echo e(url('/packsizes')); ?>/<?php echo e($packSize->id); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo e(csrf_field()); ?>

                        <td><input type="number" name="packsize" value="<?php echo e($packSize->capacity); ?>" /></td>
                        <td><button>Update</button></td>
                    </form>
                    <td>
                        <form role="form" method="POST" action="<?php echo e(url('/packsizes')); ?>/<?php echo e($packSize->id); ?>">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo e(csrf_field()); ?>

                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <form role="form" method="POST" action="<?php echo e(url('/packsizes')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <td><input min="0" type="number" name="packsize" /></td>
                        <td><button>Add</button></td>
                        <td></td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH /Users/soubanquadri/Documents/Code/wallyswidgets/resources/views/welcome.blade.php ENDPATH**/ ?>