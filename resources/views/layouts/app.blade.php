<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href={!! asset('bootstrap/css/bootstrap.min.css') !!}>
  <link rel="stylesheet" href={!! asset('css/app.css') !!}>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="shortcut icon" href={!! url("/img/favicon.ico") !!} type="image/x-icon">

  <title>MagestiCD | Centro de Docencia</title>
</head>

<body>
  <div>

    <!-- Header -->
    <nav class="navbar fixed-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">MagestiCD</a>
        
        <!-- User Dashboard -->
        <div class="dropdown">
          <a href="#" class="dropdown-toggle usr-dashboard" data-bs-toggle="dropdown">UserName &nbsp;<i class="bi bi-person-circle"></i></a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item">Ver Usuarios</a>
                <a href="#" class="dropdown-item">Cerrar Sesión</a>
            </div>
        </div>

      </div>
    </nav>
    

    <!-- Side menu -->
    <div class="container-fluid">
      <div class="row">
        <!-- Side menu Content -->
        <div class="wrap col-10 col-lg-3 side-menu">
          <aside id="side-menu" class="aside" role="navigation">
              <ul class="nav nav-list accordion">
                  <li class="nav-header">
                      <div class="link"><i class="bi bi-send"></i> Diplomados<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                        <li><a href="">Ver Diplomados</a></li>
                        <li><a href="">Alta de diplomado</a></li>
                        <li><a href="">Ver Módulos Programados</a></li>
                        <li><a href="">Ver Catálogo de Módulos</a></li>
                        <li><a href="">Alta de módulo</a></li>

                      </ul>
                  </li>

                  <li class="nav-header">
                      <div class="link"><i class="bi bi-journals"></i>Cursos<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Cursos programados</a></li>
                          <li><a href="">Catálogo de cursos</a></li>
                          <li><a href="">Alta Catálogo</a></li>
                      </ul>
                  </li>

                  <li class="nav-header">
                      <div class="link"><i class="bi bi-person-lines-fill"></i>Profesores<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Alta Profesor</a></li>
                          <li><a href="">Consulta de profesores</a></li>
                          <li><a href="">Categoría y Nivel</a></li>
                      </ul>
                  </li>

                  <li class="nav-header">
                      <div class="link"><i class="bi bi-building"></i>Salones<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Consulta Salones</a></li>
                          <li><a href="">Alta de Salón</a></li>
                      </ul>
                  </li>
                  <li class="nav-header">
                      <div class="link"><i class="bi bi-mortarboard"></i>Carreras<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Consulta Carreras</a></li>
                          <li><a href="">Alta de Carreras</a></li>
                          <!--<li><a href="#">Baja de Salon</a></li>-->
                      </ul>
                  </li>
                  <li class="nav-header">
                      <div class="link"><i class="bi bi-geo-alt"></i>Coordinaciones<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Alta de Coordinación</a></li>
                          <li><a href="">Consulta de coordinaciones</a></li>
                          <li><a href="">Coordinación del Centro de Docencia</a></li>
                          <li><a href="">Secretaría de apoyo</a></li>
                          <li><a href="">Dirección</a></li>

                      </ul>
                  </li>

                  <li class="nav-header">
                      <div class="link"><i class="bi bi-briefcase"></i>Divisiones<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Alta de División</a></li>
                          <li><a href="">Consulta de Divisiones</a></li>
                      </ul>
                  </li>
                  <li class="nav-header">
                      <div class="link"><i class="bi bi-journal-check"></i>Evaluaciones<i class="bi bi-chevron-down"></i></div>
                      <ul class="submenu">
                          <li><a href="">Área 1</a></li>
                          <li><a href="">Área 2</a></li>
                      </ul>
                  </li>
              </ul>
          </aside>
        </div>
        <!-- Main Info -->
        <div class="col-lg-9 main-info">
          @yield('content')
        </div>
      </div>
    </div>

    
    <!-- <footer class="text-center footer footer-link"> -->
      <!-- Grid container -->
      <!-- <div class="container"> -->
        <!-- Section: Links -->
        <!-- <section class="mt-5">

          <div class="row text-center d-flex justify-content-center pt-5">
            <div class="col-md-2">
              <h5 class="text-uppercase font-weight-bold">
                <a class="nav-link footer-link" href="https://www.ingenieria.unam.mx/centrodedocencia/centro.html">Sobre nosotros</a>
              </h5>
            </div>

            <div class="col-md-2">
              <h5 class="text-uppercase font-weight-bold">
                <a class="nav-link footer-link" href="https://www.ingenieria.unam.mx/centrodedocencia/directorio.html">Contacto</a>
              </h5>
            </div>
          </div>
          
        </section>

        <hr class="my-5" />

        <section class="mb-5">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <p>
                <img class="unica-logo" src="{!! url("/img/unica.png") !!}" alt="unica-logo.png">
                Hecho en México, Universidad Nacional Autónoma de México,
                Facultad de Ingeniería,
                <a href="https://www.ingenieria.unam.mx/unica/" class="nav-link">Unidad de Servicios de Cómputo Académico,</a>
                Departamento de Investigación y Desarrollo.
                Todos los derechos reservados 2022.
              </p>
            </div>
          </div>
        </section>
      </div>
    </footer> -->
  </div>
  <script src={!! asset('bootstrap/js/jquery.js') !!}></script>
  <script src={!! asset('bootstrap/js/admin.js') !!}></script>
  <script src={!! asset ('/dist/jquery.fancybox.min.js') !!}></script>
  <script src={!! asset('bootstrap/js/bootstrap.min.js') !!}></script>
  <script src={!! asset('bootstrap/js/bootstrap.bundle.js') !!}></script>
</body>
</html>
