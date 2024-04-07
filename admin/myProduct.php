<?php

global $con;
include "../connection.php";
    include "admin.php";
          
?>
<?php
                                                                                                                                                                                                                                                                      

  if (isset($_GET['delete']) && isset($_GET['Id'])) {
    $id = $_GET['Id'];
    // var_dump($_GET); // You can use this for debugging if needed
    // if(isset($_POST['submit'])){
      $sql = "DELETE products, image, stock 
              FROM products 
              INNER JOIN image ON products.image_id = image.id
              INNER JOIN stock ON products.stock_id = stock.id 
              WHERE products.id = $id";

      $result = $con->query($sql);
    // }
}


// if (isset($_GET['delete']) && isset($_GET['Id'])) {
  
//   $id_d = $_GET['Id'];
//   // var_dump($_GET); // You can use this for debugging if needed
//   if(isset($_GET['submit'])){
//     $sql = "DELETE products, image, stock 
//             FROM products 
//             INNER JOIN image ON products.image_id = image.id
//             INNER JOIN stock ON products.stock_id = stock.id 
//             WHERE products.id = $id_d";

//     $result = $con->query($sql);
//   }
// }


?>

<div class="main">
    <h1>Our Products</h1>
    <div class="table_product_crud">
        
      <section id="table-dashboard-sec">
        
        <!-- <h4 class="text-center text-white">Fixed Table header</h4> -->
        <div class="tbl-header">
          <?php
              $sql = "SELECT * FROM products
              INNER JOIN category ON products.category_id = category.id
              INNER JOIN  image  ON products.image_id  = image.id
              INNER JOIN stock ON products.stock_id = stock.id";  
              $data = $con->query($sql);

          ?>
          <table cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>($)Price</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
          
        </div>

        <div class="tbl-content_crud">
          <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            <?php
                
                if($data->num_rows > 0){
                  
                  while($row = $data->fetch_assoc()){
                    $id = $row['product_id'];
                    $image= $row['product_image'];
                    $image_2 = $row["image_2"];
                    $image_3 = $row["image_3"];
                    $name = $row['product_name'];
                    $price = $row['price'];
                    $category = $row['category_name'];
                    $stock = $row['quantity'];
                    $brand = $row['brand'];
                    $feature = $row['type_feature'];
                    
                    echo'<tr>';
                    echo "  <td><img src='../$image' alt='' height = '90px' ></td>";
                    echo '    <td>'.$name.'</td>
                        <td>$'.$price.'</td>
                        <td>'.$category.'</td>
                        <td>'.$stock.'</td>
                        <td>
                        <a href="edit.php?id='.$id.'" 
                         class="btn btn-success"><i class="bx bx-edit-alt"></i></a>
                        <a href="myProduct.php?delete&Id='.$id.'" 
                        class="btn btn-danger"><i class="bx bx-trash" ></i></a>
                        </td>
                        </tr>';
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
</div>



<section class="pop_up_modal">
  
  <!-- Modal edit -->
  <div
    class="modal fade"
    id="modalEdit_Id"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">
            Update Product
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="container mt-5 ">
            <form action="update.php" method="POST" role="form" enctype="multipart/form-data">

              <div class="mb-3">
                <input type="text" class="form-control" name="id" value="<?=$id?>">
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control" style="border-radius:0;border-color:#000;" name="product_name" placeholder="Product Name" value="< ?=$name?>" require>
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control"  style="border-radius:0;border-color:#000;" name="price" placeholder="$Price" value="<?=$price?>"  require>
              </div>

              <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select form-select-lg"
                        name="category"
                        id=""
                        style="border-radius:0;border-color:#000;"
                        
                    >
                        <option value="1">Cloth</option>
                        <option value="2">Sneaker</option>
                    </select>
              </div>

              <div class="mb-3">
                <label for="" >Stock</label>
                <input type="text" class="form-control" name="stock_qty" style="border-radius:0;border-color:#000;">
              </div>

              <div class="mb-3">

                <label for="" class="form-label">FEATURE</label>
                <select
                        class="form-select form-select-lg"
                        name="type_feature"
                        id=""
                        style="border-radius:0;border-color:#000;"
                        
                    >
                        <option value="<?=$feature?>"><?=$feature?></option>
                        <option selected value="NEW ARRIVALS" >NEW ARRIVALS</option>
                        <option value="BEST SELLER">BEST SELLER</option>
                        <option value="LIMITED EDITION(BA)">LIMITED EDITION(BA)</option>
                        <option value="LIMITED EDITION">LIMITED EDITION</option>
                        <option value="POPULAR">POPULAR</option>
                </select>

                
              </div>

              <div class="mb-3">
                    <label for="" class="form-label">BRAND</label>
                    <select class="form-select form-select-lg"
                        name="brand"
                        id=""
                        style="border-radius:0;border-color:#000;"
                    >   
                        <option value="<?=$brand?>"><?=$brand?></option>
                        <option value="Phnom Penh Crown">Phnom Penh Crown FC</option>
                        <option value="Boeung Ket Angkor FC">Boeung Ket Angkor FC</option>
                        <option value="Visakha FC">Visakha FC</option>
                        <option value="Svay Rieng FC">Svay Rieng FC</option>
                        <option value="Nagaworld FC">Nagaworld FC</option>
                        <option value="ISI Dangkor Senchey">ISI Dangkor Senchey</option>
                        <option value="Angkor Tiger">Angkor Tiger</option>
                        <option value="Kirivong Sok Senchey">Kirivong Sok Senchey</option>
                        <option value="Tiffy Army FC">Tiffy Army FC</option>
                        <option value="NIKE">Nike</option>
                        <option value="ADDIDAS">Addidas</option>
                        <option value="JORDAN">Jordan</option>
                        <option value="PUMA">Puma</option>
                    </select>
                </div>

              <div class="mb-3">
                <label for="" class="form-label">Image1</label>
                <input
                    type="file"
                    class="form-control"
                    name="image"
                    id=""
                    style="border-radius:0;border-color:#000;"
                    value="<?=$image?>"
                />
              </div>

             <div class="mb-3">
                <label for="" class="form-label">Image2</label>
                <input
                    type="file"
                    class="form-control"
                    name="image_2"
                    id=""
                    style="border-radius:0;border-color:#000;"
                    value="<?=$image_2?>"
                />
             </div>

              <div class="mb-3">
                <label for="" class="form-label">Image3</label>
                <input
                    type="file"
                    class="form-control"
                    name="image_3"
                    id=""
                    style="border-radius:0;border-color:#000;"
                    value="<?=$image_3?>"
                />
              </div>
            
              <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" id=""  style="border-radius:0;border-color:#000;" class="form-control" cols="30" rows="10"></textarea>
              </div>

              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
          
      </div>
    </div>
  </div>
  
  <script>
    var modalEdit_Id = document.getElementById('modalEdit_Id');
  
    modalEdit_Id.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');
  
      // Use above variables to manipulate the DOM
    });
  </script>
  
</section>

<!-- #delete -->

<section class="delete">
  
  <!-- Modal delte -->

  <div
    class="modal fade"
    id="modal_delelet_Id"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitleId">
            Delete
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <h3 class="text-center">Are you sure? You want to delete.</h3>
            <form action="delete.php" method="get" role="form">
                    <div class="container">
                        <input type="text" name="id" value="<?=$id?>" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button" 
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="submit" name="submit" class="btn btn-primary">Ok</button>
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    var modal_delelet_Id = document.getElementById('modal_delelet_Id');
  
    modal_delelet_Id.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');
  
      // Use above variables to manipulate the DOM
    });
  </script>
  
</section>

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
