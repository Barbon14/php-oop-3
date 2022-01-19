<?php
// Definire classe User:
//          ATTRIBUTI (private):
//          - username 
//          - password
//          - age
//          
//          METODI:
//          - costruttore che accetta username, e password
//          - proprieta' getter/setter
//          - printMe: che stampa se stesso
//          - toString: "username: age [password]"
// 
//          ECCEZIONI:
//          - scatenare eccezione quando username e' minore di 3 caratteri o maggiore di 16
//          - scatenare eccezione se password non contiene un carattere speciale (non alpha-numerico)
//          - scatenare eccezione se age non e' un numero
// 
//          NOTE:
//          - per testare il singolo carattere di una stringa
// 
//      Testare la classe appena definita con dati corretti e NON corretti all'interno di un
//      try-catch e eventualmente informare l'utente del problema

class User {

    private $username;
    private $password;
    private $age;

    public function __construct($username, $password) {
        
        $this->setUsername($username);
        $this->setPassword($password);
    }

    // set get username
    public function setUsername($username) {

        if (strlen($username)< 3 || strlen($username) > 16)
            throw new Exception("Lo username deve contenere dai 3 ai 16 caratteri.");

        $this-> username  = $username;
    }

    public function  getUsername() {

        return $this-> username;
    }

    // set get password
    public function setPassword($password)
    {

        if (ctype_alnum($password))
            throw new Exception("La password deve contenere almeno un carattere speciale."); 

        $this-> password = $password;
    }

    public function  getPassword()
    {

        return $this-> password;
    }

    // set get age
    public function setAge($age)
    {

        if (!is_int($age))
            throw new Exception("L'età deve esssere un numero.");
       
        $this->age  = $age;
    }

    public function  getAge()
    {

        return $this->age;
    }

    public function printMe() {
        
        echo $this . "<br>";
    }

    public function __toString() {
        
        return $this-> getUsername() . ": " . $this-> getAge()
                . " [" . $this->getPassword() . "]";
    }
}

try {
    $u1 = new User("Marco90", "Helloworld");

    $u1->setAge(25);

    $u1->printMe();

} catch (Exception $e) {
    echo "<h3>" . $e-> getMessage() . "</h3>";
}

try {
    $u2 = new User("Telperien", "ciao_mondo");

    $u2->setAge(30);

    $u2->printMe();

} catch (Exception $e) {
    echo "<h3>" . $e->getMessage() . "</h3> <br>";
}

echo "<br> ------------------------------------------------------------ <br>";

// Definire classe Computer:
//         ATTRIBUTI:
//         - codice univoco
//         - modello
//         - prezzo
//         - marca
//
//         METODI:
//         - costruttore che accetta codice univoco e prezzo
//         - proprieta' getter/setter per tutte le variabili d'istanza
//         - printMe: che stampa se stesso (come quella vista a lezione)
//         - toString: "marca modello: prezzo [codice univoco]"
//
//         ECCEZIONI:
//         - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
//         - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
//         - prezzo: deve essere un valore intero compreso tra 0 e 2000
//
//     Testare la classe appena definita con tutte le casistiche interessanti per verificare
//     il corretto funzionamento dell'algoritmo

class Computer {

    private $uniqCode;
    private $model;
    private $price;
    private $brand;

    // constructor
    public function __construct($uniqCode, $price) {
        
        $this-> setUniqCode($uniqCode);
        $this-> setPrice($price);
    }
    
    // set get unique code
    public function setUniqCode($uniqCode) {

        if (strlen($uniqCode) != 6 || !is_int($uniqCode)) 
            throw new Exception("Il codice univoco deve essere di 6 cifre.");

        $this-> uniqCode = $uniqCode;
    }

    public function getUniqCode() {

        return $this-> uniqCode;
    }

    // set get model
    public function setModel($model)
    {

        if (strlen($model) < 3 || strlen($model) > 20)
            throw new Exception("Il modello deve contenere dai 3 ai 20 caratteri.");

        $this->model = $model;
    }

    public function getModel()
    {

        return $this->model;
    }

    // set get price
    public function setPrice($price)
    {

        if (!is_int($price) || $price < 0 || $price > 2000 ) 
            throw new  Exception("Il prezzo deve essere un valore intero tra 0 e 2000.");

        $this->price = $price;
    }

    public function getPrice()
    {

        return $this->price;
    }

    // set get brand
    public function setBrand($brand)
    {

        if (strlen($brand) < 3 || strlen($brand) > 16)
            throw new Exception("La marca deve contenere dai 3 ai 20 caratteri.");

        $this->brand = $brand;
    }

    public function getBrand()
    {

        return $this->brand;
    }

    // print functions
    public function printMe() {

        echo $this;
    }

    public function __toString() {
        
        return $this-> getBrand() . " " . $this-> getModel() . ": € " 
                . $this-> price . " [" . $this-> getUniqCode() . "]";
    }
}

try {

    $c1 = new Computer(123456, 1500);

    $c1 -> setModel("C15L");
    $c1 -> setBrand("ASUS");

    $c1 -> printMe();

} catch (Exception $e) {
    echo "<h3>" . $e->getMessage() . "</h3> <br>";
} 
?>