<table class="table table-striped table-responsive">
  <thead class="thead-inverse">
    <tr>
      <th>Color</th>
      <th>Units Available</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($paint_colors as $paint_color)

      @if ($paint_color->units_available <= $paint_color->threshold)
        <tr>
            <th scope="row">
              {{ $paint_color->color }} | <span class="badge badge-danger">Inventory Low!</span>
            </th>
      @else
        <tr>
            <th scope="row">
              {{ $paint_color->color }}
            </th>
      @endif
        <td>{{ $paint_color->units_available }}</td>
          <td>
            <a class="btn btn-primary" href="/inventory/{{ $paint_color->id }}/edit">
                <i class="fa fa-edit"></i>
            </a>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>