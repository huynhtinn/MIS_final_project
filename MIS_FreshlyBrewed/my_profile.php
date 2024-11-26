<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <h3 class="text-primary mb-4">My Profile</h3>
            <div class="bg-white rounded p-4 shadow">
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingName" value="John Doe" disabled>
                        <label for="floatingName">Full Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" value="johndoe@example.com" disabled>
                        <label for="floatingEmail">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPhone" value="+1234567890" disabled>
                        <label for="floatingPhone">Phone</label>
                    </div>
                    <a href="settings.html" class="btn btn-primary w-100">Edit Profile</a>
                    <p class="text-center mt-3"><a href="dashboard.html">Back to Dashboard</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
