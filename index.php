<?php 
    include("conexao.php");

    $sql_query = $mysqli->query("SELECT * FROM projetos") or die($mysqli->error);
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
                    <a href="registros.php">
                        <i class="bi bi-clipboard"></i>
                            REGISTRAR
                        <i class="bi bi-clipboard"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!--F| CABEÇALHO |F-->
        <div id="boxCentro">
            <table class="table table-striped bordas">
                <thead>
                    <th>PROJETO</th>
                    <th>LINK</th>
                    <th>DATA DE ENVIO</th>
                </thead>
                <tbody>
                    <!--I| MOSTRANDO ARQUIVOS DO BANCO DE DADOS |I -->
                    <?php
                        while($arquivo = $sql_query->fetch_assoc()){
                    ?>
                    <tr>
                    <td><?php echo $arquivo['nome']; ?></td>
                    <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['path']; ?></a></td>
                    <td><?php echo date("d/m/y h:i", strtotime($arquivo['data_upload']));?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    <!--F| MOSTRANDO ARQUIVOS DO BANCO DE DADOS |F -->
                </tbody>
            </table>
        </div>
</body>
</html>