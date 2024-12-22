
<?php
/**
 * @var $data
 */
//dd($data);
?>

<ul>
    @foreach($data as $task)
        <li>
            {{$task->id}}
            {{$task->name}}
        </li>
    @endforeach
</ul>




