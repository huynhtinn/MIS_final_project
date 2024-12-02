<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See All To-Do List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">To-Do List</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="task-input" placeholder="Enter a new task" aria-label="Task input">
                    <button class="btn btn-primary" id="add-task-btn">Add</button>
                </div>
                <ul class="list-group" id="task-list">
                    <!-- Tasks will appear here -->
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Manage Daily Orders
                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Monitor Inventory Levels
                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <del>Handle Staff Scheduling</del>
                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Analyze Sales Performance
                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Customize Promotions
                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <p class="text-center mt-3"><a href="dashboard.php">Back to Dashboard</a></p>

    <script>
        const taskInput = document.getElementById('task-input');
        const taskList = document.getElementById('task-list');
        const addTaskBtn = document.getElementById('add-task-btn');

        // Function to add a new task
        addTaskBtn.addEventListener('click', () => {
            const taskText = taskInput.value.trim();
            if (taskText !== '') {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                listItem.innerHTML = `${taskText} <button class="btn btn-sm btn-danger delete-btn">Delete</button>`;
                
                // Add delete functionality
                const deleteBtn = listItem.querySelector('.delete-btn');
                deleteBtn.addEventListener('click', () => {
                    taskList.removeChild(listItem);
                });

                taskList.appendChild(listItem);
                taskInput.value = ''; // Clear the input after adding task
            }
        });
    </script>
</body>

</html>
