<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/nav-menu.css">
        <link rel="stylesheet" type="text/css" href="picture-container/picture-container.css">
        <link rel="stylesheet" type="text/css" href="css/queries.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
        <title> Shooping List</title>
    </head>

    <body>
        <header>
            <templateHtml src="picture-container/picture-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
        </header>

        <script src="commons.js"></script>
    
       





        <section id="shopping-list">
            <form>
                <h1> Shopping List</h1>
                            
                <div class="row shoppinglist-form3">
                    
                    <p>Select item to the list:</p>
                    
                    <div class="col">
                    
                        <label>Category: </label> 
                        <select name="Category" size="0" id="itemcategory" onchange="SelectCategory(this.value);" > 
                                <option value="Empty" > --Select Category--  </option>
                                <option value="Artmaterials"> Art materials  </option>
                                <option value="Office" > Office  </option>
                                <option value="Food" > Food  </option>
                        </select>
                        
                    </div>
                    
                    <div class="col">
                        <label> Item: </label> 
                        
                        <select name="Item" size="0" id="empty">  </select>                     
                        
                        <select name="Item" size="17" id="artitems" > 
                            <option value=""> Select...  </option>
                            <option value="Crayons-24"> Crayons (package of 24)</option>
                            <option value="Crayons-200" > Crayons (package of 200)  </option>
                            <option value="Glue-stick" > Glue-stick (package of 5)  </option>
                            <option value="Glue-liquid-100ml" > Glue-liquid-100ml (package of 3)  </option>
                            <option value="Glue-liquid-300ml" > Glue-liquid-300ml  </option>
                            <option value="Glue-liquid-1kg" > Glue-liquid-1kg  </option>
                            <option value="Paper-blue-A3" > Paper-blue-A3 (package of 50)  </option>
                            <option value="Paper-green-A3" > Paper-green-A3 (package of 50)  </option>
                            <option value="Paper-red-A3" > Paper-red-A3 (package of 50)  </option>
                            <option value="Paper-white-A3" > Paper-white-A3 (package of 50)  </option>
                            <option value="Paper-Yellow-A3" > Paper-Yellow-A3 (package of 50)  </option>
                            <option value="Paper-blue-A4" > Paper-blue-A4 (package of 50)  </option>
                            <option value="Paper-green-A4" > Paper-green-A4 (package of 50)  </option>
                            <option value="Paper-red-A4" > Paper-red-A4 (package of 50)  </option>
                            <option value="Paper-white-A4" > Paper-white-A4 (package of 50)  </option>
                            <option value="Paper-Yellow-A4" > Paper-Yellow-A4 (package of 50)  </option>
                        </select>
                                         
                        <select name="Item" size="10" id="officeitems" > 
                            <option value="" > Select...  </option>
                            <option value="folder"> Folder  </option>
                            <option value="notebook" > Notebook (package of 5)  </option>
                            <option value="Pens-black" > Pens-black (package of 10)  </option>
                            <option value="Pens-blue" > Pens-blue (package of 10)  </option>
                            <option value="Pens-red" > Pens-red (package of 10)  </option>
                            <option value="perforated"> Perforated  </option>
                            <option value="rubber bands"> Rubber bands (package of 50)  </option>
                            <option value="stapler"> Stapler  </option>
                            <option value="staples"> Staples  </option>
                        </select>
                            
                        <select name="Item" size="20" id="fooditems" > 
                            <option value="" > Select...  </option>
                            <option value="apples"> Apples  </option>
                            <option value="bread" > Bread  </option>
                            <option value="butter" > Butter spread  </option>
                            <option value="wh-cheese-5%"> Cheese-white-5%  </option>
                            <option value="ye-cheese" > Cheese-yellow  </option>
                            <option value="chocolate" > Chocolate spread  </option>
                            <option value="cucumber"> Cucumber  </option>
                            <option value="grape-juice" > Grape juice  </option>
                            <option value="lettuce" > Lettuce  </option>
                            <option value="olives"> Olives (can)  </option>
                            <option value="onion" > Onion (kg)  </option>
                            <option value="pepper-green" > Pepper-green (kg)  </option>
                            <option value="pepper-red" > Pepper-red (kg) </option>
                            <option value="pepper-yellow" > Pepper-yellow (kg) </option>
                            <option value="pickles" > Pickles (can)  </option>
                            <option value="raspberry juice" > Raspberry juice  </option>
                            <option value="tomato" > Tomato (kg)  </option>
                            <option value="tehina" > Tehina  </option>
                            <option value="tuna" > Tuna  </option>
                        </select>
                        
                    </div>
                    
                    <div class="col">                       
                        <label> Quantity: </label> 
                        <input type="number" name="quantity" min="1" max="10" id="quantity">   
                    </div>
                                            
                    <div class="col">  
                        <button type="button"id="add" onClick="createTables()" > Add </button>
                    </div>
                    <br><br><br>   
                </div>
                
                
                <div class="row">		
                    <table id="item-table"> </table >
                </div>
                    
            </form>  
        </section>
        
        <script src="shopping-list.js"></script>
    
</body>

</html>