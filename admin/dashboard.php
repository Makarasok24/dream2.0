<?php
    // session_start();

    include "../connection.php";
    include "admin.php";


?>
<div class="main">
    
  <?php


//     if(!$_SESSION['login_btn'] && !$_SESSION['successfull']){
//     header('location:../login.php');
// }

  ?>
    
    <div class="container card_information">
        <div class="row">
            <div class="col-8 stastic-data">
                <div class="row">
                    <div class="col-6 balance_1" style="width: 48%;">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon">
                                    <i class='bx bxs-credit-card' ></i>
                                </div>
                            </div>
                            <div class="col-8 text_balacne">
                            <?php $sql = "SELECT total_price FROM `payment`";
                            $result_pay = $con->query($sql);
                            if($result_pay->num_rows > 0){
                              $total_amount = 0;
                              while($row = $result_pay->fetch_assoc()){
                                $total_price = $row['total_price'];
                                $total_amount += $total_price;
                              }
                            }
                            ?>
                                <span>Available Balance</span>
                                <div style="font-size: 20pt;">
                                    <p>$ <?=$total_amount?></p>
                                    <div class="percent"><i class='bx bx-up-arrow-alt' ></i>8%</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-6 balance_2">
                        <div class="row">
                            <div class="col-4">
                                <div class="icon">
                                    <i class='bx bxs-hot' ></i>
                                </div>
                            </div>
                            <div class="col-8 text_balacne">
                                <span>Pending Balance</span>
                                <div style="font-size: 20pt;">
                                    <p>$99999</p>
                                    <div class="percent"><i class='bx bx-up-arrow-alt' ></i>8%</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

<div class="statistic">
  <!-- //bar chart -->
  <canvas id="myChart"></canvas>

</div>

    <div class="table_product">
                        
        <section id="table-dashboard-sec">
        
        <h4 class="text-center text-white">All Products</h4>
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>($)Price</th>
                <th>Category</th>
                <th>Status</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                $sql = "SELECT * FROM products
                INNER JOIN category ON products.category_id = category.id
                INNER JOIN  image  ON products.image_id  = image.id
                INNER JOIN stock ON products.stock_id = stock.id";

                $data = $con->query($sql);
                if($data->num_rows>0){
                  $row = $data->fetch_assoc();
                  while($row){
                    $image= $row['product_image'];
                    $name = $row['product_name'];
                    $price = $row['price'];
                    $category = $row['category_name'];
                    $stock = $row['quantity'];
                    $row = $data->fetch_assoc();
                    
                    echo"<tr>
                        <td><img src='../$image'  height = '90px' ></td>
                        <td>$name</td>
                        <td>$ $price</td>
                        <td>$category</td>";
                    echo"<td>";
                        if($stock > 0){
                          echo '<p>In Stock</p>';
                        }else{
                          echo "<p class='text-danger'>Not Available</p>";
                        }
                    echo"</td>";
                    echo"</tr>";
                  }
                }
            ?>
            </tbody>
        </table>
        </div>
        </section>
                        
            </div>
                    
               
            </div>
            <div class="col-4 amount-data">
                <div class="sub_div_1">
                    <canvas id="myPieChart"></canvas>
                </div>

                <div class="sub_div_2">
                    <div class="row">
                        <div class="col-4 icon_user">
                            <div class="user_count">
                            <i class='bx bx-user' ></i>
                            </div>
                        </div>
                        <div class="col-8 number_user" style="width: 200px;">
                            <h4 class="text-white" >Total Customer</h4>
                            <h1><?php 
                                  $sql = "SELECT * FROM user WHERE user.type_user = 'customer'";  
                                  
                                  $result = $con->query($sql);
                                  $rowcount = mysqli_num_rows($result);#count number of users
                                  echo "$rowcount";
                                ?>
                            </h1>
                            <!-- <small>5%</small> -->
                        </div>
                    </div>
                </div>

                <div class="sub_div_3">
                    <h5 class="text-center text-white">List of users</h5>
                    <section id="table-dashboard-sec">
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Image</th>
                <th>First Name</th>
                <th>Last name</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="tbl-content_user">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <?php
                  $sql = "SELECT user.first_name , user.last_name FROM user";
                  $result = $con->query($sql);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                      $first_name = $row['first_name'];
                      $last_name = $row['last_name'];

                      echo"<tr>
                        <td><img src='../profile/t.png' style='width: 40px;height:40px; border-radius:50%;border:2px solid white;' alt=''></td>
                        <td style='font-size:14px'>$first_name</td>
                        <td style='font-size:14px'>$last_name</td>
                      </tr>";
                    }
                  }
              ?>
            </tbody>
        </table>
        </div>
        </section>
                </div>
            </div>
      </div> 
      <!-- #row main -->
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx,{
    type: 'bar',
    data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    datasets: [{
    label: '# profit',
    data: [12, 19, 3, 5, 2, 3,12, 20, 3, 5, 2, 3],
        borderWidth: 1
        }]
    },
    options: {
    scales: {
    y: {
        beginAtZero: true
        }
      }
    }
});
</script>

<script>
    const config = document.getElementById('myPieChart');
    new Chart(config,{
    type:'pie',
    data: {
  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
  datasets: [{
    label: '# of Votes',
    data: [12, 19, 3, 5, 2, 3],
    borderWidth: 1,
    backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400'],
  }]
}
});
</script>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>