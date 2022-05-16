@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        <meta name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>
  
         <div class="container">
            <section id="data_section" class="todo">
                <ul class="todo-controls">
                    <li><h3><button class="btn btn-outline bg-info" width="25px" onclick="show_form('add_task')" >Add Task</button></h3></li>
                </ul>
                <ul id="task_list" class="todo-list">
                    @foreach($todos as $todo)
                        <!-- @if($todo->status) -->
                            <li id="{{$todo->id}}" class="done">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
</svg>
                                <a href="#" class="toggle"></a>
                                <span id="span_{{$todo->id}}">{{$todo->title}}</span>
                                <!-- <a href="#" onclick="edit_task('{{$todo->id}}','{{$todo->title}}')" class="icon-edit">Edit</a> -->
                                <a href="#"  onclick="delete_task('{{$todo->id}}')" class="icon-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></i></a>
                            </li>
                         @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
  <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
</svg>             

    
       <!--before status is 1 this else part is shown with the task_done function -->
                        <a href="#" class="toggle"></a>
                                <a href="#" onclick="task_done('{{$todo->id}}')" class="icon-done">Done</a>
                                <span id="span_{{$todo->id}}">{{$todo->title}}</span>
                                <a href="#" onclick="edit_task('{{$todo->id}}','{{$todo->title}}')" class="icon-edit">Edit</a> 
                                 <a href="#"  onclick="delete_task('{{$todo->id}}')" class="icon-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></i></a>
                             </li>  
                        @endif
                    @endforeach
                </ul>
            </section>
            <section id="form_section" >
                <form id="add_task" class="todo" style="display: none;">
                    <input id="task_title" type="text" name="title" placeholder="Enter a task name" value="" />
                    <button  class="btn btn-outline bg-info" name="submit">Add Task</button>
                </form>
                <!-- <form id="edit_task" class="todo" style="display: none;">
                    <input type="hidden" id="edit_task_id" value="">
                    <input id="edit_task_title" type="text" name="title" placeholder="Enter a task name" value="" />
                    <button name="submit">Edit Task</button>
                </form> -->
            </section>
        </div>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script>
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
        </script>
        <script src="{{url('assets/js/todo.js')}}"></script>
        @endsection
    </body>
</html>