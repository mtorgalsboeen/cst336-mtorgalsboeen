<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="col-xs-1" align="center">
            <img src="img/7842_m3.png" heigh="250" width="250"></img>
            <div class="container">
            <h1>Login</h1>
            <p>You can log in using usernames <strong>mathias</strong> or <strong>mtorgalsboeen</strong>. The password is <strong>admin</strong>.</p>
        
        <!--Form to enter credentials-->
        <div class="col-sm-6">
            <form method="post" action="verifyUser.php">
                <div class="form-group">
                    <input type="text" name="username" placeholder="username"/><br>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="password"/><br>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Login</button>
            </form>
        </div>
        </div>
        </div>
    </body>
</html>