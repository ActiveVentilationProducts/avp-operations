<table class="table table-striped table-responsive">
  <thead class="thead-inverse">
    <tr>
      <th>Box Dim</th>
      <th>#&nbspPer&nbspUnit</th>
      <th>Units</th>
      <th>Total</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($boxes as $box)
      <tr>
        <th scope="row">{{ $box->dimensions }}</th>
        <td>{{ $box->number_per_unit }}</td>
        <td>{{ $box->units }}</td>
        <td>{{ $box->total_count }}</td>
        <td><button class="btn btn-primary"><i class="fa fa-edit"></i></button></td>
      </tr>
    @endforeach
  </tbody>
</table>
<p>
  <img style="max-width: 300px;" class="img img-responsive center-block" src="http://www.mcapostolic.org/A%20Test%20Filel/Under-Construction-Vector-PNG-03700-918x1024.png" alt="">
</p>