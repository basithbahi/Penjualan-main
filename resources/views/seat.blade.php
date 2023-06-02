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
