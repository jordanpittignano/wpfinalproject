<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="sculptSmart.css">

    <style>
        #header {
            font-size: 60px; 
            padding: 10px 0;
            font-weight: 600;
            font-family: 'Playfair Display', serif;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        #header-content {
            display: flex;
            align-items: center;
            justify-content: left;
            margin-top: 20px;
            width: 100%; 
            padding: 0 80px;
        }

        #nav {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        #nav ul{
            list-style-type: none; 
            font-size: 15px; 
            margin-bottom: 33px;
            padding: 5px; 
            font-weight: 400;
            display: flex;
            gap: 20px;
        }

        #nav ul a:hover {
            text-decoration: underline;
        }

        #nav li a {
            padding: 10px;
            text-decoration: none;
            font-size: 20px;
        }

        #botnav ul {
            text-align: center; 
            margin: 0 auto;
        }

        #botnav li {
            list-style-type: none; 
            display: inline; 
            margin-right: 15px; 
            padding: 10px;
        }

        #botnav ul a:hover {
            text-decoration: underline;
        }

        #botnav li a {
            padding: 10px;
            text-decoration: none;
            font-size: 20px;
        }    

        #footer {
            margin-top: 80px;
            height: auto;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        li {
            display: inline-block;
        }
        
    </style>

    <script>
        $(document).ready(function() {
            for (i=0;i<arr.length;i++) {
                $('#muscle').append("<option>"+arr[i]+"</option>")
            }
        });
        arr = []
    </script>
   

</head>

<body>

    <?php
        echo "
        <div id='header'>
        <div id='header-content'>
            <a href='index.html'>
                <img id='header img' src='#'>
            </a>
            SculptSmart
        </div>
        <div id='nav'>
            <ul>
                <li><a href='#'>Home</a></li>
                <li><a href='#'>Services</a></li>
                <li><a href='#'>Plans</a></li>
                <li><a href='#'>Partners</a></li>
                <li><a href='contactUs.html'>Contact Us</a></li>
            </ul>
        </div>
        </div>";

        if(array_key_exists('btn2', $_POST)) {
            $first = $_GET["first"];
            $last = $_GET["last"];
            //establish connection info
            $server = "localhost";// your server
            $userid = "uoyu5gze1msw3"; // your user id
            $pw = "jb%v*H:(&I5@"; // your pw
            $db= "dbnih3tttqsztj"; // your database
                    
            // Create connection
            $conn = new mysqli($server, $userid, $pw, $db);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                $excercise = $_POST['exc'];
                $sql = "INSERT INTO $last$first (excercise)
                VALUES ('$excercise')";

                if ($conn->query($sql) === TRUE) {
                    $sql = "SELECT * from $last$first";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<div class='excercise-list'>";
                        while($row = $result->fetch_assoc()) {
                            $exc = $row['excercise'];
                            echo $exc . "</br>";
                        }
                        echo "</div>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }

        if(array_key_exists('btn1', $_POST)) {
            $muscle = $_POST['muscle']; 
            $difficulty = $_POST['level'];
            
            $apiKey = "uFRxuGhKBNF7XGiH2iWypw==xtRhgHAiKj8xHpET";

            // Initialize cURL session
            $curl = curl_init();

            // Set cURL options
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.api-ninjas.com/v1/exercises?muscle=" . urlencode($muscle) . "&difficulty=" . urlencode($difficulty),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: $apiKey",
                    "Content-Type: application/json"
                ],
            ]);

            // Execute the request and get the response
            $response = curl_exec($curl);

            // Check for cURL errors
            if (curl_errno($curl)) {
                echo "cURL Error: " . curl_error($curl);
            } else {
                // Decode and handle the response
                $result = json_decode($response, true);
                echo "<div id='secondform'><form method='post'>";
                echo "<select size='10' name='exc' id='exc'>";
                for ($i=0;$i<10;$i++) {
                    $name = $result[$i]["name"];
                    echo "<option>$name</option>";
                }
                echo "</select>";
                echo "<input type='submit' id='btn2' name='btn2'>";
                echo "</form></div>";
            }
        }

        echo "
        <div id='firstform'>
        <form method='post'>
            <label>Choose Muscle Group: </label>
                <select size='1' id='muscle' name='muscle'>
                    </select>
            </br>
            <label>Choose Difficulty: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select size='1' name='level' id='level'>
                    <option>beginner</option>
                    <option>intermediate</option>
                    <option>expert</option>
                </select>
            </br>
            <input type='submit' id='btn1' name='btn1'>
        </form>
        </div>";

        echo "
            <div id='footer'>
            <div id='botnav'>
                <ul>
                    <li><a href='#'>Home</a></li>
                    <li><a href='#'>Plans</a></li>
                    <li><a href='contactUs.html'>Contact Us</a></li>
                </ul>
            </div>
            </div>";

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

        //establish connection info
        $server = "localhost";// your server
        $userid = "uoyu5gze1msw3"; // your user id
        $pw = "jb%v*H:(&I5@"; // your pw
        $db= "dbnih3tttqsztj"; // your database
                
        // Create connection
        $conn = new mysqli($server, $userid, $pw, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            
        $first = $_GET["first"];
        $last = $_GET["last"];

        // run a query
        $sql = "CREATE TABLE $last$first (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        excercise VARCHAR(400) NOT NULL
        )";
        
        if ($conn->query($sql) === TRUE) {
            // nothing
        } else {
            echo "Error creating table: " . $conn->error;
        }

        //close the connection	
        $conn->close();
    ?>
    
</body>


</html>
