@extends('layouts.app')
 
@section('content')
 
<div class="container">  

    <div class="row justify-content-center">
      @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}"> 
    {!! session('message.content') !!}
    </div>
      @endif        
    <div class="col-md-12">
        <table class="table table-striped table" id="users">	
            <thead>	
                <tr>	
                 <th>Name</th>
                 <th>Email</th>
                 <th>Options</th>  
                </tr>
            </thead>     
              <tbody>
                @foreach( $users as $user)
               <tr>
                <td>{{$user->name}}</td>
                <td>{{ $user->email }}</td>  
                <td>                       
                 <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                 <a href="{{route('users.destroy', $user->id)}}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>
                </td>
               </tr>
                  @endforeach
      		  </tbody>
            </table>
    </div>
    </div>
</div>

@endsection

    