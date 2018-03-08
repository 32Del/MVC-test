<?php
    /***********************************************************************
    *   
    *              "pratiquer" table functions
    * 
    ***********************************************************************/
    /**
     * Reads all practices by all persons
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     */
    function ReadPractices()
    {
        return ReadAllRecords('pratiquer');
    }
    
    /**
     * Reads all practices exercised by a specified person
     * @param int $id - the id of the person
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     *         - The list of the activities
     */
    function ReadPracticesByPerson($id)
    {
        $pdo = DBConnect();
        $query = 'SELECT idActivite from pratiquer Where idPersonne='.$id;
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetchAll(PDO::FETCH_ASSOC);
        $result = Array2DToArray($result, 'idActivite');
        if ($result[0] != '')
        {
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * Reads all persons practicing a specified activity 
     * @param int $id - the id of the activity
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     *         - the list of the persons
     */
    function ReadPersonsByPractice($id)
    {
        $pdo = DBConnect();
        $query = 'SELECT idPersonne from pratiquer Where idActivite='.$id;
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetchAll(PDO::FETCH_ASSOC);
        $result = Array2DToArray($result, 'idPersonne');
        if ($result[0] != '')
        {
            return $result;
        }
        else
        {
            return FALSE;
        }
    }
        
    /**
     * Deletes all practices made by a specified person
     * @param int $idPerson - the id of the person
     */
    function DeletePracticesByPerson($idPerson)
    {
        $pdo = DBConnect();
        $query = 'DELETE FROM pratiquer
            WHERE idPersonne=:idPerson';
        $st = $pdo->prepare($query);
        $st->execute(array(
            'idPerson' => $idPerson));
    }
        
    /**
     * deletes ancient activities made by a specified person and Insert the
     * new ones
     * @param int $idPerson - the id of the person
     * @param array of int $Practices - The list of Activities made by the person
     *                                  contains idActivite
     */
    function UpdatePracticesByPerson($idPerson, $Practices)
    {
        DeletePracticesByPerson($idPerson);
        $pdo = DBConnect();
        foreach ($Practices as $Practice)
        {
            $query = 'INSERT INTO pratiquer (idPersonne, idActivite)
                Values (:idPerson, :Practice)';
            $st = $pdo->prepare($query);
            $st->execute(array(
                'idPerson' => $idPerson,
                'Practice' => $Practice));                     
        }  
    }
?>