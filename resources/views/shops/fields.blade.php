<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::text('detail', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Location Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_location_id', 'Location Id:') !!}
    @if(!empty($shop))
    {!! Form::select('location_location_id',$locations, $shop->location_location_id, ['class' => 'form-control']) !!}
    @else
    {!! Form::select('location_location_id',$locations, null, ['class' => 'form-control']) !!}
    @endif

    {{-- <select name="location_location_id" class="form-control" id="location_location_id" >
        @foreach($locations as $location)
            <option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
        @endforeach
    </select> --}}
    {{-- {!! Form::number('location_location_id', null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('shops.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#location_location_id').select2();
    });
</script>
@endsection