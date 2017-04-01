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
                            <li role="presentation"><a href="#">Login</a></li>
                            <li role="presentation"><a href="#">Signup</a></li>
                        </ul>
                    </nav>
                </div>
          </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="text-center">Process Nigerian bank alerts</h1>
                    <h4 class="text-center top-margin25">Convert bank alert emails to structured data</h4>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary top-margin25 text-center">Get Started</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Demo</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img class="center-block" src="./app/resources/assets/image.png" alt="alert example" >
            </div>
        </div>
        <div class="row top-margin25">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="post" action"#">
                    <div class="form-group">
                        <textarea class="form-control min-height400" name="alert-example" placeholder="Enter alert message...">
Dear DOE, JANE
Guaranty Trust Bank eLectronic Notification Service (GeNS)
We wish to inform you that a Debit transaction occured on your account with us

The details of the transaction are shown below:
Transaction Notification
Account Number : ******1234
Transaction Location : IKEJA- ALLEN
Amount : 10.00
Value Date : 01-Jan-2000
Remarks :
Time of Transaction : 12:00 AM
Document Number : 0

The balances on this account as at 12:00 AM are as follows;
Current Balance:
1,000,000.00 Naira
Available Balance :
1,000,000.00 Naira

Thank you for choosing Guaranty Trust Bank plc
                        </textarea>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Test</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Supported Banks</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><p>Guaranty Trust Bank</p></li>
                    <li><p>Wema Bank</p></li>
                </ul>
            </div>
        </div>
        </div> 
    </body>
</html>