<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    
    <body>
        
        <div class="panel">
            <h2>Booking Form</h2>
            <p>Please fill out the form below to complete your booking.</p>

            <form action="" method="post">

            <label id="nama">Name</label>
            <br>
            <input type="text" id="txtnama" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" >
            <br>
            <label id="nombor">Phone Number</label>
            <br>
            <input type="text" id="txtnum" name="number" value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>">
            <br>
            <label id="lbtarikh">Date</label>
            <label id="lbmasa">Time</label>
            <br>
            <input type="date" id="txtdate" name="date" value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>" >
            <input type="time" id="txttime" name="time" value="<?php if (isset($_POST['time'])) echo $_POST['time']; ?>" >
            <br>
            <br>
            <br>
          
            <label id="lbStylist">Stylist</label>
            <label id="lbGender">Gender</label>
            <br>
            
            
            <select id="dropStylist" name="stylist">
                <option value="" disabled selected>Select Stylist</option>
                <option value="Akmal - Junior - (RM15)"<?php if (isset($_POST['stylist']) && $_POST['stylist'] == 'Akmal - Junior - (RM15)') echo ' selected'; ?>>Akmal - Junior - (RM15)</option>
                <option value="Ahmad - Junior - (RM20)"<?php if (isset($_POST['stylist']) && $_POST['stylist'] == 'Ahmad - Junior - (RM20)') echo ' selected'; ?>>Ahmad - Junior - (RM20)</option>
                <option value="Sabrina - Senior - (RM30)"<?php if (isset($_POST['stylist']) && $_POST['stylist'] == 'Sabrina - Senior - (RM30)') echo ' selected'; ?>>Sabrina - Senior - (RM30)</option>
                <option value="Fatihah - Trainee - (RM1)"<?php if (isset($_POST['stylist']) && $_POST['stylist'] == 'Fatihah - Trainee - (RM1)') echo ' selected'; ?>>Fatihah - Trainee - (RM1)</option>
            </select>
            <select id="dropGender" name="gender">
                <option value="" disabled selected>Select Gender</option>
                <option value="Male (RM10)"<?php if (isset($_POST['gender']) && $_POST['gender'] == 'Male (RM10)') echo ' selected'; ?>>Male (RM10)</option>
                <option value="Female (RM20)"<?php if (isset($_POST['gender']) && $_POST['gender'] == 'Female (RM20)') echo ' selected'; ?>>Female (RM20)</option>
            </select>
            <br>
            <label id="lbServices">Select maximum three services you want :</label>
            <br>
            
            <input type="checkbox" id="haircut" name="services[]" value="Haircut (RM38)"<?php if (isset($_POST['services']) && in_array('Haircut (RM38)', $_POST['services'])) echo ' checked';?>>
            <label for="haircut" id="lbHaircut">Haircut (RM38)</label><br>

            <input type="checkbox" id="HairColoring" name="services[]" value="Hair Coloring (RM80)"<?php if (isset($_POST['services']) && in_array('Hair Coloring (RM80)', $_POST['services'])) echo ' checked'; ?>>
            <label for="HairColoring" id="lbHairColoring">Hair Coloring (RM80)</label><br>

            <input type="checkbox" id="Pedicure" name="services[]" value="Pedicure (RM50)"<?php if (isset($_POST['services']) && in_array('Pedicure (RM50)', $_POST['services'])) echo ' checked'; ?>>
            <label for="Pedicure" id="lbPedicure">Pedicure (RM50)</label><br>

            <input type="checkbox" id="manicure" name="services[]" value="Manicure (RM40)"<?php if (isset($_POST['services']) && in_array('Manicure(RM40)', $_POST['services'])) echo ' checked'; ?>>
            <label for="manicure" id="lbManicure">Manicure(RM40)</label>

            <br>

            <input type="submit" id="submit" name="submitted" value="Submit">
<br>
            <div id="summaryone">
                <h2 id="SummaryTitle">Summary</h2>
                <br>
                <br>
                
                <input type="submit" id="confirm" name="confirmed" value="Confirm" formaction="receipt.php" disabled>

            </div>

            </form>
        </div>
<?php
        include ('./kepalers.html');

        if (isset($_POST['submitted'])) {

            
            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $number = $_POST['number'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $stylist = isset($_POST['stylist']) ? $_POST['stylist'] : '';
            $services = isset($_POST['services']) ? $_POST['services'] : [];

            $hasError = false; 

            
            if (!isset($_POST['name']) || empty($name)) {
                echo "<div class='error-box'>Name is required.</div>";
                $hasError = true;
            } elseif (strlen($name) < 2) {
                echo "<div class='error-box'>Name must be at least 2 characters long.</div>";
                $hasError = true;
            }

            if (!isset($_POST['number']) || empty($number)) {
                echo "<div class='error-box'>Phone number is required.</div>";
                $hasError = true;
            } elseif (strlen($number) < 10) {
                echo "<div class='error-box'>Phone number must be at least 10 digits.</div>";
                $hasError = true;
            }

            if (!isset($_POST['date']) || empty($date)) {
                echo "<div class='error-box'>Date is required.</div>";
                $hasError = true;
            }

            if (!isset($_POST['time']) || empty($time)) {
                echo "<div class='error-box'>Time is required.</div>";
                $hasError = true;
            }

            if (!isset($_POST['stylist']) || empty($stylist)) {
                echo "<div class='error-box'>Stylist selection is required.</div>";
                $hasError = true;
            }

            if (!isset($_POST['gender']) || empty($gender)) {
                echo "<div class='error-box'>Gender selection is required.</div>";
                $hasError = true;
            }

            if (empty($services)) {
                echo "<div class='error-box'>Please select at least one service.</div>";
                $hasError = true;
            } elseif (count($services) > 3) {
                echo "<div class='error-box'>You can select a maximum of 3 services.</div>";
                $hasError = true;
            }

            
            if (!$hasError) {
                $services_list = implode(", ", $services);
                echo "<div class='summary-box'>";
                echo "<p><strong>Name :</strong> $name</p>";
                echo "<p><strong>Phone No :</strong> $number</p>";
                echo "<p><strong>Gender :</strong> $gender</p>";
                echo "<p><strong>Date :</strong> $date</p>";
                echo "<p><strong>Time :</strong> $time</p>";
                echo "<p><strong>Stylist :</strong> $stylist</p>";
                echo "<p><strong>Service(s) :</strong> $services_list</p>";
                echo "</div>";
                echo "<script>document.getElementById('confirm').disabled = false;</script>";
            }
        }
?>
        
    </body>
    
</html>

