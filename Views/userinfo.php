<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventorizer Web App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../resources/css/box.png" />
    <link rel="stylesheet" type="text/css" href="../resources/css/global.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="../resources/js/loginScripts.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light text-left">
        <span class="material-icons float-xl-left float-md-right text-center align-middle">
            inventory_2
        </span>
        <a class="navbar-brand font-weight-bold text-center d-none d-lg-block" href="#">
            Inventorizer
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-center " href="/Inventorizer/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-center " href="/Inventorizer/stashes">Stashes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-center " href="/Inventorizer/categories">Categories</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-center " href="/Inventorizer/items">Items</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <!--Aqui comienza el cambio de la barra de navegacion-->
                    <a class="nav-link dropdown-toggle font-weight-bold text-center align-middle" href="#"
                        id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="material-icons float-md-left float-md-right text-center align-middle ml-2">
                            account_circle
                        </span>
                        <?php echo $_SESSION['displayid']; ?>
                    </a>
                    <!--Botones de accion del menu-->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#view">
                                View Account
                            </button>
                        </a>
                        <a class="dropdown-item" href="#">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modify">
                                Modify Account
                            </button>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#delete">
                                Delete Account
                            </button>
                        </a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold text-center" href="/Inventorizer/logout">
                        <span class="material-icons float-md-left float-md-right text-center align-middle">
                            logout
                        </span>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Modal de ver cuenta-->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> View Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--CUERPO DEL MODAL-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="material-icons float-right ml-1">
                            close
                        </span>Close
                    </button>

                </div>
            </div>
        </div>
    </div>
    <!--Modal de modificar cuenta-->
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Modify Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--CUERPO DEL MODAL-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="material-icons float-right ml-1">
                            close
                        </span>Cancel
                    </button>
                    <button type="button" class="btn btn-primary">
                        <span class="material-icons float-right ml-1">
                            save
                        </span>Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal de eliminar cuenta-->
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Delete Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--CUERPO DEL MODAL-->
                    <h5>This action cannot be undone, are you sure you want to proceed?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="material-icons float-right ml-1">
                            close
                        </span>Cancel
                    </button>
                    <button type="button" class="btn btn-danger">
                        <span class="material-icons float-right ml-1">
                            delete
                        </span>Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>