<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainees Page</title>
    <link rel="icon" href="images/ic1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
      body{
        background-image:url("images/bg1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
      #myInput{
          border:2px solid blue;
          border-radius:40px;
      }
      th{
          font-weight:600;
          font-size:20px;
          color:white;
      }
      td{
          font-weight:300;
          font-size:18px;
          color:white;
      }
    </style>
  </head>
  <body>
    <?php 
    $conn=new mysqli('localhost','root','','gymdb');
    $sql = "SELECT * FROM trainee";
    $query = mysqli_query($conn, $sql);
    ?>
    <input class="form-control col-lg-6 col-md-7 col-sm-3 mx-auto mt-3 mb-4 text-center text-secondary" id="myInput" type="text" placeholder="Search Here For A Trainer..">
    <table class="table table-hover table-bordered text-wrap table-responsive-sm text-black" id="myTable">
      <thead class="bg-warning">
          <tr>
              <th scope="col" class="lg-1 text-center">Traineeid</th>
              <th scope="col" class="lg-1 text-center">Name</th>
              <th scope="col" class="lg-1 text-center">Gender</th>
              <th scope="col" class="lg-1 text-center">Email</th>
              <th scope="col" class="lg-1 text-center">Plan</th>
              <th scope="col" class="lg-1 text-center">Phone Number</th>
              <th scope="col" class="lg-1 text-center">Address</th>
          </tr>
      </thead>
      <tbody class="table">
        <?php
          while($rows = mysqli_fetch_array($query)) { ?>
          <tr>
            <th class="lg-1 text-center my-auto"><?php echo $rows['traineeid']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['tname']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['gender']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['eml']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['plan']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['phno']; ?></th>
            <th class="lg-1 text-center my-auto"><?php echo $rows['addr']; ?></th>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    <script>
          $(document).ready(function(){
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
      </script>
  </body>
</html>