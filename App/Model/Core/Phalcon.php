<?php

namespace App\Model\Core;

trait Phalcon
{

    /**
     * Save Application data
     * 
     * @param array $data Application data
     * 
     * @return phalcon success
     */
    public function SaveData($appData)
    {
        $result = FALSE;
        // check if application id exist
        if (!empty($appData['application_id'])) {

            //get data by primary key
            $application = $this->findFirst($appData['application_id']);

            //check for update or create new            
            if (!empty($application)) {
                $result = $application->save($appData);
            } else {
                $application = new $this();
                $result = $application->save($appData);
            }
        }

        return $result;
    }

}
