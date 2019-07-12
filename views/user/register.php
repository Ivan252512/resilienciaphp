<section id="main" class="wrapper">
    <div class="container">

        <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
            <strong class="alert_green">Registro completado correctamente</strong>
        <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
            <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
        <?php endif; ?>

        <form action="<?= base_url ?>User/save" method="POST" enctype="multipart/form-data">
            <label for="name">Nombre</label>
            <input type="text" name="name" required />

            <label for="email">Email</label>
            <input type="email" name="email" required />

            <label for="password">Contraseña</label>
            <input type="password" name="password" required />

            <label for="slogan">Frase de presentación</label>
            <input type="text" name="slogan" required />

            <label for="description">Presentación</label>
            <input type="text" name="description" required />

            <label for="image">Fotografía de usuario</label>
            <input type="file" name="image" required />

            <br>
            <br>

            <input type="submit" value="Registrarse" />
        </form>

    </div>
</section>