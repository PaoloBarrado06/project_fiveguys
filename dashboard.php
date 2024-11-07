<?php
session_start();
include("config.php");
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$age = $_SESSION['age'];
$password = $_SESSION['password'];
$birthdate = $_SESSION['birthdate'];

?>

<!DOCTYPE html>
<html lang="en">
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

        
        <div id="about" class="container" >

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
                    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                </ol>
            
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">August 21</h5>
                                    <img src="icon/happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">August 23</h5>
                                    <img src="icon/sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">August 24</h5>
                                    <img src="icon/happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">August 26</h5>
                                    <img src="icon/very_happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">August 28</h5>
                                    <img src="icon/very_happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 1</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 3</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 4</h5>
                                    <img src="icon/sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 7</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 11</h5>
                                    <img src="icon/very_sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 12</h5>
                                    <img src="icon/sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 13</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 17</h5>
                                    <img src="icon/happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 18</h5>
                                    <img src="icon/very_happy.png" class="emotion-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 21</h5>
                                    <img src="icon/happy.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 22</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 23</h5>
                                    <img src="icon/okay.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 26</h5>
                                    <img src="icon/sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 28</h5>
                                    <img src="icon/very_sad.png" class="emotion-image">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 29</h5>
                                        <img src="icon/sad.png" class="emotion-image">
                                    </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">September 30</h5>
                                    <img src="icon/sad.png" class="emotion-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>  
            
               

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>
