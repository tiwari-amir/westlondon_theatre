<?php
session_start();
include('../../config.php');

$bookingId = $_GET['id'];

// Fetch the booking information from tbl_bookings
$query = "SELECT * FROM tbl_bookings WHERE book_id = '$bookingId'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Check if the show is within 24 hours
$showStartDate = $row['ticket_date'];
$currentDate = date('Y-m-d H:i:s');

// Calculate the difference between show start date and current date
$diff = strtotime($showStartDate) - strtotime($currentDate);
$hoursDiff = round($diff / (60 * 60)); // Convert seconds to hours

if ($hoursDiff <= 24) {
    $_SESSION['error'] = "Sorry, you cannot cancel the show as it is within 24 hours.";
} else {
    // Delete the booking from tbl_bookings
    mysqli_query($con, "DELETE FROM tbl_bookings WHERE book_id = '$bookingId'");
    $_SESSION['success'] = "Booking Cancelled Successfully";
}

header('location:view_bookings.php');
?>
