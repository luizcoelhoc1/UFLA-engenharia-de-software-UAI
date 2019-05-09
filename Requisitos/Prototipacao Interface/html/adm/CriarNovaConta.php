<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>[@titulo]</title>
        <meta name="description" content="">
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="" /><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">UAI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-plus"></i>
                            Cadastrar nova conta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-alt"></i>
                            Cadastrar novo projeto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-arrows-alt-h"></i>
                            Designar funcion&aacute;narios
                        </a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    [nome_adm]<i class="fas fa-cog"></i>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active p-3" id="selecao" role="tabpanel" aria-labelledby="one-tab">
                    <br />
                    <br />
                    <div>
                        <h3>Escolha um novo tipo de conta</h3>
                        <div class="row">
                            <a class="btn btn-outline-success col-md-12" id="admBtn" data-toggle="tab" href="#form" role="tab" aria-controls="One" aria-selected="true">Criar uma nova conta para um Administrador</a>
                        </div>
                        <br />  
                        <div class="row">
                            <a class="btn btn-outline-success col-md-12" id="funcBtn" data-toggle="tab" href="#form" role="tab" aria-controls="One" aria-selected="true">Criar uma nova conta para um Funcionario</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-3" id="form" role="tabpanel" aria-labelledby="two-tab">
                    <div class="row">
                        <a class="btn btn-outline-danger col-md-4" id="voltarBtn" data-toggle="tab" href="#selecao" role="tab" aria-controls="One" aria-selected="true">Voltar e escolher outra conta</a>
                        <div class="col-md-8">
                            <h2 style="text-align: center;">Criando nova conta de [novaconta]</h2>
                        </div>
                    </div>

                    <br />
                    <br />
                    <br />


                    <form style="border: lightgray solid 1px; padding: 3% 10% 3% 10%;">
                        <div class="form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">CPF</div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Digite o CPF da nova conta">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Nome</div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Digite o nome do usu&aacute; da nova conta">
                                    </div>
                                </div>
                            </div>


                            <br />


                            <div class="row">
                                <div class="col-md">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Email</div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Digite Email da nova conta">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Senha</div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Digite a senha nova conta">
                                    </div>
                                </div>
                            </div>

                            <br />

                            <div class="row">
                                <div class="col-8"></div>
                                <button type="submit" class="btn btn-outline-success col-4">Criar Conta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </a>
    </div>


</div><!-- /.container -->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>