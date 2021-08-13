<!doctype html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf-8"
        src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript" charset="utf-8" src="js/table.clients.js"></script>
</head>

<body class="bootstrap4 p-0 m-0">
    <div class="container-fluid p-4">
        <div class="row p-1">
            <div class="col-8 p-1 border" id="clients">
                <h1><b>Editor:</b> Clientes</h1>
                <div id="alertPrin" class="alert alert-success" role="alert">
                    <button id="alert-close" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="alert-heading">Well done!</h4>
                    <pre id="alert-data"></pre>
                </div>
                <div class="row p-0 m-0">
                    <div class="col">
                        <div class="btn-group btn-block mb-2" role="group" aria-label="Basic example">
                            <button type="button" id="add" class="btn btn-success">Agregar</button>
                            <button type="button" id="mod" class="btn-special btn btn-primary" disabled>Editar</button>
                            <button type="button" id="del" class="btn-special btn btn-danger" disabled>Borrar</button>
                        </div>

                        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered"
                            id="clientsDataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Groupo de Cliente</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <div id="editor" class="col-3 border p-1 d-none">
                        <h1 class="d-flex"><b>Editor:</b>
                            <button id="editor-close" type="button" class="ml-auto close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </h1>
                        <form id="form-editor">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Apellido</label>
                                <input type="text" class="form-control" name="lastname" id="lastname"
                                    placeholder="Apellido" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="name@example.com" value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Groupo de Cliente</label>
                                <select class="form-control" name="groupClient" id="groupClient">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observaciones</label>
                                <textarea class="form-control" id="observations" name="observations"
                                    rows="3"></textarea>
                            </div>

                            <button type="submit" id="senddata" class="btn-block btn btn-primary">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col p-1 border">
                <h1 class="d-flex"><span><b>Editor:</b> Groupo de Clientes</span><button id="add-GC" type="button"
                        class="ml-auto btn btn-secondary">+</button></h1>
                <form class="border mb-1 d-none" id="addGroupClient">
                    <div class="form-row p-0 m-0">
                        <div class="p-1 m-0 col">
                            <input name="GCnameVal" type="text" id="GCnameVal" class="form-control"
                                placeholder="Groupo de Clientes" value="">
                        </div>
                        <div class="p-1 m-0 col-2">
                            <button type="submit" id="GCnameBtn" class="form-control btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </form>
                <div class="border" id="colGroupClient">
                    <div class="row m-1 font-weight-bold border" id="rowGroupClient">
                        <div class="col" id="GCname">Nombre
                        </div>
                        <div class="col-2" id="GCedit">EDITAR
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>