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
        <style>
            .center {
                text-align: center;
            }
            .login-or {
                position: relative;
                color: #aaa;
                margin-top: 5px;
                margin-bottom: 5px;
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .box{
                border: lightgray solid 1px; 
                padding: 3% 10% 3% 10%;
            }
        </style>
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
            <br />
            <br />
            <br />
            <div class="box" >
                <div class="row">
                    <div class="col center">
                        <h2>[Nome do projeto 1]</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 center">
                        <strong>Feito por</strong> [Nome do autor do projeto 1]
                    </div>
                    <div class="col-md-6 center">
                        <strong>Fonte:</strong> [Fonte do projeto 1]
                    </div>
                </div>

                <div class="row">
                    <div class="col center">
                        <strong>G&ecirc;neros:</strong> [Generos do projeto 1]
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col center">
                        [Sinopse do projeto 1]
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4 col-sm-12">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#aaa">Editar/Excluir</button>
                    </div>
                </div>
            </div>
            <br />


            <form>
                <div class="modal fade" id="aaa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mude o projeto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nome do projeto</div>
                                                </div>
                                                <input value="[Nome do projeto 1]" type="text" class="form-control" placeholder="Digite o nome do projeto">
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">G&ecirc;neros</div>
                                                </div>
                                                <input value="[Generos do projeto 1]" type="text" class="form-control" placeholder="Digite os g&ecirc;neros do projeto!">
                                            </div>
                                        </div>
                                    </div>
                                    <br />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Autor</div>
                                                </div>
                                                <input value="[Nome do autor do projeto 1]" type="text" class="form-control" placeholder="Digite o nome do autor">
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Fonte original do projeto</div>
                                                </div>
                                                <input value="[Fonte do projeto 1]" type="text" class="form-control" placeholder="Digite qual a fonte original do projeto">
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Sinopse</div>
                                                </div>
                                                <textarea class="form-control">[Sinopse do projeto 1] </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Excluir Projeto</button>
                                <button type="button" class="btn btn-warning">Editar!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



















            <div style="border: lightgray solid 1px; padding: 3% 10% 3% 10%;" >
                <div class="row">
                    <div class="col center">
                        <h2>[Nome do projeto 2]</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 center">
                        <strong>Feito por</strong> [Nome do autor do projeto 2]
                    </div>
                    <div class="col-md-6 center">
                        <strong>Fonte:</strong> [Fonte do projeto 2]
                    </div>
                </div>

                <div class="row">
                    <div class="col center">
                        <strong>G&ecirc;neros:</strong> [Generos do projeto 2]
                    </div>
                </div>
                <div class="col-md-12 ">
                    <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col center">
                        [Sinopse do projeto 2]
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4 col-sm-12">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#aaa">Editar/Excluir</button>
                    </div>
                </div>
            </div>


        </div><!-- /.container -->
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>