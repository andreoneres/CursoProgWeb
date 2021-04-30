<?php
$host  = $_SERVER['HTTP_HOST'];
$raiz = $_SERVER['DOCUMENT_ROOT'];

require_once "$raiz/config/config.php";

date_default_timezone_set('America/Bahia');

$nome = $_POST['nome'];
$email = $_POST['email'];
$codpostal = $_POST['codpostal'];
$idade= $_POST['idade'];
$telefone = $_POST['telefone'];

//Array de Erros
$erros = array();

//Validações e sanitizes
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "<li>E-mail inválido</li>.";
}
$codpostal = filter_input(INPUT_POST, 'codpostal', FILTER_SANITIZE_NUMBER_INT);
if (!$codpostal = filter_var($codpostal, FILTER_VALIDATE_INT)) {
    $erros[] = "<li>Código postal inválido.</li>";
}

$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
if (!$idade = filter_var($idade, FILTER_VALIDATE_INT)) {
    $erros[] = "<li>Idade inválida.</li>";
}

$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
if (!$telefone = filter_var($telefone, FILTER_VALIDATE_INT)) {
    $erros[] = "<li>Telefone inválido.</li>";
}

if (!empty($_FILES['arquivo']['name'])) {
    $formatosP = array("png","jpeg","jpg","gif");    
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosP)) {
        $pasta = $raiz.'/assets/arquivos/';
        $pastatmp = $_FILES['arquivo']['tmp_name'];
        $novonome = uniqid().".$extensao";

       if(!move_uploaded_file($pastatmp, $pasta.$novonome)) {
           $erros[] = "<li>Upload não concluído</li>";
       }

    } else {
        $erros[] = "<li>Formato inválido</li>";
    }
} else {
    $novonome = "0";
}

if (empty($erros)) {
$data = date('Y-m-d H:i:s');
$sql = "INSERT pessoas (nome, email, codpostal, idade, telefone, imagem, datatime) VALUES ('$nome', '$email', '$codpostal', '$idade', '$telefone', '$novonome', '$data')";

if(mysqli_query($connect, $sql)) {
    header("Location: http://$host/index.php?sucesso");
} else {
    die(mysqli_error($connect));
    header("Location: http://$host/form.php?errodb");
}

} else {  //Exibindo erros
    foreach ($erros as $erro) {
        header("Location: http://$host/form.php?erro");
    }
}




/*
$times = array(
    "cariocas"=>array("campeao"=>"flamengo", "vice"=>"vasco", "terceiro"=>"botafogo"),
    "paulistas"=>array("campeao"=>"palmeiras", "vice"=>"santos", "terceiro"=>"sao paulo"),
    "baianos"=>array("campeao"=>"bahia", "vice"=>"vitoria", "terceiro"=>"itabuna"),
);

foreach($times['cariocas'] as $indice => $valor) {
    echo $indice.':'.$valor.'<br>';
}
echo '<hr>';

foreach($times['paulistas'] as $indice => $valor) {
    echo $indice.':'.$valor.'<br>';
}

echo '<hr>';

foreach($times['baianos'] as $indice => $valor) {
    echo $indice.':'.$valor.'<br>';
}

echo '<hr>';

echo count($times);

$frutas = array("a"=>"Morango", "b"=>"Uva", "c"=>"Pera");
$cores = array("a"=>"Vermelho", "b"=>"Azul", "c"=>"Amarelo");
print_r($frutas + $cores);

echo '<hr>';

$i = 1;
for ($i=0; $i <= 10; $i++) { 
    echo "5 x $i = ".($i*5)."<br>";
}

*/

?>