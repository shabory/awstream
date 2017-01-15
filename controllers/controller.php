<?php
require_once '../helpers/config.php';
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO('mysql:host='.$config['host'].';
                                   dbname='.$config['db_name'],
                                   $config['user'],$config['pass'],
                                   $pdo_options);





if(isset($_GET['action']))
{
switch ($_GET['action']) {

	case 'getallCats':
	echo pdo_query($db,'SELECT id,name,parent_id FROM categories');
    break;

    case 'getallproducts':
	echo pdo_query($db," SELECT products.id,products.name,products.image_path,products.category_id,categories.name as 'cat_name'
		            FROM products,categories where products.category_id=categories.id ");
    break;

    case 'deleteProduct':
    if(isset($_GET['productId']))
    {
    	$del_id=$_GET['productId'];
    	pdo_query_noreturn($db,"delete FROM products where id='$del_id'");

    }	
	 
    break;
	
	default:
		# code...
		break;
}

}

if(isset($_POST["product_name"]))
{
	$product_name = $_POST["product_name"];
	$category_id  = $_POST["category_id"];
	pdo_query($db,"insert into products (name,category_id) VALUES('".$product_name."','".$category_id."')");
	
}



function pdo_query($connection,$query)
{
  	$req = $connection->query($query);
	$req->execute();
	$rows =$req->fetchAll(PDO::FETCH_ASSOC);
    return $json_response = json_encode($rows);	
}

function pdo_query_noreturn($connection,$query)
{
  	$req = $connection->query($query);
	$req->execute();
	
}

?>