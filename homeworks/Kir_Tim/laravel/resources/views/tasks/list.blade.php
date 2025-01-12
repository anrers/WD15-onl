<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>

    @foreach($data as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->name}}</td>
        </tr>
@endforeach
