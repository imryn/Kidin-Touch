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
        <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

<title>Title of the document</title>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
</head>

<body>
       <header>
            <templateHtml src="picture-container/picture-container.html"></templateHtml>
            <?php include "nav-menu/nav-menu-container.php" ?>
     </header>

<section id="reports">
        <form>
            <h1> reports </h1>
            <p id="form-exp"> Please choose the report you want to produce <p>
        <div class="row reports-line">
           <div class="col span-1-of-1 box">
               <div class="report-info">
                  <label  for="report"> choose report: </label>
                    <select name="optionsReport" size="1" id="report-choosing"> 
                            <option value="allergies-report" selected> Allergies Report </option>
                            <option value="shopping-report"> Shopping Report </option>
                            <option value="presence-report"> Presence Report </option>
                    </select>
                </div>
           </div>
        </div>
        <div class="row reports-line">
              <div class="col span-1-of-2 box">
                  <div class="report-info">
                    <label for="start-date"> start date: </label>
                    <input name="startDate" type="date"/>
                  </div>
              </div> 
            
              <div class="col span-1-of-2 box">
                   <div class="report-info">
                      <label for="end-date"> end date: </label>
                      <input name="endDate" type="date"/>
                   </div>
              </div>
        </div>
           
         <input type="button" value="create" class="create-botton" onClick="getReports()"/>
  </form>
        <table id="kids-table"></table>
        <script src="commons.js"></script>
        <script src="main.js"></script>
</section>


</body>

</html>