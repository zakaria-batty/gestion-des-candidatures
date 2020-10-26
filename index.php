<?php
include('includes/header.php');
include('includes/db.php');
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Inscription</h3>
                </div>
                <div class="card-body ">
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'Inscription') :
                        echo "<div class='alert alert-success'>le demande D'inscription a été succès</div>";
                    endif;
                    if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
                        echo "<div class='alert alert-danger'>err</div>";
                    endif;
                    ?>
                    <form method="post" class="mr-1" action="checklog.php">
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope-open text-primary"></i> </div>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i> </div>
                            </div>
                            <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Connexion</button>
                    </form>

                </div>
                <div class="card-footer">
                    <a href="inscription.php" class="btn btn-link">Inscription</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>