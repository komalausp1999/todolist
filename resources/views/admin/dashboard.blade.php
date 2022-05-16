@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin-Dashboard') }}</div><br>

<!--                 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif -->

                    <h3>Welcome Admin</h3><br>
                    <div class="container-fluid py-6">
                        
                    <table class="table">
  <thead class="thead-primary">
    <tr>
       
      <!-- <th scope="col">No.</th> -->
      <th scope="col">Registered Users</th>
      <th scope="col">Todo-list</th>
      <th scope="col">Status</th>
     
    </tr>
  </thead>
  <tbody>
       @foreach($users as $items)
    <tr>
   
      <!-- <th scope="row">1</th> -->
      <td>{{$items->name}}</td>
      <td>{{$items->title}}</td>
      <td>{{$items->status=='1'?'Completed':'Pending'}}</td>
    
    </tr>
    @endforeach
  </tbody>
</table>



        </div>
    </div>
</div>
@endsection
