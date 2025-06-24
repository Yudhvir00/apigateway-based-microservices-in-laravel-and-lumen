<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - ShipAfrika</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #ffffff;
            color: #000000;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 300;
            line-height: 1.6;
            padding: 2rem 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 0 2rem;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo {
            width: 160px;
            height: auto;
            opacity: 0.9;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #000000;
            padding: 3rem 2rem;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 400;
            text-align: center;
            margin-bottom: 2rem;
            letter-spacing: 0.025em;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 400;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid #000000;
            background: #ffffff;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 300;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            background: #000000;
            color: #ffffff;
        }

        .form-input:focus::placeholder {
            color: #cccccc;
        }

        .form-button {
            width: 100%;
            padding: 1rem;
            background: #000000;
            color: #ffffff;
            border: 1px solid #000000;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 400;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-button:hover {
            background: #ffffff;
            color: #000000;
        }

        .form-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .form-links {
            text-align: center;
            margin-top: 2rem;
        }

        .form-links a {
            color: #000000;
            text-decoration: none;
            font-weight: 400;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s ease;
        }

        .form-links a:hover {
            border-bottom-color: #000000;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid #000000;
            background: #f8f8f8;
        }

        .alert-error {
            background: #ffebee;
            border-color: #f44336;
            color: #c62828;
        }

        .alert-success {
            background: #e8f5e8;
            border-color: #4caf50;
            color: #2e7d32;
        }

        .back-link {
            position: absolute;
            top: 2rem;
            left: 2rem;
            color: #000000;
            text-decoration: none;
            font-weight: 400;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s ease;
        }

        .back-link:hover {
            border-bottom-color: #000000;
        }

        .password-requirements {
            font-size: 0.8rem;
            color: #666;
            margin-top: 0.25rem;
            font-weight: 300;
        }

        @media (max-width: 640px) {
            .container {
                padding: 0 1.5rem;
            }
            
            .form-card {
                padding: 2rem 1.5rem;
            }
            
            .back-link {
                position: static;
                display: block;
                text-align: center;
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>
    <a href="{{ url('/') }}" class="back-link">← Back to Home</a>
    
    <div class="container">
        <div class="logo-section">
            <img src="{{ asset('img/logo.png') }}" alt="ShipAfrika" class="logo">
        </div>

        <div class="form-card">
            <h1 class="form-title">Create Account</h1>

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ url(config('roro.prefix', 'api/v1').'/register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        class="form-input" 
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        value="{{ old('email') }}"
                        placeholder="Enter your email address"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Create a password"
                        required
                    >
                    <div class="password-requirements">
                        Must be at least 8 characters long
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        class="form-input" 
                        placeholder="Confirm your password"
                        required
                    >
                </div>

                <button type="submit" class="form-button">
                    Create Account
                </button>
            </form>

            <div class="form-links">
                <a href="{{ url(config('roro.prefix', 'api/v1').'/login') }}">
                    Already have an account? Sign in here
                </a>
            </div>
        </div>
    </div>
</body>
</html>