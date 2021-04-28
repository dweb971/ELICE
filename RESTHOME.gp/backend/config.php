<?php
/**
 * Config class
 */

class Config{


    #proprietew

private $_nom;
private $_prenom;
private $_tel;
private $_naissance;
private $_login;
private $_pass;
private $_connectDB;


    #methode
public function __construct($db){

    $this->set_connectDB($db->pdo);

}



public function login(array $data){

    print_r($data);

    $this->set_login($this->nettoyer(strtolower($data["email"])));
    $log = $this->get_login();

// requete sql SELECT
    $reqS = "SELECT * FROM user WHERE login='".$log."'";
    $dbh = $this->get_connectDB()->query($reqS);

    if ($dbh->rowCount()===0) {
        echo "Aucun resultat";
    }
    else{

      //print_r($dbh);  

      //lecture

      foreach ($dbh as $row){
        print_r($row);
    if (password_verify($data["password"], $row["password"])) {
    echo"mot de passe ok";
}
else{
    echo"pas bon mot de passe";
    echo"verifier votre saisie ou demander un nouveau mot de passe";
}
      }
    }
    
}

public function nettoyer($chaine){

    // 
    $chaine = trim(strip_tags($chaine));


    return $chaine;

}


    #getter/setter

/**
 * Get the value of _nom
 */ 
public function get_nom()
{
return $this->_nom;
}

/**
 * Set the value of _nom
 *
 * @return  self
 */ 
public function set_nom($_nom)
{
$this->_nom = $_nom;

return $this;
}

/**
 * Get the value of _prenom
 */ 
public function get_prenom()
{
return $this->_prenom;
}

/**
 * Set the value of _prenom
 *
 * @return  self
 */ 
public function set_prenom($_prenom)
{
$this->_prenom = $_prenom;

return $this;
}

/**
 * Get the value of _tel
 */ 
public function get_tel()
{
return $this->_tel;
}

/**
 * Set the value of _tel
 *
 * @return  self
 */ 
public function set_tel($_tel)
{
$this->_tel = $_tel;

return $this;
}

/**
 * Get the value of _naissance
 */ 
public function get_naissance()
{
return $this->_naissance;
}

/**
 * Set the value of _naissance
 *
 * @return  self
 */ 
public function set_naissance($_naissance)
{
$this->_naissance = $_naissance;

return $this;
}

/**
 * Get the value of _login
 */ 
public function get_login()
{
return $this->_login;
}

/**
 * Set the value of _login
 *
 * @return  self
 */ 
public function set_login($_login)
{
$this->_login = $_login;

return $this;
}

/**
 * Get the value of _pass
 */ 
public function get_pass()
{
return $this->_pass;
}

/**
 * Set the value of _pass
 *
 * @return  self
 */ 
public function set_pass($_pass)
{
$this->_pass = $_pass;

return $this;
}

/**
 * Get the value of _connectDB
 */ 
public function get_connectDB()
{
return $this->_connectDB;
}

/**
 * Set the value of _connectDB
 *
 * @return  self
 */ 
public function set_connectDB($_connectDB)
{
$this->_connectDB = $_connectDB;

return $this;
}
}






?>