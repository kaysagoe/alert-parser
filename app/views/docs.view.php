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
                            <li role="presentation"><a href="./">Home</a></li>
                            <li role="presentation" class="active"><a href="./docs">API Documentation</a></li>
                            <li role="presentation"><a href="#">Login</a></li>
                            <li role="presentation"><a href="#">Signup</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Guide</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>The Alerts Parser API converts Bank Alerts email messages and returns the information in the alert notification as structured data.</p>
                    <p>A Parse Alert request is an HTTP URL in the following form:</p>
                    <div class="grey-background">
                        <p class="text-primary">http://alertparser.herokuapp.com/api?parameters</p>
                    </div>
                    <p>Certain parameters are required to initiate a Parse Alert request. As is standard in URLs all parameters are separated using the ampersand (&) character.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Required Parameters</h3>
                    <ul>
                        <li><p><b>key</b> - Your application’s API key. The key is used to authentication purposes when requests are made</p></li>
                        <li><p><b>text</b> - The content of the email message containing the alert notification, which may be in HTML or plain text form. The content has to be encoded before it is used in the request.</p></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Responses</h3>
                    <p>The response of the API request is in JSON format.</p>
                    <p>The following shows an example of a response of an API Request</p>
                    <div class="grey-background">
                        {
                            "status":"OK",
                            "results":{
                                "bankid":1,
                                "lastname":"DOE",
                                "firstname":"JANE",
                                "type":"Debit",
                                "accountnumber":"******1234",
                                "location":"IKEJA- ALLEN",
                                "description":null,
                                "amount":10,
                                "date":"01-Jan-2000",
                                "remarks":"",
                                "time":"12:00 AM",
                                "documentnumber":"0",
                                "currentbalance":1000000,
                                "accountbalance":1000000
                                }
                        }
                    </div>
                    <ul>
                        <li><p><b>"status"</b> - It contains the metadata on the request</p></li>
                        <li><p><b>"results"</b> - It contains data from the alert notification sent in the request</p></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Status Codes</h3>
                    <ul>
                        <li><p><b>OK</b> indicates that no errors occured and the alert has been successfully parsed</p></li>
                        <li><p><b>REQUEST_DENIED</b> indicates that your request was denied, usually because the API key was incorrect</p></li>
                        <li><p><b>INVALID_REQUEST</b> indicates that a parameter is missing or the data in a parameter is insufficient</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>