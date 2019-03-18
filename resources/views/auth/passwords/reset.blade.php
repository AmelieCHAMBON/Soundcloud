@extends('layouts.app')

@section('content')


                    <form class="imp" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        
                        <h3>{{ __('Reset Password') }}</h3>

                        <input type="hidden" name="token" value="{{ $token }}">

                        
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        

                        
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                        
                    </form>

@endsection
