<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title> 
    <link rel="stylesheet" href="/trainmvc/scss/UpdatePasswordScss.css">
</head>
<body>
    <form action="?act=updatePassword" method="post" class="update-form">
        <div class="form-group">
            <div>
                <label for="password" class="form-label">Password</label>
            </div>
            <div>
                <input placeholder="enter your password" type="password" name="password" id="password" class="form-input" required>
            </div>
        </div>

        <div class="form-group">
            <div>
                <label for="confirmPassword" class="form-label">Confirm Password</label>
            </div>
            <div>
                <input placeholder="enter your password confirm" type="password" name="confirmPassword" id="confirmPassword" class="form-input" required>
            </div>
        </div>

        <button type="submit" class="submit-button">SUBMIT</button>
    </form>
</body>
</html>