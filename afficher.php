<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Info</title>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap');
  
    body {
      margin: 0;
      font-family: 'Urbanist', sans-serif;
      background: #f8f8f8;
      color: #333;
    }
  
    .header {
      background: #ff5100;
      padding: 2.5rem;
      text-align: center;
      color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      animation: fadeInTop 1s ease-out;
    }
  
    .container {
      max-width: 850px;
      margin: 3rem auto;
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      border: 2px solid #ff510020;
      animation: zoomIn 0.8s ease-out;
    }
  
    .container h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #ff5100;
      font-size: 2rem;
      letter-spacing: 1px;
    }
  
    .info-box {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1.2rem;
      padding: 1.2rem 1.5rem;
      background: #fafafa;
      border-left: 5px solid #ff5100;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      opacity: 0;
      animation: slideUp 0.7s ease forwards;
    }
  
    .info-box:nth-child(1) { animation-delay: 0.1s; }
    .info-box:nth-child(2) { animation-delay: 0.2s; }
    .info-box:nth-child(3) { animation-delay: 0.3s; }
    .info-box:nth-child(4) { animation-delay: 0.4s; }
    .info-box:nth-child(5) { animation-delay: 0.5s; }
    .info-box:nth-child(6) { animation-delay: 0.6s; }
    .info-box:nth-child(7) { animation-delay: 0.7s; }
    .info-box:nth-child(8) { animation-delay: 0.8s; }
  
    .label {
      font-weight: 600;
      color: #333;
    }
  
    .value {
      color: #666;
      font-weight: 500;
      max-width: 60%;
      text-align: right;
    }
  
    /* Animations */
    @keyframes slideUp {
      0% {
        transform: translateY(20px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  
    @keyframes zoomIn {
      0% {
        transform: scale(0.95);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }
  
    @keyframes fadeInTop {
      0% {
        transform: translateY(-20px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
  
</head>
<body>

  <div class="header">
    <h1>Client Rental Details</h1>
  </div>

  <div class="container">
    <h2>Reservation Summary</h2>

    <div class="info-box"><div class="label">Full Name:</div><div class="value"><?php echo $_SESSION["full-name"] ?></div></div>
    <div class="info-box"><div class="label">Email Address:</div><div class="value"><?php echo $_SESSION["email"] ?></div></div>
    <div class="info-box"><div class="label">Phone Number:</div><div class="value"><?php echo $_SESSION["tel"] ?></div></div>
    <div class="info-box"><div class="label">Pick-up Date:</div><div class="value"><?php echo $_SESSION["pickup-date"] ?></div></div>
    <div class="info-box"><div class="label">Return Date:</div><div class="value"><?php echo $_SESSION["return-date"] ?></div></div>
    <div class="info-box"><div class="label">Pick-up Location:</div><div class="value"><?php echo $_SESSION["location"] ?></div></div>
    <div class="info-box"><div class="label">Payment Method:</div><div class="value"><?php echo $_SESSION["payement"] ?></div></div>
    <div class="info-box"><div class="label">Additional Notes:</div><div class="value"><?php echo $_SESSION["notes"] ?></div></div>

    <div style="text-align: center; margin-top: 2rem;">
 <a href="form.php?update_id=">
  <button style="background:#007bff; color:white; border:none; padding:8px 15px; border-radius:5px;">Update</button>
</a>

  <form action="delete.php" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
    <input type="hidden" name="id" >
    <button type="submit" style="background: #d63031; color: white; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer;">Delete</button>
  </form>
</div>

  </div>

</body>
</html>
