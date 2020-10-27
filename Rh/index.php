<?php
include('../includes/header.php');
include('../includes/db.php');
session_start();
?>
<div class="container-fluid">
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
            <div class="card">

                <div class="card-header" style="display: flex;">
                    <div class="col-md-4">
                        <img src="../image/rh.jpg" class="img-fluid" alt="Responsive image" style="max-width: 34%; border-radius: 50%;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nom & Prénom: <span class="text-muted"> <?php echo $_SESSION['nom'] ;?>  <?php echo $_SESSION['prenom'] ;?></span></h5>
                            <p class="card-text">Email: <?php echo $_SESSION['email'] ;?></p>
                            <p class="card-text"><small class="text-muted">date de naissance: 09/09/1997</small></p>
                        </div>
                    </div>
                </div>

                <!-- <div id="offre" class="offre" style="display: none;"> -->
                <div class="card-body ">
                    <?php if (isset($_GET['message']) && $_GET['message'] == 'supprimer') :
                        echo "<div class='alert alert-danger'>le demande a été supprimé avec succès</div>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'refuser') :
                        echo "<div class='alert alert-warning'>le demande a été refuse avec succès</div>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'accepter') :
                        echo "<div class='alert alert-success'>La demande a été acceptée</div>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'envoyer') :
                        echo "<div class='alert alert-primary'>Le description a été envoyer</div>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'poste') :
                        echo "<div class='alert alert-success'>La demande a été posté</div>";
                    elseif (isset($_GET['message']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <a href="?edithome=true" class="btn btn-sm btn-primary mr-2 mb-2">Home
                                    <i class="fas fa-home"></i>
                                </a>
                                <a href="?editreply=tru" class="btn btn-sm btn-primary mr-2 mb-2 float-right">Répondre
                                    <i class="fas fa-reply"></i>
                                </a>
                                <a href="../index.php" class="btn btn-sm btn-primary mr-2 mb-2 float-right">déconnexion
                                    <i class="fas fa-sign-out"></i>
                                </a>
                            </ul>
                        </div>

                        <div class="card mt-4">
                            <?php if (isset($_GET['editreply'])) : ?>
                                <div class="card-body">
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Type de poste</th>
                                                <th scope="col">Intitulé du poste</th>
                                                <th scope="col">Cv</th>
                                                <th scope="col">Statut</th>
                                                <th scope="col">Commentaire</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query1 = "SELECT * FROM offre Where offre = 1";
                                            $runquery1 = mysqli_query($db, $query1);
                                            while ($data1 = mysqli_fetch_array($runquery1)) {
                                            ?>
                                                <tr>
                                                    <td><?= $data1['Nom'] ?></td>
                                                    <td><?= $data1['prenom'] ?></td>
                                                    <td><?= $data1['Typeposte'] ?></td>
                                                    <td><?= $data1['Intituleposte'] ?></td>
                                                    <td>
                                                        <a href="../image/<?= $data1['cv'] ?>" target="_blank" class="btn bnt-sm btn-info"><i class="fas fa-folder-open">Ouvert</i></a>
                                                    </td>
                                                    <td class="d-flex flex-row">
                                                        <form method="post" class="mr-1" action="php.php">
                                                            <input type="hidden" name="accepter" value="<?= $data1['id']; ?>">
                                                            <button class="btn bnt-sm btn-success" title="accepter"><i class="fa fa-check"></i></button>
                                                        </form>
                                                        <form method="post" class="mr-1" action="php.php">
                                                            <input type="hidden" name="refuser" value="<?= $data1['id']; ?>">
                                                            <button class="btn bnt-sm btn-warning" title="refuser"><i class="fa fa-times"></i></button>
                                                        </form>
                                                        <form method="post" class="mr-1" action="php.php">
                                                            <input type="hidden" name="supprimer" value="<?= $data1['id']; ?>">
                                                            <button class="btn bnt-sm btn-danger" title="supprimer"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post" class="mr-1 formule d-flex flex-row" action="php.php">
                                                            <input type="hidden" name="id" value="<?= $data1['id']; ?>">
                                                            <input type="text" name="description" class="form-control" name="description" value="" placeholder="écrire un commentaire">
                                                            <button class="btn bnt-sm btn-primary" title="envoyer" type="submit" name="envoyer"><i class="fas fa-paper-plane"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-md-4 mx-auto">
                                            <form class="formule" method="post" action="php.php" style="text-align: initial;">
                                                <div class="form-group">
                                                    <label for="Typeposte">Type de poste</label>
                                                    <input type="text" class="form-control" name="Typeposte" placeholder="Type de poste" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Intituleposte">Intitulé du poste</label>
                                                    <input type="text" class="form-control" name="Intituleposte" placeholder="Intitulé du poste" required>
                                                </div>
                                                <div class="form-group">
                                                    <label  for="ville">Ville</label>
                                                    <select name="ville"  class="custom-select">
                                                        <option value="Casablanca">Casablanca</option>
                                                        <option value="Youssoufia">Youssoufia</option>
                                                        <option value="El Jadida">El Jadida</option>
                                                        <option value="Rabat">Rabat</option>
                                                    </select>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include("../includes/footer.php"); ?>