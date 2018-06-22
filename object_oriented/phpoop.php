<html>
<head>
    <title>
        <?php
            echo "PHP Object Oriented Programming";
        ?>
    </title>
</head>
<body>
    <?php
    // Super class
    class Animal implements Singable {
        //public  //any code can access this
        //private  //only methods in this class can access/change it
        protected $name; //private but subclasses can ALSO access
        protected $favoriteFood;
        protected $sound;
        protected $id;

        // static attribute - static means every object of Animal type created all going to share
        public static $numberOfAnimals = 0;
        
        // Access static var to make change
        //Animal::$numberOfAnimals

        const PI = "3.14159";
        // Access const
        //Animal::PI

        //constructor
        function __construct() {
            // initialize things when class is instantiated
            $this->id = rand(100, 1000000);
            echo "The created animal was assigned an id of " . $this->id . "<br>";
            Animal::$numberOfAnimals+=1;
        }

        //destructor - when all references to an object have been unset
        public function __destruct() {
            echo $this->name . " is being destroyed :( <br>";
        }


        // encapsulation - protecting the protected vars
        function getName() {
            // $this is used to refer to an attribute of a class
            return $this->name;
        }  //but there is a shortcut to crete "getters" and "setters" - magic methods (prepended __)

        // fetches the parameterized class attribute
        function __get($attributeAskedFor) {
            echo "Asked for " . $attributeAskedFor . "<br>";
            return $this->$attributeAskedFor;
        }

        // checks that attribute is valid and then changes value
        function __set($attributeToChange, $newValueToAssign) {
            //check that name is valid class attribute
            switch($attributeToChange) {
                case "name":
                    $this->name = $newValueToAssign;
                    break;
                case "favoriteFood":
                    $this->favoriteFood = $newValueToAssign;
                    break;
                case "sound":
                    $this->sound = $newValueToAssign;
                    break;
                default:
                    echo $attributeToChange . " was not found <br>";
            }
            echo "Set " . $attributeToChange . " to " . $newValueToAssign . "<br>";
        }

        // method that will be overriden in child class
        function run() {
            echo $this->name . " runs<br>";
        }

        // create a method that cannot be overridden my subclasses
        final function whatIsGood() {
            echo "Running is good <br>";
        }

        // magic method to print out various information and attributes when print is called on the object
        function __toString() {
            return $this->name . " says " . $this->sound . " give me some " . $this->favoriteFood . " my id is " . $this->id . "<br>Total animals: " . Animal::$numberOfAnimals . "<br><br>";
        }

        function sing() {
            echo $this->name . " sings. Grrr grrr grrr grrr<br>";
        }

        // static functions - called without need of instantiations
        static function add_these($num1, $num2) {
            return $num1 + $num2 . "<br>";
        }

    }

    //Subclass - forces us to define sing() inside because of interface
    class Dog extends Animal implements Singable {
        // attributes from animal are automatically inherited
        function run() {
            echo $this->name . " runs like crazy. Him fast<br>";
        }

        function sing() {
            echo $this->name . " sings. Woof woof woof woof<br>";
        }
    }

    //interface - class will define methods inside
    interface Singable {
        public function sing();
    }

    // static method call - showing that no animal object created yet
    echo "13+5= ".Animal::add_these(13,5);

    // Instantiation - creating objects from class blueprints - super animal class first
    $animal = new Animal();
    $animal->name = "Ritchie";
    $animal->favoriteFood = "Meat";
    $animal->sound = "Roar";
    echo "<br>";
    echo $animal->name . " says " . $animal->sound . " give me some " . $animal->favoriteFood . " my id is " . $animal->id . "<br>Total animals: " . Animal::$numberOfAnimals . "<br><br>";
    echo "Favorite Number = " . Animal::PI . "<br>";

    echo "<br><br>";

    // Now using the dog child class
    $animal2 = new Dog();
    $animal2->name = "Kaiser";
    $animal2->favoriteFood = "Frosty Paws";
    $animal2->sound = "Bark";
    echo "<br>";
    echo $animal2->name . " says " . $animal2->sound . " give me some " . $animal2->favoriteFood . " my id is " . $animal2->id . "<br>Total animals: " . Dog::$numberOfAnimals . "<br><br>";


    // showing overridden method
    $animal->run();
    $animal2->run();

    echo "<br><br>";

    $animal->whatIsGood();
    $animal2->whatIsGood();
    
    echo "<br><br>";

    // showing toString
    echo $animal;
    echo $animal2;

    echo "<br><br>";

    // showing interface implementation
    echo $animal->sing();
    echo $animal2->sing();

    echo "<br><br>";

    // showing more polymorphism - "object agnostic" both are singable
    function makeThemSing(Singable $singingAnimal){
        $singingAnimal->sing();
    }

    makeThemSing($animal);
    makeThemSing($animal2);

    echo "<br><br>";

    function singAnimal(Animal $singingAnimal) {
        $singingAnimal->sing();
    }
    singAnimal($animal);
    singAnimal($animal2);
    echo "<br><br>";

    // another static call but above animal classes instantiated
    echo "3+5= ".Animal::add_these(3,5);
    echo "<br><br>";

    // check class type - Dog but subclass of animal so True - ternary operator
    $isItAnAnimal = $animal2 instanceOf Animal ? "Yes it is an animal": "No it is not an animal";
    echo 'Is ' . $animal2->name . " an animal?<br>" . $isItAnAnimal . "<br>";

    // clone an object 
    $animalClone = clone $animal;

    // abstract classes (cannot be instantiated cant have an object of it) and abstrct methods
    /*
    abstract class RandomClass {
        // methods MUST be used/overriden by any class that implements this abstract class
        abstract function RandomFunction($attribute) {
            return;
        }
    }
    */

    // __call() - provides method overloading
    echo exec('whoami');
    ?>
</body>
</html>