@extends('auth.master')

@push('css')

@endpush

@push('title')
    Password Reset
@endpush

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h3 class="display-4">
            <a href="{{route('home')}}"><img alt="image" src="{{asset('assets/images/header1-logo.svg')}}"></a>
        </h3>
        <p class="text-muted mb-4">Enter an email to reset your password</p>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="form-inner mb-25">
                    <label for="email">Email*</label>
                    <div class="input-area">
                        <img src="{{asset('assets/images/icon/email-2.svg')}}" alt>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            
            <div class="col-lg-12">
                <div class="form-inner">
                    <button class="primry-btn-2" type="submit">Send Password Reset Link</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('js')
@endpush
