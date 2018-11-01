<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->    
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <!-- New Task Form -->
        {!! Form::open(['action' => 'TaskController@store', 'class' => 'form-horizontal']) !!}        
            <!-- Task Name -->
            <div class="form-group">
                {!! Form::label('task', trans('message.task'), ['class' => 'col-sm-3 control-label']) !!}                
                <div class="col-sm-6">
                    {!! Form::text('name', $value = null, ['id' => 'task-name', 'class' => 'form-control']) !!}                                        
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('descript', trans('message.descript'), ['class' => 'col-sm-3 control-label']) !!}                
                <div class="col-sm-6">
                    {!! Form::text('descript', $value = null, ['id' => 'descript-descript', 'class' => 'form-control']) !!}                                        
                </div>
            </div>
           <!--  Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">                    
                    {!! Form::submit(trans('message.add_task'), ['class' => 'btn btn-primary']) !!}
            </div>             
        {!! Form::close() !!}
    </div>
    <!-- TODO: Current Tasks -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
        
    @if (count($tasks))
        <div class="panel panel-default">
            <div>
                {!! Form::label('c_task', trans('message.current_task'), ['class' => 'panel-heading']) !!}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table" border="2">
                    <!-- Table Headings -->

                    <thead>
                        <th>{!! trans('message.task') !!}</th>
                        
                        <th>{!! trans('message.descript') !!}</th>
                        
                        <th>{!! trans('message.delete') !!}</th>
                      
                        <th>{!! trans('message.edit') !!}</th>
                       
                    </thead>
                    
                    
                    
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                    <!-- <div>{{ $task->descript }}</div> -->
                                </td>

                                <td class="table-text">
                                    <!-- <div>{{ $task->name }}</div> -->
                                    <div>{{ $task->descript }}</div>
                                </td>

                                <td>
                                    <!-- TODO: Delete Button -->                                    
                                    {!! Form::open(['action' => ['TaskController@destroy', $task->id], 'method' => 'delete']) !!}    
                                    {!! Form::token() !!}                                   
                                    {!! Form::submit(trans('message.delete'), ['class' => 'btn btn-xs btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Html::linkAction('TaskController@edit', trans('message.edit'), ['id' => $task->id], ['class' => 'btn btn-success']) !!}
                                </td>
                            </td>                                                                
                            </tr>

                        @endforeach
                        
                    </tbody>
                </table>
                {!! $tasks->links() !!}
            </div>
        </div>
    @endif

@endsection

