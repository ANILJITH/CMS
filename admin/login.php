<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css"/>
    </head>
    <body>
        <div class="wrapper">
            <div class="loginpanel">
                <form name="form1" method="post" action="/profit/login.php">
                <div class="log_header">Canteen Management System</div>
                <div class="username">
                    <input class="login" required placeholder="Enter user name" type="text" name="username" />
                </div>
                
                <div class="password">
                    <input class="login" required placeholder="Enter password" type="password" name="password" />
                </div>
                <div class="password">
                    <input class="sub" value="Login" type="submit" name="submit" />
                </div>
                </form>
                <div style="color:#A80000;text-align:center;font-weight:bold;padding-top:10px;">
                </div>
            </div>
        </div>
    </body>
</html>
