@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'allemployees'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            <div class=" col-md-12 text-center">
                    <div class="card">
                    @if (count($users) >0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Gender
                                    </th>
                                    <th>
                                        Marital Status
                                    </th>
                                    <th>
                                        Department
                                    </th>
                                    <th class="text-right">
                                        Phone
                                    </th>
                                    <th class="text-right">
                                        Position
                                    </th>
                                    <th class="text-right">
                                        Action
                                    </th>
                                    
                                </thead>
                                @foreach ($users as $user )
                                <tbody>
                                    <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->gender->name}}</td>
                                    <td>{{$user->maritalStatus->status}}</td>
                                    <td>{{$user->department->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->position}}</td>
                                    <td>
                                    <a href="user/{{$user->id}}/edit" class=" btn btn-sm btn-info">Edit</a>
                                    </td>
                                    <td>
                                    <form action ="/user/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                </div> 
                @else
                <p>No Employees found</p>  
                    @endif
                         
          </div>
    </div>
    
@endsection
<script type="text/javascript">
    $(function() {
    $('.datetimepicker').datepicker();
    });
</script> 