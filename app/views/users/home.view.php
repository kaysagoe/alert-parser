<!DOCTYPE html>
<html>
<head>
  <title>Home | Bank Alert Parser API</title>
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
                            <li role="presentation" class="active"><a href="./">Home</a></li>
                            <li role="presentation"><a href="./docs">API Documentation</a></li>
                            <li role="presentation"><a href="./user/home">Dashboard</a></li>
                            <li role="presentation"><a href="#">Log out</a></li>
                        </ul>
                    </nav>
                </div>
          </div>
<div class="row">
    <div class="col-md-11">
      <h1>My API Keys</h1>
    </div>
    <div class="col-md-1">
      <a href="/apikey/new" class="btn btn-success pull-right top-margin25">Create</a>
    </div>
  </div>
  <div class="row">
    <div class="table-responsive">
      <table class="table">
        <th>
        <td>Application Name</td>
        <td>Key</td>
        <td>Options</td>
        </th>
        <?php foreach($keys as $key) : ?>
            <tr>
                <td><?= $key->name; ?></td>
                <td><?= $key->key; ?></td>
                <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>