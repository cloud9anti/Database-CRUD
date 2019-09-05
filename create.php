<?php
require 'db.php';

$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['employer'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $employer = $_POST['employer'];
  $sql = 'INSERT INTO people(name, email, employer) VALUES(:name, :email, :employer)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':employer' => $employer])) {
    $message = 'data inserted successfully';
  }
}
 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a client</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
		<div class="form-group">
          <label for="employer">Employer</label>
          <select type="employer" name="employer" id="employer" class="form-control">
			<option value = "Alexander">Alexander</option>
			<option value = "Competitor">Competitor</option>
			<option value = "Other">Other</option>
		  </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a client</button>
        </div>
      </form>
    </div>
  </div>
</div>