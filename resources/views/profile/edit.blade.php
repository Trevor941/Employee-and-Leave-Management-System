@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
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
            <div class="col-md-4">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Profile Picture</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
        <div class="col-md-12 text-center">
        <div id="upload-demo"></div>
        </div>
        <div class="offset-md-2 col-md-8">
        {{-- <strong>Select image to crop:</strong> --}}
        <input type="file" id="image">

        <button class="btn btn-primary btn-block upload-image" style="margin-top:2%;">Upload Image</button>
        </div>

        <div class="col-md-12">
        <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;display:none;"></div>
        </div>
      </div>
                    </div>
                </div>
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                            {{-- <div id="preview-crop-image"></div> --}}
                                <img class="avatar border-gray" src="upload/{{auth()->user()->profilepic}}" alt="...">

                                <h5 class="title">{{ __(auth()->user()->name)}}</h5>
                            </a>
                            <p class="description">
                            {{ __(auth()->user()->position)}}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{ __('I like the way you work it') }}
                            <br> {{ __('No diggity') }}
                            <br> {{ __('I wanna bag it up') }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                    <h5>4
                                        <br>
                                        <small>Leave Status</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>3
                                        <br>
                                        <small>Attendance</small>
                                    </h5>
                                </div>
                                <div class="col-lg-3 mr-auto">
                                    <h5>15
                                        <br>
                                        <small>Leave Days</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-8 text-center">
                <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit My Profile'</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Cellphone Number</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{auth()->user()->phone}}" required>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Position</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="position" class="form-control" placeholder="Job Description" value="{{auth()->user()->position}}" required>
                                    </div>
                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Date of Birth</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="date" name="DOB" class="form-control" value="{{auth()->user()->DOB}}" required>
                                    </div>
                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Gender</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control" name="gender_id">
                                        @foreach ($genders as $gender )
                                            <option value="{{$gender->id}}"
                                            @if(auth()->user()->gender_id === $gender->id)
                                            selected
                                            @endif
                                            >{{$gender->name}}</option>
                                             @endforeach
                                            </select>
                                       
                                    </div>
                                    @if ($errors->has('position'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Marital Status</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control" name="marital_status_id">
                                        @foreach ($maritalStatus as $status)
                                            <option value="{{$status->id}}"
                                            @if(auth()->user()->marital_status_id === $status->id)
                                              selected
                                            @endif
                                            >{{$status->status}}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Department</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                       <select class="form-control" name="department_id">
                                       @foreach ($departments as $department)
                                            <option value="{{$department->id}}"
                                            @if(auth()->user()->department_id === $department->id)
                                                 selected
                                            @endif
                                            >{{$department->name}}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="upload-image btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class=" btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
<script type="text/javascript">

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-image').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      url: "{{route('profilepic.update')}}",
      type: "PUT",
      data: {"image":img},
       _token: '{{csrf_token()}}',
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
        $("#profile-image").attr('src', img);
     //
      }
    });
  });
});


</script>


@endsection