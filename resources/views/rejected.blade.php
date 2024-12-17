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
      background-color: #fafeff;
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
      background-color:  #ffffff;
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

    .main-content {
        margin-top: 200px;
            margin: 20px;
        }

        .table-container {
            background-color: white;
            margin-top:40px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #094495;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-input {
            padding: 10px;
            font-size: 16px;
            width: 250px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .search-btn {
            padding: 10px;
            font-size: 16px;
            background-color: #094495;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        .search-btn:hover {
            background-color: #0e2f5d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
        }

        .btns {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .view-btn {
            background-color: #28a745;
            color: white;
        }

        .view-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
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

    <div class="main-content">
      <div class="table-container">
          <h2>Rejected Scholars</h2>
          
          <!-- Search Form -->
          <div class="search-container">
            <form action="{{ route('rejectedScholars') }}" method="get" class="flex items-center">
                <input name="search" type="text" id="searchBar" placeholder="Search Scholars..." class="search-input" value="{{ request('search') }}">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
        
        <!-- Scholars Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Year Level</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($scholars as $scholar)
                    <tr>
                        <td>{{ $scholar->name }}</td>
                        <td>{{ $scholar->age }}</td>
                        <td>{{ $scholar->gender }}</td>
                        <td>{{ $scholar->email }}</td>
                        <td>{{ $scholar->yearLevel->year_level ?? 'N/A' }}</td>
                        <td>{{ $scholar->contact }}</td>
                        <td>
                            <div class="btns">
                                <a href="{{ route('scholar.show', $scholar->id) }}">
                                    <button class="action-btn view-btn">View</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No approved scholars found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <!-- Pagination -->
        <div class="pagination-container">
            {{ $scholars->links() }}
        </div>
        
</body>
</html>









