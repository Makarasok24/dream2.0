<?php
global $con;
include "../connection.php";
    include "../connection.php";

?>
<?php
    include "admin.php";

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

        

        //check category
        $category_sql = "SELECT id FROM category WHERE id = ?";
        $stmt_category = $con->prepare($category_sql);
        $stmt_category->bind_param("i", $category);
        $stmt_category->execute();
        $stmt_category->store_result();

        ############################################################################
        #PDO i cannot control it 
        ############################################################################
        // $category_sql = $conn->prepare("SELECT id FROM category WHERE id =:category_id");
        // $category_sql->bindParam(':category_id',$category);
        // $category_sql->execute();

        // if($row > 0){
        //     #insert into product
        //     $product_sql = $conn->prepare("INSERT INTO products (`product_name`,`price`,`category_id`,`description`,`brand`,`type_feature`) VALUES (:product_name,:price,:category_id,`:description`,:brand,:type_feature)");
        //     $product_sql->bindParam(':product_name',$product_name);
        //     $product_sql->bindParam(':price',$price);
        //     $product_sql->bindParam(':category_id',$category);
        //     $product_sql->bindParam(':description',$description);
        //     $product_sql->bindParam(':brand',$brand);
        //     $product_sql->bindParam(':type_feature',$type_feature);

        //     if($product_sql->execute()){
        //         #insert into stock
        //         $product_id = $conn->LastInsertId();
                
        //         $stock_sql = "INSERT INTO stock (`product_id`,`quantity`) VALUES (:product_id,:quantity)";
        //         $stock_sql->bindParam(':product_id',$product_id,PDO::PARAM_INT);
        //         // $stock_sql->bindParam(':quantity',$quantity);



        //     }




        // }
            $image_id = 0;
            $stock_id = 0;
        if($stmt_category->num_rows > 0){
            #insert into product
            $product_sql = "INSERT INTO products (product_name,type_feature,price,brand,image_id,category_id,description,stock_id) VALUES (?,?,?,?,?,?,?,?)";
            $stm_product = $con->prepare($product_sql);
            $stm_product->bind_param("ssdsiisi",$product_name,$type_feature,$price,$brand,$image_id,$category,$description,$stock_id);

            if($stm_product->execute()){
                $product_id = $con->insert_id;

                #insert into stock

                $stock_sql = "INSERT INTO `stock` (`product_id`,`quantity`) VALUES (?,?)";
                $stm_stock = $con->prepare($stock_sql);
                $stm_stock->bind_param("ii",$product_id,$stock_qty);

                if($stm_stock->execute()){
                    $stock_id = $con->insert_id;

                    #Update in table stock

                    $sql_edit_stock = "UPDATE products SET `stock_id` = ? WHERE `id` = ?";
                    $stm_edit_stock = $con->prepare($sql_edit_stock);
                    $stm_edit_stock->bind_param("ii",$stock_id,$product_id);

                    if($stm_edit_stock->execute()){
                        #insert into image table
                        $image_sql = "INSERT INTO image (`product_id`,`product_image`,`image_2`,`image_3`) VALUES (?,?,?,?)";
                        $stm_image = $con->prepare($image_sql);
                        $stm_image->bind_param("isss",$product_id,$name_image_1,$name_image_2,$name_image_3);
                        if($stm_image->execute()){

                            $image_id = $con->insert_id;

                            $sql_edit_image = "UPDATE products SET `image_id` = ? WHERE `id` = ?";
                            $stm_edit_image = $con->prepare($sql_edit_image);
                            $stm_edit_image->bind_param("ii",$image_id,$product_id);

                            if($stm_edit_image->execute()){
                                header("location: myProduct.php");
                                exit;
                            }else{
                                echo "Failed to update with image_id";
                            }
                        }else{
                            echo "Failed insert to image table";
                        }
                        $stm_image->close();


                    }else{
                        echo "Failed to update stock_id";
                    }$stm_edit_stock->close();

                }else{
                    echo "Failed to insert into stock";
                }
                $stm_stock->close();
            }else{
                echo "Fail to insert to product table";
            }
            $stm_product->close();

        }else{
            echo "<script>alert('The category does not exist.')</script>";
        }
        $stmt_category->close();

    }

        



    
    

?>
<div class="main">
        <div class="header-wraper">
            <div class="search_box">
                <i class='bx bx-search-alt-2' ></i>
                <input type="text" placeholder="Search">
            </div>
            <div class="profile">
                <span class="name">Admin</span>
                <img src="../lOGO/Phnom_Penh_Crown_FC_Logo.png" alt="">
            </div>
        </div>

        <div class="card-info">
            <h1>Add new product</h1>
        </div>

        <div class="container mt-5 " style="width:40%;">
        <form action="" method="post" role="form" enctype="multipart/form-data">

            <div class="mb-3">
                <input type="text" class="form-control" style="border-radius:0;border-color:#000;" name="product_name" placeholder="Product Name" require>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control"  style="border-radius:0;border-color:#000;" name="price" placeholder="$Price"  require>
            </div>

            <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-select form-select-lg"
                        name="category"
                        id=""
                        style="border-radius:0;border-color:#000;"
                    >
                        <option value="1">clothes</option>
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
                        <option value="Prey Veng FC">Prey Veng FC</option>
                        <option value="Angkor Tiger">Angkor Tiger</option>
                        <option value="Kirivong Sok Senchey">Kirivong Sok Senchey</option>
                        <option value="Tiffy Army FC">Tiffy Army FC</option>
                        <option value="Nike">Nike</option>
                        <option value="Adidas">Addidas</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Puma">Puma</option>
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
                <input class="btn btn-primary form-control"  style="border-radius:0; background-color:#DADADA;border:none;color:#000;font-family: TeXGyreAdventor-r" type="submit" name="submit" value="Upload">
            </div>

        </form>
    </div>
    </div>