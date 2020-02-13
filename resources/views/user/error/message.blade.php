{{--for validation of  post--}}
@if(count($errors) > 0)
    <div class="alert danger flex center-center">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


{{--for success of post--}}
@if(session('success'))
    <div class="alert success">
        {{session('success')}}
    </div>
@endif

{{--for error of  /ad/--}}
@if(session('danger'))
    <div class="alert danger">
        {{session('danger')}}
    </div>
@endif