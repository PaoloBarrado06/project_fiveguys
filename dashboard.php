<?php
session_start();
include("config.php");
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$age = $_SESSION['age'];
$password = $_SESSION['password'];
$birthdate = $_SESSION['birthdate'];
$id = $_SESSION['id'];

$sql = "SELECT date, emotion FROM survey WHERE tid='$id'";
$result = $mysqli->query($sql);

$emotionIcons = [
    'neutral-happy' => 'icon/happy.png',
    'neutral-sad' => 'icon/sad.png',
    'happy' => 'icon/very_happy.png',
    'neutral' => 'icon/okay.png',
    'very sad' => 'icon/very_sad.png'
];
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Uplift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>


<body>

    <div class="d-flex">

        <nav class="navbar-vertical d-flex flex-column align-items-center">

            <h1 class="title">UP</h1>

            <a class="nav-link" href="dashboard.php">
                <i class="icon bi bi-grid-fill"></i> 
                <h6 class="title1" style="font-size: 10px">Dashboard</h6>
            </a>

            <a class="nav-link" href="calendar.html">
                <i class="icon bi bi-calendar-date"></i> 
                <h6 class="title1" style="font-size: 10px">Calendar</h6>
            </a>

            <a class="nav-link" href="account.php">
                <i class="icon bi bi-gear-fill"></i>
                <h6 class="title1" style="font-size: 10px">Settings</h6>
            </a>

            <a class="nav-link"href="index.php">
                <i class="icon bi bi-box-arrow-right"></i>
                <h6 class="title1" style="font-size: 10px">Logout</h6> 
            </a>

        </nav>

        <div id="about" class="container">

            <h1 class="title2">LIFT</h1>

            <h1>Welcome! <span style='color:#0d3569;'><?php echo htmlspecialchars($username); ?></span></h1>
            <br><br>
            
            <div class="row" style="margin-bottom: -33px;">
              <!-- Education Column -->
              <div class="col-md-6 scrollable-section">

                <h3>Sleep Pattern</h3>
                    <!-- Sleep Pattern Cards -->
                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Monday September 11, 2024</h5>
                            <p><strong>Woke Up:</strong> 5:30 am</p>
                            <p><strong>Slept:</strong> 12:00 am</p>
                        </div>
                        <img src="icon/sad.png" class="emotion-image">
                    </div>


                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Tuesday September 12, 2024</h5>
                            <p><strong>Woke Up:</strong> 6:00 am</p>
                            <p><strong>Slept:</strong> 11:00 pm</p>
                        </div>
                        <img src="icon/happy.png" class="emotion-image">
                    </div>


                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Monday September 11, 2024</h5>
                            <p><strong>Woke Up:</strong> 5:30 am</p>
                            <p><strong>Slept:</strong> 12:00 am</p>
                        </div>
                        <img src="icon/sad.png" class="emotion-image">
                    </div>


                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Tuesday September 12, 2024</h5>
                            <p><strong>Woke Up:</strong> 6:00 am</p>
                            <p><strong>Slept:</strong> 11:00 pm</p>
                        </div>
                        <img src="icon/happy.png" class="emotion-image">
                    </div>


                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Monday September 11, 2024</h5>
                            <p><strong>Woke Up:</strong> 5:30 am</p>
                            <p><strong>Slept:</strong> 12:00 am</p>
                        </div>
                        <img src="icon/sad.png" class="emotion-image">
                    </div>


                    <div class="sleep-pattern-card">
                        <div>
                            <h5>Tuesday September 12, 2024</h5>
                            <p><strong>Woke Up:</strong> 6:00 am</p>
                            <p><strong>Slept:</strong> 11:00 pm</p>
                        </div>
                        <img src="icon/happy.png" class="emotion-image">
                    </div>
                    
              </div>
              <!-- Experience Column -->
              <div class="col-md-6 scrollable-section">
                <h2>Daily Fun Facts</h2>
                <div class="timeline">
                  <div class="timeline-item">
                    <h3>Cows</h3>
                    <p>Cows have best friends and get stressed when they are separated.</p>
                  </div>
                  <div class="timeline-item">
                    <h3>Volcanoes</h3>
                    <p>The world's largest volcano is Mauna Loa in Hawaii, which is taller than Mount Everest when measured from its base on the ocean floor. </p>
                  </div>
                  <div class="timeline-item">
                    <h3>Honey</h3>
                    <p>Honey never spoils. Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3000 years old and still edible.</p>
                  </div>
                  <div class="timeline-item">
                    <h3>Cows</h3>
                    <p>Cows have best friends and get stressed when they are separated.</p>
                  </div>
                  <div class="timeline-item">
                    <h3>Volcanoes</h3>
                    <p>The world's largest volcano is Mauna Loa in Hawaii, which is taller than Mount Everest when measured from its base on the ocean floor. </p>
                  </div>
                  <div class="timeline-item">
                    <h3>Honey</h3>
                    <p>Honey never spoils. Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3000 years old and still edible.</p>
                  </div>
                </div>
                
              </div>

            </div>

            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $numSlides = ceil($result->num_rows / 7); // Calculate number of slides
                    for ($i = 0; $i < $numSlides; $i++) {
                        echo '<li data-bs-target="#myCarousel" data-bs-slide-to="' . $i . '" class="' . ($i === 0 ? 'active' : '') . '"></li>';
                    }
                    ?>
                </ol>

                <!-- Wrapper for carousel items -->
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
        <?php
        $isActive = true; // First slide gets 'active' class
        $cardCounter = 0; // Tracks cards added to the current slide
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $date = htmlspecialchars($row['date']);
                $formattedDate = DateTime::createFromFormat('Y-m-d', $date)->format('M j, Y');
                $emotion = strtolower(trim($row['emotion'])); // Normalize emotion
                $icon = isset($emotionIcons[$emotion]) ? $emotionIcons[$emotion] : 'icon/default.png';

                // Start a new slide if necessary
                if ($cardCounter % 7 === 0) {
                    if ($cardCounter > 0) {
                        echo '</div></div>'; // Close previous slide and its card group
                    }
                    $activeClass = $isActive ? 'active' : ''; // Add 'active' class to the first slide
                    echo "<div class='carousel-item $activeClass'><div class='card-group'>";
                    $isActive = false; // First slide already initialized
                }

                // Add card to the current slide
                echo "
                <div class='card '>
                    <div class='card-body'>
                        <h5 class='card-title'>$formattedDate</h5>
                        <img src='$icon' class='emotion-image' alt='$emotion'>
                    </div>
                </div>
                ";

                $cardCounter++;
            }

            echo '</div></div>'; // Close the last slide and its card group
        } else {
            echo "<p>No emotions found in the database.</p>";
        }
        ?>
    </div>
    
    <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

        <!-- Custom CSS to hide indicators -->
        <style>
            .carousel-indicators {
                display: none !important; /* Hides the indicators */
            }
            .carousel-control-prev{
                width: 30px;
                height: 30px;
                background-color: #000;
                margin-top: 90px;
                margin-left: -10px;

            }
            .carousel-control-next {
                width: 30px;
                height: 30px;
                background-color: #000;
                margin-top: 90px;
                margin-right: -10px;

                
            }
        </style>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>

