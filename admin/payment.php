<?php
    include "admin.php";
    global $con;
    include "../connection.php";

?>
<?php
$sql = "SELECT total_price,pay_img,concat(first_name,' ',last_name) as username ,email FROM `payment`";
$result_pay = $con->query($sql);
?>
<style>
 /* Styling for the fullscreen overlay */
 .fullscreen-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            text-align: center;
        }

        .fullscreen-overlay img {
            max-width: 90%;
            max-height: 90%;
            margin-top: 5%;
        }
        .close-button{
          margin-top: 50px;
          position: absolute;
          right: 50px;
          cursor: pointer;
          font-size: 20px;
          font-weight: 300;
          border: solid 2px yellow;
          width: 40px;
          align-items: center;
          text-align: center;

        }
</style>
<div class="main">
<h1>Payment</h1>
    <div class="table_product_crud">
                        
    <section id="table-dashboard-sec">
        
        <!-- <h4 class="text-center text-white">Fixed Table header</h4> -->
        <div class="tbl-header">
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              
              <tr>
                <th>Image</th>
                <th>Username</th>
                <th>($)Amount</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="tbl-content_crud">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                  
                  if($result_pay->num_rows > 0){
                    while($row = $result_pay->fetch_assoc()){
                      $pay_img = $row['pay_img'];
                      $username = $row['username'];
                      $total_price = $row['total_price'];
                      $email = $row['email'];

                      echo'<tr>';
                      echo "  <td><img class='thumbnail' style='cursor:pointer' src='../$pay_img' alt='' height = '80px' ></td>";
                      echo"<td style='font-size:20px;'>$username</td>
                        <td style='font-size:20px;'>$ $total_price</td>
                        <td >$email</td>
                        <td>
                            <button class='btn btn-success'><i class='bx bx-check-square' ></i></button>
                            <button class='btn btn-danger'><i class='bx bx-x-circle'></i></button> 
                        </td>
                      </tr>";
                      
                    }
                  }
                    
                
              ?>
              <div class="fullscreen-overlay" id="fullscreen-overlay">
                  <span class="close-button text-white" style="background-color: red; width:40px;height:40px;border-radius:50%;border:none;padding:4px" onclick="closeFullscreen()">X</span>
                  <img id="fullscreen-image"> 
              </div>

              <script>
                  // Function to open the fullscreen overlay and display the clicked image
                  function openFullscreen(imageSrc) {
                      var fullscreenImage = document.getElementById("fullscreen-image");
                      fullscreenImage.src = imageSrc;
                      document.getElementById("fullscreen-overlay").style.display = "block";
                  }

                  // Function to close the fullscreen overlay
                  function closeFullscreen() {
                      document.getElementById("fullscreen-overlay").style.display = "none";
                  }

                  // Add click event listeners to all images with class "thumbnail"
                  var thumbnails = document.getElementsByClassName("thumbnail");
                  for (var i = 0; i < thumbnails.length; i++) {
                      thumbnails[i].addEventListener("click", function() {
                          openFullscreen(this.src);
                      });
                  }
              </script>
              
            </tbody>
        </table>
        </div>
        </section>
                   
          </div>
                    
        </div>
    </div>
</div>
