<?php include("db.php")?>
<?php include("src/header.php")?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION["message"]?>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
          <span aria-hiden="true">&times;</span>
        </button>
        </div>
      <?php session_unset(); 
      }?>
      <div class="card card-body">
        <form action="agre.php" method=POST>
          <div class="form-ground">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <div class="form-ground ">
            <input type="text" name="categoria" class="form-control" placeholder="Categortia" style="margin-top: 10px;">
          </div>
          <div class="form-ground">
            <textarea name="descripcion" class="form-control" placeholder="descripcion" style="margin-top: 10px;"></textarea> 
          </div>
          <div class="form-ground">
            <input type="text" name="precio" class="form-control" placeholder="Precio" style="margin-top: 10px;">
          </div>
          <input type="submit" name="guardar" class="btn btn-success " value="Guardar" style="margin-top :12px;">
        </form>
      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM products";
          $resultpro = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($resultpro)) { ?>
            <tr>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['categoria']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['precio']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="del.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
</div>

<?php include("src/footer.php")?>

    
  
    
    