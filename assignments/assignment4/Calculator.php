<?php
    class Calculator
    {
        public $result = "";
        public $operator;
        public $num_1;
        public $num_2;

        public function calc( ...$args )
            {
                if (count($args) !== 3)
                    {
                    return "<p>Error. You must have three arguments.<p>";
                    }
                if ( !in_array( $args[0], ['+', '-', '*', '/'] ) )
                    {
                    return "<p>Error. Operator must be one of +, -, *, /.<p>";
                    }
                if ( !is_numeric( $args[1] ) || !is_numeric( $args[2] ) )
                    {
                    return "<p>Error. Operands must be integers or floats</p>";
                    }
                $operator = $args[0];
                $num_1 = $args[1];
                $num_2 = $args[2];
                if ( ( $operator === '/' ) && ( $num_2 == 0 ) )
                    {
                    return "<p>Error. Cannot divide a number by zero.</p>";
                    }
                switch ($operator) 
                    {
                    case '+':
                        $result = $num_1 + $num_2;
                        break;
                    case '-':
                        $result = $num_1 - $num_2;
                        break;
                    case '*':
                        $result = $num_1 * $num_2;
                        break;
                    case '/':
                        $result = $num_1 / $num_2;
                        break;
                    }
                return "<p>The calculation is $num_1 $operator $num_2. The answer is $result.</p>";
            }
    }
?>