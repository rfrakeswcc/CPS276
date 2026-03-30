<?php
// Database connection
$host = "localhost";
$dbname = "files";
$username = "rfrakes";
$password = "xxxxx";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$output = "<h2>Uploaded Files</h2>";

try {
    $stmt = $pdo->query("SELECT file_name, file_path FROM files ORDER BY id DESC");
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($files) === 0) {
        $output .= "<p>No files found.</p>";
    } else {
        $output .= "<ul>";

        foreach ($files as $file) {
            $name = htmlspecialchars($file["file_name"]);
            $path = htmlspecialchars($file["file_path"]);

            $output .= "<li>
                <a href='$path' target='_blank'>$name</a>
            </li>";
        }

        $output .= "</ul>";
    }

} catch (PDOException $e) {
    $output .= "Error retrieving files: " . $e->getMessage();
}
?>