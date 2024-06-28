<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/trainmvc/scss/SignInScss.css">
</head>
<body>
    <div class="container">
        <form action="?act=processSignin" method="post">
            <div class="component">
                <label for="username">Username:</label><br>
                <input class="textInput" type="text" id="username" name="username" required required placeholder="Enter your Username"><br>
            </div>
            <div class="component">
                <label for="password">Password:</label><br>
                <input class="textInput" type="password" id="password" name="password" required placeholder="Enter your password"><br>
            </div>
            <input class="btn" type="submit" value="Submit">
                    <span style="color: red;"><?php echo  $notice ?></span>
        </form>
    </div>
</form>
</body>
</html>