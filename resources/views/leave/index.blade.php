@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'leaves'
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
                    @if (count($leaveapps) >0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class=" text-primary">
                                 <th>
                                        Employee Name
                                    </th>
                                    <th>
                                        Starting Date
                                    </th>
                                    <th>
                                        Ending Date
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        State
                                    </th>
                                    <th>
                                    Action
                                    </th>
                                </thead>
                                @foreach ($leaveapps as $app )
                                <tbody>
                                    <tr>
                                   <td>{{$app->user->name}}</td>
                                    <td>{{$app->StartingDate}}</td>
                                    <td>{{$app->EndingDate}}</td>
                                    <td>
                                    @if($app->leaveStatus->id === 1)
                                    <span class="text-warning">{{$app->leaveStatus->name}}</span>
                                    @elseif($app->leaveStatus->id === 2)
                                    <span class="text-success">{{$app->leaveStatus->name}}</span>
                                    @else
                                    <span class="text-danger">{{$app->leaveStatus->name}}</span>
                                    @endif
                                    </td> 
                                     <td>
                                     {{-- @if($app->leaveState->id === 1)
                                     <span class="text-success">{{$app->leaveState->name}}</span>
                                     @else
                                     <span class="text-warning">{{$app->leaveState->name}}</span>
                                     @endif --}}
                                     @if( now() >= $app->StartingDate && now() <= $app->EndingDate && $app->leaveStatus->id === 2)
                                     <span class="text-success">Active</span>
                                     @else
                                     <span class="text-warning">Inactive</span>
                                     @endif
                                     </td>
                                    
                                    <td>
                                    <form action ="{{route('leaves.update', $app->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                    <div class="col-md-12">
                                    <select class="form-control" name="leave_statuses_id">
                                    <ul>
                                    @foreach ($Statuses as $status)
                                        <li>
                                        <option value="{{$status->id}}"
                                        @if($status->id === $app->leaveStatus->id )
                                        selected
                                        @endif
                                        >
                                        {{$status->name}}
                                        </option>
                                        </li>
                                    @endforeach
                                    </ul>
                                    </select>
                                    <button type="submit" class="btn my-1 btn-block btn-success">Action</button>
                                    </div>
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
