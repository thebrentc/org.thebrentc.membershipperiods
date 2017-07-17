# org.thebrentc.membershipperiods
Membership periods extension for CiviCRM

Note: This is an undeveloped extension work-in-progress, not recommended for general use.

Aim:
Extend the CiviCRM membership component so that when a membership is created or renewed a record for the membership “period” is recorded. A Membership Period tab on the contact view should show membership period records for the contact.

The extension adds a membership period record for any membership change including creation, updating and renewing.

Installation:
Use the normal CiviCRM installation method by visiting civicrm/admin/extensions.
Currently, the extension will not populate membership periods from pre-existing memberships when installed.

TODO: The membership period should be connected to a contribution record if a payment is taken for this membership or renewal.
TODO: Create a CiviCRM-compatible API for this entity
TODO: Tests



