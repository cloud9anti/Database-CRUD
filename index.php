<?php
require 'db.php';

$sql = 'SELECT * FROM people';

$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All clients-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All employees and clients</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Email</th>
		  <th>Employer</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>

          <tr>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
			<td><?= $person->employer; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<!--Alexander's clients-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Alexander's clients</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): if ($person->employer=="Alexander") { ?>
          <tr>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php } endforeach; ?>
      </table>
    </div>
  </div>
</div>


<!--Competitor's clients-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Competitor's clients</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): if ($person->employer=="Competitor") { ?>
          <tr>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php } endforeach; ?>
      </table>
    </div>
  </div>
</div>
