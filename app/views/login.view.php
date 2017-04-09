<!DOCTYPE html>
<html>
    <head>
        <title>Login | Bank Alert Parser API</title>
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
                            <li role="presentation"><a href="./">Home</a></li>
                            <li role="presentation"><a href="./docs">API Documentation</a></li>
                            <li role="presentation" class="active"><a href="./user/home">Login</a></li>
                            <li role="presentation"><a href="./user/new">Signup</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Login</h1>
                </div>
            </div>
            <div class ="row">
                <div class = "col-md-3"></div>
                <div class = "col-md-6">
                    <div class="center-block">
                    <form method="post" action="./user/home">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" >
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
                <div class = "col-md-3"></div>
                
            </div>
        </div>
    </body>
</html>