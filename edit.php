<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


   $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`telefone`='$telefone' WHERE id=$id";

   $result = mysqli_query($conn, $sql);

   if($result) {
    header("Location: index.php?msg=Novo usuário atualizado com sucesso");
   }
   else{
    echo "Falha ao criar o usuário:" . mysqli_error($conn);
   }
}


?>




<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Saperx</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   <nav class ="navbar navbar-ligth justify-content-center fs-3 mb-5 " style="background-color: #00ff5573;">
               Cadastro de Usuários

   </nav>
   <div class="container">
    <div class="text-center mb-4">
        <h3>Editar informações de usuário</h3>
        <p class="text-muted">Clique para alterar alguma informação</p>
    </div>

    <?php 
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container justify-content-center d-flex">
        <form action="" method="post" style="width:50vw; min-width:300px;">

            <div class="row mb-3">
            <div class="col">
                <label class="form-label">Primeiro nome:</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo $row ['first_name']?>">
            </div>

            <div class="col">
                <label class="form-label">Segundo nome:</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo $row ['last_name']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row ['email']?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="<?php echo $row ['telefone']?>">
            </div>
            <div>
                <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>