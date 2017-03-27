
<?php
	$servername = "localhost";
	$username = "root"; // MySql username
	$password = ""; // MySql password

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE childrenParty4u";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// connect to db

//include '../conn.php';
$conn = new mysqli($servername, $username, $password, "childrenParty4u");

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$country = $_POST['country'];


echo "</br>";

// sql to create table BOOKIG
$sql = "CREATE TABLE `booking` (
  `book_id` int(6) NOT NULL,
  `user_id` int(6) DEFAULT NULL,
  `party_id` int(6) DEFAULT NULL,
  `no_of_child` int(5) NOT NULL,
  `book_cost` int(5) NOT NULL,
  `party_date` date DEFAULT NULL,
  `book_status` int(1) NOT NULL DEFAULT '0'
)";

echo "</br>";

$conn->query($sql);

$sql = "INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`)
 VALUES(1, 2, 2, 10, 300, '2017-04-29', 1)";
$conn->query($sql);

$sql = "INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`)
 VALUES(2, 2, 3, 15, 225, '2017-03-30', 0)";
$conn->query($sql);

$sql = "INSERT INTO `booking` (`book_id`, `user_id`, `party_id`, `no_of_child`, `book_cost`, `party_date`, `book_status`) 
VALUES(3, 4, 3, 9, 135, '2017-04-05', 1)";
$conn->query($sql);


// Create CHILDREN
$sql = "CREATE TABLE `children` (
  `child_id` int(5) NOT NULL,
  `child_name` varchar(30) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `child_bdate` date DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `user_id` int(6) NOT NULL

) ";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
}

$sql = "INSERT INTO `children` (`child_id`, `child_name`, `gender`, `child_bdate`, `age`, `user_id`)
 VALUES(1, 'Jamila', 'F', '2009-02-15', 8, 4)";
$conn->query($sql);


// Create PARTY
$sql = "CREATE TABLE `party` (
  `party_id` int(6) NOT NULL,
  `party_type` varchar(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `max_child` int(5) DEFAULT NULL,
  `cost_per_child` int(5) DEFAULT NULL,
  `party_length` int(3) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `images` varchar(100) NOT NULL DEFAULT 'noimage.jpg'

)";
echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table party created successfully";
}

$sql = "INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`)
 VALUES(1, 'The Best of Pirate', 'This will be a pirate themed party and will include relevant decorations.', 30, 15, 90, 'Pirate costumers and face painting', 'pirate-party-ideas.jpg')";
$conn->query($sql);


$sql = "INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`) 
VALUES(2, 'Build a Bear', 'This party will show the children how to make their own bear which they will keep at the end of the party.', 10, 30, 120, 'Each child will keep the bear they have made. Optional costumes can be purchased for an additional c', 'Build-a-Bear.jpg')";
$conn->query($sql);

$sql = "INSERT INTO `party` (`party_id`, `party_type`, `description`, `max_child`, `cost_per_child`, `party_length`, `service`, `images`)
 VALUES(3, 'Star Wars', 'This party will have a Star Wars theme. It looks like you are in Star Wars.', 15, 15, 90, 'Each child will receive a Star Wars gift as their party prize.', 'star-wars-party.jpg')";
$conn->query($sql);


// Create USERS
$sql = "CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_type` int(1) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `currency` varchar(5) DEFAULT 'GBP',
  `no_of_child` int(11) DEFAULT NULL
)";

echo "</br>";
if ($conn->query($sql) === TRUE) {
    echo "Table USERS created successfully";
}


$sql = "INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`)
 VALUES(1, 0, 'One', 'o', 'o@o.com', 'o', 'Oman', 'USD', 5)";
$conn->query($sql);

$sql = "INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`)
 VALUES(2, 0, 'Hridoy', 'h', 'h@h.com', 'h', 'Holand', 'USD', 3)";
$conn->query($sql);

$sql = "INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`) 
VALUES(3, 1, 'Admin', 'a', 'admin@admin.com', 'a', NULL, 'GBP', NULL)";
$conn->query($sql);

$sql = "INSERT INTO `users` (`user_id`, `user_type`, `name`, `user_name`, `email`, `password`, `country`, `currency`, `no_of_child`)
 VALUES(4, 0, 'I am Root', 'root', 'root@root.com', 'root', 'Russia', 'EUR', 1)";
$conn->query($sql);


$sql = "INSERT INTO users (name, user_type, user_name, email, password, country)
VALUES ('$name', 1, '$username', '$email', '$pass', '$country')";

$conn->query($sql);

// ADDING PRIMARY AND FOREIGN KEY

$sql = "ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `party_id` (`party_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `user_id` (`user_id`)";

$conn->query($sql);

$sql = "ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`)";
$conn->query($sql);

$sql = "ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`)";

$conn->query($sql);

$sql = "ALTER TABLE `users`
  ADD UNIQUE(`user_name`)";

$conn->query($sql);
$sql = "ALTER TABLE `users`
  ADD UNIQUE(`email`)";

$conn->query($sql);
//ADING AUTO_INCREMENT VALUES

$sql = "ALTER TABLE `booking`
  MODIFY `book_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

$conn->query($sql);

$sql = "ALTER TABLE `children`
  MODIFY `child_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

$conn->query($sql);

$sql = "ALTER TABLE `party`
  MODIFY `party_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

$conn->query($sql);

$sql = "ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

$conn->query($sql);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
    echo "<br>Everythig Setup Successfully";
}

header('location: index.php');
$conn->close();


?>
