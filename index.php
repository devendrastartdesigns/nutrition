
<?php 
$config = include('config.php');
include('function.php');
session_start();
if(empty($_SESSION['recipeItem'])){
   $config['username']= "rezepte@chooseyourlevel.de";

   $config['password']= 12341234;
   
   $allRecipes = getTotalRecipe($config);
   $_SESSION['recipeItem'] = $allRecipes;

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>Rezeptrechner</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="img/Rez-Logo.png" alt="Rezeptrechner" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" target="_blank" href="https://www.rezeptrechner-online.de/">Nutrition Calculator</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.chooseyourlevel.de/low-carb-rezepte-mit-naehrwertangaben/">Recipes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" target="_blank" href="https://www.rezeptrechner-online.de/Datenschutz/datenschutz-impressum.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#fb-contact">Contact</a>
              </li>
            </ul>
            <div class="d-flex">
              <a href="#" class="btn btn-green btn-sm">Sign Up</a>
                         <?php

 // var_dump($_SESSION["userInfo"]);
 if(empty($_SESSION["userInfo"])){ 
?>

 <a href="/Rezeptrechner/login.php" class="btn btn-outline-dark btn-sm">Log In</a>
<?php }else{ ?>
<a href="/Rezeptrechner/logout.php" id="log" class="btn btn-outline-dark btn-sm">Logout</a>
<?php } ?> 
            </div>
          </div>
        </div>
      </nav>
    </header>
      

      <section class="banner-sec mob">
      <div class="container banner-content">
        <div class="row">
          <div class="col-5">
            <h1>
              Want to Lose <span class="text-orange">weight</span>?
              <span class="text-green">Planning</span> meals become
              much easier now...
            </h1>
            <p>Reach your diet and nutritional goals with our calorie calculator,
            weekley meal plans, grocery lists and more...</p>
            <a href="#customnutritionid" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#stepperModal">GET STARTED</a>
            <a href="https://www.chooseyourlevel.de/low-carb-rezepte-mit-naehrwertangaben/" target="_blank" class="btn btn-outline-dark">RECIPES</a>
          </div>
        </div>
      </div>

      <!-- Stepper Modal -->
        <div class="modal fade getstartModel" id="stepperModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true" >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body text-center">
                
                <div class="welcome-modal">
                  <div class="logo">
                      <img src="img/Rez-Logo.png" alt="Rezeptrechner">
                  </div>
                  <h2 class="title">Welcome to Rezeptrechner
                    <small>Do easy 4 steps and Generate own Nutrition plan and Prit it</small>
                  </h2>
                  <ul>
                    <li>
                      <span class="number">1</span> 
                      <span class="text">Create Account if you don‘t have one</span>
                    </li>
                    <li>
                      <span class="number">2</span> 
                      <span class="text">Add own recipes to your account with Rezeptrechner (link to www.rezeptrechner-online.de)</span>
                    </li>
                    <li>
                      <span class="number">3</span> 
                      <span class="text">Upgrade to Rezeptrechner PRO (link will follow)</span>
                    </li>
                    <li>
                      <span class="number">4</span> 
                      <span class="text">Generate own Nutrition Plan and print it</span>
                    </li>
                  </ul>
                </div>         

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-orange" data-bs-dismiss="modal">Okay Got it</button>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- <section class="featured-recipes-sec">
      <div class="container">
        <h2 class="text-center">Featured <span class="text-green">Recipes</span></h2>
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="search-input input-group mb-3">
              <span class="input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" placeholder="Search">
              <span class="input-group-text"><i class="bi bi-filter"></i></span>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section class="custom-nutrition" id="customnutritionid">
      <div class="container-fluid">
        <h2 class="text-center">Custom <span class="text-orange">Nutrition</span> Plan</h2>
        <p class="text-center">Drag your favourite recipe into the nutrition planner and generate PDF</p>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="mobile-nutrition-tab">
            <ul class="nav nav-tabs custom-nutrition-plan" id="customnutrition" role="tablist"> 
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="browserecipe-tab" data-bs-toggle="tab" data-bs-target="#browserecipe" type="button" role="tab" aria-controls="home" aria-selected="true">Browse Recipe</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="nutritiontable-tab" data-bs-toggle="tab" data-bs-target="#nutritiontable" type="button" role="tab" aria-controls="profile" aria-selected="false">Nutrition Table</button>
              </li>
            </ul>
  
            <div class="tab-content" id="customnutritionContent">
              <div class="tab-pane fade show active" id="browserecipe" role="tabpanel" aria-labelledby="browserecipe-tab">
                <div class="col-md-3 pe-0">
                  <div class="searchrecipe_box">
                    <div class="search-data">
                      <form class="">
                        <div class="search"> <i class="fa fa-search"></i> 
                          <input type="text" class="form-control" placeholder="Search any recipe"><i class="bi bi-funnel"></i></div>                  
                      </form>
                    </div>
                    <div class="search_component">
                      <ul id="sortable1">
                            <?php 

                       // var_dump($_SESSION['recipeItem']);
                       if(!empty($_SESSION['recipeItem'])) {
                                              $data =  $_SESSION['recipeItem'] ;
                                              //echo "<pre>" ;
                                              //print_r($data);




                              foreach ($data  as $key => $value) { 
         ?>
                            <li class="ui-state-default1 drag ouside ">
                          <div class="search_card">
                            <div class="search_card_left">
                              <div class="food-icon"><img src="./img/food1.jpg"></div>
                              <a class="drag_box"><i class="bi bi-grip-vertical"></i></a>
                              <a class="delete_box"><i class="bi bi-trash-fill"></i></a>
                              <div class="grpy_img"><img src="./img/abc.png"></div>
                            <div class="search_card_ttle">
                              <div class="ttle_details">
                                <h5><?php echo $value->{'recipe-name'} ?></h5>
                                <h6>312 kcal</h6>
                              </div>                        
                              <div class="serving_details">
                                <div class="HeroCard_servings"><i class="bi bi-person-fill"></i><p>3</p></div>
                                <div class="HeroCard_servings"><i class="bi bi-clock-fill"></i><p>10 min</p></div>
                              </div>
                            </div>
                            </div>
                            <div class="searchcard_hamburger">
                              <img src="./img/return.png">
                            </div>
                          </div>
                        </li>
                        <?php }
                      }
                         ?>      
                       </ul>
                    </div>
                  </div>
      
                </div>
              </div>
              <div class="tab-pane fade" id="nutritiontable" role="tabpanel" aria-labelledby="nutritiontable-tab">
                <div class="col-md-9 ps-0">
                  <div class="main_nutrition_content">
                    <div class="content_nav">
                      <div class="nav_date" >
                        <i class="bi bi-calendar3"></i>
                        <input type="text" value="12/14/2021 - 12/20/2021" />
                      </div>
                      <div class="nav_btn_week">
                        <ul class="nav nav-tabs">
                          <li ><button class=" nav-link rigt">Weekley</button></li>
                          <li>
                            <label for="txtDate" class="custom-lbl">Custom</label>
                            <!-- <input type="text" class="date-input" id="txtDate" name="SelectedDate" readonly="readonly" /> -->
                            <input type="text" class="date-range-picker" id="txtDate" name="datefilter" value="" />
                          </li>  
                          
                        </ul>
                      </div>
      
                      <div class="nav_btn_save">

                        <button class="btn reset_btn" data-bs-toggle="modal" data-bs-target="#resetModal">Reset</button>
                        <button class="btn save_btn">Save</button>
                      </div>
                    </div>    
                    
                    <!-- Reset Modal -->
                    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- <div class="modal-header">
                            <h5 class="modal-title" id="resetModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div> -->
                          <div class="modal-body text-center">
                            <img src="./img/bx-error.png" style="width: 40px;">
                            <p>Are you sure you want to reset ?</p>
                          </div>
                          <div class="modal-footer1 d-flex justify-content-center pb-3">
                            <button type="button" class="btn btn-green me-3">Confirm</button>
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>                            
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <div class="content_data">
                        <div class="date_nav">
                          <div class="previos-icon"><i class="bi bi-caret-left-fill"></i></div>
                          <div class="days_count">
                            <p>14 Tue</p>
                            <p>15 Wed</p>
                            <p>16 Thu</p>
                            <p>17 Fri</p>
                            <p>18 Sat</p>
                            <p>19 Sun</p>
                            <p>20 Mon</p>
                          </div>
                          <div class="next-icon"><i class="bi bi-caret-right-fill"></i></div>
                        </div>                
                            <div class="content_item_list">
                              <div class="left_items">
                                <div class="breakfast_item">
                                  <p>Breakfast</p>
                                  <div class="breakfast_item_fn">
                                    <div class="breakfast_item_hide">
                                      <div class="graph_item"><img src="./img/graph-edit.png"></div>
                                      <input type="text" placeholder="Enter Here">
                                    </div>
                                  </div>                                  
                                </div>
                              </div>
                              <div class="breakfast_recipe">
                                <ul class="sortable">
                                  <li class="recipe_nam" id="draggable1"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable2"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable3"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable4"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable5"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable6"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam" id="draggable7"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>                          
                                </ul>                                
                              </div>
                              <div class="hide-trash"><a class="delete_box1"><i class="bi bi-trash-fill"></i></a></div>
                            </div>
        
                            <div class="content_item_list">
                              <div class="left_items">
                                <div class="breakfast_item">
                                  <p>Lunch</p>
                                  <div class="breakfast_item_fn">
                                    <div class="breakfast_item_hide">
                                      <div class="graph_item"><img src="./img/graph-edit.png"></div>
                                      <input type="text" placeholder="Enter Here">
                                    </div>
                                  </div>                                  
                                </div>
                              </div>
                              <div class="breakfast_recipe">
                                <ul class="sortable">
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>                          
                                </ul>
                              </div>
                              <div class="hide-trash"><a class="delete_box1"><i class="bi bi-trash-fill"></i></a></div>
                            </div>
        
                            <div class="content_item_list">
                              <div class="left_items">
                                <div class="breakfast_item">
                                  <p>Dinner</p>
                                  <div class="breakfast_item_fn">
                                    <div class="breakfast_item_hide">
                                      <div class="graph_item"><img src="./img/graph-edit.png"></div>
                                      <input type="text" placeholder="Enter Here">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="breakfast_recipe">
                                <ul class="sortable">
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img"src="./img/Recip.png"></div></li>                          
                                </ul>
                              </div>
                              <div class="hide-trash"><a class="delete_box1"><i class="bi bi-trash-fill"></i></a></div>
                            </div>

                            <div class="content_item_list default-hidee">
                              <div class="left_items">
                                <div class="breakfast_item">
                                  <p>Dinner</p>
                                  <div class="breakfast_item_fn">
                                    <div class="breakfast_item_hide">
                                      <div class="graph_item"><img src="./img/graph-edit.png"></div>
                                      <input type="text" placeholder="Enter Here">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="breakfast_recipe">
                                <ul class="sortable">
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img" src="./img/Recip.png"></div></li>
                                  <li class="recipe_nam"><div class="recipe_card droppable"><img class="recipe_img"src="./img/Recip.png"></div></li>                          
                                </ul>
                              </div>
                              <div class="hide-trash"><a class="delete_box1"><i class="bi bi-trash-fill"></i></a></div>
                            </div>
        
                            <div class="content_item_list graphy_hide">
                              <div class="left_items1">
                                <div class="graph_item"><img src="./img/graph-edit.png"></div>
                              </div>
                              <div class="breakfast_recipe grphy-details">
                                <ul>
                                  <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>
                                   <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>
                                   <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>
                                   <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>
                                   <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>
                                   <li class="graph_nam">
                                    <div class="graph_icon"><img src="./img/carett.png"></div>
                                    <div class="graph_card">                              
                                       <div id="piechart_3d" ></div>
                                    </div>
                                    <div class="graph_calori">
                                      <div class="calori_text">
                                        <h5>Colories</h5>
                                        <h6>1136</h6>
                                      </div>
                                    </div>
                                  </li>

                                                                               
                                </ul>
                              </div>
                            </div>
        
                            <div class="content_item_footer">
                              <div class="color-details">
                                <div class="bg-green color_box"></div>
                                <div class="color_nam">Proteins</div>
                              </div>
                              <div class="color-details">
                                <div class="bg-orange color_box"></div>
                                <div class="color_nam">Fats</div>
                              </div>
                              <div class="color-details">
                                <div class="bg-yellow-green color_box"></div>
                                <div class="color_nam">Vitamins</div>
                              </div>
                              <div class="color-details">
                                <div class="bg-yellow color_box"></div>
                                <div class="color_nam">Fibres</div>
                              </div>
                              <div class="color-details">
                                <div class="bg-skin color_box"></div>
                                <div class="color_nam">Sugar</div>
                              </div>
                              <div class="color-details">
                                <div class="bg-green color_box"></div>
                                <div class="color_nam">Carbohydrates</div>
                              </div>
                            </div>      
                            
                            <div class="hide-new-row-flex">
                              <div class="close_item"><img src="./img/close.png"></div>
                              <div class="hide-new-row">
                                <button class="add_new_row"><img src="./img/add.png"> Add a new row</button>
                              </div>
                            </div>                           
        
                    </div>                  

                  </div>
                  <div class="print_btn_group">

                      <?php

                       // var_dump($_SESSION["userInfo"]);
                       if(!empty($_SESSION["userInfo"])){ 
                      ?>
                      <button data-bs-toggle="modal" data-bs-target="#proAccountModal">Print</button>
                      <button data-bs-toggle="modal" data-bs-target="#proAccountModal">Generate PDF</button>
                      <?php } ?>                    

                  </div> 

                  <!-- Reset Modal -->
                    <div class="modal fade" id="proAccountModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body text-center">
                            <img src="./img/bx-error.png" style="width: 40px;">
                            <p>You need a PRO account to print/ generate PDF</p>
                          </div>
                          <div class="modal-footer1 d-flex justify-content-center pb-3">
                            <button type="button" class="btn btn-green me-3">Okay</button>
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>                            
                          </div>
                        </div>
                      </div>
                    </div>     
                </div>
              </div>
              
            </div> 
          </div>                 

        </div>
      </div> 

    </section>


    
    <!-- ----------Function missing?------- -->
    <section class="function-missing">
      <div class="container">
        <h2 class="text-center">Which<span class="text-green"> Function</span> is missing?</h2>
        <p class="text-center sub_head">It's just a prototype and I want to make it as user-friendly as possible. That's why your feedbock is in demand. 
          The feedback is incorporated into monthly sprints. This is how you give feedback:</p>

        <div class="contact_section">
          <div class="contact_img"><img src="./img/contact-1.png"></div>
          <div class="email_text">
            <h6>1. Write me an <span class="text-orange">Email</span>...</h6>
            <p>Write me an email to tina @ recipe calculator and let me know which additional functions or 
              adjustments to existing functions you would like.</p>
              <a href="mailto:tina@rezeptrechner.de" target="_blank">contact@rezeptrchner.com</a>
          </div> 
        </div>

        <div class="contact_section" id="fb-contact">          
          <div class="email_text"> 
            <h6>2. Join our<span class="text-green "> Facebook </span>Group</h6>
            <p>Join Facebook to be informed about updates and give feedback. Send Feedback EMail Join Focebook Group This is how you will be informed about updates...</p>
              <a href="https://www.facebook.com/groups/chooseyourlevel" target="_blank" class="contact_btn btn-green">GET LINK</a>
          </div> 

          <div class="contact_img me-0"><img src="./img/contact-2.png"></div>
        </div>
      </div>
    </section>
    <!-- ---------- Subscribe section ------- -->
    <section class="subscribe_section mobile-footer">
      <div class="container">
        <div class="subscribe_data">
          <h5>Subscribe to our <span class="text-orange "> Newsletter</span></h5>
          <p>Subscribe to the following newsletter to be informed about updates.<br> 2. Check out Facebook regularly;). Further functions in 
            development: The following items are already being planned: Extension of recipe selection to include your own recipes</p>
            <div class="subscribe_txt">              
              <input type="text" placeholder="Enter your email..">
              <div class="subscribe_btn">Subscribe</div>
            </div>
        </div>
      </div>
    </section>

   
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
    rel="Stylesheet" type="text/css" />

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Date range picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


  <!-- Custom js -->  

  <!-- //Calender script -->
  <script type="text/javascript">
    $(function() {

        $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });
  </script>

