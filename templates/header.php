
<!DOCTYPE html lang="en" class="full-height">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title><?php echo $title ?></title>
</head>
<body dir="auto">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand">Blog System</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-auto" method="POST" action="search.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php
            if(session_status() == PHP_SESSION_ACTIVE){
                echo "
                    <form class=\"form-inline my-2 my-lg-0\" method=\"POST\" action=\"search.php\">
                        <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Log Out</button>
                    </form>
                ";
            } else {
                echo "
                    <div class=\"row\">
                        <form class=\"col-6 form-inline my-2 my-lg-0\" method=\"POST\" action=\"search.php\">
                            <button class=\"btn btn-success my-2 my-sm-0\" type=\"submit\">Login</button>
                        </form>
                        <form class=\"col-6 form-inline my-2 my-lg-0\" method=\"POST\" action=\"search.php\">
                            <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Sign in</button>
                        </form>
                    </div>
                ";
            }
        ?>
        </div>
    </nav>
</header>



