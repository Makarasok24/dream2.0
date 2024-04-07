<?php

    include "../connection.php";
    include "admin.php";
    // Check if product id is provided in URL
    if(isset($_GET['Id'])) {
        $product_id = $_GET['Id'];

        // Fetch existing product data from the database
            $sql = "SELECT * FROM products
            INNER JOIN stock ON products.stock_id = stock.id
            WHERE products.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            // Populate form fields with existing product data
            $product_data = $result->fetch_assoc();
            $product_name = $product_data['product_name'];
            $price = $product_data['price'];
            $category = $product_data['category_id'];
            $stock_qty = $product_data['quantity'];
            $type_feature = $product_data['type_feature'];
            $brand = $product_data['brand'];
            $description = $product_data['description'];
            // Additional data retrieval for images if necessary
        } else {
            // Product not found, redirect or display an error message
            echo "Product not found.";
            exit;
        }
    } else {
        // Product id not provided in URL, redirect or display an error message
        echo "Product id not provided.";
        exit;
    }

?>
<div class="container mt-5 w-50">
            <form action="update.php" method="POST" role="form" enctype="multipart/form-data">

              <div class="mb-3">
                <input type="text" class="form-control" value="<?=$product_id?>" name="id">
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control" value="<?=$product_name?>" style="border-radius:0;border-color:#000;" name="product_name" placeholder="Product Name"  require>
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control" value="<?=$price?>" style="border-radius:0;border-color:#000;" name="price" placeholder="$Price"   require>
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
                <input type="text" class="form-control" value="<?=$stock_qty?>" name="stock_qty" style="border-radius:0;border-color:#000;">
              </div>

              <div class="mb-3">

                <label for="" class="form-label">FEATURE</label>
                <select
                        class="form-select form-select-lg"
                        name="type_feature"
                        id=""
                        style="border-radius:0;border-color:#000;"
                        
                    >
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
              
                />
              </div>
            
              <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" id=""  style="border-radius:0;border-color:#000;" class="form-control" cols="30" rows="10"></textarea>
              </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary">
            </div></div>
              <!-- <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save</button> -->

            </form>
        </div>

    <?php

            if(isset($_POST['submit'])){
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $stock_qty = $_POST['stock_qty'];
                $type_feature = $_POST['type_feature'];
                $brand = $_POST['brand'];
                $description = $_POST['description'];
        
                $image = $_FILES['image']['name'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $name_image_1 = 'upload_img/'.$image;
                $name_image_folder_1 = '../upload_img/'.$image;
        
                move_uploaded_file($image_tmp_name,$name_image_folder_1);
        
                $image_2 = $_FILES['image_2']['name'];
                $image2_tmp_name = $_FILES['image_2']['tmp_name'];
                $name_image_2 = 'upload_img/'.$image_2;
                $name_image_folder_2 = '../upload_img/'.$image_2;
        
                move_uploaded_file($image2_tmp_name,$name_image_folder_2);
        
                $image_3 = $_FILES['image_3']['name'];
                $image3_tmp_name = $_FILES['image_3']['tmp_name'];
                $name_image_3 = 'upload_img/'.$image_3;
                $name_image_folder_3 = '../upload_img/'.$image_3;
        
                move_uploaded_file($image3_tmp_name,$name_image_folder_3);


                $sql = "UPDATE image,image,products
                INNER JOIN  image ON products.image_id = image.id
                INNER JOIN  stock ON products.stock_id = stock.id
                SET products.product_name = $product_name , products.price = $price , products.type_feature = $type_feature,
                    products.brand = $brand,products.description = $description, image.product_image = $name_image_1,image.image_2 = $name_image_2,
                    image.image_3 = $name_image_3, stock.stock_qty = $stock_qty 
                WHERE products.id = $id";

                $update = $con->query($sql);

                header("location: myProduct.php");
                

            }
    ?>