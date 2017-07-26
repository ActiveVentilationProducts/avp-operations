@extends('layouts.app')

@section('content')

<div class="container-fluid inventory-content">
  <h2>Inventory</h2>
  <p>See levels of product at a glance.  Reduce or add product counts.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#paint">Paint</a></li>
    <li><a data-toggle="tab" href="#boxes">Boxes</a></li>
  </ul>


  <div id="inventory-tabs" class="tab-content">
    <div id="paint" class="tab-pane fade in active">
      <h3>Paint</h3>
      @include('inventory.tabs.paint')
    </div>
    <div id="boxes" class="tab-pane fade">
      <h3>Boxes</h3>
      @include('inventory.tabs.boxes')
    </div>
  </div>

</div>


@endsection

@section('custom-scripts')
<script>



</script>
@endsection