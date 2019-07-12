<section id="main" class="wrapper">
    <div class="container">

        <form action="<?= base_url ?>User/login" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" required />

            <label for="password">Contraseña</label>
            <input type="password" name="password" required />

            <input type="submit" value="Registrarse" />
        </form>

        <a href="<?= base_url ?>User/register"></a>

    </div>
</section>
