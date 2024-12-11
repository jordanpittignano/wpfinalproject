<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="sculptsmart.css">
    <link rel="icon" type="image/x-icon" href="Favicon.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700&display=swap" rel="stylesheet">
    <title>Our Services</title>

    <style>

        li {
            display: inline-block;
        }
    
        #rightbox {
            width: 34%; 
            min-height:100px;  
            display:inline-block; 
            margin-bottom: 40px; 
            padding: 10px; 
            margin-right: 15%; 
            text-align:center; 
            font-size: 20px;
            margin-top: 20px;
        }
        #leftbox {
            width: 34%; 
            min-height: 100px;  
            display: inline-block; 
            vertical-align: top; 
            padding: 3px; 
            margin-bottom:40px; 
            text-align: center; 
            margin-left:15%; 
            margin-top: 20px;
            font-size: 20px;}
        #formbox {
            width: 34%; 
            min-height: 100px; 
            border: 2px solid; 
            border-color: #ff7b00;
            vertical-align: top; 
            padding: 3px; 
            margin-bottom:20px;
            text-align: center; 
            font-size: 20px;
            align-items: center;
        }
        #apibox {
            width: 60%; 
            min-height: 200px; 
            border: 2px solid #ff7b00;
            display: block; 
            margin: 20px auto; 
            padding: 15px;
            font-size: 16px; 
            overflow: auto; 
        }
        #container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #api {
            text-align: center; 
            white-space: pre-wrap; 
            line-height: 1.5; 
        }

        select {
            margin-bottom: 6px; 
        }
        .bold {
            font-weight: bold; 
            font-size: 30px; 
            margin-top: 30px;
            color: #ff7b00;
        }

        #header img {
            margin-right: 20px;
            padding-left: 25px;
            height: 100px;
            width: auto;
        }
        input {
            margin: 10px;
            background-color: #ff7b00;
            color: #ffffff; 
            font-weight: bold
        }
        .exercise-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .exercise-item {
            background-color: #f9f9f9;
            border-left: 4px solid #ff7b00;
            padding: 15px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .exercise-item:hover {
            background-color: #f0f0f0;
        }

        .exercise-name {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 8px;
            font-size: 18px;
        }

        .exercise-details {
            display: flex;
            justify-content: space-between;
            color: #666;
            font-size: 14px;
        }

        .exercise-equipment {
            margin-right: 10px;
        }

        .exercise-difficulty {
            background-color: #ff7b00;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        @media (max-width: 1500px) {
            #leftbox, #rightbox {
                width: 80%; 
                margin: 10px auto;
            }

            .bold {
                font-size: 24px; 
            }
            #topcontainer {
                display: flex;
                flex-wrap: wrap; 
                justify-content: center; 
                align-items: center; 
                gap: 20px; 
            }
        }
        @media (max-width: 1250px) {
            #leftbox, #rightbox, #formbox {
                width: 80%; 
                margin: 10px auto;
                font-size: 16px;
            }
            select, input[type="button"] {
                width: 100%; 
                margin: 10px 0;
                padding: 10px;
                font-size: 16px;
            }
            #apibox {
                width: 80%;
                font-size: 14px;
            }
        }



    </style>
   
    <script>    
    $(document).ready(function() {
    for (i=0;i<arr.length;i++) {
        $('#muscle').append("<option>"+arr[i]+"</option>")
    }
    $('#btn').click(function() {
        $('#api').html('')
        var muscle = $('#muscle').val()
        var level = $('#level').val()
        $.ajax({
            method: 'GET',
            url: 'https://api.api-ninjas.com/v1/exercises?muscle=' + muscle,
            headers: { 'X-Api-Key': 'uFRxuGhKBNF7XGiH2iWypw==xtRhgHAiKj8xHpET'},
            contentType: 'application/json',
            success: function(result) {
                if (level == "expert") {
                    $('#api').html('Upgrade to Pro to see more options!')
                } else {
                    let formattedOutput = '<ul class="exercise-list">';
                    let counter = 0;
                    
                    result.forEach(exercise => {
                        if (exercise['difficulty'].toLowerCase() === level.toLowerCase()) {
                            formattedOutput += `
                                <li class="exercise-item">
                                    <span class="exercise-name">${exercise['name']}</span>
                                    <div class="exercise-details">
                                        <span class="exercise-equipment">Equipment: ${exercise['equipment']}</span>
                                        <span class="exercise-difficulty">${exercise['difficulty']}</span>
                                    </div>
                                </li>
                            `;
                            counter++;
                        }
                    });
                    
                    formattedOutput += '</ul>';
                    
                    if (counter === 0) {
                        $('#api').html('No exercises found for the selected difficulty level.');
                    } else {
                        $('#api').html(formattedOutput);
                    }
                }
            },
            error: function ajaxError(jqXHR) {
                console.error('Error: ', jqXHR.responseText);
                $('#api').html('An error occurred while fetching exercises.');
            }
        });
    })
})
        arr = []
    </script>
