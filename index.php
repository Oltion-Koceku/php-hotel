<?php

$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];
$forum_parking = $_GET['parking'];
$forum_vote = $_GET['voto'];
var_dump($forum_parking);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />

  <title>PHP Hotel</title>
</head>

<body>
  <div class="container d-flex flex-column ">


    <form action="index.php" method="get">
      <label for="voto">Voto</label>
      <select name="voto" id="voto">
        <option value="">Seleziona</option>
        
        <?php 
          foreach ($hotels as $key => $item) :
            $vote = $item['vote'];
          
        ?>

         <option value="<?php echo $vote ?>"><?php echo $vote ?></option>

        <?php endforeach ?>

      </select>
      <label for="parking">Parking</label>
      <select name="parking" id="parking">
        <option value="">Seleziona</option>
        <option value="no">No</option>
        <option value="si">Si</option>
      </select>
            <button type="submit">Submit</button>
    </form>


    <h1>Hotels</h1>

    <div class="d-flex flex-wrap ">

      <?php
      foreach ($hotels as $key => $item) :
        $name = $item['name'];
        $parking = $item['parking'];
        $vote = $item['vote'];
        $parking_status = $parking ? 'si' : 'no';
      ?>
        <?php if($parking_status === $forum_parking) : ?>


        <?php elseif($forum_vote <= $vote) : ?>

        <div class="card d-flex flex-column align-items-center text-center " style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $name ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Voto <?php echo $vote ?></h6>
            <p class="card-text">Il parcheggio è presente?:<?php echo $parking_status ?></p>
          </div>
        </div>
        <?php endif ?>

      <?php endforeach ?>
    </div>





  </div>
</body>

</html>