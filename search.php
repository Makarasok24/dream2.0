<?php
global $con;
include("connection.php");
?>
<?php
if(isset($_POST['search_text'])) {
    $search = $_POST['search_text'];

    $query = "SELECT * FROM products WHERE product_name LIKE ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $searchPattern);
        $searchPattern = '%' . $search . '%';
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row["id"];
                    echo "<div class='display_t'><a class='seach_text' style='color: #020202; text-decoration: none;' href='product_detail.php?id=" . $product_id . "'>" . $row['product_name'] . "</a></div>";
                }
            } else {
                echo " Search not found.";
            }
        }
        mysqli_stmt_close($stmt);
    }
} else {
    echo "No text provided.";
}
?>

<style>
    .seach_text {
        text-decoration: none;
    }

    .seach_text:hover {
        background-color: white;
    }

    .display_t {
        margin-bottom: 8px;
        padding: 3px;
        transform: scale(0.95);
        transition: box-shadow 0.5s, transform 0.5s;
    }

    .display_t:hover {
        transform: scale(1);
    }
</style>
