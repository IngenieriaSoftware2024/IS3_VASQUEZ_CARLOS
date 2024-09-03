<h1 class="text-center">Bienvenido a la pagina principal de CARGO EXPRESSO</h1>


<?php if ($_SESSION['user']['rol_nombre_ct'] == 'USER') : ?>
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="card text-center shadow-lg">
                <div class="card-header bg-primary text-white">
                    ¡Bienvenido, <?= $_SESSION['user']['usu_nombre'] ?>!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Has ingresado a la aplicación</h5>
                    <p class="card-text">CARGO EXPRESSO</p>
                </div>
                <div class="card-footer text-muted">
                    Usted puede ver el estado de sus envios, estamos para ayudarte
                </div>
            </div>
        </div>
    </div>
<?php elseif ($_SESSION['user']['rol_nombre_ct'] == 'ADMINISTRATIVO') : ?>
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="card text-center shadow-lg">
                <div class="card-header bg-warning text-white">
                    ¡Bienvenido, <?= $_SESSION['user']['usu_nombre'] ?>!
                </div>
                <div class="card-body">
                    <h5 class="card-title">Usted es administrador de la pagina</h5>
                    <p class="card-text">CARGO EXPRESSO</p>
                </div>
                <div class="card-footer text-muted">
                    Usted puede obtener informacion sobre las estadisticas, envios realizados y la ubicacion de los pedido.
                </div>
            </div>
        </div>
    </div>
<?php elseif ($_SESSION['user']['rol_nombre_ct'] == 'ADMINSTRADOR') : ?>
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="card text-center shadow-lg">
                <div class="card-header bg-danger text-white">
                    ¡Bienvenido, <?= $_SESSION['user']['usu_nombre'] ?>!
                </div>
                <div class="card-body">
                    <h5 class="card-title">USTED ES ADMINISTRADOR DE LA APLICACION</h5>
                    <p class="card-text">CARGO EXPRESSO</p>
                </div>
                <div class="card-footer text-muted">
                    Usted puede administrar los pedidos de los clientes, ver las estadisticas de los envios asi mismo el mapa general de los pedidos
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
