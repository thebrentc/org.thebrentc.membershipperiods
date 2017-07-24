# org.thebrentc.membershipperiods
Membership periods extension for CiviCRM

Note: This is an undeveloped extension work-in-progress, not recommended for general use.

Aim:<br/>
Extend the CiviCRM membership component so that when a membership is created or renewed a record for the membership “period” is recorded. A Membership Period tab on the contact view should show membership period records for the contact.<br/>
<br/>
The extension adds a membership period record for any membership change including creation, updating and renewing.<br/>
<br/>
Installation:<br/>
Use the normal CiviCRM installation method by visiting civicrm/admin/extensions.<br/>
Currently, the extension will not populate membership periods from pre-existing memberships when installed.<br/>
<br/>
TODO: Refresh the membership periods tab/pane automatically when memberships are changed<br/>
TODO: The membership period should be connected to a contribution record if a payment is taken for this membership or renewal<br/>
TODO: Create a CiviCRM-compatible API for this entity<br/>
TODO: Tests (TODO Install development/testing architecture successfully)<br/>
<br/>
Details:<br/>
The structure follows CiviCRM architecture:<br/>
The main controller (./membershipperiods.php):<br/>
(a) Adds the Membership Periods tab<br/>
(b) Adds post-processing to membership updates to create linked membership period records<br/>
The Membership Periods tab is template-defined in ./templates/CRM/Membershipperiods/Page. It's controller in ./CRM/Page handles data preparation and passing.<br/>
The Membership Periods data entity (BAO and DAO) are in ./CRM/Membershipperiods respective folders.<br/>
