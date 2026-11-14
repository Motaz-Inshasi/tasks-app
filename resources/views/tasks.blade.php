<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Quickstart - Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Lato', sans-serif; }
    </style>
</head>
<body>

<nav class="navbar bg-light mb-4">
    <div class="container">
        <span class="navbar-brand">Task List</span>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (isset($task))
                <div class="card mb-4">
                    <div class="card-header">Update Task</div>
                    <div class="card-body">
                        <form action="{{ url('update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Update Task
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card mb-4">
                    <div class="card-header">New Task</div>
                    <div class="card-body">
                        <form action="/create" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Add Task
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Current Tasks</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <form action="/delete/{{ $task->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                    <form action="/edit/{{ $task->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-info me-1"></i> Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
