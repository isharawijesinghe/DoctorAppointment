@foreach($DoctorDetails as $key=>$value)

<a href="">
    <div class="row w3-card" style="width:70%">
        <header class="w3-container w3-light-grey">
            <h3>Dr {{$DoctorDetails[$key]->first_name }} {{$DoctorDetails[$key]->last_name}}</h3>
        </header>
        <div class="row">
            <div class="col-md-3">
            <img src="/uploads/avatar/{{$DoctorDetails[$key]->avatar}}"   alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
            </div>
            <div class="col-md-9">
                <h4>Available In
                    @if(empty($EventDetails[$key]->start_time))
                        Unavailable
                        @else
                        {{$EventDetails[$key]->start_time}}
                        @endif
                    </h4>
            </div>
            <div class="col-md-9">
            <h4>Specialist In {{$FurtherDetails[$key]->field}}</h4>
            </div>
        </div>
        <button class="w3-button w3-block w3-dark-grey">+ Connect</button>
    </div>
</a>
@endforeach