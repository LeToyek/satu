@if ($status == 'on_going')
    <td><span class="badge bg-primary">On Going</span></td>
@elseif ($status == 'repaid')
    <td><span class="badge bg-info">Waiting for return</span></td>
@elseif ($status == 'on_sell')
    <td><span class="badge bg-warning">On Sell</span></td>
@elseif ($status == 'unclaimed')
    <td><span class="badge bg-secondary">Unclaimed</span></td>
@elseif ($status == 'failed')
    <td><span class="badge bg-danger">Return Distribution</span></td>
@endif
