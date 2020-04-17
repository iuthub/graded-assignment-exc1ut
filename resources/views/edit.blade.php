@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="myDIV" class="header">
                <h2 style="margin:5px">Enter name</h2>
                <form action="/task/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" value={{$task->title}} id="myInput" name="title" placeholder="Title...">
                    <input type="submit" class="addBtn" value="save">
                </form>
                
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
