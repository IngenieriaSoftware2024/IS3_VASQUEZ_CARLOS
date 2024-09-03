<h1 class="text-center mb-4 text-primary">BIENVENIDO A LA PAGINA DE CARGO EXPRESSO</h1>

<div class="row justify-content-center">
    <form class="col-lg-4 border rounded shadow p-4 bg-light">
        <h3 class="text-center mb-4"><b>INICIO DE SESION</b></h3>
        <div class="text-center mb-4">
            <img src="<?= asset('./images/login.png') ?>" alt="Logo" class="img-fluid rounded-circle">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usu_catalogo" class="form-label">Ingrese su Codigo</label>
                <input type="number" name="usu_catalogo" id="usu_catalogo" class="form-control" placeholder="Ingresa tu codigo">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="usu_password" class="form-label">Contraseña</label>
                <input type="password" name="usu_password" id="usu_password" class="form-control" placeholder="Ingresa tu contraseña">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    Iniciar sesión
                </button>
            </div>
        </div>
    </form>
</div>

<script src="<?=  asset('/build/js/login/login.js' )?>" ></script>