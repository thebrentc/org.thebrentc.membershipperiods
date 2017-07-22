<?php

class CRM_Membershipperiods_Page_MembershipPeriods extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('MembershipPeriods'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));    

    // get contact id from $_GET ???
    // validate
    if (!is_numeric($_GET['cid'])) {
      die("Validation error"); // TODO better handling
    }
    $this->assign('cid', $_GET['cid']); 

    // compute civicrm membership url for links on membership periods tab    
    $membership_url = CRM_Utils_System::url('civicrm/contact/view/membership');
    $this->assign('membership_url', $membership_url);

    // get membership periods data for contact
    $data = CRM_Membershipperiods_BAO_MembershipPeriod::retrieve($_GET['cid']);        
    $this->assign('data', $data); 

    parent::run();
  }

}
