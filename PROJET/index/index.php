


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my_shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="..\index\index.css">   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head >

<body    style = "font-family: Roboto, sans-serif">
<?php 
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  echo "<h1 class='welcome'>  Welcome {$_SESSION['username']} ! </h1>";
}
?>
  <nav class="navbar navbar-expand-sm p-3 mb-2 bg-white text-dark widthMax ">

      <ul class="navbar-nav widthInherit" >
      <?php

      
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          echo "   <div class = 'flex1'>";
          echo "    <li><img src='..\index\IMAGES\design_and_assets\Logo.png' alt=''>";
          echo "    </li>";
          echo "    <div class = 'flex2'>";
          echo "    <li class='nav-item'>";
          echo "      <a class='nav-link' href='#'>HOME</a>";
          echo "    </li>";
          echo "    <li class='nav-item'>";
          echo "      <a class='nav-link' href='#'>SHOP</a>";
          echo "    </li>";
          echo "    <li class='nav-item'>";
          echo "      <a class='nav-link' href='#'>MAGAZINE</a>";
          echo "    </li>";
          echo "   <li class='nav-item'>";
          
          echo "  </li>";
          echo "  <li class='nav-item'>";
          echo "    <a class='nav-link' href='..\admin.php'>ADMIN</a>";
          echo " </li>";
          echo "  </div>";
          echo "  </div>";

          echo " <div class = 'flex3 '>";

          echo "  <li class='nav-items'>";
          echo " <img  class='nav-link' src='..\index\IMAGES\design_and_assets\MicrosoftTeams-image.png' alt=''>";
          echo "  </li>";
          echo "  <li class='nav-item'>";
          echo "    <a  class='nav-link' href='..\logout.php'>LOG OUT</a>";
          echo "  </li>";
          echo " </div>";
      } else {
          echo "      <div class = 'flex1'>";
          echo "      <li><img src='..\index\IMAGES\design_and_assets\Logo.png' alt=''>";
          echo "     </li>";
          echo "      <div class = 'flex2'>";
          echo "      <li class='nav-item'>";
          echo "        <a class='nav-link' href='#'>HOME</a>";
          echo "      </li>";
          echo "      <li class='nav-item'>";
          echo "        <a class='nav-link' href='#'>SHOP</a>";
          echo "      </li>";
          echo "      <li class='nav-item'>";
          echo "        <a class='nav-link' href='#'>MAGAZINE</a>";
          echo "      </li>";
          echo "      </div>";
          echo "    </div>";

          echo "    <div class = 'flex3 '>";
          echo "      <li class='nav-items'>";
          echo "        <img  class='nav-link' src='..\index\IMAGES\design_and_assets\MicrosoftTeams-image.png' alt=''>";
          echo "      </li>";
          echo "      <li class='nav-item'>";
          echo "        <a  class='nav-link' href='..\Sign_up.php'>SIGN UP</a>";
          echo "      </li>";
          echo "      <li class='nav-item'>";
          echo "        <a  class='nav-link' href='..\login.php'>LOGIN</a>";
          echo "      </li>";
          echo "    </div>";

      }
?>
      </ul>
  </nav>
  
  <div class= "search-bar_container">
    <div class= "search-bar1" >
        <img src="IMAGES/logoloupe.png" alt="">
    </div>
  
    <div class="search-bar2 search-box">
        <input type="text" autocomplete="off" class = "form-control"placeholder="Search product..." />
        <label class="form-label" for="form1"></label>
        <img src="..\index\IMAGES\design_and_assets\SajariLogo.png"/>
        <div class="result"></div>
    </div>
    


    
   
    <div >
      <select class="dropdown" id="monselect">
        <option value="Bestmatch" selected>Best Match</option>
        <option value="" >New</option>
        <option value=""> Old</option>
      </select>
    </div>

  </div>


  <div class="wrapper widthMax">
    
    <div class="products">
            
      <div>
    
        <p>FILTER BY </p>

        <select class= "subdropdown" id="monselect">
          <option value="Bestmatch"selected>Collection</option>
          <option value="" >New</option>
          <option value=""> Old</option>
        </select>
      </div>
  
      <div>
          <select class= "subdropdown" id="monselect">
            <option value="Bestmatch"selected>Color</option>
            <option value="" >Black</option>
            <option value="">White</option>
          </select>
      </div>
      <div>
      <select class= "subdropdown" id="monselect">
        <option value="Bestmatch"selected>Category</option>
        <option value="" >Shoes</option>
        <option value=""> Bags</option>
        <option value=""> Clothes</option>
        <option value=""> Accessories</option>
      </select>
      </div>
      <div>
      <p style = "color:black">Price Range</p>
      </div>
      <div class="slidecontainer">
        <input type="range" min="1" max="100" value="50" class="slider " id="myRange">
      </div>
      
    </div>


    <?php
                    
      require_once "../config.php";
      
      
      $sql_products = "SELECT * FROM products";
      if($result = $mysqli->query($sql_products)){
        if($result->num_rows > 0){
          
              while($row = $result->fetch_array()){
                if ($row['category_id'] == 4){
                  $row['category_id'] = "SHOES";
                }else if ($row['category_id'] == 5){
                  $row['category_id'] = "BALLS";
                }else if ($row['category_id'] == 6){
                  $row['category_id'] = "BAGS";
                }else if ($row['category_id'] == 7){
                  $row['category_id'] = "ACCESSORIES";
                }else if ($row['category_id'] == 8){
                  $row['category_id'] = "CLOTHES";
                }
                
                  echo "<div class='products'>";
                      echo "<img class = 'responsive' src=".$row['image']. " alt='Image Produit'>";
                      echo "<div class='box1'>";
                        echo "<a>". $row['name']."</a>" ;
                        echo "<a>". $row['price']."$</a>";
                      echo "</div>";
                      echo "<div class='box2'>";
                        echo "<a>".$row['category_id']."</a>";
                      echo "</div>";
                      echo "<div class='box3'>";
                        echo "<img src='..\index\IMAGES\design_and_assets\\5 STARS.jpg' alt='Stars' href='#stars'>";
                        echo "<img src='..\index\IMAGES\design_and_assets\TROLLEY PLUS.png' alt=''>";
                      echo "</div>";
                  echo "</div>";
              }
        }
      }
    ?>
  </div>
    <nav >
      <ul class="pagination"> 
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item"><a class="page-link" href="#">6</a></li>
        <li class="page-item"><a class="page-link" href="#">7</a></li>
        <li class="page-item"><a class="page-link" href="#">8</a></li>
        <li class="page-item"><a class="page-link" href="#">9</a></li>
        <li class="page-item"><a class="page-link" href="#">10</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">></span>
          </a>
        </li>
      </ul>
    </nav>

    

          
</body>
</html>

