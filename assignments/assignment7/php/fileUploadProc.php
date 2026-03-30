<?php
require_once __DIR__ . '/../../config.php';
// Database connection
$host = "localhost";
$dbname = "files";
$username = "rfrakes";
$password = "$password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Default output
$output = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get user-entered file name
    $userFileName = trim($_POST["file_name"] ?? "");

    // Check if file exists
    if (!isset($_FILES["pdf_file"]) || $_FILES["pdf_file"]["error"] !== 0) {
        $output = "Error: No file uploaded or upload error.";
        return;
    }

    $file = $_FILES["pdf_file"];

    // Validate file size (under 100000 bytes)
    if ($file["size"] > 100000) {
        $output = "Error: File size must be under 100000 bytes.";
        return;
    }

    // Validate MIME type (PDF only)
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file["tmp_name"]);
    finfo_close($finfo);

    if ($mimeType !== "application/pdf") {
        $output = "Error: Only PDF files are allowed.";
        return;
    }

    // Set upload directory
    $uploadDir = "../files/";

    // Ensure unique file name to avoid overwrite
    $newFileName = uniqid() . "_" . basename($file["name"]);
    $filePath = $uploadDir . $newFileName;

    // Move uploaded file
    if (!move_uploaded_file($file["tmp_name"], $filePath)) {
        $output = "Error: Failed to move uploaded file.";
        return;
    }

    // Store relative path (important for links later)
    $dbFilePath = "files/" . $newFileName;

    // Insert into database
    try {
        $stmt = $pdo->prepare("INSERT INTO files (file_name, file_path) VALUES (:name, :path)");
        $stmt->execute([
            ":name" => $userFileName,
            ":path" => $dbFilePath
        ]);

        $output = "Success! File uploaded and saved.";
    } catch (PDOException $e) {
        $output = "Database error: " . $e->getMessage();
    }
}
?>