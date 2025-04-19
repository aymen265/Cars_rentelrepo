<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Car Rental Form</title>
  <link rel="stylesheet" href="CARSfrm.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
</head>
<body>
<header>
    <div class="nav container">

      <a href="#" class="logo">CRrental<span>.</span></a>


      <div class="navbar">
        <a href="cars.html#home" class="nav-link">Home</a>
        <a href="cars.html#trending" class="nav-link">Trending</a>
        <a href="cars.html#rentals" class="nav-link">Cars</a>
      </div>
      <div class="nav-icons">
        <a href="#"><i class="bx bx-search"></i></a>
        <a href="#"><i class="bx bx-user user-icon"></i></a>
        <div class="menu-icon">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </div>
    </div>
  </header>


  <section class="home" id="home">
    <div class="home-content container">
        <div class="home-img">
            <img src="images\home.png" alt="">
        </div>
  <section class="form-section container">
    <h2 class="form-title">Rent This Car</h2>
    <form action="form.php" class="rental-form" method="POST">
      <div class="form-group">
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" placeholder="Your Name" required name="full-name"/>
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="example@mail.com" required name="email" />
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" placeholder="+212..." required name="tel"/>
      </div>
      <div class="form-group">
        <label for="pickup-date">Pick-up Date</label>
        <input type="date" id="pickup-date" required name="pickup-date" />
      </div>
      <div class="form-group">
        <label for="return-date">Return Date</label>
        <input type="date" id="return-date" required name="return-date" />
      </div>
      <div class="form-group">
        <label for="location">Pick-up Location</label>
        <input type="text" id="location" placeholder="City or Agency" required name="location" />
      </div>
      <div class="form-group">
        <label for="payment">Payment Method</label>
        <select id="payment" name="payement" required>
          <option value="">Choose a method</option>
          <option value="card">Credit Card</option>
          <option value="paypal">PayPal</option>
          <option value="cash">Cash on Delivery</option>
        </select>
      </div>
      <div class="form-group">
        <label for="notes">Additional Notes</label>
        <textarea id="notes" rows="4" placeholder="Any special requests?" name="notes"></textarea>
      </div>
      <button type="submit" class="rental-btn" name="submit">Confirm Rental</button>
    </form>
  </section>
</body>
</html>
