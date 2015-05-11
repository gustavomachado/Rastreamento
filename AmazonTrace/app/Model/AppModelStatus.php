<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppModelStatus
 *
 * @author jadson.silva
 */
App::uses('AppModel', 'Model');

class AppModelStatus extends AppModel {

    //put your code here
    public function find($type = 'first', $query = array()) {
        $this->findQueryType = $type;
        $this->id = $this->getID();
        if (isset($query['conditions'])) {
            array_push($query['conditions'], $this->name . '.status_reg not in (1)');
        } else {
            $query['conditions'] = $this->name . '.status_reg not in (1)';
        }
        $query = $this->buildQuery($type, $query);
        if ($query === null) {
            return null;
        }
        return $this->_readDataSource($type, $query);
    }

    public function delete($id = NULL, $cascade = NULL) {
        if ($this->save(array('id' => $this->id, 'status_reg' => 1))) {
            return true;
        } else {
            return false;
        }
    }

}
