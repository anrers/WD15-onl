<ul>
    @foreach($data as $subtask)
        <li>{{$subtask->id}} {{$subtask->name}}</li>
    @endforeach
</ul>
