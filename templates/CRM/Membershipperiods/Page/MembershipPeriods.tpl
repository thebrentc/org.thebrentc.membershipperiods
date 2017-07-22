<h3>Membership periods</h3>

<div class="help">
Please refresh after updating memberships.
</div>

<table>
<tr><th>&nbsp;</th><th>Start date</th><th>End date</th><th>&nbsp;</th></tr>
{foreach name=data item=row from=$data}
  <tr>
    <td>{$row.id}</td>
    <td>{$row.start_date}</td>
    <td>{$row.end_date}</td>
    <td>
      <a href="{crmURL p="civicrm/contact/view/membership"}?action=view&context=membership&selectedChild=member&cid={$row.contact_id}&id={$row.membership_id}" class = "crm-popup">
        View Membership
      </a>
    </td>
  </tr>
{/foreach}
</table>
