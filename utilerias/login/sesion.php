<?PHP
$hostname="localhost:3306";
$database="id2716259_bd_cubikate";
$username="id2716259_root";
$password="Admin123!";
$json=array();
	if(isset($_GET["user"]) && isset($_GET["pwd"])){
		$user=$_GET['user'];
		$pwd=$_GET['pwd'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="SELECT user, pwd, names FROM usuarios WHERE user= '{$user}' AND pwd = '{$pwd}'";
		$resultado=mysqli_query($conexion,$consulta);

		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}

		else{
			$results["user"]='';
			$results["pwd"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{
		   	$results["user"]='';
			$results["pwd"]='';
			$results["names"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>