<?php

global $con;
include "../connection.php";
    include "admin.php";
          
?>
<?php
                                                                                                                                                                                                                                                                      

//   if (isset($_GET['delete']) && isset($_GET['Id'])) {
//     $id = $_GET['Id'];
//     // var_dump($_GET); // You can use this for debugging if needed
//     // if(isset($_POST['submit'])){
//       $sql = "DELETE products, image, stock 
//               FROM products 
//               INNER JOIN image ON products.image_id = image.id
//               INNER JOIN stock ON products.stock_id = stock.id 
//               WHERE products.id = $id";

//       $result = $con->query($sql);
//     // }
// }

?>

<div class="main">
    <h1>Product Orders</h1>
    <div class="table_product_crud">
        
      <section id="table-dashboard-sec">
        
        <!-- <h4 class="text-center text-white">Fixed Table header</h4> -->
        <div class="tbl-header">
          <?php
              $sql = "SELECT product_name,concat(first_name,' ',last_name) as fullname,email,quantity,total_price FROM orders";
              $data = $con->query($sql);

          ?>
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Qunantity</th>
                <th>Total Price($)</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="tbl-content_crud">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                
                if($data->num_rows > 0){
                    $total_amount = 0;
                  while($row = $data->fetch_assoc()){
                    
                    $product_name= $row['product_name'];
                    $full_name = $row["fullname"];
                    $email = $row['email'];
                    $total_price= $row['total_price'];
                    $quantity = $row['quantity'];
                    
                    echo'<tr>';
                    echo '<td style="font-size:18px">'.$product_name.'</td>
                        <td style="font-size:18px">$'.$full_name.'</td>
                        <td style="font-size:18px">'.$email.'</td>
                        <td style="font-size:18px">'.$quantity.'</td>
                        <td style="font-size:18px">'.$total_price.'</td>
                        <tr>';
                    $total_amount += $total_price;

                  }
                  
                }
                
            ?>
           
              
            </tbody>
          </table>
        </div>
      </section>
                        
      </div>
                    
</div>

