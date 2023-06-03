<!DOCTYPE html>
<html>
<head>
  <title>Seat Selection</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    p {
      text-align: center;
      margin-bottom: 20px;
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
      width: 50px;
      height: 50px;
      margin: 2px;
      background-color: #ccc;
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
      width: 20px;
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
  <div class="container">
    <h1>Seat Selection</h1>
    <p>Select your seat:</p>

    <div class="seat-container">
      <div class="seat-row">
        <div class="seat" data-seat="A1">A1</div>
        <div class="seat" data-seat="B1">B1</div>
        <div class="divider"></div>
        <div class="seat" data-seat="C1">C1</div>
        <div class="seat" data-seat="D1">D1</div>
      </div>
      <div class="seat-row">
        <div class="seat" data-seat="A2">A2</div>
        <div class="seat" data-seat="B2">B2</div>
        <div class="divider"></div>
        <div class="seat" data-seat="C2">C2</div>
        <div class="seat" data-seat="D2">D2</div>
      </div>
      <div class="seat-row">
        <div class="seat" data-seat="A3">A3</div>
        <div class="seat" data-seat="B3">B3</div>
        <div class="divider"></div>
        <div class="seat" data-seat="C3">C3</div>
        <div class="seat" data-seat="D3">D3</div>
      </div>
      <div class="seat-row">
        <div class="seat" data-seat="A4">A4</div>
        <div class="seat" data-seat="B4">B4</div>
        <div class="divider"></div>
        <div class="seat" data-seat="C4">C4</div>
        <div class="seat" data-seat="D4">D4</div>
      </div>
      <div class="seat-row">
        <div class="seat" data-seat="A5">A5</div>
        <div class="seat" data-seat="B5">B5</div>
        <div class="divider"></div>
        <div class="seat" data-seat="C5">C5</div>
        <div class="seat" data-seat="D5">D5</div>
      </div>
    </div>

    <div class="footer">
      <button class="button" disabled>Submit</button>
    </div>
  </div>

  <script>
    const seats = document.querySelectorAll('.seat');
    const submitButton = document.querySelector('.button');
    let selectedSeat = null;

    seats.forEach((seat) => {
      seat.addEventListener('click', () => {
        const seatData = seat.getAttribute('data-seat');
        if (selectedSeat === seatData) {
          seat.classList.remove('selected');
          selectedSeat = null;
        } else {
          if (selectedSeat) {
            const currentSelectedSeat = document.querySelector(`.seat[data-seat="${selectedSeat}"]`);
            currentSelectedSeat.classList.remove('selected');
          }
          seat.classList.add('selected');
          selectedSeat = seatData;
        }
        updateSubmitButtonStatus();
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
