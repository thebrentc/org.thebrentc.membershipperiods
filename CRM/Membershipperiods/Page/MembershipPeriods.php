<?php

class CRM_Membershipperiods_Page_MembershipPeriods extends CRM_Core_Page {

  public function run() {

    CRM_Utils_System::setTitle(ts('MembershipPeriods'));

    // get contact id from $_GET ???
    // validate
    if (!is_numeric($_GET['cid'])) {
      die("Validation error"); // TODO better handling
    }
    $this->assign('cid', $_GET['cid']); 

    // get membership periods data for contact
    $data = CRM_Membershipperiods_BAO_MembershipPeriod::retrieve($_GET['cid']);        
    $this->assign('data', $data); 

    parent::run();
  }

}
