<!DOCTYPE html>
<html>
<head>
  <title>Seat Selection</title>
  <style>
    body {
      background-image: linear-gradient(to bottom right, #f9a5ff, #a5b3ff);
      font-family: Arial, sans-serif;
    }
    
    .seat-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 400px;
      margin: 0 auto;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .seat-row {
      display: flex;
      justify-content: center;
      margin-bottom: 10px;
    }
    
    .seat {
      display: inline-block;
      width: 80px;
      height: 50px;
      margin: 2px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      font-size: 14px;
      border-radius: 10px;
      background-image: url('https://www.jing.fm/clipimg/detail/169-1695221_drawn-sofa-animasi-sofa-clipart.png');
      background-size: cover;
      color: #fff;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }
    
    .seat.selected {
      background-color: #00ff00;
      color: #fff;
    }
    
    .seat.disabled {
      background-color: #e0e0e0;
      cursor: not-allowed;
    }
    
    .path {
      display: inline-block;
      width: 100px;
      text-align: center;
      margin-bottom: 10px;
      font-weight: bold;
    }
    
    .divider {
      display: inline-block;
      width: 20px;
      height: 50px;
    }
    
    .footer {
      margin-top: 20px;
      text-align: center;
    }
    
    .button {
      padding: 10px 20px;
      background-color: #ff73ff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .button:hover {
      background-color: #ff42ff;
    }
    
    h1 {
      text-align: center;
      color: #ff73ff;
      margin-bottom: 10px;
    }
    
    p {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h1>Seat Selection</h1>
  <p>Select your seat:</p>

  <div class="seat-container">
    <div class="seat-row">
      <div class="seat">A1</div>
      <div class="seat">B1</div>
      <div class="divider"></div>
      <div class="seat">C1</div>
      <div class="seat">D1</div>
    </div>
    <div class="seat-row">
      <div class="seat">A2</div>
      <div class="seat">B2</div>
      <div class="divider"></div>
      <div class="seat">C2</div>
      <div class="seat">D2</div>
    </div>
    <div class="seat-row">
      <div class="seat">A3</div>
      <div class="seat">B3</div>
      <div class="divider"></div>
      <div class="seat">C3</div>
      <div class="seat">D3</div>
    </div>
    <div class="seat-row">
      <div class="seat">A4</div>
      <div class="seat">B4</div>
      <div class="divider"></div>
      <div class="seat">C4</div>
      <div class="seat">D4</div>
    </div>
    <div class="seat-row">
      <div class="seat">A5</div>
      <div class="seat">B5</div>
      <div class="divider"></div>
      <div class="seat">C5</div>
      <div class="seat">D5</div>
    </div>
  </div>

  <div class="footer">
    <button class="button" disabled>Submit</button>
  </div>

  <script>
    const seats = document.querySelectorAll('.seat');
    const submitButton = document.querySelector('.button');

    seats.forEach((seat) => {
      seat.addEventListener('click', () => {
        if (!seat.classList.contains('disabled')) {
          seat.classList.toggle('selected');
          seat.style.backgroundColor = seat.classList.contains('selected') ? '#00ff00' : '';
          updateSubmitButtonStatus();
        }
      });
    });

    function updateSubmitButtonStatus() {
      const selectedSeats = document.querySelectorAll('.seat.selected');
      if (selectedSeats.length > 0) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
    }
  </script>
</body>
</html>
