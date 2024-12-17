<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scholars Page</title>
  <style>
    body { margin: 0; font-family: Arial, sans-serif; }
    .navbar {
      background-color:   #f4f9ff;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
     padding-right: 60px;
      gap: 25px;
    }

    .navbar img {

      padding-left: 50px;
    }
    .navbar ul li {
      display: inline;
    }
    .navbar a {
      color: rgb(11, 11, 11);
      text-decoration: none;
    }
    .hero {
    text-align: center;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('images/bg.jpg');
    background-size: cover;
    background-position: center;
    color: rgb(255, 255, 255);
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


    .hero-content{

        margin-top:70px;
    }
    .hero h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
  }
  .hero p {
    font-size: 1.2rem;
    margin-bottom: 20px;
    max-width: 600px;
  }
    .hero button {
      padding: 10px 20px;
      background-color: #0047AB;
      color: white;
      border: none;
      border-radius: 15px;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 15px;
      width: 200px;
      height: 50px;
    }
    .hero button:hover {
      background-color: #003580;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="{{ route('login.form') }}" method="get">
    <img class="logo" src="{{ asset('images/logo.png') }}" alt="Scholar Logo" style="width: 70px; height: auto; max-height: 85px;">
    </a>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#programs">Programs</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div>

  <div class="hero">
    <div class="hero-content">
      <img class="logo" src="{{ asset('images/bg_icon.png') }}" alt="Scholar Logo" style="width: 100px; height: auto; max-height: 85px;">
        <h1>Empowering Scholars</h1>
        <h1>for a Brighter Future.</h1>
        <a href="{{ route('scholar.form') }}"> 
            <button>Get Started</button>
        </a>
    </div>
</div>

</body>
</html>
