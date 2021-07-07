@if(session('success'))
    <div class="alert alert_success mt-5">
        <strong class="uppercase">Notification: </strong>
        {{session('success')}}
        <button type="button" class="dismiss la la-times" data-dismiss="alert"></button>
    </div>
@endif
