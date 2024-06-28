<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/trainmvc/scss/SignUpScss.css">
</head>
<body>
    <div class="container">
        <form action="?act=processSignUp" method="POST">
            <div class="component">
                <label for="username">Username:</label><br>
                <input class="textInput" type="text" id="username" name="username" required>
                <span style="color: red;"><?php echo  $noticeU ?></span><br>
            </div>

            <div class="component">
                <label for="email">Email:</label><br>
                <input class="textInput" type="email" id="email" name="email" required><br>
                <span style="color: red;"><?php echo  $noticeE ?></span><br>
            </div>
            <input class="btn" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>