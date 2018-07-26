<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>Admin - Login</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">        
        <style>
            #login-card {
                margin-top: 25%;
            }
            #login-card h2 {
                text-align: center;
            }
            .alert {
                margin-top: 10px;
            }
        </style>
        <!-- Firebase -->
        <script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
        <script src="/js/firebase.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div id="login-card" class="card card-default">
                        <div class="card-body">
                            <form id="login-form" method="post">
                                <h2>Sam's TV Service Login</h2>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Email</label>
                                    <input type="password" name="password" class="form-control" value="" placeholder="Email" />
                                </div>
                                <input type="submit" class="btn btn-primary" value="Login" />
                                <a href="/" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                    <div id="login-status-message"></div>                    
                </div>
            </div>
        </div>
    </body>
</html>
