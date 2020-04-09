<?php
$result_str = $result = '';
if (isset($_POST['submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of ' . $units . ' - ' . $result;
    }
}

function calculate_bill($units) {
    $unit_cost_first = 9;
    $unit_cost_second = 12;
    $unit_cost_third = 15;
    
    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else if($units > 100) {
        $temp = (50 * 9) + (50 * $unit_cost_second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    }
    return number_format((float)$bill, 2, '.', '');
}

?>


<!DOCTYPE html>
<html>
<body>
    <div id=>
        
        <form action="" method="post" >            
                <input type="number" name="units" id="units" placeholder="Please enter no. of Units" />            
                <input type="submit" name="submit" id="submit" value="Submit" />      
        </form>

        <div>
            <?php echo '<br />' . $result_str; ?>
        </div>  
    </div>
</body>
</html>
