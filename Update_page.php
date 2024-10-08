<?php
// Include the database connection
include('dbconn.php');

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the existing student data
    $query = "SELECT * FROM students WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $age = $row['age'];
        } else {
            die("No record found with the provided ID.");
        }

      }
    }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = intval($_POST['id']);
    $firstName = mysqli_real_escape_string($connection, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($connection, $_POST['last_name']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);

    // Update query
    $query = "UPDATE students SET first_name = ?, last_name = ?, age = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssi', $firstName, $lastName, $age, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect to the index page with a success message
            header('Location: index.php?update_msg=Student information updated successfully.');
            exit();
        } else {
            die("Failed to update student information: " . mysqli_error($connection));
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Database update query failed: " . mysqli_error($connection));
    }
}
?>

       

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update Page</title>
</head>
<body>
    <h1 id="main_title">CRUD APPLICATION IN PHP</h1>

    <div class="container">
        <h2>Update Student Information</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo isset($id) ? htmlspecialchars($id) : ''; ?>">
            
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo isset($firstName) ? htmlspecialchars($firstName) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo isset($lastName) ? htmlspecialchars($lastName) : ''; ?>" required>
            </div>

            <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
<input type="text" class="form-control" name="age" id="age" value="<?php echo isset($age) ? htmlspecialchars($age) : ''; ?>" required>

            
            </div>

            <input type="submit" class="btn btn-success" name="update_students" value="Update">
        </form>
    </div>
</body>
</html>












