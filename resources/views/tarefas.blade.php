<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tarefas</title>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand ms-2 pe-3 border-end border-secondary user-select-none" href="#">LISTA DE TAREFAS</span>
    </div>
    </nav>

    <div class="container mt-3">

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show user-select-none " role="alert">
                    {{ $error }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        
        <div class="row">
            <div class="col-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-body user-select-none">
                        <h5 class="card-title bold-700 pb-3 mb-3 border-bottom text-center">Nova tarefa</h5>
                        <form method="post" action="{{ route('guardarTask') }}">
                        @csrf
                            <strong>Tarefa</strong>
                            <input type="text" class="form-control mb-3" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <strong>Descrição</strong>
                            <textarea class="form-control mb-3" name="description"></textarea>
                            <strong>Data Limite</strong>
                            <input type="date" class="form-control mb-3" name="finish_date">

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-light border border-2 ">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col align-self-stretch">
                @if (empty($tarefas))
                <div class="alert alert-secondary fade show" role="alert"> 
                    <div class="d-flex justify-content-center">
                        <strong> Não existem tarefas atualmente. </strong>
                    </div>
                </div>
                @endif

                @foreach($tarefas as $tarefa)
                    <ul class="list-group mb-4">
                        <li class="list-group-item active">
                            <div class="row">
                                <div class="col"> 
                                    {{ $tarefa->name }}
                                </div>

                                <div class="col d-flex justify-content-end"> 
                                    Terminar até: {{ $tarefa->finish_date }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    {{ $tarefa->description }} 
                                </div>

                                <div class="col d-flex justify-content-end align-items-end">
                                    <a href="{{ route('deleteTask', $tarefa->id) }}" class="btn btn-danger" style="height: 40px">Eliminar</a>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>