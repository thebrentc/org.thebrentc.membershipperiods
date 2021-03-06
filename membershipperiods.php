<?php

require_once 'membershipperiods.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function membershipperiods_civicrm_config(&$config) {
  _membershipperiods_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function membershipperiods_civicrm_xmlMenu(&$files) {
  _membershipperiods_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function membershipperiods_civicrm_install() {
  _membershipperiods_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function membershipperiods_civicrm_postInstall() {
  _membershipperiods_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function membershipperiods_civicrm_uninstall() {
  _membershipperiods_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function membershipperiods_civicrm_enable() {
  _membershipperiods_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function membershipperiods_civicrm_disable() {
  _membershipperiods_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function membershipperiods_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _membershipperiods_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function membershipperiods_civicrm_managed(&$entities) {
  _membershipperiods_civix_civicrm_managed($entities);
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
function membershipperiods_civicrm_caseTypes(&$caseTypes) {
  _membershipperiods_civix_civicrm_caseTypes($caseTypes);
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
function membershipperiods_civicrm_angularModules(&$angularModules) {
  _membershipperiods_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function membershipperiods_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _membershipperiods_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function membershipperiods_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function membershipperiods_civicrm_navigationMenu(&$menu) {
  _membershipperiods_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'org.thebrentc.membershipperiods')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _membershipperiods_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_tabset to add Membership Periods tab.
 *
 */
function membershipperiods_civicrm_tabset($tabsetName, &$tabs, $context) {
  if (strpos($tabsetName, "civicrm/contact/view") === 0) {
    // add membershipperiods tab
    $url = CRM_Utils_System::url('civicrm/contact/view/membershipperiods',"reset=1&force=1&cid=" . $context['contact_id']);
    $tab = array( 
      'id'    => 'membershipperiods',
      'url'   => $url,
      'title' => 'Membership Periods',
      'weight' => 300,
    );
    $tabs[] = $tab;
    // TODO Position this tab after membership tab
  }
}

/**
 * Implements hook_civicrm_post 
 * to perform associated updates to Membership Period entity when Memberships are changed
 *
 */
function membershipperiods_civicrm_post($op, $objectName, $objectId, &$objectRef) {

  // catch submitted changes to civicrm_membership
  if (isset($objectRef->entity_table) && $objectRef->entity_table === "civicrm_membership") {
    
    // process on any creating or updating of memberships    
    if ($op === "create" || $op === "edit") {

      // build reference to changed Membership record 
      $membership_params = array(
        'id' => $objectRef->entity_id,
      );
      // and get updated membership details
      try {
        // try standard CiviCRM API call    
        $result = civicrm_api3('Membership', 'get', $membership_params);
      } catch(Exception $e) {
        // else HACK for problems getting API setup to work
        global $civicrm_root;
        require_once($civicrm_root."/api/v3/Membership.php");
        $result = civicrm_api3_membership_get($membership_params);
      }

      // extract needed values for membership_period
      $record = $result['values'][$result['id']];
      $params = array(
        'membership_id' => $record['id'],
        'contact_id' => $record['contact_id'],
        'start_date' => $record['start_date'],
        'end_date' => $record['end_date'],
      );

      // create membership period record
      $result = CRM_Membershipperiods_BAO_MembershipPeriod::create($params);

      // TODO refresh membership periods tab data
      
    }
  }

}
