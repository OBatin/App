<?php

namespace App\Model\Core;

class Phalcon
{

    /**
     * Save Application data
     * 
     * @param array $data Application data
     * 
     * @return phalcon success
     */
    public function SaveData($data)
    {
        $result = FALSE;
        // check if application id exist
        if (!empty($data['application_id'])) {

            //get data by primary key
            $application = $this->findFirst($data['application_id']);

            //check for update or create new            
            if (!empty($application)) {
                $result = $application->save($data);
            } else {
                $application = new $this();
                $result = $application->save($data);
            }
        }

        return $result;
    }

}
