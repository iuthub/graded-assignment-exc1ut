@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="myDIV" class="header">
                <h2 style="margin:5px">My To Do List</h2>
                <form action="/task" method="post">
                    @csrf
                    <input type="text" id="myInput" name="title" placeholder="Title...">
                    <input type="submit" class="addBtn" value="Add">
                </form>
                
              </div>
              
              <ul id="myUL">
                  @foreach ($data as $task)
                        <li>{{$task->title}} 
                            <form action="/task/{{$task->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="edit" value="delete">
                            </form>
                            <form action="/task/{{$task->id}}/edit" method="get">
                                @csrf
                                <input type="submit" class="close" value="edit">
                            </form>
                        </li>
                  @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>
@endsection
