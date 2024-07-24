<?php
/*
invio una parola da un form
- SE la parola esiste in un elenco stampo OK
- SE la parola non esiste nell'elenco stano "NON ESISTE"

1. avere un array di parole
2. creare un form con una chiave "paorola"
3. verificare se nell'array esiste la parola inviata e generare l'output
*/

$parole = ['booleano','tautologico','distopico', 'ilare'];

// $print_form è la condizione per fare stampare il form di default ed è true se non è stata settata la chiave "parola"
$print_form = !isset($_GET['parola']);

// se la parola è stata inviata la cerco nell'array
if(isset($_GET['parola'])){
  $parola = $_GET['parola'];
  if(in_array($parola, $parole)){
    $output_message = "La parola '$parola' è stata torvata";
  }else{
    $output_message = "La parola '$parola' NON è stata torvata";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.css' integrity='sha512-VcyUgkobcyhqQl74HS1TcTMnLEfdfX6BbjhH8ZBjFU9YTwHwtoRtWSGzhpDVEJqtMlvLM2z3JIixUOu63PNCYQ==' crossorigin='anonymous'/>
  <title>Controllo parola</title>
</head>
<body>
<?php if($print_form): ?>
<section class="container my-5">
  <h1>Inserisci la parola da cercare</h1>
  <form action="index.php" method="GET">
    <div class="mb-3">
      <label for="parola" class="form-label">Parola da cercare</label>
      <input
        id="parola"
        class="form-control"
        placeholder="Parola"
        type="text"
        name="parola"
      >
    </div>
    
    <button type="submit" class="btn btn-primary">Invia</button>
  </form>
</section>
<?php else: ?>
  
  <section class="container my-5">
    <h1><?php echo $output_message ?></h1>
    <a href="index.php" class="btn btn-primary">Torna</a>
  </section>
  <?php endif; ?>
  
</body>
</html>