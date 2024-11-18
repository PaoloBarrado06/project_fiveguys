<?php
session_start();
include("config.php");
$id = $_SESSION['id'];

$emotion = $reason = '';
$emotion_err = $reason_err = "";
$tid = $id;
$date = date("Y-m-d");

// Prepare and execute the SQL query to check if there's a record for today's date
$sql2 = "SELECT * FROM survey WHERE date = ? AND tid = ?";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("ss", $date, $tid);
$stmt2->execute();
$result = $stmt2->get_result();

// If a record exists, redirect to dashboard.php
if ($result->num_rows > 0) {
    header("Location: dashboard.php");
    exit();
}

$stmt2->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emotion = $_POST['emotion'];
    $reason = $_POST['reason'];

    // Validate emotion
    if (empty($emotion)) {
        $emotion_err = "Please select an emotion.";
    }

    // If there is no existing record, insert a new entry
    if (empty($emotion_err)) {
        $sql = "INSERT INTO survey (emotion, reason, tid, date) VALUES (?, ?, ?, ?)";
        
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $emotion, $reason, $tid, $date);
            if ($stmt->execute()) {
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emotion Selector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .emotion-face {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 80px; 
    height: 80px;
    margin: 5px; 
    cursor: pointer;
    border-radius: 50%;
    overflow: hidden; 
    }

    .emotion-face img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
        transition: transform 0.2s ease-in-out;
    }

    .emotion-face:hover img {
        transform: scale(1.1); 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .container {
        max-width: 600px; 
        margin: auto;
        padding: 20px;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-5 shadow-lg mx-auto">
        <h3 class="text-center mb-4 title-text">What are you feeling today?</h3>
        <form method="POST" action="">
            <div class="d-flex justify-content-center mb-4">
                <div class="emotion-face" onclick="setFeeling('Very Sad')">
                    <img src="icon/very_sad.png" alt="Very Sad">
                </div>
                <div class="emotion-face" onclick="setFeeling('Neutral-Sad')">
                    <img src="icon/sad.png" alt="Neutral-Sad">
                </div>
                <div class="emotion-face" onclick="setFeeling('Neutral')">
                    <img src="icon/okay.png" alt="Neutral">
                </div>
                <div class="emotion-face" onclick="setFeeling('Neutral-Happy')">
                    <img src="icon/happy.png" alt="Neutral-Happy">
                </div>
                <div class="emotion-face" onclick="setFeeling('Happy')">
                    <img src="icon/very_happy.png" alt="Happy">
                </div>
            </div>

            <!-- Selected emotion header -->
            <h4 id="selectedEmotion" class="selected-emotion" style="text-align:center;">Select an emotion above</h4>

            <!-- Hidden input to store the selected emotion -->
            <input type="hidden" name="emotion" id="emotionInput" value="">
            
            <div class="text-center mb-3">Why do you feel this way?</div>
            <textarea class="form-control" name="reason" rows="4" placeholder="Enter your reason here..."></textarea>
            <input type="submit" class="btn btn-primary w-100 mt-3" style="background-color: #0d3569; border: none;" value="S U B M I T">
        </form>
    </div>
</div>

<script>
    function setFeeling(emotion) {
        document.getElementById('emotionInput').value = emotion;
        document.getElementById('selectedEmotion').innerText = `${emotion}`;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
