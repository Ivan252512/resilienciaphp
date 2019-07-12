<!-- Three -->
<section id="three" class="wrapper style1">
    <div class="container">
        <header class="major special">
            <h2>Mauris vulputate dolor</h2>
            <p>Feugiat sed lorem ipsum magna</p>
        </header>
        <div class="feature-grid">


            <?php while ($u = $users->fetch_object()) : ?>
                <div class="feature">
                    <div class="image rounded"><img src="<?= base_url ?>assets/img/pic04.jpg" alt="" /></div>
                    <div class="content">
                        <header>
                            <h4><?=$u->name;?></h4>
                            <p><?=$u->slogan;?></p>
                        </header>
                        <p><?=$u->description;?></p>
                    </div>
                    <a href="<?=base_url?>User/eliminar&id=<?=$u->id;?>" class="button special small">Eliminar</a>
                </div>
            <?php endwhile; ?>

            <div class="feature">
                <div class="image rounded"><img src="<?= base_url ?>assets/img/pic05.jpg" alt="" /></div>
                <div class="content">
                    <header>
                        <h4>Recusandae nemo</h4>
                        <p>Ratione maiores a, commodi</p>
                    </header>
                    <p>Animi mollitia optio culpa expedita. Dolorem alias minima culpa repellat. Dolores, fuga maiores ut obcaecati blanditiis, at aperiam doloremque.</p>
                </div>
            </div>
            <div class="feature">
                <div class="image rounded"><img src="<?= base_url ?>assets/img/pic06.jpg" alt="" /></div>
                <div class="content">
                    <header>
                        <h4>Laudantium fugit</h4>
                        <p>Possimus ex reprehenderit eaque</p>
                    </header>
                    <p>Maiores iusto inventore fugit architecto est iste expedita commodi sed, quasi feugiat nam neque mollitia vitae omnis, ea natus facere.</p>
                </div>
            </div>
            <div class="feature">
                <div class="image rounded"><img src="<?= base_url ?>assets/img/pic07.jpg" alt="" /></div>
                <div class="content">
                    <header>
                        <h4>Porro aliquam</h4>
                        <p>Quaerat, excepturi eveniet laboriosam</p>
                    </header>
                    <p>Vitae earum unde, autem labore voluptas ex, iste dolorum inventore natus consequatur iure similique obcaecati aut corporis hic in! Porro sed.</p>
                </div>
            </div>
        </div>
    </div>
</section>