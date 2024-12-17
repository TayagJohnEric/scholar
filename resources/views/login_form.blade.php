<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Admin Login</title>
  <style>

body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.login-container {
  background: #ffffff;
  padding: 40px; /* Increased padding for more height */
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  width: 350px; /* Increased width for balance */
  text-align: center;
}

h2 {
  margin-bottom: 30px; /* More space below the heading */
  color: #333;
}

.input-group {
  margin-bottom: 20px;
  text-align: left;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #bbbbbb;
}

input {
  width: 100%;
  padding: 12px; /* Slightly larger input fields */
  border: 1px solid #f2f2f2;
  border-radius: 10px;
  box-sizing: border-box;
  font-size: 16px; /* Larger text */
  background: rgb(250, 250, 250);
}

input:focus {
  outline: none;
  border-color: #007bff;
}

input::placeholder {
  color: rgb(168, 168, 168);
  opacity: 1; /* Ensures color is fully visible */
}

.login-btn {
  background: #007bff;
  color: #fff;
  border: none;
  padding: 15px;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  font-size: 16px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.login-btn:hover {
  background: #0056b3;
  transform: scale(1.05);
}


  </style>
</head>
<body>
  <div class="login-container">
    <a href="{{ route('landingpage') }}" method="get">
      <img class="logo" src="{{ asset('images/logo.png') }}" alt="Scholar Logo" style="width: 70px; height: auto; max-height: 85px;">
      </a>
    <h2>Admin Login</h2>
    
    
      <div class="input-group">
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>

      <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>

      <a href="{{route('dashboard')}}" >
        <button type="submit" class="login-btn">Login</button>
     </a>
      
    
  </div>
</body>
</html>
