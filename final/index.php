<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sue Batham IDM232 Final</title>
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
              <!-- <li class='logo'><a href='index.php'><img src='images/weblogo.jpg'/></a></li> -->
              <li class='logo <?php echo empty($filter) ? "active" : ""; ?>'><a href='index.php'><img src='images/weblogo.jpg'/></a></li>

              <input type='checkbox' id='check' />
              <span class="menu">

           

              <li class='<?php echo ($filter == "lte30") ? "active" : ""; ?>'><a href="index.php?filter=lte30"> &le; 30mins</a></li>
<li class='<?php echo ($filter == "gte30") ? "active" : ""; ?>'><a href="index.php?filter=gte30"> &ge; 30mins</a></li>


            <li><a href="index.php?filter=vegetarian">Vegetarian</a></li>
            <li><a href="index.php?filter=chicken">Chicken</a></li>
            <li><a href="index.php?filter=fish">Fish</a></li>
            <li><a href="index.php?filter=turkey">Turkey</a></li>
            <li><a href="index.php?filter=pork">Pork</a></li>
            <li><a href="index.php?filter=beef">Beef</a></li>
            <li><a href="index.php?filter=steak">Steak</a></li>
            

                  <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
              </span>
              <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
          </ul>

      </nav>
      </header>

        <div class='heroimage'>
          
          <div class="top_box">

            <div class="captioncontainer">
                <h1 class="captiontitle">
                  Apetique.
                </h1>
            </div>  

              <!-- <div class="input-box">

                <i class="uil uil-search"></i>
                <input type="text" placeholder="recipes..." />
                <button class="button">Search</button>
              </div> -->

              <!-- <div class="search-area">
                <form action="index.php" method="POST">
                  <label for="search"></label>
                  <input type="search" id="search" name="search" placeholder="Search...">
                  <button type="submit" name="submit" value="submit">Submit</button>
                </form>
              </div> -->

               <div class="search-area">
                  <form action="index.php" method="POST">
                      <div class="search-container">
                          <input type="search" id="search" name="search" placeholder="Search...">
                          <button type="submit" name="submit" value="submit">Submit</button>
                      </div>
                  </form>
                </div>


          
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

                    // Get all the recipes from "recipes" table in the "idm232" database

                $search = $_POST['search'];
                consoleMsg("Search is: $search");


                $filter = $_GET['filter'];
                consoleMsg("Filter is: $filter");


                if (!empty($search)) {
                  consoleMsg("Doing a SEARCH");
                  // $query = "select * FROM recipes WHERE title LIKE '%{$search}%'";
                  $query = "select * FROM recipes WHERE title LIKE '%{$search}%' OR subtitle LIKE '%{$search}%'";
                  // $result = mysqli_query($connection, $query);
                } elseif ($filter == 'lte30') {
                  $query = "SELECT * FROM recipes WHERE `Cook Time` <= 30";
              } elseif ($filter == 'gte30') {
                  $query = "SELECT * FROM recipes WHERE `Cook Time` >= 30";
              }              
                elseif (!empty($filter)) {
                  consoleMsg("Doing a FILTER");
                  $query = "select * FROM recipes WHERE proteine LIKE '%{$filter}%'";
                } 
                else
                
                {
                  consoleMsg("Loading ALL RECIPES");
                  $query = "SELECT * FROM recipes";
                }
          
                          // $query = "SELECT * FROM recipes";
                $results = mysqli_query($db_connection, $query);
                // consoleMsg("The number of records found is:");
                // echo $results;
                if ($results->num_rows > 0) {
                  consoleMsg("Query successful! number of rows: $results->num_rows");
                  while ($oneRecipe = mysqli_fetch_array($results)) {

                        $id = $oneRecipe['id'];

                        // STEP 01 .. Wrap thumbnail in anchor tag
                          echo '<a href="./detail/detail.php?recID='. $id .'">';

                          echo '<li class="card">';
                          echo '<img src="./images/' . $oneRecipe['Main IMG'] . '" alt="' . $oneRecipe['Title'] . '">';
                          echo '<h3>' . $oneRecipe['Title'] . '</h3>';
                          echo '<p class="subtitle">' . $oneRecipe['Subtitle'] . '</p>';
                          echo '</li>';
                          echo '</a>';
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