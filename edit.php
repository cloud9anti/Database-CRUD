<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['employer']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $employer = $_POST['employer'];
  $sql = 'UPDATE people SET name=:name, email=:email, employer=:employer WHERE id=:id';
  $statement = $connection->prepare($sql);




  if ($statement->execute([':name' => $name, ':email' => $email, ':employer' => $employer, ':id' => $id])) {

    header("Location: /");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="employer">employer</label>
           <select value="<?= $person->employer; ?>" type="employer" name="employer" id="employer" class="form-control">
			<option value = "Alexander">Alexander</option>
			<option value = "Competitor">Competitor</option>
			<option value = "Other">Other</option>
		  </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
