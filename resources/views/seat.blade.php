<!DOCTYPE html>
<html>
<head>
  <title>Seat Selection</title>
  <style>
    .seat-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      max-width: 400px;
      margin: 0 auto;
    }

    .seat-row {
      display: flex;
      justify-content: center;
      margin-bottom: 10px;
    }

    .seat {
      display: inline-block;
      width: 50px;
      height: 50px;
      background-color: #ccc;
      margin: 2px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      font-size: 14px;
    }

    .seat.selected {
      background-color: green;
    }

    .seat.disabled {
      background-color: gray;
      cursor: not-allowed;
    }

    .path {
      display: inline-block;
      width: 100px;
      text-align: center;
      margin-bottom: 10px;
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
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #0056b3;
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
