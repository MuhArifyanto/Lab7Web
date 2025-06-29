<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    #login-wrapper {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 300px;
    }

    h1 {
      margin-bottom: 20px;
      font-size: 24px;
      text-align: center;
    }

    .form-label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-control {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .btn {
      width: 100%;
      padding: 10px;
      border: none;
      background: #666;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn:hover {
      background: #555;
    }

    .alert {
      color: #721c24;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <div id="login-wrapper">
    <h1>Sign In</h1>

    <?php if (session()->getFlashdata('flash_msg')): ?>
      <div class="alert"><?= session()->getFlashdata('flash_msg') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('user/login') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="InputForEmail" class="form-label">Email address</label>
        <input
          type="email"
          name="email"
          class="form-control"
          id="InputForEmail"
          value="<?= esc(set_value('email')) ?>"
          required
          autofocus
        >
      </div>

      <div class="mb-3">
        <label for="InputForPassword" class="form-label">Password</label>
        <input
          type="password"
          name="password"
          class="form-control"
          id="InputForPassword"
          autocomplete="off"
          required
        >
      </div>

      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>
</html>
