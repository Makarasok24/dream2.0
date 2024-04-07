    <?php
    global$con;
    include "../connection.php";
    include "admin.php";
    // Check if product id is provided 
    if(isset($_GET['id'])) {

        $product_id = $_GET['id'];


        // Fetch existing product data from the database
        $sql = "SELECT * FROM products as p
        INNER JOIN image as i ON  p.image_id = i.id
        INNER JOIN stock as s ON p.stock_id = s.id
        WHERE p.id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
        
            $row = $result->fetch_assoc();
            $product_name = $row['product_name'];
            $price = $row['price'];
            $category = $row['category_id'];
            $stock_qty = $row['quantity'];
            $type_feature = $row['type_feature'];
            $brand = $row['brand'];
            $description = $row['description'];
           
        } else {
            echo "Product not found.";
            exit;
        }
    }
    
?>

<?php

if(isset($_POST['submit'])) {
    // Retrieve updated form data
    $id = $_POST['id'];
    $new_product_name = $_POST['product_name'];
    $new_price = $_POST['price'];
    $new_category = $_POST['category'];
    $new_type_feature = $_POST['type_feature'];
    $new_brand = $_POST['brand'];
    $new_description = $_POST['description'];
    $new_stock_qty = $_POST['stock_qty'];

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

    // Update the product in the database
    $sql = "UPDATE products as p
    INNER JOIN image as i ON p.image_id = i.id
    INNER JOIN stock as s ON p.stock_id = s.id
    SET p.product_name=?, 
    p.type_feature=?, 
    p.price=?, 
    p.brand=?, 
    p.category_id=?, 
    p.description=? ,
    s.quantity=?,
    i.product_image=?,
    i.image_2=?,
    i.image_3=?
    WHERE p.id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssdsisisssi", $new_product_name, $new_type_feature, $new_price, $new_brand, $new_category, $new_description,$new_stock_qty,$name_image_1,$name_image_2,$name_image_3, $id);
    

    // Check if the update was successful
    if($stmt->execute()) {
        // Redirect to the product details page or display a success message
        header("location: myProduct.php");
        exit;
    } else {
        echo "Failed to update product.";
    }
}


?>

<div class="main">
    <!-- Form fields populated with existing product data -->
    <div class="container mt-5 w-50">

            <form action="edit.php" method="POST" role="form" enctype="multipart/form-data">

              <div class="mb-3">
                <input type="text" class="form-control" name="id" value="<?=$product_id?>">
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control" style="border-radius:0;border-color:#000;" value="<?=$product_name?>" name="product_name" placeholder="Product Name"  require>
              </div>

              <div class="mb-3">
                  <input type="text" class="form-control"  style="border-radius:0;border-color:#000;" value="<?=$price?>" name="price" placeholder="$Price"   require>
              </div>

              <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select form-select-lg"
                        name="category"
                        id=""
                        style="border-radius:0;border-color:#000;"
                        
                    >
                        <option selected value="<?=$category?>">
                            <?php
                                if($category == 1){
                                    echo "Cloth";
                                }else{
                                    echo "Sneaker";
                                }
                            ?>
                        </option>
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
                        <option selected value="<?=$type_feature?>" ><?=$type_feature?></option>
                        <option value="NEW ARRIVALS" >NEW ARRIVALS</option>
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
                        <option selected value="<?=$brand?>"><?=$brand?></option>
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
                <textarea name="description" value="<?=$description?>" id=""  style="border-radius:0;border-color:#000;" class="form-control" cols="30" rows="10"></textarea>
              </div>

            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary">
            </div>

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
</div>
