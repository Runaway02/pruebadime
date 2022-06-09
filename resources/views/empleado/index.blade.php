<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dime</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Empleados</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mantenimiento
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Propietarios</a></li>
                            <li><a class="dropdown-item" href="#">Médicos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Citas</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Lista de Empleados</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Nuevo Empleado</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <h3>Lista Empleados</h3>
                <table id="tabla-empleado" class="table table-hover">
                    <thead>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td>Sexo</td>
                        <td>Área</td>
                        <td>Boletin</td>
                        <td>Acciones</td>

                    </thead>

                </table>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h3>Nuevo Empleado</h3>

                <form id="registro-empleado">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre Completo*</label>
                        <input class="form-control" type="text" name="nombre" id="nombre">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico*</label>
                        <input class="form-control" type="text" name="email" id="email">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="sexo">Sexo*</label>
                        <br>
                        <input type="radio" id="sexo" name="sexo" value="M">
                        <label for="M">Masculino</label><br>
                        <input type="radio" id="sexo" name="sexo" value="F">
                        <label for='F'>Femenino</label><br>
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="id_area">Área*</label>
                        <select name="id_area" id="id_area" class="form-control">
                            @foreach($areas as $area)
                            <option value="{{$area['id']}}"> {{$area['nombre']}}</option>
                            @endforeach
                        </select>
                        <br>

                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción*</label>
                        <br>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        <br>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="boletin" id="boletin">
                            <label class="form-check-label" for="boletin">
                                Deseo recibir boletín informativo
                            </label>
                            <br>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="rol">Roles*</label>
                            @foreach($roles as $rol)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="rol" id="rol" value="{{$rol['id']}}">
                                <label class="form-check-label" for="boletin">{{$rol['nombre']}}</label>
                                <br>
                            </div>
                            @endforeach
                        </div>

                        <br>
                        <button class="btn btn-primary" type="submit">Registrar</button>

                        <a class="btn btn-primary" href="{{url('empleado/')}}">Regresar</a>

                        <br>
                </form>
            </div>
        </div>
    </div>

    </div>
    <script>
        $(document).ready(function() {
            var tablaEmpleado = $('#tabla-empleado').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{route('empleado.index')}}",
                },
                columns: [{
                        data: 'nombre'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'sexo'
                    },
                    {
                        data: 'area_id'
                    },
                    {
                        data: 'boletin'
                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });
        });
    </script>

    <script>
        $('#registro-empleado').submit(function(e) {
            e.preventDefault();
            var nombre = $('#nombre').val;
            var email = $('#email').val;
            var sexo = $("input[name='sexo':checked]").val();
            var id_area = $('#id_area').val;
            var descripcion = $('#descripcion').val;
            var boletin = $('#boletin').serialize();
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{route('empleado.create')}}",
                type: "POST",
                data: {
                    nombre: nombre,
                    email: email,
                    sexo: sexo,
                    id_area: id_area,
                    descripcion: descripcion,
                    boletin: boletin,
                    _token: _token
                },
                success: function(response) {
                    if (response) {
                        $('#registro-empleado')[0].reset();
                        $('#tabla-empleado').DataTable.ajax.reload();
                    }
                }
            });
        });
    </script>
</body>

</html>