</head>

<body>
    <?php
    	//establish connection info
        $server = "localhost";// your server
        $userid = "uoyu5gze1msw3"; // your user id
        $pw = "jb%v*H:(&I5@"; // your pw
        $db= "dbnih3tttqsztj"; // your database
                
        // Create connection
        $conn = new mysqli($server, $userid, $pw );

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
            
        //select the database
        $conn->select_db($db);

        //run a query
        $sql = "SELECT * FROM muscles";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $op = $row["name"];
                echo 
                "<script>
                    var option = '$op'
                    arr.push(option)
                </script>"; 
            }
        }
    
        //close the connection	
        $conn->close();

    ?>
    <div id="header">
        <div id="header-content">
            <a href="sculptsmart.html">
                <img id="header img" src="logo.jpg">
            </a>
            <span style="font-family: 'Avenir Next Bold', sans-serif;">Sculpt</span>
            <span style="font-family: 'Manrope', sans-serif; font-weight: 100;">Smart</span>
        </div>
        <div id='nav'>
            <ul>
                <li><a href='sculptsmart.html'>Home</a></li>
                <li><a href='service.php'>Services</a></li>
                <li><a href='plans.html'>Plans</a></li>
                <li><a href='partners.html'>Partners</a></li>
                <li><a href='contactUs.html'>Contact Us</a></li>
                <li><a href='login.html'>Login</a></li>
            </ul>
        </div>
    </div>


    <h1>Our Services</h1>
    <div id="topcontainer">
    <div id="leftbox"><div class='bold'>What We Do</div></div> 
    <div id="rightbox">Our app empowers you to design <strong>personalized workouts</strong> by providing a curated library of exercises tailored to your <strong>targeted muscle groups</strong> and <strong>preferred difficulty level</strong>.</div>
</br>
    <div id="leftbox"><div class='bold'>Why You Need It!</div></div>
    <div id="rightbox">Whether you're a beginner or a fitness enthusiast, our app takes the guesswork out of <strong>workout planning</strong>, helping you <strong>achieve your fitness goals</strong> efficiently and confidently.</div> 
</br>
    </div>
    <h2>Try It Out!</h2>
<br>
    <div id="container">
    <div id="formbox">
        
            <label>Choose Muscle Group: </label>
            <select size="1" id="muscle">
            </select>
        </br>
            <label>Choose Difficulty: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select size="1" name="level" id="level">
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Expert</option>
            </select>
        </br>
        <input type="button" value="Run" id="btn">
        
    </div>
    </div>
    <div id="apibox">
        <div id="api">Click run to see results!</div>
    </div>



    <div id="footer">
        <div id="botnav">
            <ul>
                <li><a href="sculptsmart.html">Home</a></li>
                <li><a href="plans.html">Plans</a></li>
                <li><a href="contactUs.html">Contact Us</a></li>
            </ul>
        </div>
    </div>
</body>




</html>
