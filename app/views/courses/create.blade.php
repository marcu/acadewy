@extends('layouts.default')

@section('content')
   <div class="container row">
      <div class="col-md-4 col-md-offset-4">
         <h1>Add a new course</h1>
         
         {{ Form::open(['route' => 'courses.store']) }}

         <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{ $errors->first('title', '<span class="error">:message</span>') }}
         </div>

         <div class="form-group">
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) }}
            {{ $errors->first('description', '<span class="error">:message</span>') }}
         </div>

         <div class="form-group">
            {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
         </div>
         
         {{ Form::close() }}
      </div>
   </div>
@stop