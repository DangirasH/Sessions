<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['loginname'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
    exit();
}
?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    unset($_SESSION['cookies'][$_GET['delete']]);
    header('Location: cart.php');
    exit();
}
if (empty($_SESSION['cookies'])) { ?>
    <section class="cookies container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <h2>Votre panier est vide</h2>
            </div>
        </div>
    </section>
<?php } ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php
        foreach ($catalog as $id => $cookie) {
            if (isset($_SESSION['cookies'][$id])) {
        ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $cookie['name']; ?></h3>
                            <p><?= $cookie['description']; ?></p>
                            <span><?= $_SESSION['cookies'][$id]; ?></span>
                            <div><a href="cart.php?delete=<?= $id; ?>" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Delete to cart
                                </a></div>
                        </figcaption>
                    </figure>
                </div>
        <?php }
        } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>