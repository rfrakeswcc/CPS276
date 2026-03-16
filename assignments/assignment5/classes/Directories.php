<?php

class Directories
    {

    private $dirName;
    private $fileContents;

    public function __construct($dirName, $fileContents)
        {
        $this->dirName = "directories/" . trim($dirName);
        $this->fileContents = $fileContents;
        }

    public function createDirectory()
        {

        // Check if directory already exists
        if (is_dir($this->dirName))
            {
            return [
                "success" => false,
                "message" => "A directory already exists with that name."
            ];
            }

        // Try creating directory
        if (!mkdir($this->dirName))
            {
            return [
                "success" => false,
                "message" => "Error: Could not create directory."
            ];
            }

        $filePath = $this->dirName . "/readme.txt";

        // Try creating the file
        if (!file_put_contents($filePath, $this->fileContents))
            {
            return [
                "success" => false,
                "message" => "Error: Could not create file."
            ];
            }

        return [
            "success" => true,
            "message" => "Directory and file created successfully.",
            "path" => $filePath
        ];
        }
    }

?>