<?php
	
	$ip = $_POST['ip'];
	$mascara = $_POST['mascara'];

	function calcularIp($ip,$mascara){
        $mascara-= 24;
        $ipsSubrede = 0;
        $auxiliarPotencial=7;
        $decimalMascara = 0;
        for ($i=$mascara; $i>0 ; $i--) { 
        	$decimalMascara += pow(2, $auxiliarPotencial);
        	$auxiliarPotencial--;
        }
        for ($j=0;$j<$mascara ;$j++){
            $ipsSubrede = $ipsSubrede + pow(2,$j);
        }
        $ipsSubrede++;
        $qtdSubredes = $ipsSubrede;
        $subredes = 256/$qtdSubredes;
        $ips=[];
        $rede = 0;
        $octetos = explode(".", $ip);
    	if ((int)$octetos[0]<128) {
    		$classe = "A";
    	}elseif (128>=(int)$octetos[0] and (int)$octetos[0]<=191) {
    		$classe = "B";
    	}elseif (192>=(int)$octetos[0] and (int)$octetos[0]<=223) {
    		$classe = "C";
    	}elseif (224>=(int)$octetos[0] and (int)$octetos[0]<=239) {
    		$classe = "D";
    	}elseif (240>=(int)$octetos[0] and (int)$octetos[0]<=255) {
    		$classe = "E";
    	}
    	if ((int)$octetos[0]==10) {
    		$tipo = "privado";
    	}elseif ((int)$octetos[0]== 172 and 16>=(int)$octetos[1] and (int)$octetos[1]<=31) {
    		$tipo = "privado";
    	}elseif ((int)$octetos[0]==192 and (int)$octetos[1]==168) {
    		$tipo = "privado";
    	}else{
    		$tipo = "publico";
    	}
        $ips["mascara decimal"]="225.255.255.".$decimalMascara;
    	$ips["classe"]=$classe;
    	$ips["tipo do ip"]=$tipo;
    	$ips["hosts"]=$subredes-2;
        for ($i=0; $i <$qtdSubredes ; $i++) { 
        	$broadcast = (($i+1)*$subredes)-1;	
        	$ips[] = ['ip de rede'.$i => $rede,
        			  'ip de broadcast'.$i => $broadcast,
           			  'primeiro host' => $rede+1,
        			  'ultimo host' => $broadcast-1];
        	$rede+=$subredes;
        }
        return $ips;
	}
	//echo "<pre>";
	$ips = calcularIp($ip,$mascara);
	//echo "</pre>";
	$mascaraDecimal = $ips['mascara decimal'];
	$classe = $ips["classe"];
	$tipo = $ips['tipo do ip'];
	$hosts = $ips['hosts'];
	$cont = 1;
	echo "mascara decimal: ".$mascaraDecimal;
	echo "<br>";
	echo "classe: ".$classe;
	echo "<br>";
	echo "tipo do ip: ".$tipo;
	echo "<br>";
	echo "hosts de cada subrede: ".$hosts;
	echo "<br>";
	echo "<br>";
	for ($i=0; $i <sizeof($ips)-4 ; $i++) { 
		echo "rede".$cont;
		echo "<br>";
		echo "<br>";
		foreach ($ips[$i] as $key => $value) {
			echo $key." - ".$value."<br>";
		}
		echo "<br>";
		$cont++;
	}