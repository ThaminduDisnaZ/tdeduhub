<?php
require "../connection.php";

$cid = $_POST["cid"];

$crs = Database::search(" SELECT * FROM `category` WHERE `category_id` = '".$cid."' ");
$cdata = $crs->fetch_assoc();

?>

<h1 class="text-2xl">Edit Category (ID -> <?php echo $cdata["category_id"]?>)</h1>



<input type="text" placeholder="Category Name" value="<?php echo $cdata["category"]?>" id="cnameu" class="form-input mb-3" required />

<textarea rows="3" class="form-textarea"  id="cdesu" placeholder="Enter Category Description"
    required><?php echo $cdata["description"]?></textarea>
    <div class="grid grid-cols-1 gap-2 mb-1 lg:grid-cols-4 mt-1">
<button onclick="updateCat(<?php echo $cid?>);" class="btn btn-success mb-8">Update</button>
<button onclick="CancelEditCat();" class="btn btn-warning mb-8">Cancel</button>
    </div>