<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Lessen PHP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://klas1-1516.ao/programmeren/41a-php/les05-php/dashboard.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;Welkom, <?= $_SESSION['naam']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-edit"></i>&nbsp;Profiel</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i>&nbsp;Instellingen</a></li>
                        <li><a href="#"><i class="fa fa-question-circle"></i>&nbsp;Help</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="dashboard.php"><i class="fa fa-gear"></i>&nbsp;Dashboard</a></li>
                        <?php if(isAdmin()): ?>
                            <li><a href="adminpanel.php"><i class="fa fa-gear"></i>&nbsp;Admin Panel</a></li>
                            <li role="separator" class="divider"></li>
                        <?php endif; ?>

                        <li><a href="logout.php"><i class="fa fa-lock"></i>&nbsp;Afmelden</a></li>
                    </ul>
                </li>
            </ul>
            <!--            <form class="navbar-form navbar-right">-->
            <!--                <input type="text" class="form-control" placeholder="Zoeken...">-->
            <!--            </form>-->
        </div>
    </div>
</nav>
