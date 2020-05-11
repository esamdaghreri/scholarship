@if(count($errors) > 0)
    <div class="alert flex center-center">
        <ul class="danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif