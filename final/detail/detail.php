<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylesheet.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sue Batham IDM232 Beta</title>
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
        <!-- <nav>
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
        </nav> -->
        </header>

        <div class='heroimage'>
            <div class="captioncontainer">
            <h1 class="captiontitle">
            Recipe Safari</h1>
            </div>  
        </div>

            <div class="container">
            <!-- <button class="btn btn-1 btn-1c">back</button> -->
            <button class="btn btn-1 btn-1c" onclick="window.location.href='../index.php'">Back</button>
                <h3 class="midpara">
                Indulge in Detail: View the Full Recipe for Flavorful Delights
                </h3>
                </div>

            <div class="body_content">

            <?php
// Include necessary files and initialize database connection

// Get recipe ID from the URL
$recipeId = $_GET['recID'];

// Construct SQL query
$query = "SELECT * FROM recipes WHERE id = $recipeId";

// Execute query
$results = mysqli_query($db_connection, $query);

// Check if there are results
if ($results) {
    // Check if at least one row is returned
    if ($results->num_rows > 0) {
        // Fetch and display details of the selected recipe
        $oneRecipe = mysqli_fetch_assoc($results);

        // HTML output
        echo '<div class="box1">';
        echo '<div class="cardtitle">';
        echo '<h2>From the Test Kitchen</h2>';
        echo '</div>';

        // Hero Image
        echo '<img class="recipe_img" src="./images/' . $oneRecipe['Main IMG'] . '" alt="Recipe Image">';

        // Recipe Information
        echo '<div class="rec_info">';
        echo '<div class="title"><h2>' . $oneRecipe['Title'] . '</h2></div>';
        echo '<div class="subtitle"><h4>' . $oneRecipe['Subtitle'] . '</h4></div>';
        echo '<br>';
        echo '<div class="time"><h3>Cooktime: ' . $oneRecipe['Cook Time'] . '</h3></div>';
        echo '<div class="servings"><h3>Servings: ' . $oneRecipe['Servings'] . '</h3></div>';
        echo '<div class="calories"><h3>Nutrition: ' . $oneRecipe['Cal/Serving'] . ' cal/serving</h3></div>';
        echo '<br>';
        echo '<div class="desc"><h4>' . $oneRecipe['Description'] . '</h4></div>';
        echo '</div>';
        echo '</div>';

        // Ingredients Box
        echo '<div class="box1">';
        echo '<img class="ing_img" src="./images/' . $oneRecipe['Ingredients IMG'] . '" alt="Ingredients Image">';
        echo '<div class="cardtitle"><h2>Ingredients</h2></div>';
        echo '<div class="rec_info"><br>';
        echo '<div class="ing_list">';

        // LOOP THRU INGREDIENTS ARRAY
        $ingredientsArray = explode("*", $oneRecipe['All Ingredients']);
        echo '<ul>';
        foreach ($ingredientsArray as $ingredient) {
            echo '<li>' . $ingredient . '</li>';
        }
        echo '</ul>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

        // Instructions Box
        echo '<div class="box1">';
        echo '<div class="inst_cardtitle"><h2>Instructions</h2></div>';

        $stepTextArray = explode("*", $oneRecipe['All Steps']);
        $stepImagesArray = explode("*", $oneRecipe['Step IMGs']);

        for ($lp = 0; $lp < count($stepTextArray); $lp++) {
            // If step starts with a number, get number minus one for image name
            $firstChar = substr($stepTextArray[$lp], 0, 1);

            if (is_numeric($firstChar)) {
                consoleMsg("First Char is: $firstChar");
                echo '<img class="inst_img" src="./images/' . $stepImagesArray[$firstChar - 1] . '" alt="Step Image">';
            }

            echo '<div class="inst_info">';
            echo '<div class="desc"><h4>' . $stepTextArray[$lp] . '</h4></div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    } else {
        echo 'Recipe not found.';
    }
} else {
    echo 'Query error.';
}
?>


        


            
        </div>  
    
        <!-- <button class="btn btn-1 btn-1c">back</button> -->
        <button class="btn btn-1 btn-1c" onclick="window.location.href='../index.php'">Back</button>

        
    <footer> &copy;Sue Batham | 2023 </footer>
</body>
</html>