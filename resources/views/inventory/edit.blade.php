@extends('layouts.app')

@section('content')

<div class="container-fluid inventory-content inventory-edit">

	<h2>Update Inventory Item: Paint ({{ $single_paint->color }})</h2>
	<p>update current product count</p>
	<hr>

	<form method="POST" action="/inventory/{{ $single_paint->id }}">
	  {{ csrf_field() }}
	  {{ method_field('PUT') }}
	  <div class="form-group row">
	  	<div class="col-sm-8 col-sm-offset-2">
	    	<label for="exampleInputEmail1">Units Available</label>
	    	<br>
	    	<input type="text" name="units_available" class="form-control" value="{{ $single_paint->units_available }}">
	    	<small class="form-text text-muted">Management will be notified immediately when stock gets too low.</small><br>
	    	<button type="submit" class="btn btn-primary">Submit</button>
	    </div>
	  </div>
	</form>

</div>

@endsection

@section('custom-scripts')
<script>



</script>
@endsection