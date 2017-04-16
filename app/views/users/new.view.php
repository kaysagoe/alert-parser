<!DOCTYPE html>
<html>
    <head>
        <title>Signup | Bank Alert Parser API</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="./app/resources/styles/styles.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6" role="navigation">
                    <nav>
                        <ul class="nav nav-tabs pull-right">
                            <li role="presentation"><a href="<?= $root ?>">Home</a></li>
                            <li role="presentation"><a href="<?= "$root/docs" ?>">API Documentation</a></li>
                            <li role="presentation"><a href="<?= "$root/user/home" ?>">Login</a></li>
                            <li role="presentation"><a href="<?= "$root/user/new" ?>">Signup</a></li>
                        </ul>
                    </nav>
                </div>
          </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Sign Up</h1>
                </div>
            </div>
            <div class ="row">
                <div class = "col-md-2"></div>
                <div class = "col-md-8">
                    <div class="center-block">
                    <form method="post" action="./new">
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary text-center">Signup</button>
                    </form>
                </div>
                </div>
                <div class = "col-md-2"></div>
                
            </div>
        </div>
    </body>
</html>