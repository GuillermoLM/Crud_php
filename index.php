<html>

<head>
    <title>PHP_CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <?php require_once 'process.php'; ?>

    <?php
        $mysqli = new mysqli('localhost','root', '','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
    <?php
        while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td></td>
            </tr>
    <?php endwhile; ?>
        </table>
    </div>

    <?php
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>

    <div class="row justify-content-center">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="process.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="Enter your name">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="Enter your location">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    <div>
</body>