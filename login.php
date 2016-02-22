<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Les 05 - Dashboard</title>

        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Les 05</a>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="POST" action="app/authenticate.php">
                                <div class="form-group">
                                    <label for="username">Gebruikersnaam</label>
                                    <input type="text" class="form-control" id="username" placeholder="Gebruikersnaam">
                                </div>
                                <div class="form-group">
                                    <label for="password">Wachtwoord</label>
                                    <input type="password" class="form-control" id="password" placeholder="Wachtwoord">
                                </div>
                                <button type="submit" class="btn btn-primary">Inloggen</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
