<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use EasyMenus\Controller\Component\EasyMenusComComponent;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class GlobalComponent extends Component
{
public function loadTablePermission($session,$tablename) {
    	
    	
    	$role = $session->read ( 'User.role' );
    	
    	
    	$tblRole = TableRegistry::get ( 'Roles' );
    	$roleDetail = $tblRole->find ()->where ( [
    			'name' => $role ] )->first();
    	
    	
    	$tblcolPer = TableRegistry::get ( 'TblColPermission' );
    	$colnames = array ();
    	$results=array();
    	  	// Start a new query.
    	  	if(!empty($roleDetail ))
    	$results = $tblcolPer->find ()->select ( [
    			'col_name'
    	] )->where ( [
    			'table_name ' => $tablename
    	] )->where ( [
    			'role_id' => $roleDetail->role_id
    	] );
    
    	foreach ( $results as $result ) {
    
    		$this->log ( "colname::" . $result->col_name, 'debug' );
    		$colnames [] = $result->col_name;
    	}
    
    	return $colnames;
    }
    
}
