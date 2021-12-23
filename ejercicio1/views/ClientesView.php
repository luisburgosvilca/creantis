<?php

  class ClientesView{

    public function FormularioClientesView($clientes){

      ?>
        <html lang="es">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Hugo 0.88.1">
            <title>Registros de Clientes con PHP, Javascript y Bootstrap v5.1</title>

            <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">

            <!-- Bootstrap core CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <!-- Favicons -->
            <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png" sizes="180x180">
            <link rel="icon" href="/assets/images/favicon-32x32.png" sizes="32x32" type="image/png">
            <link rel="icon" href="/assets/images/favicon-16x16.png" sizes="16x16" type="image/png">
            <link rel="manifest" href="assets/images/manifest.json">
            <link rel="mask-icon" href="/assets/images/safari-pinned-tab.svg" color="#7952b3">
            <link rel="icon" href="assets/images/favicon.ico">

            <meta name="theme-color" content="#7952b3">

            <script src="https://kit.fontawesome.com/e1ed3136cb.js" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="assets/css/estilos.css">

            <!-- Custom styles for this template -->
            <link href="assets/css/form-validation.css" rel="stylesheet">
            <meta name="chromesniffer" id="chromesniffer_meta" content="{&quot;Bootstrap&quot;:-1}">
            <script type="text/javascript" src="chrome-extension://fhhdlnnepfjhlhilgmeepgkhjmhhhjkh/js/detector.js"></script>

            <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script src="assets/js/clientes.js"></script>
          </head>

          <body class="bg-light">

            <div class="container">
              <main>
                <div class="py-5 text-center">
                  <img class="d-block mx-auto mb-4" src="assets/images/cropped-logo-final-transparente.png" alt="" width="200">
                  <h2>Formulario de Clientes </h2>
                  <p class="lead">Esta es la lista de los clientes de Creantis CRM.</p>
                </div>

                <div class="row g-5">

                  <section>
                    <div class="col-12">
                      <nav>
                        <h4 class="mb-3">Lista de Clientes </h4>
                        <!-- <button class="btn btn-secondary btn-sm" id="nuevo_cliente" type="button">Nuevo Cliente</button> -->
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#registrar_cliente" onclick="LimpiarCampos()">
                        Nuevo Cliente
                        </button>
                      </nav>
                        <div class="table-responsive">
                          <hr>
                          <div id="resultado">
                            <table class="table table-striped table-sm table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">DNI</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Apellido</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Dirección</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                  foreach ($clientes as $cliente){
                                    //echo $cliente['dni']."<br>";
                                    ?>
                                  <tr>
                                    <td><?php echo $cliente['cliente_id']?></td>
                                    <td><?php echo $cliente['dni']?></td>
                                    <td><?php echo $cliente['nombre']?></td>
                                    <td><?php echo $cliente['apellido']?></td>
                                    <td><?php echo $cliente['email']?></td>
                                    <td><?php echo $cliente['direccion']?></td>
                                    <td>

                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar_cliente" id="btn_editar_cliente"
                                      data-cliente_id="<?php echo $cliente['cliente_id']?>"
                                      data-dni="<?php echo $cliente['dni']?>"
                                      data-nombre="<?php echo $cliente['nombre']?>"
                                      data-apellido="<?php echo $cliente['apellido']?>"
                                      data-email="<?php echo $cliente['email']?>"
                                      data-direccion="<?php echo $cliente['direccion']?>"
                                      ><i class="fas fa-pencil-alt"></i></button>

                                      <button type="button" class="btn btn-danger btn-sm" id="eliminar_cliente"
                                      data-cliente_id="<?php echo $cliente['cliente_id']?>"
                                      data-dni="<?php echo $cliente['dni']?>"
                                      data-nombre="<?php echo $cliente['nombre']?>"
                                      data-apellido="<?php echo $cliente['apellido']?>"
                                      data-email="<?php echo $cliente['email']?>"
                                      data-direccion="<?php echo $cliente['direccion']?>"
                                      ><i class="fas fa-trash"></i></button>
                                    </td>
                                  </tr>
                                    <?php
                                  }

                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </section>

                </div>
              </main>

              <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">© 2021 Luis Burgos</p>
                <!-- <ul class="list-inline">
                  <li class="list-inline-item"><a href="#">Privacy</a></li>
                  <li class="list-inline-item"><a href="#">Terms</a></li>
                  <li class="list-inline-item"><a href="#">Support</a></li>
                </ul> -->
              </footer>
            </div><!-- close container -->

            <!-- Modal: Nuevo Cliente -->
            <div class="modal fade" id="registrar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario Registrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-10 col-lg-12">
                      <h4 class="mb-3">Datos del Cliente</h4>
                      <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                          <div class="col-sm-6">

                            <label for="username" class="form-label">DNI</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text">#</span>
                                <input type="text" class="form-control" id="dni" placeholder="DNI" required="">
                                <div class="invalid-feedback">
                                  Su DNI es requerido.
                                </div>
                              </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="John" value="" required="">
                            <div class="invalid-feedback">
                              Su nombre es requerido.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="lastName" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Doe" value="" required="">
                            <div class="invalid-feedback">
                              Su apellido es requerido.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="lastName" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="" required="">
                            <div class="invalid-feedback">
                              Su email es requerido.
                            </div>
                          </div>

                          <div class="col-12">
                            <label for="username" class="form-label">Dirección</label>
                              <div class="input-group has-validation">

                                <input type="text" class="form-control" id="direccion" placeholder="Los Jazmines 354" required="">
                                <div class="invalid-feedback">
                                  Debe registrar su dirección.
                                </div>
                              </div>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn_registrar_cliente" >Registrar</button>
                  </div>
                </div><!-- fin modal-content-->
              </div><!-- fin modal-dialog -->
            </div><!-- fin modal-fade-->
            <!-- Fin Modal: Nuevo Cliente -->

            <!-- Editar Cliente -->
            <div class="modal fade" id="editar_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario Registrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-10 col-lg-12">
                      <h4 class="mb-3">Datos del Cliente</h4>
                      <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                          <div class="col-sm-6">

                            <label for="username" class="form-label">DNI</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text">#</span>
                                <input type="text" class="form-control" id="dni_modal" placeholder="DNI" required="">
                                <input type="hidden" id="cliente_id_modal" name="cliente_id">
                                <div class="invalid-feedback">
                                  Su DNI es requerido.
                                </div>
                              </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre_modal" placeholder="John" required="">
                            <div class="invalid-feedback">
                              Su nombre es requerido.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="lastName" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido_modal" placeholder="Doe" required="">
                            <div class="invalid-feedback">
                              Su apellido es requerido.
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <label for="lastName" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_modal" placeholder="you@example.com" required="">
                            <div class="invalid-feedback">
                              Su email es requerido.
                            </div>
                          </div>

                          <div class="col-12">
                            <label for="username" class="form-label">Dirección</label>
                              <div class="input-group has-validation">

                                <input type="text" class="form-control" id="direccion_modal" placeholder="Los Jazmines 354" required="">
                                <div class="invalid-feedback">
                                  Debe registrar su dirección.
                                </div>
                              </div>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal" id="btn_actualizaar_cliente" >Actualizar</button>
                  </div>
                </div><!-- fin modal-content-->
              </div><!-- fin modal-dialog-->
            </div>
            <!-- Fin Editar Cliente -->


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
            <script src="assets/js/docs.min.js"></script>

            <script src="assets/js/form-validation.js"></script>

          </body>
        </html>
      <?php

    }
  }

?>