<!-- //Drag and clone -->
  <script>   
   $(document).ready(function(){
       $(document).on('mouseover','#sortable1 > li',function(){
      if(!$(this).hasClass("ui-draggable-handle")){
        $(this).trigger("click");
      }
      
    });
   
   });
    var total=0;

    (function ($) {
      $.fn.liveDraggable = function (opts) {
          this.click("mouseover", function() {
            if (!$(this).data("init")) {
              $(this).data("init", true).draggable(opts);
              // total += $(this).data("total");
              //  alert(total);        
                $(this).removeClass("drag");
            }
           });
          return this;
      };
    }(jQuery));
    $('.drag').liveDraggable({
      helper: 'clone',
      cursor: 'move'    
  });    

    
  </script> 

<!-- //recipe box data remove -->
  <script>
    $(document).on("click","body .delete_box",function() {
      $(this).parent().parent().parent().parent().html('<img class="recipe_img" src="./img/Recip.png">');
      $(this).parent().parent().parent().remove();    
    });
  </script>



  <script>
    // $('.recipe_nam').draggable({
    //   handle: '.drag_box',
    //   containment: '.content_data'
    //   });
     $(document).ready(function() {
    var dropped = false;
    var start_dropped = false;
    var draggable_sibling;

    $(".sortable").sortable({
        start: function(event, ui) {
      start_dropped = true;
      console.log("coming here");
            draggable_sibling = $(ui.item).prev();
        },
        stop: function(event, ui) {
          start_dropped = false;
          console.log("coming here 2");
          if (dropped) {
               if (draggable_sibling.length == 0)
                $('.sortable').prepend(ui.item);

            draggable_sibling.after(ui.item);
            dropped = false;
          }
      }
    });
   var x = null;
    $(".droppable").droppable({
      drop: function(e, ui) {
    if(start_dropped == true){ return}
        var parent = $(this);
    console.log("recipe_nam",parent.hasClass("recipe_nam"));
        parent.find('img').remove();
        var x = ui.draggable.clone();
        var img = $(x)  

        if (x.hasClass("outside")) {
          x.removeClass("outside");   
        }      
        // x.draggable({
        //   helper: 'original'
        // });

        x.find('.ui-resizable-handle').remove();
        x.resizable();
        x.appendTo(this);
        ui.helper.remove();          
      }
    });
});    
  </script>

