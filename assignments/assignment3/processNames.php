<?php

    function addClearNames()
    {
        $output = "";
        if (isset($_POST['add']))
            {
                $names = trim($_POST['names']);
                
                if (!empty($names) )
                    {
                        $name_array = explode( " ", $names );
                        $formattedNames = [];
                        for ( $i = 0; $i < count($name_array); $i += 2 )
                            {
                                if (isset($name_array[$i + 1]))
                                    {
                                        $first = trim($name_array[$i]);
                                        $last = trim($name_array[$i + 1]);
                                        $formattedNames[] = "$last, $first";
                                    }
                            }
                        sort($formattedNames, SORT_STRING | SORT_FLAG_CASE);
                        $output = implode("\n", $formattedNames);
                    }
            }
            if (isset($_POST['clear']))
                    {
                        $output = "";
                    }
        return $output;
    }
?>