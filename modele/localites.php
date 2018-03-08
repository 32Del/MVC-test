<?php
    /***********************************************************************
    *   
    *              "Localites" table functions
    * 
    ***********************************************************************/
    /**
     * Reads all localities from "localites"
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     */
    function ReadLocalities()
    {
        return ReadAllRecords('localites');
    }
        
    /**
     * Reads a locality by a specified id
     * @param int $id - The id of the locality
     * @return assoc array - [Name] => [Value] 
     */
    function ReadLocalityById($id)
    {
        return ReadRecordById('localites', 'idLocalite', $id);
    }
        
    /**
     * Updates a locality by a specified Id
     * @param int $id - The id of the locality
     * @param string $LocalityName - The new name of the locality
     */
    function UpdateLocality($id, $LocalityName)
    {
        $pdo = DBConnect();
	$query = 'UPDATE localites
            SET NomLocalite=:LocalityName
            WHERE idLocalite=:id';
	$st = $pdo->prepare($query);
	$st->execute(array(
            'LocalityName' => $LocalityName,
            'id' => $id));
    }
        
    /**
     * Deletes a locality by a specified Id
     * @param int $id - the Id of the locality
     */
    function Deletelocality($id)
    {
        $pdo = DBConnect();
	$query = 'DELETE FROM localites
            WHERE idlocalite=:id';
	$st = $pdo->prepare($query);
	$st->execute(array(
            'id' => $id));
    }
        
    /**
     * Adds a locality
     * @param string $LocalityName - The name of the locality
     * @return int $id - The id of the new locality
     */
    function AddLocality($LocalityName)
    {
        $pdo = DBConnect();
	$today = date('Y-m-d');
	$query = 'INSERT INTO localites (NomLocalite)
            VALUES(:LocalityName)';				 
	$st = $pdo->prepare($query);
	$st->execute(array(
            'LocalityName' => $LocalityName));
	$id = $pdo->LastInsertID();
	return $id;
    }
    
    /**
     * modifiy the locality array to an assoc array
     * @param array of assoc arrays - $Localities => Array of localities returned by fetchall
     * @return assoc array - $AssocArray - $AssocArray[$index] = arrayValue
     */
    function FormatLocalities($Localities)
    {
        $actualRow = 1;
        $index = null;
        $arrayValue = null;
        $AssocArray = null;
        foreach ($Localities as $Id => $Array)
        {
            foreach ($Array as $Name => $Value)
            {
                if ($actualRow == 1)
                {
                    $actualRow = 2;
                    $index = $Value;
                }
                else 
                {
                    $actualRow = 1;
                    $arrayValue = $Value;
                }
            }
            $AssocArray[$index] = $arrayValue;
        }
        return $AssocArray;
    }
?>