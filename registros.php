<?PHP 
    include("conexao.php");

    if(isset($_FILES['arquivo'])){
        /*I| PEGANDO OS DADOS |I*/
        $nomeDoProjeto = $_POST['nomeDoProjeto'];
        $arquivo = $_FILES['arquivo'];
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensaoDoArquivo = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        /*F| PEGANDO OS DADOS |F*/

        /*I| TRABALHANDO OS DADOS |I*/
        $arquivosPermitidos = "pdf";
        $pastaParaSalvarArquivos = "projetos/";
        $path = $pastaParaSalvarArquivos . $novoNomeDoArquivo . "." . $extensaoDoArquivo;
        if($extensaoDoArquivo == $arquivosPermitidos){
            $enviarProjeto = move_uploaded_file($arquivo['tmp_name'],$pastaParaSalvarArquivos.$novoNomeDoArquivo.".".$extensaoDoArquivo);
            if($enviarProjeto){
                $mysqli->query("INSERT INTO projetos(id,nome,path) VALUES('$nomeDoArquivo','$nomeDoProjeto','$path')") or die($mysqli->error);
            }else {
                echo "Not uploaded because of error #".$_FILES["arquivo"]["error"];
            }
        }else{
            echo "<p>tipo ou tamanho de arquivo não suportado</p>";
        }
        /*F| TRABALHANDO OS DADOS |F*/
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./ids-classes_css/classes.css">
    <link rel="stylesheet" href="./ids-classes_css/ids.css">
    <!-- I| CSS BOOTSTRAP |I -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- F| CSS BOOTSTRAP |F -->
    <!-- I| JS BOOTSTRAP |I -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- F| JS BOOTSTRAP |F -->
    <!-- I| ICONS BOOTSTRAP |I -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- F| ICONS BOOTSTRAP |F -->
    <title>RKN</title>
</head>
<body>
    
    <!--I| CABEÇALHO |I-->
    <header class="row ">
        <div class="col-12" id="boxTop">
            <div class="row">
                <div class="col-2">
                    <img src="./imgs/logo.png" alt="logo Canto Da Tela" id="logoTop">
                </div>
                <div class="col-7"></div>
                <div class="col-2 centralizarConteudo" id="paginacao">
                    <a href="index.php">
                        <i class="bi bi-clipboard"></i>
                            PROJETOS
                        <i class="bi bi-clipboard"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!--F| CABEÇALHO |F-->

    <div id="boxCentro" class="row">
        <div class="col-2"></div>
            <div class="col-8 centralizarConteudo bordas" id="formulario">
                <br>
                <form  method="post" enctype="multipart/form-data">
                    <img src="./imgs/logo.png" alt="logo_centro" id="logo_centro"><br><br>
                    <i class="bi bi-pen"></i>
                    <!--I| NOME DO PROJETO |I -->
                    <input type="text" class="bordas-componentes" name="nomeDoProjeto" maxlength="30" placeholder="NOME DO PROJETO"  autocomplete="off"><br><br>
                    <!--F| NOME DO PROJETO |F -->
                       
                    <!--I| SELEÇÃO E ENVIO DO PROJETO |I-->
                    <input type="file" name="arquivo"><br><br>
                    <input type="submit" class="bordas-componentes" name="enviar" value="enviar"><br><br>
                    <!--I| SELEÇÃO E ENVIO DO PROJETO |I-->
                </form>
            </div>
        <div class="col-2"></div>
        
        <!--F| FORMULÁRIO DE ENVIO DE ARQUIVOS |F-->
    </div>
    
</body>
</html>