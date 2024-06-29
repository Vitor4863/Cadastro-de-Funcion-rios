
<?php

class veiculo {
 
    public $cor;
    public $modelo;

}

class carro extends veiculo{
    function dirigir(){
        echo "Estou dirigindo  meu veiculo $this->cor com o $this->modelo";
    } 

}

class moto extends veiculo{
function pilotar(){
    echo "estou pilotando minha moto";
}

}


?>