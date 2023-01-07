@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2 mt-3">
                <div class="mb-6 mt-6">
                    {{ __('general.forgot_password_description') }}
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                    <div>
                        <label>{{ __('general.email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary">
                            {{ __('general.email_password_reset_link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
