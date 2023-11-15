<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/listatareas.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/69269c1ba0.js" crossorigin="anonymous"></script>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/tasks.css" />

  <!-- JS components -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          <?php include 'calendarFeed.php' ?>
        ],
        eventBackgroundColor: '#008000',
        eventBorderColor: '#FF0000',
        eventTextColor: '#555555',
      });
      calendar.render();
    });
  </script>
</head>

<body>
  <div class="grid-container">

    <?php
    require_once "userNavbar.php";
    require_once "taskViews.php";
    ?>

    <div class="third-grid-container">
      <div class="calendar-container">
        <div id='calendar'></div>
      </div>
    </div>

    <script src="../Js/logout.js" defer></script>
    <script src="../Js/taskViews.js" defer></script>
</body>

</html>