
        <?php
session_start();







if (isset($_SESSION['id'])) {
    echo '

<body>'; include 'inc/header.php'; echo '
<main role="main">

  <div class="album py-5 bg-light">
    <div class="container">
<div class="row">';
include("inc/config.php");
// Get contents of the lspd table
$reponse = $bdd->query('SELECT * FROM vehicules ORDER BY id DESC');

// Display each entry one by one
while ($data = $reponse->fetch()) {
?>
  <div class="col-md-4">
    <div class="card mb-4 shadow-sm">
      <img  width="100%" height="225" src="<?php echo $data['img']; ?>">
      <div class="card-body">
          <p class="card-text">Name: <?php echo $data['nom']; ?></p>
          <p class="card-text">Category: <?php echo $data['categorie']; ?></p>
          <p class="card-text">Price: <?php echo $data['prix']; ?></p>
          <p class="card-text">Seller: <?php echo $data['owner']; ?></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
          <p class="card-text">Phone: <?php echo $data['tel']; ?></p>
          </div>
          <small class="text-muted"><?php echo $data['date']; ?></small>
        </div>
      </div>
    </div>
  </div>
                                                <?php
    }
    $reponse->closeCursor(); echo '
        </div>


      </div>
    </div>
  </div>

</main>
'; include 'inc/footer.php';
  } else {
      header("Location: ../index.php");
  }
  ?>