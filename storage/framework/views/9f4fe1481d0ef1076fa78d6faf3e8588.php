<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Task Manager</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center">Task Manager</h2>

        <!-- Add Task Form -->
        <div class="card">
            <div class="card-header bg-primary text-white">Add New Task</div>
            <div class="card-body">
                <form id="taskForm" action="<?php echo e(route('tasks.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Task Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter task description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add Task</button>
                </form>
            </div>
        </div>

        <!-- Task List Table -->
        <div class="mt-4">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($task->title); ?></td>
                        <td><?php echo e($task->description); ?></td>
                        <td><?php echo e($task->status); ?></td>
                        <td>
                            <!-- Delete Button -->
                            <form class="delete-form d-inline" action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap & jQuery Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function(){
            // Form Validation
            $("#taskForm").submit(function(e){
                if ($("#title").val().trim() === "") {
                    alert("Task title is required.");
                    e.preventDefault();
                }
            });

            // Confirm Before Deleting
            $(".delete-form").submit(function(e){
                if (!confirm("Are you sure you want to delete this task?")) {
                    e.preventDefault();
                }
            });
        });
    </script>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\dashboard\TaskManager\resources\views/tasks/index.blade.php ENDPATH**/ ?>