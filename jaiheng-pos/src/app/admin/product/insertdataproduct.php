<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<?php
require('../connect.php');

$products_name	  = $_REQUEST['products_name'];
<<<<<<< HEAD
$qty	  		  = $_REQUEST['qty'];
=======
>>>>>>> cabc4cbd362a965eee14c96865a31d9e84f81a82
$type  		  	  = $_REQUEST['type'];
$retail_price	  = $_REQUEST['retail_price'];
$whoesale_price	  = $_REQUEST['whoesale_price'];
$barcode	 	  = $_REQUEST['barcode'];
$comments	 	  = $_REQUEST['comments'];
<<<<<<< HEAD
$file	 	  	  = $_REQUEST['file'];

	$sql = "
	INSERT INTO products
	VALUES ('', 
			'$products_name',
			'$qty',
			'$type',
			'$retail_price',
			'$whoesale_price',
			'$barcode',
			'$comments',
			'$file');
	";

	$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	header( "location: ../admin.php" );
    exit(0);
} else {
	echo "Error : Input";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";

=======




// if ($objQuery) {
// 	header( "location: ../admin.php" );
//     exit(0);
// } else {
// 	echo "Error : Input";
// }

// mysqli_close($conn); // ปิดฐานข้อมูล
// echo "<br><br>";
// echo "--- END ---";
if(isset($_POST["submit"]) && !$_FILES['file']['error']) {
	$file = $_FILES['file']['tmp_name']; 
	$sourceProperties = getimagesize($file);
	$fileNewName = time();
	$folderPath = "uploads/";
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	$imageType = $sourceProperties[2];
	
	switch ($imageType) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
				$savefile = $fileNewName. "_thump.". $ext;
				$sql = "
				INSERT INTO products
				VALUES ('', 
						'$products_name',
						'$type',
						'$retail_price',
						'$whoesale_price',
						'$barcode',
						'$comments',
						'$savefile');
				";
			
				$objQuery = mysqli_query($conn, $sql);
			break;
			
			case IMAGETYPE_GIF:
				$imageResourceId = imagecreatefromgif($file); 
				$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
				imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
				$savefile = $fileNewName. "_thump.". $ext;
				$sql = "
				INSERT INTO products
				VALUES ('', 
						'$products_name',
						'$type',
						'$retail_price',
						'$whoesale_price',
						'$barcode',
						'$comments',
						'$savefile');
				";
			
				$objQuery = mysqli_query($conn, $sql);
				break;
				
			case IMAGETYPE_JPEG:
				$imageResourceId = imagecreatefromjpeg($file); 
				$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
				imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
				$savefile = $fileNewName. "_thump.". $ext;
				$sql = "
				INSERT INTO products
				VALUES ('', 
						'$products_name',
						'$type',
						'$retail_price',
						'$whoesale_price',
						'$barcode',
						'$comments',
						'$savefile');
				";
			
				$objQuery = mysqli_query($conn, $sql);
			break;

            default:
                echo "Invalid Image type.";
                exit;
                break;
			}
			header("location: ../admin.php");
		} else {
			header("location: ../admin.php");
		}
		
		function imageResize($imageResourceId,$width,$height) {
			$targetWidth = $width < 1280 ? $width : 1280 ;
			$targetHeight = ($height/$width)* $targetWidth;
			$targetLayer = imagecreatetruecolor($targetWidth,$targetHeight);
			imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
			return $targetLayer;
		}

		
		/** show details */
		function size_as_kb($size = 0) {
			if($size < 1048576) {
				$size_kb = round($size / 1024, 2);
				return "{$size_kb} KB";
			} else {
				$size_mb = round($size / 1048576, 2);
				return "{$size_mb} MB";
			}
		}
		
		function imgSize($img) {
			$targetWidth = $img[0] < 1280 ? $img[0] : 1280 ;
			$targetHeight = ($img[1] / $img[0])* $targetWidth;
			return [round($targetWidth, 2), round($targetHeight, 2)];
    }
>>>>>>> cabc4cbd362a965eee14c96865a31d9e84f81a82
?>