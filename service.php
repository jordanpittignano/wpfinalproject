<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="sculptSmart.css">
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
            padding: 3px; 
            margin-right: 15%; 
            text-align:center; 
            background-color: #cccccc; 
            font-size: 20px;
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
            background-color: #cccccc; 
            font-size: 20px;}
        #formbox {
            width: 34%; 
            min-height: 100px; 
            border: 2px solid; 
            border-color: #ff7b00;
            display: inline-block; 
            vertical-align: top; 
            padding: 3px; 
            margin-bottom:20px;
            text-align: right; 
            margin-left:15%; 
            background-color: #cccccc; 
            font-size: 20px;
        }
        #apibox {
            width: 34%; 
            min-height:100px; 
            border: 2px solid; 
            border-color: #ff7b00; 
            display: inline-block; 
            margin-bottom: 20px; 
            padding: 3px; 
            margin-right: 15%; 
            background-color: #cccccc; 
            font-size: 20px;
        }
        #api {
            text-align: center; 
            font-weight: bold;
        }
        select {
            margin-bottom: 6px; 
            background-color: #cccccc;
        }
        input {
            background-color: #cccccc;
        }
        h1 {text-align: center;
        }
        .bold {font-weight: bold; 
            font-size: 30px; 
            text-decoration: underline; 
            margin-top: 30px;
        }

        #header img {
            margin-right: 20px;
            padding-left: 25px;
            height: 100px;
            width: auto;
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
                        datastring = JSON.stringify(result)
                        info = JSON.parse(datastring)
                        console.log(info)
                        ctr =0
                        if (level == "expert") {
                            $('#api').html('Uprade to Pro to see more options!')
                        } else {
                            for (i=0;i<info.length;i++) {
                                if (info[i]['difficulty'] == level) {
                                    $('#api').append(info[i]['name'] + "</br>")
                                    ctr++
                                }      
                            }
                        }
                    },
                    error: function ajaxError(jqXHR) {
                    console.error('Error: ', jqXHR.responseText);
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
        <div id="nav">
            <ul>
                <li><a href="sculptsmart.html">Home</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="plans.html">Plans</a></li>
                <li><a href="partners.html">Partners</a></li>
                <li><a href="contactUs.html">Contact Us</a></li>
            </ul>
        </div>
    </div>


    <h1>Our Services</h1>
    <div id="leftbox"><div class='bold'>What we do</div></div> 
    <div id="rightbox">Our app empowers you to design personalized workouts by providing a curated library of exercises tailored to your targeted muscle groups and preferred difficulty level.</div>
</br>
    <div id="leftbox">Whether you're a beginner or a fitness enthusiast, our app takes the guesswork out of workout planning, helping you achieve your fitness goals efficiently and confidently.</div> 
    <div id="rightbox"><div class='bold'>Why you need it</div></div>
</br>
    <div id="formbox">
        
            <label>Choose Muscle Group: </label>
            <select size="1" id="muscle">
            </select>
        </br>
            <label>Choose Difficulty: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select size="1" name="level" id="level">
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Expert</option>
            </select>
        </br>
        <input type="button" value="Run" id="btn">
        
    </div>

    <div id="apibox">
        <div id="api">Click Run to see results!</div>
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
