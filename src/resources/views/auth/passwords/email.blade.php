@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="Employee_id" class="col-form-label">{{ __('Employee ID') }}</label>

                            <div class="col-md-8">
                                <input id="Employee_id" type="text"
                                    class="form-control @error('Employee_id') is-invalid @enderror" name="Employee_id"
                                    value="{{ old('Employee_id') }}" required autofocus>

                                @error('Employee_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">
                            <div class="col-md-8">
                                <a class="btn btn-link" href="{{ route('login') }}">{{ __('Back to Login') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection