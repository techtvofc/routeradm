<?php

require('config/routeros_api.class.php');

$ip = $_POST['ip'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$API = new routeros_api();


if ($API->connect($ip, $usuario, $senha)) {

   $ARRAY = $API->comm("/system/resource/print");
   $ram =  $ARRAY['0']['free-memory']/1048576;
   $hdd =  $ARRAY['0']['free-hdd-space']/1048576;
}

?>
<form action="index.php" method="POST">
	<input type="text" name="ip" placeholder="ip"><br>
	<input type="text" name="usuario" placeholder="usuario"><br>
	<input type="password" name="senha" placeholder="senha"><br>
	<button>ENVIAR</button>
</form>
<?php

echo "MEMÓRIA RAM: ".round($ram,1)."MB <br>";
echo "MEMÓRIA: ".round($hdd,1)."MB <br>";

?>
