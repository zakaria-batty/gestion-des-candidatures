<?php
include('../includes/header.php');
include('../includes/db.php');
session_start();
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card ">

                <div class="card-header bg-dark">
                    <a href="?edithome=true" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <a href="?editaccount=true" class="btn btn-sm btn-primary mr-2 mb-2">
                        <i class="fas fa-user"></i>
                    </a>
                    <a href="../index.php" class="btn btn-sm btn-primary mr-2 mb-2 float-right">déconnexion
                        <i class="fas fa-sign-out"></i>
                    </a>
                </div>
                <?php if (isset($_GET['message']) && $_GET['message'] == 'poste') :
                    echo "<div class='alert alert-success'>le demande a été envoyé avec  succès</div>";
                elseif (isset($_GET['message']) && $_GET['message'] == 'err') :
                    echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                endif; ?>

                <div class="card-body">
                    <!-------------------------------------------- section account--------------------------------------------------- -->
                    <?php if (isset($_GET['editaccount'])) : ?>
                        <div class="row my-4">
                            <div class="col-md-12 mx-auto">
                                <div class="card">

                                    <div class="card-header" style="display: flex;">
                                        <div class="col-md-4">
                                            <img src="../image/user.png" class="img-fluid" alt="Responsive image" style="max-width: 78%;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Nom: <span class="text-muted"><?php echo $_SESSION['nom']; ?></span></h5>
                                                <h5 class="card-title">Prénom: <span class="text-muted"><?php echo $_SESSION['prenom']; ?></span></h5>
                                                <p class="card-text">Email: <?php echo $_SESSION['email']; ?></p>
                                                <p class="card-text"><small class="text-muted">date de naissance: 09/09/1997</small></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body ">
                                        <div class="card text-center">

                                            <div class="card-header">
                                                <ul class="nav nav-tabs card-header-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active">les poste</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- ---------------------------------------------------section les offres------------------------------------------------- -->

                                            <div id="poste" class="card-body" style="display: block;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Ville</th>
                                                            <th scope="col">Type de poste</th>
                                                            <th scope="col">Intitulé du poste</th>
                                                            <th scope="col">Statut</th>
                                                            <th scope="col">Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $query1 = "SELECT * FROM offre Where offre = 1";
                                                        $runquery1 = mysqli_query($db, $query1);
                                                        while ($data1 = mysqli_fetch_array($runquery1)) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $data1['ville'] ?></td>
                                                                <td><?= $data1['Typeposte'] ?></td>
                                                                <td><?= $data1['Intituleposte'] ?></td>
                                                                <td><?= $data1['statut'] ?></td>
                                                                <td><?= $data1['description'] ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-------------------------------------------- end section account--------------------------------------------------- -->
                        <!-------------------------------------------- section home--------------------------------------------------- -->
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-10 mx-auto">



                                <?php
                                $query2 = "SELECT * FROM offre WHERE offre = 0";
                                $runquery2 = mysqli_query($db, $query2);
                                while ($data2 = mysqli_fetch_array($runquery2)) {
                                ?>
                                    <div class="card mt-4">
                                        <div class="card-header">
                                        <?= $data2['ville'] ?>
                                            <div class="float-right">
                                                <?= $data2['time'] ?>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?= $data2['Typeposte'] ?>
                                            <div class="float-right">
                                                <h5 class="text-title" style="font-size: smaller;">Ville: <span class="text-muted"><?= $data2['ville'] ?></span></h5>
                                            </div>
                                        </div>
                                        <form class="formule" action="php.php" method="post" enctype="multipart/form-data">
                                            <div class="card-footer">

                                                <div class="form-row">
                                                    <input type="hidden" name="id" value="<?= $data2['id'] ?>">
                                                    <div class="form-group col-md-6">
                                                        <label for="Nom">Nom</label>
                                                        <input type="text" name="Nom" value="" class="form-control" placeholder="Entré le nom" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="prenom">Prénom</label>
                                                        <input type="text" name="prenom" value="" class="form-control" placeholder="Entré le prenom" required>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="cv" class="custom-file-input" required>
                                                        <label class="custom-file-label" for="cv">Choose Cv...</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-block my-2" type="submit" name="poste">Posté</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                        </div>

                </div>


            </div>
        </div>
    </div>
</div>
</div>

<?php include("../includes/footer.php"); ?>