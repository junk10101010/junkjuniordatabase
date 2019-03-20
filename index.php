<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>App</title>
</head>
<body>
    <form method="POST">
        <textarea name="numbers" placeholder="Enter numbers"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $numbers = $_POST['numbers'];
        $result = '';
        $numbers_arr = explode('?', $numbers);
        $word = "";
        $txt = "";
        foreach($numbers_arr as $number) {
            if($number == '000000111') {
                $word .= "I";
                $txt .= $number;
            }
            elseif($number == '000000100') {
                $word .= "C";
                $txt .= $number;
            }
            elseif($number == '011111000') {
                $word .= "Y";
                $txt .= $number;
            }
            elseif($number == '000001111') {
                $word .= "O";
                $txt .= $number;
            }
        }
        if($word != "") {
            $conn->query("INSERT INTO list(wordtxt, numberstxt) VALUES('$word', '$txt')");
            echo "<center>".$word ."<br>".$txt."</center>";
        }
    }
    ?>
    <hr>
    <table border='1'>
        <tr>
            <th>#</th>
            <th>Words</th>
            <th>Numbers</th>
            <th>Date</th>
        </tr>
        <?php
        $i = 1;
        $query = "SELECT * FROM list ORDER BY id DESC";
        $query = $conn->query($query);
        while($row = $query->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['wordtxt']; ?></td>
            <td><?php echo $row['numberstxt']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
</body>
</html>
