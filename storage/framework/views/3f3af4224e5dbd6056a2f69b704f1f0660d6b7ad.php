

<?php $__env->startSection('main'); ?>

<div class="col-sm-12">

  <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>  
    </div>
  <?php endif; ?>
</div>



<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contacts</h1>
    <div>
      <a style="margin: 19px;" href="<?php echo e(route('contacts.create')); ?>" class="btn btn-primary">New contact</a>
    </div> 
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Job Title</td>
          <td>City</td>
          <td>Country</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($contact->id); ?></td>
            <td><?php echo e($contact->first_name); ?> <?php echo e($contact->last_name); ?></td>
            <td><?php echo e($contact->email); ?></td>
            <td><?php echo e($contact->job_title); ?></td>
            <td><?php echo e($contact->city); ?></td>
            <td><?php echo e($contact->country); ?></td>
            <td>
                <a href="<?php echo e(route('contacts.edit',$contact->id)); ?>" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="<?php echo e(route('contacts.destroy', $contact->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
<div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\laravel\crud_react\resources\views/contacts/index.blade.php ENDPATH**/ ?>