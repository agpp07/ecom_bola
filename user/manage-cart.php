<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST["add_to_cart"]))
    {
        if (isset($_SESSION["cart"]))
        {
            $myitems=array_column($_SESSION['cart'],'produtc_name');
            if(in_array($_POST['product_name'],$myitems))
            {
                echo "<script>
                alert('Produk Sudah ditambahkan');
                window.location.href='products.php';
                </script>";
            }
            else
            {
                $count=count($_SESSION["cart"]);
                $_SESSION["cart"][$count]=array('product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'Quantity'=>1);
                echo "<script>
                alert('Produk ditambahkan');
                window.location.href='products.php';
                </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('product_name'=>$_POST['product_name'],'product_price'=>$_POST['product_price'],'Quantity'=>1);
            echo "<script>
                alert('Produk ditambahkan');
                window.location.href='products.php';
                </script>";
        }
    }
    
    if(isset($_POST["remove_product"]))
    {
        foreach($_SESSION["cart"] as $key => $value)
        {
            if($value["product_name"]==$_POST["product_name"])
            {
                unset($_SESSION["cart"][$key]);
                $_SESSION["cart"]=array_values($_SESSION['cart']);
                echo "<script>
                alert('Produk Dihapus');
                window.location.href='cart.php';
                </script>";
            }
        }
    }
    
}

?>