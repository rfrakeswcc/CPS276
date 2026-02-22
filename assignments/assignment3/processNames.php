<?php

    function addClearNames()
    {
        $output = "";
        if (isset($_POST['add_names']))
            {
                $name = trim($_POST['name']);
                
                if ( (!empty($name) )
                    {
                        $name_array = explode( " ", $name);
                        $name_array = array_map('trim', $name_array);
                        sort($name_array);
                        $output = implode("\n", $name_array);
                    }
                if (isset($_POST['clear_names']))
                    {
                        $output = "";
                    }
            }
    }
?>