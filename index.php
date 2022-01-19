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
            throw new Exception("Lo username deve contenere dai 3 ai 16 caratteri. <br>");

        $this-> username  = $username;
    }

    public function  getUsername() {

        return $this-> username;
    }

    // set get password
    public function setPassword($password)
    {

        if (ctype_alnum($password))
            throw new Exception("La password deve contenere almeno un carattere speciale. <br>"); 

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
            throw new Exception("L'età deve esssere un numero. <br>");
       
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
    echo "<h3>" . $e->getMessage() . "</h3>";
}

echo "<br> ------------------------------------------------------------ <br>"

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
?>