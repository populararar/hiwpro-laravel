<!-- Event Id Field -->
@if(empty($eventShop->event->event_id))
<div class="form-group col-sm-6">
    {!! Form::label('event_id', 'Event Id:') !!}
    {!!Form::select('event_id',$events, null, ['class' => 'form-control select2 event_id']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::label('event_id', 'Event Id:') !!}
    {!!Form::select('event_id',$events, $eventShop->event->event_id, ['class' => 'form-control select2 event_id']) !!}
</div>
@endif

<!-- Shop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shop_id', 'Shop Id:') !!}
    {!!Form::select('shop_id',['' => ''], null, ['class' => 'form-control shop_id select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('eventshops.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {
        $('.select2').select2();
    });

    $(".event_id").change(function () {
        var val = $(".event_id").val()
        $.ajax({
            headers: { '_token': $('input[name="_token"]').val() },
            method: 'GET',
            url: "{{ route('eventshops.index')  }}/getshop/"+val,
            success: function (d) {
                console.log(d)
                $('.shop_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option></option>')
                    .val('')

                d.forEach(element => {
                    $('.shop_id')
                        .append($("<option></option>")
                            .attr("value", element.shop_id)
                            .text(element.name + ' - ' + element.location.branch));
                });
            }, error: function (e) { console.error(e) }
        })
    });


    // $(function () {
    //     $('.date-picker').datetimepicker({
    //        // format: 'YYYY-MM-DD HH:mm:ss'
    //         format: 'YYYY-MM-DD'
    //     });
    // });
    init()
    function init() {
        var val = $(".event_id").val()
        $.ajax({
            headers: { '_token': $('input[name="_token"]').val() },
            method: 'GET',
            url: '{{ route('eventshops.index')  }}/getshop/'+val,
            success: function (d) {
                console.log(d)
                $('.shop_id')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option></option>')
                    .val('')

                d.forEach(element => {
                    $('.shop_id')
                        .append($("<option></option>")
                            .attr("value", element.shop_id)
                            .text(element.name + ' - ' + element.location.branch));
                });
            }, error: function (e) { console.error(e) }
        })
    }
</script>
@endsection