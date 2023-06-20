<?php
// Assuming you have retrieved the screen ID from the user or any other source
$screenId = 2; // Assuming screen ID 2 corresponds to the theater with 150 seats

// Query the database to fetch the seat layout for the specified screen
$sql = "SELECT * FROM seats WHERE screen_id = $screenId";
$result = mysqli_query($conn, $sql);

// Create an array to store the seat data
$seats = array();
while ($row = mysqli_fetch_assoc($result)) {
    $seats[] = $row;
}
?>

<div class="seat-layout">
    <?php foreach ($seats as $seat) { ?>
        <div class="seat <?php echo $seat['is_available'] ? 'available' : 'unavailable'; ?>">
            <input type="checkbox" name="selected_seats[]" value="<?php echo $seat['seat_id']; ?>">
        </div>
    <?php } ?>
</div>