<!-- //nutrition edit btn -->
<script>
  $(document).ready(function(){
    $(".left_items1 .graph_item").click(function(){
      $(".breakfast_item p").css('display', 'none');
      $(".breakfast_item_fn").css('display', 'block');
      $('.hide-trash').css('display', 'block');
      $('.content_item_list.graphy_hide').css('display', 'none');
      $('.content_item_footer').css('display', 'none');
      $('.hide-new-row-flex').css('display', 'block');      
    });
  });
  </script>
<!-- //nutrition close btn -->
     <script>
    $(document).on("click",".close_item",function() {
         $(".breakfast_item p").css('display', 'block');
        $(".breakfast_item_fn").css('display', 'none');
        $('.hide-trash').css('display', 'none');
        $('.content_item_list.graphy_hide').css('display', 'flex'); 
        $('.content_item_footer').css('display', 'flex');
        $('.hide-new-row-flex').css('display', 'none'); 
    });
  </script>

<!-- //add new row -->
  <script>
    $(document).ready(function(){
    $(".add_new_row").click(function(){      
      $('.content_item_list.default-hidee').css('display', 'flex');
    });
  })
    </script>

 
<!-- //delete recipe row -->
<script>
  $(document).on("click","body .hide-trash",function() {    
    $(this).parent().remove();    
  });
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
         // title: 'My Daily Activities',
          is3D: false,

          legend: 'none',       
            };
        // var options = {
      //   legend: 'none',
      //   pieSliceText: 'label',
      //   title: 'Swiss Language Use (100 degree rotation)',
      //   pieStartAngle: 100,
      // };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  

  </body>
</html>


