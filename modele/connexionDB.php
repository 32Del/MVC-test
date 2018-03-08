<!--
	Auteurs 	: Ivan Perez et Victor Neto
	Projet  	: Gestion de base de données via PHP
	Date    	: 12 Mars 2014
	Description     : Page de fonctions d'accès à la base de données
-->
<?php
    // DB Connection
    /**
     * Starts a Database connection
     * @staticvar null $pdo
     * @return $pdo the database
     */
    function DBConnect()
    {           
        try
        {
            static $pdo = null;
            if ($pdo === null)
            {
                $pdo = new PDO('mysql:host='.host.';dbname='.dbname, user, password);
                $pdo->exec('set character set utf8;');
            }
	}	
        catch (Exception $e)
	{
            die('Erreur : '.$e->getMessage());
	}
	return $pdo;
    }
        
    // General Database Access Functions
       
        
    // Reads all Records from a table
    /**
     * Reads all the records from a specified table
     * @param string $TableName - The name of the table
     * @return array of assoc arrays - [0] => Array([NomDeChamps] => [Valeur]) OR FALSE
     */
    function ReadAllRecords($TableName)
    {
        $pdo = DBConnect();
        $query = 'SELECT * from '.$TableName;
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result))
        {
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
    
    // Reads a record from a table
    /**
     * Reads a record from a specified table by a specified id
     * @param string $TableName - name of the table
     * @param string $IdName - Name of id column
     * @param integer $Id - The id from the record you want
     * @return Assoc Array - all the values from the record [Name] => [Value]
     */
    function ReadRecordById($TableName, $IdName, $Id)
    {
        $pdo = DBConnect();
        $query = 'SELECT * from '.$TableName.' Where '.$IdName.'='.$Id;
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetch(PDO::FETCH_ASSOC);
        return $result;     
    }
        
    // Modify an 2d array to an array
    /**
     * modify an 2d array received from fetchall to a unidimensional array
     * @param array of assoc arrays - $Array2D The source array
     * @param string $IdName the id if the value of the assoc array
     * @return array - array[0] => Value
     */
    function Array2DToArray($Array2D, $IdName)
    {
        $assoc = FALSE;
        foreach ($Array2D as $row)
        {
            $assoc[] = $row[$IdName];
        }
        return $assoc;
    }	                
?>