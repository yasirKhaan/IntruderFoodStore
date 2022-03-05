<?php
include("examdatabase.php");
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE product_code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["product_code"]=>array('product_name'=>$productByCode[0]["product_name"], 'product_code'=>$productByCode[0]["product_code"], 'quantity'=>$_POST["quantity"], 'product_price'=>$productByCode[0]["product_price"], 'product_image'=>$productByCode[0]["product_image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["product_code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["product_code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<style>
body{
    background-color: #1E90FF;
}
    #MenuItems{
        list-style-type: none;
    }
    .header{
    background-color: #191970;
        margin-top: -10px;
        height: 70px;
        margin-right: -10px;
        margin-left: -8px;
    }
    .navbar{
        display: flex;
        align-items: center;
    }
    nav {
    flex: 1; /*flex property sets the flexible length on flexible items*/
    text-align: right;
    }
    nav ul{
    display: inline-block;
    list-style-type: none;
    }
    nav ul li {
        display: inline-block;
        margin-right: 20px;
    }
    .navfont{
        color: white;
        font-family: Century Gothic;
    }
    .container {
    width:100%;
    margin:0 auto;
    position:relative;
    }
    .footer-col-2,{
    min-width: 250px;
    margin-bottom: 20px;
    }
    .footer-col-2 img{
    width: 180px;
    margin-bottom: 20px;
    margin-left: 650px;
    }
    .footer{
    background-color: #191970;
    color: #8a8a8a;
    font-size: 14px;
    padding: 60px 0 20px;
    margin-left: -9px;
    margin-right: -9px;
    margin-bottom: -9px;
    }
    .footer p{
        color: #8a8a8a;
        margin-left: 90px;
        text-align: center;
    }
    .footer hr{
    border: none;
    background: #b5b5b5;
    height: 1px;
    margin: 20px 0;
}
    .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;
}
.burgerprod{
    flex-basis: 25%;
    padding:10px;
    min-width: 200px;
    margin-bottom: 50px;
    transition: transform 0.5s;
}
</style>
</HEAD>
<BODY>
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
            <a href="home.html" style="margin-left: 5px;"><img src="LOGO IC.png" width="130px"></a>
                </div>
                <nav>
    				<ul id="MenuItems">
    					<li><a href="home.html"><font color="white">HOME</font></a></li>
    					<li><a href="index.php"><font color="white">FAST FOOD/CART</font></a></li>
    					<li><a href="about.html"><font color="white">ABOUT US</font></a></li>
    					<li><a href="contact.html"><font color="white">CONTACT US</font></a></li>
    				</ul>
                </nav>
            </div>
        </div>
    </div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["product_price"];
		?>
				<tr>
				<td><img src="adminpicture/<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
				<td><?php echo $item["product_code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["product_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["product_code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["product_price"]*$item["quantity"]);

		}



?>


<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td><a href="foodorder.php"><font color="black">PROCEED</font></a></td>
</tr>
</tbody>
</table>

  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY product_id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["product_code"]; ?>">
			<div class="product-image"><img src="adminpicture/<?php echo $product_array[$key]["product_image"]; ?>" width="250"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["product_name"]; ?></div>
			<div class="product-title"><?php echo $product_array[$key]["product_detail"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["product_price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

</BODY>
</HTML>