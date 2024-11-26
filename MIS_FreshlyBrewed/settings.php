<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Settings</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <h3 class="text-primary mb-4">Settings</h3>
            <div class="bg-white rounded p-4 shadow">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" placeholder="Full Name" value="John Doe">
                        <label for="floatingName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Email" value="johndoe@example.com">
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="New Password">
                        <label for="floatingPassword">New Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100">Save Changes</button>
                    <p class="text-center mt-3"><a href="dashboard.php">Back to Dashboard</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
