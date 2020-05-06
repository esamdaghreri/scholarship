{{--for success of--}}
@if(session('success'))
    <div class="alert success flex just-cont-center al-items-center">
        {{session('success')}}
    </div>
@endif

{{--for error--}}
@if(session('danger'))
    <div class="alert danger flex just-cont-center al-items-center">
        {{session('danger')}}
    </div>
@endif