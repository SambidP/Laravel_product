<!DOCTYPE html>
  <html lang="en">
    <head> <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"></head>
<body class = "page">
<form action="/login" method="post">
  @csrf
  <div class="imgcontainer">
    <img src="{{asset('assets/images/img_avatar2.jpg')}}" alt="Avatar" class="avatar">
  </div>
  <div class = text>
  <h1>REGISTER</h1>
  <div>
  <div class="container">
    <label for="name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>
    <br>
    <label for="name"><b>email</b></label>
    <input type="text" placeholder="Enter e-mail" name="email" required >
    <br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br>
    <label for="password"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button type="submit">Register</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
    <a href="/">
    <button type="button" class="cancelbtn">Cancel</button>
    </a>
    <span class="password">Forgot <a href="/forgot">password?</a></span>
  </div>
</form>
</body>