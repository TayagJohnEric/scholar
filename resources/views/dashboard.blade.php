<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: row;
      background-color: #ffffff;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #dae9ff;
      color: #ffffff;
      padding-top: 20px;
      position: fixed;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
    }

    .sidebar a {
      display: block;
      padding: 15px 40px;
      color:  #253954;
      text-decoration: none;
      margin: 15px 0;
      border-radius: 20px;
      transition: background-color 0.2s ease;
    }

    .sidebar a:hover {
      background-color: #0e2f5d;
      color: white;
    }

    .dashboard {
      margin-left: 250px;
      padding: 20px;
      width: calc(100% - 250px);
      background-color: #fafeff;
    }

    .dashboard h1 {
      color: #7e7e7e;
      font-size: 28px;
    }

    .card-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* Exactly 4 cards per row */
  gap: 20px;
  margin-top: 100px;
}

    .card {
      background-color:  #dae9ff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: scale(1.03);
    }

    .card-icon {
      font-size: 36px;
      color: #0080ff;
      margin-bottom: 15px;
    }

    .card h3 {
      margin: 0;
      font-size: 40px;
      color: #094495;
    }

    .card p {
      margin: 5px 0;
      font-size: 18px;
      color: rgb(151, 151, 151);
    }

    .profile-card {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 5px;
      width: 120px;
      text-align: center;
    }

    .profile-card img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-card h3 {
      margin: 0;
      font-size: 13px;
      color: #353643;
    }

    .profile-card p {
      margin: 0;
      font-size: 11px;
      color: #666;
    }

    @media (max-width: 768px) {
      .dashboard {
        margin-left: 0;
        padding: 10px;
      }

      .profile-card {
        position: static;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Scholar Logo" style="display: block; margin: 0 auto; width: 150px;">
    </div>
    <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    <a href="{{ route('manageScholars') }}"><i class="fas fa-users"></i> Manage Scholars</a>
    <a href="{{ route('submissions') }}"><i class="fas fa-folder-open"></i> Submissions</a>
    <a href="{{ route('approvedScholars') }}"><i class="fas fa-check-circle"></i> Approved Scholars</a>
    <a href="{{ route('rejectedScholars') }}"><i class="fas fa-times-circle"></i> Rejected Scholars</a>
    <a href="{{ route('login.form') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a>
  </div>

  <div class="dashboard">
    <h1>Dashboard</h1>
    <div class="profile-card">
      <img src="https://via.placeholder.com/50" alt="User Profile">
      <h3>Admin</h3>
      <p>Admin</p>
    </div>

    <div class="card-container">
      <div class="card">
          <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
          <h3>{{ $totalScholars }}</h3>
          <p>Total Scholars</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-file-signature"></i></div>
          <h3>{{ $pendingSubmissions }}</h3>
          <p>Pending Submissions</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-check-circle"></i></div>
          <h3>{{ $approvedSubmissions }}</h3>
          <p>Approved Submissions</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-times-circle"></i></div>
          <h3>{{ $rejectedSubmissions }}</h3>
          <p>Rejected Submissions</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-user-friends"></i></div>
          <h3>{{ $firstYear }}</h3>
          <p>First Year</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-user-friends"></i></div>
          <h3>{{ $secondYear }}</h3>
          <p>Second Year</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-user-friends"></i></div>
          <h3>{{ $thirdYear }}</h3>
          <p>Third Year</p>
      </div>
      <div class="card">
          <div class="card-icon"><i class="fas fa-user-friends"></i></div>
          <h3>{{ $fourthYear }}</h3>
          <p>Fourth Year</p>
      </div>
  </div>
  
</body>
</html>
