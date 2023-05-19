@if ($status == 'funding_open')
    <td><span class="badge bg-info">Active</span></td>
@elseif ($status == 'funding_close')
    <td><span class="badge bg-danger">Closed</span></td>
@elseif ($status == 'waiting_for_disbursement')
    <td><span class="badge bg-warning">Waiting for disbursement</span></td>
@elseif ($status == 'on_going')
    <td><span class="badge bg-primary">On Going</span></td>
@elseif ($status == 'waiting_for_return')
    <td><span class="badge bg-warning">Waiting for return</span></td>
@elseif ($status == 'return_distribution')
    <td><span class="badge bg-info">Return Distribution</span></td>
@elseif ($status == 'finished')
    <td><span class="badge bg-success">Completed</span></td>
@endif
