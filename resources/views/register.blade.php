<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Branch</title>

<!-- Bootstrap 5 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>
  :root{
    --topbar: #2c3947;
    --page-bg: #eef0f2;
    --card-border: #e2e5e9;
    --label-color: #4a5568;
    --accent: #3f7edb;
    --placeholder: #a9b1bb;
  }

  * { box-sizing: border-box; }

  body{
    background: var(--page-bg);
    font-family: 'Segoe UI', Roboto, Arial, sans-serif;
    min-height: 100vh;
    margin: 0;
  }

  .topbar{
    background: var(--topbar);
    height: 64px;
    display: flex;
    align-items: center;
    padding: 0 24px;
  }
  .topbar .brand{
    color: #fff;
    font-weight: 600;
    letter-spacing: .5px;
    font-size: 1.05rem;
  }
  .topbar .brand i{ margin-right: 10px; color: var(--accent); }

  .page-heading{
    max-width: 640px;
    margin: 32px auto 0 auto;
    padding: 0 16px;
  }
  .page-heading h4{
    color: #2c3947;
    font-weight: 700;
    letter-spacing: .5px;
    margin: 0;
  }

  .card-wrap{
    max-width: 640px;
    margin: 16px auto 60px auto;
    padding: 0 16px;
  }

  .register-card{
    background: #fff;
    border: 1px solid var(--card-border);
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    padding: 32px 32px 36px 32px;
  }

  .section-title{
    color: #2c3947;
    font-weight: 700;
    font-size: .95rem;
    letter-spacing: .5px;
    margin-bottom: 4px;
  }
  .section-divider{
    border: none;
    border-top: 1px solid var(--card-border);
    margin: 10px 0 26px 0;
  }

  .form-label{
    color: var(--label-color);
    font-weight: 600;
    font-size: .9rem;
    margin-bottom: 6px;
  }

  .form-control{
    border: none;
    border-bottom: 1px solid #d7dbe0;
    border-radius: 0;
    padding: 8px 2px;
    font-size: .95rem;
    background: transparent;
  }
  .form-control::placeholder{ color: var(--placeholder); }
  .form-control:focus{
    box-shadow: none;
    border-bottom: 2px solid var(--accent);
  }

  .password-wrap{ position: relative; }
  .password-wrap i{
    position: absolute;
    right: 4px;
    top: 10px;
    color: var(--placeholder);
    cursor: pointer;
  }

  .btn-register{
    background: var(--accent);
    color: #fff;
    font-weight: 600;
    letter-spacing: .5px;
    padding: 10px 32px;
    border-radius: 4px;
    border: none;
  }
  .btn-register:hover{
    background: #326bc0;
    color: #fff;
  }

  .login-link{
    font-size: .9rem;
    color: var(--label-color);
  }
  .login-link a{
    color: var(--accent);
    text-decoration: none;
    font-weight: 600;
  }
  .login-link a:hover{ text-decoration: underline; }

  .field-row{ margin-bottom: 24px; }
</style>
</head>
<body>

  <!-- Top bar -->
  <div class="topbar">
    <span class="brand"><i class="fa-solid fa-layer-group"></i>BranchMS</span>
  </div>

  <!-- Page heading -->
  <div class="page-heading">
    <h4>REGISTER BRANCH</h4>
  </div>

  <!-- Register card -->
  <div class="card-wrap">
    <div class="register-card">

      <div class="section-title">BRANCH INFO</div>
      <hr class="section-divider">

      <!-- Display Laravel Validation Errors -->
      @if ($errors->any())
        <div class="alert alert-danger mb-4">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Direct Laravel POST Form -->
      <form action="{{ route('registersave') }}" method="POST">
        @csrf

        <div class="row field-row">
          <div class="col-md-6">
            <label class="form-label" for="branchName">Branch Name</label>
            <input type="text" class="form-control" id="branchName" name="branch_name" value="{{ old('branch_name') }}" placeholder="Enter branch name" required>
          </div>

          <div class="col-md-6">
            <label class="form-label" for="inchargeName">Branch Incharge Name</label>
            <input type="text" class="form-control" id="inchargeName" name="branch_incharge_name" value="{{ old('branch_incharge_name') }}" placeholder="Enter incharge's full name" required>
          </div>
        </div>

        <div class="row field-row">
          <div class="col-md-6">
            <label class="form-label" for="password">Password</label>
            <div class="password-wrap">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
              <i class="fa-regular fa-eye" id="togglePassword"></i>
            </div>
          </div>

          <div class="col-md-6">
            <label class="form-label" for="confirmPassword">Confirm Password</label>
            <div class="password-wrap">
              <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" placeholder="Re-enter password" required>
              <i class="fa-regular fa-eye" id="toggleConfirmPassword"></i>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
          <button type="submit" class="btn btn-register">REGISTER</button>
          <span class="login-link">Already registered? <a href="{{ route('login') }}">Login here</a></span>
        </div>

      </form>

    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
  // Sirf Eye Icon Toggle karne ke liye chota sa JS (Form submission se iska koi lena dena nahi)
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  togglePassword.addEventListener('click', () => {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    togglePassword.classList.toggle('fa-eye');
    togglePassword.classList.toggle('fa-eye-slash');
  });

  const toggleConfirm = document.getElementById('toggleConfirmPassword');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  toggleConfirm.addEventListener('click', () => {
    const isPassword = confirmPasswordInput.type === 'password';
    confirmPasswordInput.type = isPassword ? 'text' : 'password';
    toggleConfirm.classList.toggle('fa-eye');
    toggleConfirm.classList.toggle('fa-eye-slash');
  });
</script>

</body>
</html>

</body>
</html>