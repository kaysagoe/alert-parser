<!DOCTYPE html>
<html>
<head>
  <title>New Key | Bank Alert Parser API</title>
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= "$root/app/resources/styles/styles.css"?>" type="text/css" />
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
                            <li role="presentation"><a href="<?= "$root/user/home" ?>">Dashboard</a></li>
                            <li role="presentation"><a href="#">Log out</a></li>
                        </ul>
                    </nav>
                </div>
          </div>
<div class="row">
    <div class="col-md-12">
      <h1>New Key</h1>
    </div>
  </div>
  <div class="row">
    <div class = "col-md-2"></div>
                <div class = "col-md-8">
                    <div class="center-block">
                    <form method="post" action="./new">
                        <div class="form-group">
                            <label for="name">Application Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Application Name">
                        </div>
                        <button type="submit" class="btn btn-primary text-center">Create</button>
                    </form>
                </div>
                </div>
                <div class = "col-md-2"></div>
    </div>
  </div>
</div>
</body>
</html>