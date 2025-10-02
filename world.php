<?php

$country = $_GET['country'] ?? '';
$lookup = $_GET['lookup'] ?? '';

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

?>

<?php if ($lookup === ''): ?>
  <?php $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'"); ?>
  <?php $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

  <table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>
  <?php foreach ($results as $row): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['continent']); ?></td>
      <td><?php echo htmlspecialchars($row['independence_year']); ?></td>
      <td><?php echo htmlspecialchars($row['head_of_state']); ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php elseif ($lookup === 'cities'): ?>
  <?php $stmt = $conn->query("SELECT * FROM cities WHERE country_code IN (SELECT code FROM countries WHERE name = '$country')"); ?>
  <?php $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
  <table class="table table-striped">
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['district']); ?></td>
        <td><?php echo htmlspecialchars($row['population']); ?></td>
      </tr>
    <?php endforeach; ?>
<?php endif; ?>
