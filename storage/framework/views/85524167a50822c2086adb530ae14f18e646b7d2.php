<?php $__env->startSection('content'); ?>
    <div class="row mt-3">
        <div class="col-12 col-md-10 col-lg-8 mx-auto border rounded-3 bg-light p-5">
            <h1 class="display-3">Анализатор страниц</h1>
            <p class="lead">Бесплатно проверяйте сайты на SEO пригодность</p>
            <form action="" method="POST"
                  class="d-flex justify-content-center">
                <?php echo csrf_field(); ?>
                <input type="text" name="url[name]" value="" class="form-control form-control-lg"
                       placeholder="https://www.example.com">
                <input type="submit" class="btn btn-primary btn-lg ms-3 px-5 text-uppercase mx-3"
                       value="Проверить">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aslan/PhpstormProjects/php-project-57/resources/views/home.blade.php ENDPATH**/ ?>