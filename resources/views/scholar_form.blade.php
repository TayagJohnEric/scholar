<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scholar Submission Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
.form-container img{
margin-left: 40%;
}

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: rgb(58, 61, 65);
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input, select, textarea {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <a href="{{ route('landingpage') }}" method="get">
      <img class="logo" src="{{ asset('images/logo.png') }}" alt="Scholar Logo" style="width: 80px; height: auto; max-height: 85px;">
      </a>
    @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb; border-radius: 4px;">
      {{ session('success') }}
    </div>
  @endif
    <h2>Scholar Information Form</h2>
    <form action="{{ route('scholar.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
        @error('name')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" placeholder="Enter your age" value="{{ old('age') }}" min="1" required>
        @error('age')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <option value="" disabled selected>Select your gender</option>
          <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
          <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
          <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
        @error('email')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="contact">Contact Number</label>
        <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" value="{{ old('contact') }}"  required>
        @error('contact')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" name="address" placeholder="Enter your address" rows="3" required>{{ old('address') }}</textarea>
        @error('address')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="school">School</label>
        <input type="text" id="school" name="school" placeholder="Enter your school" value="{{ old('school') }}" required>
        @error('school')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="course">Course</label>
        <input type="text" id="course" name="course" placeholder="Enter your course" value="{{ old('course') }}" required>
        @error('course')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="year_level_id">Year Level</label>
        <select id="year_level_id" name="year_level_id" required>
          <option value="" disabled selected>Select your year level</option>
          @foreach ($year_levels as $yearLevel)
            <option value="{{ $yearLevel->id }}" {{ old('year_level_id') == $yearLevel->id ? 'selected' : '' }}>
              {{ $yearLevel->year_level }}
            </option>
          @endforeach  
        </select>
        @error('year_level_id')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="cor_file">Certificate of Registration (COR)</label>
        <input type="file" id="cor_file" name="cor_file" accept=".pdf,.jpg,.png" required>
        @error('cor_file')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="cog_file">Copy of Grade (COG)</label>
        <input type="file" id="cog_file" name="cog_file" accept=".pdf,.jpg,.png" required>
        @error('cog_file')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="school_id">School ID</label>
        <input type="file" id="school_id" name="school_id" accept=".pdf,.jpg,.png" required>
        @error('school_id')
          <span style="color: red; font-size: 12px;">{{ $message }}</span>
        @enderror
      </div>
  
      <button type="submit">Submit</button>
    </form>
  </div>
  
</body>
</html>
