<?php
session_start();
if (!isset($_REQUEST['p'])) {
    $_REQUEST['p'] = '';
}
if ($_REQUEST['p'] == 'do_login') {
    $_REQUEST['p'] = '';
    require "login/do_login.php";
}
if (!isset($_SESSION['user'])) {

    // Redirect them to the login page
    header("Location: login/login.php");
}
echo $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
<script src="js/uno.js"></script>
  <title>Uno Game</title>
</head>
   <body class="game">
     <div class="container-fluid h-100">
    <div class="row text-center h-100">
    <div class="col-sm center h-100">
      <div class="remaining_deck">
     <h3>Κάρτες που απομένουν: <span id="remaining_deck"></span></h3>
   </div>
   <div class="turn"></div>
   <div class="text-center moves" id="moves"></div>
    <div class="controls">
    <?php
//emfanisi button mono gia player1
if ($_SESSION['user'] == "player1") {
    echo "<button onclick='fill_table()' id='start' class='btn btn-primary'>ΕΝΑΡΞΗ/RESET</button>";
}?>
    </div>
    </div>
    <div class="col-sm center h-100">
        <div class="opponent">
           <h1 id="opponent">Waiting for opponent...</h1><h3 class="text-danger" id="uno"></h3>
        </div>
        <div class="opp_cards">
           <h3 >Κάρτες αντιπάλου: <span id="opp_cards"></span></h3>
        </div>
         <div class="playing_card">
           <h3>Παιζόμενη κάρτα: <span id="playing_card"></span></h3>
         </div>
         <ul class="m-auto" id="table"></ul>
         <div class="you">
           <h1 class="player1"><?php echo ($_SESSION['nickname']) ?></h1><h3 class="text-danger" id="uno"></h3>
         </div>
    </div>
    <div class="col-sm b-1">
    <h1 class="mt-5">Οδηγίες</h1>
    <div class="accordion" id="accordionExample">
     <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
          Πως να παίξετε
        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <p class="mt-0">Ο παίκτης που έχει σειρά πρέπει να εισάγει στο input το χρώμα και το value της κάρτας π.χ. (G9,R8,B0 ή g9,r8,b0).</p>
      Σε περίπτωση που η κάρτα είναι Μπαλαντέρ θα πρώτα θα βάλει το χρώμα που θέλει να αλλάξει και μετα το value π.χ. (GW+4,RW+4,BW,RW)
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
          Γενικές Κάρτες
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <p class="h5 mb-2">Το πρώτο γράμμα δηλώνει το χρώμα της κάρτας.</p>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Γράμμα</th>
      <th scope="col">Xρώμα</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Β</th>
      <td>Μπλε</td>
    </tr>
    <tr>
      <th scope="row">R</th>
      <td>Κόκκινο</td>
    </tr>
    <tr>
      <th scope="row">G</th>
      <td>Πράσινο</td>
    </tr>
     <tr>
      <th scope="row">Υ</th>
      <td>Κίτρινο</td>
    </tr>
  </tbody>
</table>
  <p class="h5 mb-2">Το δεύτερο γράμμα δηλώνει την τιμή της κάρτας.</p>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Γράμμα</th>
      <th scope="col">Τιμή</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">0-9</th>
      <td>0-9</td>
    </tr>
    <tr>
      <th scope="row">R</th>
      <td>Reverse</td>
    </tr>
    <tr>
      <th scope="row">S</th>
      <td>Skip</td>
    </tr>
     <tr>
      <th scope="row">+2</th>
      <td>Draw Two</td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
         Ειδικές Κάρτες
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
     <p class="font-weight-bold h5">Μπαλαντερ(W):</p><p>Aλλάζει το χρώμα της κάρτας στο τραπέζι.(RW(Κόκκινο),GW(Πράσινο),BW(Μπλε),YW(Κίτρινο)).</p> 
 <p class="font-weight-bold h5">Μπαλαντερ Πάρε Τέσσερα(W+4):</p><p>Aλλάζει το χρώμα της κάρτας στο τραπέζι και ο αντίπαλος παίρνει τέσσερις κάρτες.(RW+4(Κόκκινο),GW+4(Πράσινο),BW+4(Μπλε),YW+4(Κίτρινο)).</p>
<p class="font-weight-bold h5">Πάρε δύο(+2):</p><p>O αντίπαλος παίρνει δύο κάρτες.</p>
<p class="font-weight-bold h5">Αλλαγή φοράς(R):</p><p>Ξαναπαίζει ο ίδιος παίκτης.</p>
<p class="font-weight-bold h5">Χάνεις την σειρά σου(S):</p><p>Ξαναπαίζει ο ίδιος παίκτης.</p>
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
          Κανόνες
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
      <p>Σκοπός του παιχνιδιού για κάθε παίχτη είναι να ξεφορτωθεί όλες τις κάρτες που έχει στα χέρια του.</p>
     <p> O παίκτης που έχει σειρά πρέπει να ρίξει μια κάρτα ίδιου αριθμού ή χρώματος με την κάρτα αυτή ή να πετάξει μια ειδική κάρτα.</p>
      <p>Σε περίπτωση που δεν έχει καμία κάρτα να ταιριάξει με την πάνω κάρτα του σωρού, πρέπει να τραβήξει μια κάρτα από τη στοίβα και αν ούτε τότε δεν έχει να παίξει, πηγαίνει πάσο και έρχεται η σειρά του επόμενου παίχτη να παίξει, ακολουθώντας πάντα το ίδιο μοτίβο επιτρεπτών επιλογών [χρώμα ή αριθμός – ειδική κάρτα – κάρτα από τη στοίβα – πάσο].</p>
     <p> Όταν κάποιος παίχτης μείνει με 2 κάρτες πρέπει να πατήσει UNO πριν ρίξει τη δεύτερη κάρτα. Αν δεν το κάνει,τιμωρείται και παίρνει 2 κάρτες από την τράπουλα. </p>     
      </div>
    </div>
  </div>
  
</div>
   </div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
