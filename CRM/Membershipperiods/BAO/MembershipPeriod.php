<?php

class CRM_Membershipperiods_BAO_MembershipPeriod extends CRM_Membershipperiods_DAO_MembershipPeriod {

  /**
   * Create a new MembershipPeriod based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Membershipperiods_DAO_MembershipPeriod|NULL
   *
   */
  public static function create($params) {

    $className = 'CRM_Membershipperiods_DAO_MembershipPeriod';
    $entityName = 'MembershipPeriod';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;

  }

  /**
   * Get MembershipPeriods
   *
   * @param int|null $id filter by specific contact id or all
   * @return array of CRM_Membershipperiods_DAO_MembershipPeriod|NULL
   */
  public static function retrieve($cid = null) {
    $query = "SELECT * FROM civicrm_membership_period ";
    if ($cid) {
      $query .= ' WHERE contact_id = '.$cid; // XXX security? 
    }
    $dao = CRM_Core_DAO::executeQuery($query);
    return $dao->fetchAll();
  }

}
