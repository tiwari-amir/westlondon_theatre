<style>
  .seat-layout {
    border-collapse: collapse;
    margin: 0 auto;
    font-family: Arial, sans-serif;
    font-size: 14px;
  }

  .seat-layout td {
    padding: 8px;
    text-align: center;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    cursor: pointer;
    width: 40px;
    height: 40px;
  }

  .seat-layout td.seat {
    background-color: #d4e1f4;
    font-weight: bold;
  }

  .seat-layout td.selected {
    background-color: #4CAF50;
    color: #fff;
  }

  .seat-layout td.occupied {
    background-color: #FF0000;
    color: #fff;
    cursor: not-allowed;
  }

  .screen {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
  }
  .seatscreen{
    margin-top: 300px;
  }
</style>
<div class="seatscreen">
<h3>Select Seats</h3>
<div class="screen">
  <h4>----SCREEN----</h4>
</div>
<table class="seat-layout">
  <?php
  $rows = 10;
  $columns = 10;

  // Retrieve the occupied seats for the selected date from the database
  $occupiedSeats = array();
  $query = "SELECT seat_details FROM tbl_bookings WHERE ticket_date='$date'";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $seats = explode(", ", $row['seat_details']);
    $occupiedSeats = array_merge($occupiedSeats, $seats);
  }

  for ($row = 1; $row <= $rows; $row++) {
    echo '<tr>';
    for ($column = 1; $column <= $columns; $column++) {
      $seatLabel = chr(64 + $row) . $column;
      $seat = $row . '-' . $column;
      $class = 'seat';

      if (in_array($seatLabel, $occupiedSeats)) {
        $class .= ' occupied';
      }

      echo '<td class="' . $class . '" onclick="selectSeat(this, \'' . $seat . '\')">' . $seatLabel . '</td>';
    }
    echo '</tr>';
  }
  ?>
</table>
</div>
<script>
  var selectedSeats = []; // Array to store selected seats
  var seatCount = 0; // Variable to store seat count

  // Function to handle seat selection
  function selectSeat(seatElement, seat) {
    if (seatElement.classList.contains('occupied')) {
      return; // Ignore selection if the seat is occupied
    }

    var index = selectedSeats.indexOf(seat);

    if (index === -1) {
      selectedSeats.push(seat); // Add seat to selectedSeats array
      seatElement.classList.add('selected'); // Add 'selected' class to the seat element
    } else {
      selectedSeats.splice(index, 1); // Remove seat from selectedSeats array
      seatElement.classList.remove('selected'); // Remove 'selected' class from the seat element
    }

    updateSeatCount();
  }

  // Function to update the seat count and amount
  function updateSeatCount() {
    seatCount = selectedSeats.length;
    var seatValue = selectedSeats.map(function(seat) {
      var row = String.fromCharCode(65 + parseInt(seat.split('-')[0]) - 1);
      var col = parseInt(seat.split('-')[1]);
      return row + col;
    }).join(', ');

    var charge = <?php echo $screen['charge']; ?>;
    var amount = charge * seatCount;

    document.getElementById('seats').innerText = seatCount;
    document.getElementById('seats').value = seatCount;
    document.getElementById('seat-value').value = seatValue;
    document.getElementById('seat-details').textContent = seatValue;
    document.getElementById('amount-value').innerHTML = '£ ' + amount;
    document.getElementById('hm').value = amount;
  }
</script>
