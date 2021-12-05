@extends('layouts.admin')
@section('content')
@include('partials.messages')
    <div class="container">
        <div>
            <h1>Profile</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
        
                <div class="card mx-4">
                    <div class="card-body p-4">
        
                        <form method="POST" action="{{ route('admin.profile.password') }}">
                            {{ csrf_field() }}
                            <h4>Change Password</h4>
        
                            <div class="input-group mb-3 mt-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock fa-fw"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" value="{{ old('password', null) }}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
        
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock fa-fw"></i>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('global.login_password_confirmation') }}" value="{{ old('password_confirmation', null) }}">
                            </div>
        
                            <button class="btn btn-block btn-primary">
                                Save
                            </button>
                        </form>
        
                    </div>
                </div>
        
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@parent
<script>

</script>
@endsection