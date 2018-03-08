<?php
    /***********************************************************************
    *   
    *              "Personnes" table functions
    * 
    ***********************************************************************/    
    
    // Adds a person in the "personnes" table
    /**
     * adds a person in the "personnes" table
     * @param string $lastName xx
     * @param string $firstName xx
     * @param date $birthDate xx
     * @param int $idLocality - the id of the locality
     * @return int the id of the created person
     */
    function AddPerson($lastName, $firstName, $birthDate, $idLocality, $activity)
    {
        $pdo = DBConnect();
        $today = date('Y-m-d');
        $query = 'INSERT INTO personnes (Nom, Prenom, DateNaissance, Depuis, idLocalite)
                    VALUES(:lastName,:firstName,:birthDate,:today,:idLocality)';
				 
        $st = $pdo->prepare($query);
        $st->execute(array(
            'lastName' => $lastName,
            'firstName' => $firstName,
            'birthDate' => $birthDate,
            'today' => $today,
            'idLocality' => $idLocality));
	$id = $pdo->LastInsertID();
	return $id;
    }

    // Selects a person by his ID
    /**
     * Selects a person by his ID
     * @param int $id the person's id in the database
     * @return associative array - [NomDeChamps] => [Valeur]
     */
    function ReadPersonById($id)
    {
	return ReadRecordById('personnes', 'idPersonne', $id);
    }
    
    // Reads al persons
    /**
     * Read all persons from "personnes"
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     */
    function ReadPersons()
    {
        return ReadAllRecords('personnes');
    }
    
    /**
     * Reads all persons in a specified locality
     * @param int $idLocality - the id of the locality
     * @return array or boolean - array if there are persons
     *                          - FALSE if there aren't any
     */
    function ReadPersonsByLocality($idLocality)
    {        
        $pdo = DBConnect();
        $query = 'SELECT * from personnes
            WHERE idLocalite=:idLocality';
        $st = $pdo->prepare($query);
        $st->execute(array('idLocality' => $idLocality));
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
        
    // Updates a person by a specified ID
    /**
     * @param int $id the id of the person
     * @param string $LastName the last name of the person
     * @param string $FirstName the first name of the person
     * @param date $BirthDate the birthdate of the person
     * @param int $idLocality - the id of the locality
     */
    function UpdatePerson($id, $LastName, $FirstName, $BirthDate, $idLocality)
    {
	$pdo = DBConnect();
	$query = 'UPDATE personnes
            SET Nom=:LastName,Prenom=:FirstName,DateNaissance=:BirthDate,idLocalite=:idLocality 
            WHERE idPersonne=:id';
	$st = $pdo->prepare($query);
	$st->execute(array(
            'LastName' => $LastName,
            'FirstName' => $FirstName,
            'BirthDate' => $BirthDate,
            'id' => $id,
            'idLocality' => $idLocality));	
    }
        
    // Deletes a person by a specified ID
    /**
     * Deletes a person by a specified ID
     * @param int $id the id of the person
     */
    function DeletePerson($id)
    {
        $pdo = DBConnect();
	$query = 'DELETE FROM personnes
            WHERE idPersonne=:id';
	$st = $pdo->prepare($query);
	$st->execute(array(
            'id' => $id));
    }
?>