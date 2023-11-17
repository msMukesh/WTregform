<?php
// Replace these variables with your actual database information
$host = "localhost";
$username = "root";
$password = "semEIGHT*8";
$database = "regdabase";

// Create a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Initialize variables outside the conditional block
$imagePath = "";
$resumePath = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST["name"]);
    $fatherName = $conn->real_escape_string($_POST["fname"]);
    $motherName = $conn->real_escape_string($_POST["mname"]);
    $phoneNumber = $conn->real_escape_string($_POST["phonenum"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $dob = $conn->real_escape_string($_POST["dob"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $course = $conn->real_escape_string($_POST["course"]);

    if (isset($_FILES["image"]) && isset($_FILES["resume"])) {
        // Your code to handle file uploads here
        
    // Handle file uploads (image and resume)
    $imagePath = "uploads/" . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

    $resumePath = "uploads/" . basename($_FILES["resume"]["name"]);
    move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);
    }

    // Insert data into the database
    $sql = "INSERT INTO registration_details (name, father_name, mother_name, phone_number, email, dob, gender, course, image_path, resume_path)
            VALUES ('$name', '$fatherName', '$motherName', '$phoneNumber', '$email', '$dob', '$gender', '$course', '$imagePath', '$resumePath')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
