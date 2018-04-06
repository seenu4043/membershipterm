<?php

require_once 'membershipterm.civix.php';
use CRM_Membershipterm_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function membershipterm_civicrm_config(&$config) {
  _membershipterm_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function membershipterm_civicrm_xmlMenu(&$files) {
  _membershipterm_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function membershipterm_civicrm_install() {
  _membershipterm_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function membershipterm_civicrm_postInstall() {
  _membershipterm_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function membershipterm_civicrm_uninstall() {
  _membershipterm_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function membershipterm_civicrm_enable() {
  _membershipterm_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function membershipterm_civicrm_disable() {
  _membershipterm_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function membershipterm_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _membershipterm_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function membershipterm_civicrm_managed(&$entities) {
  _membershipterm_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function membershipterm_civicrm_caseTypes(&$caseTypes) {
  _membershipterm_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function membershipterm_civicrm_angularModules(&$angularModules) {
  _membershipterm_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function membershipterm_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _membershipterm_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function membershipterm_civicrm_entityTypes(&$entityTypes) {
  _membershipterm_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function membershipterm_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function membershipterm_civicrm_navigationMenu(&$menu) {
  _membershipterm_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _membershipterm_civix_navigationMenu($menu);
} // */


function membershipterm_civicrm_postProcess($formName, &$form)
{ //watchdog('callhooks',"callhooks_civicrm_postProcess_${formName}(&\$form)<pre>\n\$form=" . var_export($form,1) . '</pre>');
  if ( is_a( $form, 'CRM_Member_Form_MembershipRenewal' ) ) {
        $membership_organisation = $form->_defaultValues['membership_type_id'][0];
								$membership_organisation = $form->_defaultValues['membership_type_id'][0];
								$membership_type_id = $form->_defaultValues['membership_type_id'][1];
								$contactid=$form->_defaultValues['contact_id'];
								$membership_id =$form->_defaultValues['membership_id'];
								if(!empty($form->_defaultValues['start_date']) && !empty($form->_defaultValues['end_date'])){
										$numRenewTerms =1;
										$renewal_startdate = date('Y-m-d', strtotime($form->_defaultValues['end_date'] .' +1 day'));
										$dates = CRM_Member_BAO_MembershipType::getDatesForMembershipType($membership_type_id, NULL, $renewal_startdate, NULL, $numRenewTerms);
										$start_date = $dates['start_date'];
										$end_date = $dates['end_date'];
								}
								$contribution_id=1;
								//persist into database
								$query_params = array(
          1 => array($contactid, 'Integer'),
          2 => array($membership_id, 'Integer'),
          3 => array($start_date, 'String'),
          4 => array($end_date, 'Integer'),
          5 => array($contribution_id, 'Integer'),
        );
								
        CRM_Core_DAO::executeQuery("INSERT INTO civicrm_membership_term
          (userid, membership_id, start_date, end_date, contribution_id) VALUES (%1, %2, %3, %4, %5)", $query_params);		
								//echo "start_date".$start_date."<br/>";
								//echo "end_date".$end_date."<br/>";
								//echo "membership_type_id".$membership_type_id."<br/>";
								//echo "member org".$membership_organisation."<br/>";
								//echo "contactid".$contactid."<br/>";
								
								//print_r($dates);
								//die();
									
										
		}
		if ( is_a( $form, 'CRM_Member_Form_Membership' ) ) {
							echo "<pre/>";
							
								$membership_organisation = $form->_submitValues['membership_type_id'][0];
								$membership_type_id = $form->_submitValues['membership_type_id'][1];
								$contactid=$form->getVar( '_contactID' );
								$membership_id = $form->getVar('_id');
								
								if(!empty($form->_submitValues['start_date']) && !empty($form->_submitValues['end_date'])){
										$start_date = $form->_submitValues['start_date'];
										$end_date = $form->_submitValues['end_date'];
								}else{
										$numRenewTerms =1;
										$dates = CRM_Member_BAO_MembershipType::getDatesForMembershipType($membership_type_id, NULL, NULL, NULL, $numRenewTerms);
										$start_date = $dates['start_date'];
										$end_date = $dates['end_date'];
								}
								$contribution_id=1;
								//persist into database
								$query_params = array(
          1 => array($contactid, 'Integer'),
          2 => array($membership_id, 'Integer'),
          3 => array($start_date, 'String'),
          4 => array($end_date, 'Integer'),
          5 => array($contribution_id, 'Integer'),
        );
        CRM_Core_DAO::executeQuery("INSERT INTO civicrm_membership_term
          (userid, membership_id, start_date, end_date, contribution_id) VALUES (%1, %2, %3, %4, %5)", $query_params);
								
								//echo "start_date".$start_date."<br/>";
								//echo "end_date".$end_date."<br/>";
								//echo "membership_type_id".$membership_type_id."<br/>";
								//echo "member org".$membership_organisation."<br/>";
								//echo "contactid".$contactid."<br/>";
								//echo "membership_id".$form->getVar('_id');
								//print_r($form);
								//die();
		}
}
