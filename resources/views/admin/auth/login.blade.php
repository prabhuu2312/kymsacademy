<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYMS Academy - Admin Login</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="KYMS Academy Admin Dashboard">
    <meta name="keywords" content="KYMS Academy, Admin, Dashboard">
    <meta name="author" content="KYMS Academy">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/KYMS.png') }}">

    <!-- Start Global Mandatory Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/stylecrm.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dist/css/responsive.css') }}" rel="stylesheet" type="text/css" />


    <!-- Additional CSS for login page -->
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f5f7fa;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }

    .login-container {
        background: #ffffff;
        border-radius: 12px;
        padding: 40px 35px;
        box-shadow: 0 10px 30px rgba(39, 60, 102, 0.08);
        border: 1px solid #eaeaea;
        width: 100%;
        max-width: 420px;
        position: relative;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: #273C66;
    }

    .logo-section {
        text-align: center;
        margin-bottom: 35px;
    }

    .logo-img {
        max-width: 180px;
        height: auto;
        margin-bottom: 15px;
    }

    .admin-text {
        color: #666;
        font-size: 16px;
        font-weight: 400;
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        background: #f9f9f9;
        border: 2px solid #eaeaea;
        border-radius: 8px;
        color: #333;
        font-size: 16px;
        padding: 14px 15px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form-control:focus {
        background: #ffffff;
        border-color: #273C66;
        box-shadow: 0 0 0 3px rgba(39, 60, 102, 0.2);
        outline: none;
    }

    .form-control::placeholder {
        color: #999;
    }

    .password-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #888;
        cursor: pointer;
        font-size: 16px;
        padding: 0;
        z-index: 2;
    }

    .error-message {
        background: #fff2f2;
        color: #d9534f;
        padding: 12px 15px;
        border-radius: 8px;
        border-left: 4px solid #d9534f;
        margin-bottom: 20px;
        font-size: 14px;
        display: none;
    }

    .error-message.show {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .success-message {
        background: #f0fff4;
        color: #28a745;
        padding: 20px 15px;
        border-radius: 8px;
        border-left: 4px solid #28a745;
        margin-bottom: 20px;
        font-size: 14px;
        display: none;
    }

    .success-message.show {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .security-notice {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eaeaea;
        color: #666;
        font-size: 12px;
    }

    .form-label {
        color: #273C66;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }



    /* Responsive Design */
    @media (max-width: 480px) {
        .login-container {
            padding: 30px 25px;
        }

        .logo-img {
            max-width: 150px;
        }
    }

    /* Loading animation */
    .btn-loading {
        position: relative;
        color: transparent !important;
    }

    .btn-loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-right-color: #ffffff;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
    </style>
</head>

<body>
    <!-- Login Container -->
    <div class="login-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('img/KYMS.png') }}" alt="KYMS Academy" class="logo-img">
            <div class="admin-text">Admin Dashboard Access</div>
        </div>

        <!-- Error Message (hidden by default) -->
        <div class="error-message @if($errors->any()) show @endif" id="errorMessage">
            <i class="fas fa-exclamation-circle"></i>
            @if($errors->any())
            {{ $errors->first() }}
            @else
            Invalid username or password.
            @endif
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}" id=" loginForm">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter administrator username"
                    class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Enter your secure password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Using your exact button structure -->
            <div class="it-course-button text-center">
                <button type="submit" name="submit" class="it-btn-yellow theme-bg" id="loginBtn">
                    <span>
                        <span class="text-1">Access Dashboard</span>
                        <span class="text-2">Access Dashboard</span>
                    </span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>

        <!-- Security Notice -->
        <div class="security-notice">
            <p><i class="fas fa-shield-alt"></i> Secure Admin Access • Authorized Personnel Only</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
    // Password visibility toggle
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.className = 'far fa-eye-slash';
        } else {
            passwordInput.type = 'password';
            icon.className = 'far fa-eye';
        }
    });

    // Form submission handling
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const btn = document.getElementById('loginBtn');
        const errorMsg = document.getElementById('errorMessage');

        // Show loading state
        btn.classList.add('btn-loading');
        btn.disabled = true;

        // Hide error message when form is submitted
        errorMsg.classList.remove('show');

    });

    // If your button classes don't work, add some basic styling
    $(document).ready(function() {
        // Ensure button styling is applied
        $('.it-btn-yellow').css({
            'display': 'inline-block',
            'background': '#273C66',
            'border': 'none',
            'border-radius': '8px',
            'color': '#ffffff',
            'font-size': '16px',
            'font-weight': '600',
            'padding': '15px 30px',
            'width': '100%',
            'cursor': 'pointer',
            'transition': 'all 0.3s ease',
            'margin-top': '10px',
            'text-align': 'center',
            'text-decoration': 'none',
            'position': 'relative',
            'overflow': 'hidden'
        });

        $('.it-btn-yellow').hover(function() {
            $(this).css({
                'background': '#1a2a4a',
                'transform': 'translateY(-2px)',
                'box-shadow': '0 8px 20px rgba(39, 60, 102, 0.3)'
            });
        }, function() {
            $(this).css({
                'background': '#273C66',
                'transform': 'translateY(0)',
                'box-shadow': 'none'
            });
        });

        // Show error message if there's an error parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            const errorMsg = document.getElementById('errorMessage');
            errorMsg.classList.add('show');
        }
    });
    </script>
</body>

</html>