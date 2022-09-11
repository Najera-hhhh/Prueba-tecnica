<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href={{   URL::asset('css/index.css')  }} rel="stylesheet">
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <form id='form' class="form-content requires-validation" novalidate>
                    <div class="form-items">
                        <h3>Registro</h3>
                        <div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="name" id="name" placeholder="Usuario*" oninvalid="this.setCustomValidity('Por favor, Ingresa un usuario')" required>
                                <div class="text-danger d-none">Ingrese un nombre </div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="email" id="email" placeholder="E-mail*" oninvalid="this.setCustomValidity('Por favor, Ingresa un email')" required>
                                <div class="text-danger d-none">El correo no tiene el formato correcto </div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" id="password" onkeyup="veryfyPasswoord()" placeholder="Password*" oninvalid="this.setCustomValidity('Por favor, Ingresa un contraseña')" required>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="password" id="password-repeat" placeholder="Repeat Password" onkeyup="veryfyPasswoord()" required>
                                <div class="text-danger d-none" id='match'>La contraseñas no coinciden</div>
                                <div class="text-danger d-none">La contraseñas debe tener mínimo 6 caracteres y máximo 12</div>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="number" id="age" placeholder="Edad" required>
                                <div class="text-danger d-none">La edad debe de ser mayor a 18</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-items ms-5">
                        <h3>Estado</h3>

                        <div class="text-danger d-none" id='match'>Minimo 2 estados</div>
                        <div class="text-danger d-none" id='match'>Minimo 3 ciudades por estado</div>

                        <div class="col-md-12" style="display: flex; flex-direction: row; align-items: center;">
                            <select id="select_estado" class="form-select mt-3 " required>

                            </select>
                            <span><button id='add_estado' class="btn btn-warning mt-3 ms-2">+</button></span>
                        </div>

                        <div id='list_estados' class="scroll-menu">
                        </div>

                        <!--templete estados!-->
                        <div name="templete" id="templete" class="col-md-12 form-items-submenu mt-5 d-none">

                            <div style="display: flex; flex-direction: row; align-items: center;">
                                <h3 class="ps-4 pt-2 form-check-label">Yucatan</h3>
                                <button id='remove' class="btn-sm btn-danger mt-1 ms-2 " onclick="remove(this)">x</button>
                            </div>
                            <div class="ps-4 pe-4 pb-4" style="display: flex; flex-direction: row; align-items: center;">
                                <select class="form-select" required>

                                </select>
                                <span><button onclick="addCities(this)" class="btn btn-info mt-3 ms-2 x2">+</button></span>
                            </div>
                            <div class="d-flex flex-column gap-3 justify-content-center align-items-center mb-2">

                            </div>
                        </div>
                        <!--templete estados!-->

                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src={{   URL::asset('js/index.js')  }}></script>
</body>

</html>
