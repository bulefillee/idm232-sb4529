<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sue Batham IDM232 Alpha</title>
</head>

<body> 
<?php
  // $msg = "HOWDY";
  // echo '<script type="text/javascript">console.log("'. $msg .'");</script>';

  require_once './includes/fun.php';
  consoleMsg("PHP to JS .. is Wicked FUN");

  // Include env.php that holds global vars with secret info
  require_once './env.php';

  // Include the database connection code
  require_once './includes/database.php';

?>
   <header>
      <nav>
          <ul class='nav-bar'>
              <li class='logo'><a href='#'><img src='images/weblogo.jpg'/></a></li>
              <input type='checkbox' id='check' />
              <span class="menu">
                  <li><a href="">&lt; 30mins</a></li>
                  <li><a href="">Vegetarian</a></li>
                  <li><a href="">Chicken</a></li>
                  <li><a href="">Fish</a></li>
                  <li><a href="">Turkey</a></li>
                  <li><a href="">Pork</a></li>
                  <li><a href="">Beef</a></li>
                  <li><a href="">Steak</a></li>
  
                  <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
              </span>
              <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
          </ul>
      </nav>
      </header>

        <div class='heroimage'>
            <div class="captioncontainer">
            <h1 class="captiontitle">
              Apetique.
            </h1>
            <!-- <h2 class="captiontitle">
               lalala
            </h2>   -->
            </div>  

            <div class="input-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="recipes..." />
                <button class="button">Search</button>
              </div>

            </div>
            <div class="container">
            <h4 class="midpara">
            Welcome to Apetique. Take a look at what's Popular!
            </h4>
            </div>
        
          <div class="container2">

                <ul class="card-wrapper">

                  <?php
                  $query = "SELECT * FROM recipes";
                  $results = mysqli_query($db_connection, $query);
                  if ($results->num_rows > 0) {
                    while ($oneRecipe = mysqli_fetch_assoc($results)) {
                  ?>
                      <li class="card">
                        <img src="./images/<?php echo $oneRecipe['Main IMG']; ?>" alt="<?php echo $oneRecipe['Title']; ?>">
                        <h3><?php echo $oneRecipe['Title']; ?></h3>
                        <p class="subtitle"><?php echo $oneRecipe['Subtitle']; ?></p>
                      </li>
                  <?php
                    }
                  } else {
                    echo "No recipes found.";
                  }
                  ?>
                  
                </ul>
           </div>

    </main>

<footer> &copy;Sue Batham | 2023 </footer>

</body>
</html>