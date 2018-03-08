<?php
    /***********************************************************************
    *   
    *              "Activites" table functions
    * 
    ***********************************************************************/
        
    /**
     * Reads all Activities from 'activites'
     * @return array of assoc arrays - [0] => Array([Name] => [Value]), etc
     */
    function ReadActivities()
    {
        return ReadAllRecords('activites');
    }
        
    /**
     * Reads an activity by a specified ID
     * @param int $id
     * @return string - the name of the activity
     */
    function ReadActivityById($id)
    {
        $pdo = DBConnect();
        $query = 'SELECT NomActivite FROM activites WHERE idActivite ='.$id;
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
        
    /**
     * Reads an activity by a specified name
     * @param string $Activity
     * @return int - the id of the activity
     */
    function ReadActivityByName($Activity)
    {
        $pdo = DBConnect();
        $query = 'SELECT idActivite FROM activites WHERE NomActivite = \''.$Activity.'\'';
        $st = $pdo->prepare($query);
        $st->execute();
        $result = $st->fetch(PDO::FETCH_ASSOC);
        return $result['idActivite'];
    }
        
    /**
     * Adds an activity to 'activites'
     * @param string $ActivityName
     * @return int the id of the newly created activity
     */
    function AddActivity($ActivityName)
    {
        $pdo = DBConnect();
        $query = 'INSERT INTO activites (NomActivite)
            VALUES(:ActivityName)';				 
        $st = $pdo->prepare($query);
        $st->execute(array(
            'ActivityName' => $ActivityName));
        $id = $pdo->LastInsertID();
        return $id;
    }
        
    /**
     * Updates an activity from 'activites'
     * @param int $id
     * @param string $ActivityName
     */
    function UpdateActivity($id, $ActivityName)
    {
        $pdo = DBConnect();
        $query = 'UPDATE activites
            SET NomActivite=:ActivityName
            WHERE idActivite=:id';
        $st = $pdo->prepare($query);
        $st->execute(array(
            'ActivityName' => $ActivityName,
            'id' => $id));
    }
        
    /**
     * Deletes an activity from 'activites'
     * @param int $id
     */
    function DeleteActivity($id)
    {
        $pdo = DBConnect();
        $query = 'DELETE FROM activites
            WHERE idActivite=:id';
        $st = $pdo->prepare($query);
        $st->execute(array(
            'id' => $id));
    }
?>