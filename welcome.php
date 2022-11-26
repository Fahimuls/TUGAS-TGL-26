<html>
    <body>
        Welcome <?php echo $_POST["firstname"];?><br>
        Your Email Addres is: <?php echo $_POST["email"];

    $servername="localhost";
    $username="root";
    $password="";
    $dbname="mydb";
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
    }
    
    $sql = "INSERT INTO MYGuests (firstname, lastname, email)
    VALUES ('$firstname', '$lastname', '$email');";
    
    if($conn->query($sql) === TRUE){
        echo "New records created succesfully";
    } else {
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    
    $conn = new mysqli ($servername, $username, $password, $dbname);
    $sql=  "SELECT id, firstname, lastname FROM MyGuests";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        //output data of each row
        while($row=$result->fetch_assoc()) {
            echo "id:" . $row["id"]. "-Name:" . $row["firstname"]." " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    <a href="http://localhost/tess.php">hapus</a>
    <a href="http://localhost/tambahdata.php">tambah</a>
    </body>
</html>
