<html>
    <head>
        <title>Information Gathered</title>
    </head>
    <body>
        <?php
            echo "<p>\"Data processed\"</><br>";
            date_default_timezone_set('UTC');
            /*
            h 12 hr
            H 24 hr
            i minutes
            s seconds
            u microseconds
            a lowercase am or prm
            l full text for the day
            F full text for the month
            j day of the month
            S suffix for the day (st, nd, rd)
            Y 4 digit year
            e timezone used as defined in date_default...()
            */
            echo date('h:i.s.u a, l F jS Y e') . "<br><br>";
            //print_r($_POST);
            $name = $_POST['username'];
            $addr = $_POST['streetaddress'];
            $city = $_POST['cityaddress'];
            echo $name . "<br>" . $addr . "<br>" . $city. "<br><br>";

            // here docs syntax
            $str = <<<EOD
            The customers name is
            $name and they
            live at $addr
            in $city</br>
EOD;
            echo $str;

            // Constants
            define('PI', 3.1415926);
            echo "The value of pi is: " . PI . "<br>";

            // math
            echo "5 + 2 = " . (5 + 2) . "<br>";
            echo "5 - 2 = " . (5 - 2) . "<br>";
            echo "5 * 2 = " . (5 * 2) . "<br>";
            echo "5 / 2 = " . (5 / 2) . "<br>";
            echo "5 % 2 = " . (5 % 2) . "<br>";

            // casting
            echo "Floor of 5 / 2 (integer casting) = " . (integer)(5 / 2) . "<br>";

            // dislay inline
            $randNum = 5;
            echo $randNum += 10 . "<br>";  // 15
            echo $randNum . "<br>";  // 15

            echo "++randNum = " . ++$randNum . "<br>";  // 16
            echo "randNum++ = " . $randNum++ . "<br>";  // 16
            echo $randNum . "<br>";  // 17

            // reference or copy of var
            $refToNum = &$newNum;
            $newNum = 100;
            // single quotes to show var name
            echo '$refToNum = ' . $refToNum . "<br>";
            $newNum = 200;
            // single quotes to show var name
            echo 'Changed $newNum which is referenced by $refToNum. $refToNum = ' . $refToNum . "<br>";

            // conditionals
            if (5 == 10) {
                echo "5 = 10<br>";
            } else {
                echo "5 != 10<br>";
            }

            $numOfOranges = 4;
            $numOfBananas = 36;
            if (($numOfOranges > 25) && ($numOfBananas >30)) {
                echo "Eligible for 25% discount<br>";
            } elseif (($numOfOranges > 30) || ($numOfBananas >35)) {
                echo "Eligible for 15% discount<br>";
            } elseif (!($numOfOranges < 5) || (!($numOfBananas < 5))) {
                echo "Eligible for 5% discount<br>";
            }
            else {
                echo "No discount for you<br>";
            }


            // ternary operator
            //condition ? value if true: value if false
            $biggestNum = (15 > 10) ? "15 is greater": "10 is greater";
            echo $biggestNum . '<br>';

            //switch statement
            switch($name) {
                case "Derek" :
                    echo "Hello Derek<br>";
                    break;
                case "Zack" :
                    echo "Hello Zack<br>";
                    break;
                default :
                    echo "Hello customer<br>";
                    break;
            }

            //while loop
            $num = 0;  //control var
            while ($num < 20) {
                echo ++$num . ', ';
            }
            echo '<br>';

            //for loop
            for ($num = 1; $num <= 20; $num++) {
                echo $num;
                if ($num != 20) {
                    echo ', ';
                } else {
                    echo '<br>';
                    break;
                }
            }
            echo '<br>';



            //arrays
            $bestFriends = array('Joy', 'Willow', 'Ivy');
            echo 'My first bestfriend '. $bestFriends[0];

            // add to array
            $bestFriends[3] = 'Steve';

            // for each
            foreach ($bestFriends as $friend) {
                echo $friend . ', ';
            }
            echo '<br>';


            //key value array
            $customer = array('Name'=>$name, 'Street'=>$addr, 'City'=>$city);
            foreach ($customer as $key => $value) {
                echo $key . ' : ' . $value . ' <br>';
            }

            //combine arrays - does not make much sense in this scenario - differnet keys
            $bestFriends = $bestFriends + $customer;
            print_r($bestFriends);
            echo '<br>';
            
            // array comparison
            // === same value, order and datatype uses 3 equal signes

            // multidimensional array
            $customers = array(array('Lynn', '123 drury lane', 'Boston'), 
                array('Peter', '234 Serat St', 'Webster'), 
                array('Will', '21 beach st', 'Westport'));

            // change <3 to go off size of outer array
            for ($row=0; $row<3; $row++) {
                for ($col=0; $col<3; $col++) {
                    echo $customers[$row][$col] . ', ';
                }
                echo '<br>';
            }

            //sort array - can add SORT_NUMERIC for numbers or SORT_STRING to treat elements as strings
            //asort sorts array with keys
            //ksort sorts by the key - can put 'r' in front of  all above sort methods in reverse


            // Does echo handle whitespace in print out??
            // Trimming
            $randomString = "              Random String        ";
            echo strlen($randomString) . "<br>";

            //trim left whitespace
            echo ltrim($randomString) . " : ";
            echo strlen(ltrim($randomString)) . "<br>";

            //trim right whitespace
            echo rtrim($randomString) . " : ";
            echo strlen(rtrim($randomString)) . "<br>";

            // trim all whitespace
            echo trim($randomString) . " : ";
            echo strlen(trim($randomString)) . "<br>";

            // can allow for format strings
            echo "The randomString is $randomString<br>";
            printf("The randomString is %s <br>", $randomString);

            //printf allows for use of conversion codes
            // only print 2 decimal places of the float (rounds)
            $decimalNum = 2.3456;
            printf("decimal num = %.2f <br>", $decimalNum);

            // conversion codes
            /*
            %b int to bin
            %c int to char
            %d int to decimal
            %f double to float 
            %o int to octal
            %s string to string
            %x int to hex
            */

            // change case of letters in string
            echo 'To upper: ' . strtoupper($randomString) . "<br>";
            echo 'To lower: ' . strtolower($randomString) . "<br>";
            echo 'To tittle first letter to upper: ' . ucfirst($randomString) . "<br>";

            // string to array or arrays to strings
            // spacing/divisor, string to be converted to array, max number of elements of resulting array
            $randomString = "Random String";
            $stringToArray = explode(' ', $randomString, 2);
            print_r($stringToArray);
            echo '<br>';
            $arrayToString = implode(' ', $stringToArray);
            echo $arrayToString . '<br>';

            $partOfString = substr("Random String", 0, 4); // start at 0 index and get 4 characters
            echo $partOfString . '<br>';

            $man = "man";
            $manhole = "Manhole";
            echo strcmp(strtolower($man), strtolower($manhole));  // if identical ret 0, returns postive number str1 is greater than str2, returns negative if str1 less than str2

            echo '<br>';
            // instead of method on string to get consistent use strcasecmp
            echo strcasecmp($man, $manhole);
            echo '<br>';

            echo strcasecmp($man, substr($manhole, 0, 3));
            echo '<br>';

            // more string functions
            echo "The String " . strstr($randomString, "String") . "<br>"; // finds the string and prints out everything after it
            echo "The String " . stristr($randomString, "string") . "<br>";  // 'i' case insensitive

            // location of match
            echo "Location of String " . strpos($randomString, "String") . "<br>";  // starts as 7th character
            echo "Location of String " . stripos($randomString, "string") . "<br>";  // case insensitive

            // replace string
            $newString = str_replace("String", "Stuff", $randomString);  // replaces String with Stuff in the randomstring variable
            echo $newString . "<br>";


            // functions
            $dbString = '"Random quotes"';
            function addNumbers($num1, $num2) {
                return $num1 + $num2;
            }
            echo "3 + 4 = " . addNumbers(3,4) . "<br>";

            //still need regex and object oriented

        ?>

    </body>
</html>