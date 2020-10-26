<?php
include('includes/header.php');
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Connexion</h3>
                </div>
                <div class="card-body ">
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                    <form method="post" class="mr-1" action="checklog.php">

                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user text-primary"></i> </div>
                            </div>
                            <input type="text" name="nom" class="form-control" placeholder="Entré le Nom" required>
                        </div>

                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user text-primary"></i> </div>
                            </div>
                            <input type="text" name="prenom" class="form-control" placeholder="Entré le prénom" required>
                        </div>

                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope-open text-primary"></i> </div>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i> </div>
                            </div>
                            <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-shield text-primary"></i> </div>
                            </div>
                            <select name="profile" class="custom-select">
                                <option selected>Choose profile</option>
                                <option value="RH">RH</option>
                                <option value="Condida">Condida</option>
                            </select>
                        </div>
                        <button type="submit" name="Inscription" class="btn btn-sm btn-primary">Inscription</button>
                    </form>

                </div>
                <div class="card-footer">
                    <a href="index.php" class="btn btn-link">Connexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>