<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scholar Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .profile-container {
      max-width: 600px;
      margin: 20px auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .profile-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .profile-header h2 {
      margin: 0;
    }
    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin: 75px auto 10px;
      border: 2px solid #007bff;
      display: block;
    }
    .profile-details {
      padding: 20px;
    }
    .profile-details h3 {
      margin-bottom: 40px;
    }
    .detail-item {
      margin-bottom: 10px;
      line-height: 1.6;
    }
    .detail-item strong {
      display: inline-block;
      width: 120px;
    }
  </style>
</head>
<body>

  <div class="profile-container">
    <div class="profile-header">
      <h2>Scholar Profile</h2>
    </div>
    <img 
      src="{{ $scholar->profile_picture ? asset('storage/' . $scholar->profile_picture) : asset('default-profile.jpg') }}" 
      alt="Profile Picture" 
      class="profile-picture"
    >
    <div class="profile-details">
      <h3>Profile Information</h3>
      <div class="detail-item">
        <strong>Full Name:</strong> {{ $scholar->name }}
      </div>
      <div class="detail-item">
        <strong>Age:</strong> {{ $scholar->age }}
      </div>
      <div class="detail-item">
        <strong>Gender:</strong> {{ $scholar->gender }}
      </div>
      <div class="detail-item">
        <strong>Email:</strong> {{ $scholar->email }}
      </div>
      <div class="detail-item">
        <strong>Contact:</strong> {{ $scholar->contact }}
      </div>
      <div class="detail-item">
        <strong>Address:</strong> {{ $scholar->address }}
      </div>
      <div class="detail-item">
        <strong>School:</strong> {{ $scholar->school }}
      </div>
      <div class="detail-item">
        <strong>Course:</strong> {{ $scholar->course }}
      </div>
      <div class="detail-item">
        <strong>Year Level:</strong> {{ $scholar->yearLevel->year_level ?? 'N/A' }}
      </div>
      <div class="detail-item">
        <strong>COR:</strong> 
        <a href="{{ asset('storage/' . $scholar->cor_file) }}" target="_blank">View Certificate</a>
      </div>
      <div class="detail-item">
        <strong>COG:</strong> 
        <a href="{{ asset('storage/' . $scholar->cog_file) }}" target="_blank">View Copy of Grade</a>
      </div>
      <div class="detail-item">
        <strong>School ID:</strong> 
        <a href="{{ asset('storage/' . $scholar->school_id) }}" target="_blank">View School ID</a>
      </div>
    </div>
  </div>
  

</body>
</html>
