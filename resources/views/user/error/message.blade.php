{{--for validation of  post--}}
@if(count($errors) > 0)
    <div class="alert danger flex just-cont-center al-items-center">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


{{--for success of post--}}
@if(session('success'))
    <div class="alert success flex just-cont-center al-items-center">
        {{session('success')}}
    </div>
@endif

{{--for error of  /ad/--}}
@if(session('danger'))
    <div class="alert danger flex just-cont-center al-items-center">
        {{session('danger')}}
    </div>
@endif