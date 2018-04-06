<?php
use CRM_Membershipterm_ExtensionUtil as E;

/**
 * Membershipterm.Getmembershipterm API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_membershipterm_Getmembershipterm_spec(&$spec) {
  $spec['membership_id']['api.required'] = 1;
}

/**
 * Membershipterm.Getmembershipterm API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_membershipterm_Getmembershipterm($params) {
  if (array_key_exists('membership_id', $params)) {
	
	$termElememts = array(
          'Id',
          'start_date',
          'end_date',
    );
	$term = array();
	$term_no = 1;
	$term_query = "select * from civicrm_membership_term where membership_id={$params['membership_id']} order by id";
	$term_dao = CRM_Core_DAO::executeQuery($term_query);
		while ($term_dao->fetch()) {
			$row = array();
			foreach ($termElememts as $field) {
				$row[$field] = $term_dao->$field;
				$row['term_no'] = $term_no;
			}
			$term_no++;
		$term[]= $row;
		}
    return civicrm_api3_create_success($term);
  }
  else {
    throw new API_Exception('Get membership failed :' + $e->getMessage());
  }
}
