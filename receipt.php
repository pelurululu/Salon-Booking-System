<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<?php

    include ('./kepalers.html');

            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $number = $_POST['number'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
            $stylist = isset($_POST['stylist']) ? $_POST['stylist'] : '';
            $services = isset($_POST['services']) ? $_POST['services'] : [];

            $service_prices = [
                "Haircut (RM38)" => 38,
                "Hair Coloring (RM80)" => 80,
                "Pedicure (RM50)" => 50,
                "Manicure (RM40)" => 40,
            ];

            $gender_prices = [
                "Male (RM10)" => 10,
                "Female (RM20)" => 20,
            ];

            $stylist_rate = [
                "Ahmad - Junior - (RM20)" => 20,
                "Akmal - Junior - (RM15)" => 15,
                "Sabrina - Senior - (RM30)</" => 30,
                "Fatihah - Trainee - (RM1)" => 1,
            ];

            function calculate_that_thang($gender_prices, $service_prices, $stylist_rate, $gender, $services, $stylist)
                {
                    $total = 0;

                    foreach ($services as $service) {
                        if (isset($service_prices[$service])) {
                            $total += $service_prices[$service];
                        }
                    }

                    if (isset($gender_prices[$gender])) {
                        $total += $gender_prices[$gender];
                    }

                    if (isset($stylist_rate[$stylist])) {
                        $total += $stylist_rate[$stylist];
                    }
                
                    return $total;
                }
                
                $total = calculate_that_thang($gender_prices, $service_prices, $stylist_rate, $gender, $services, $stylist);
                
                $services_list = implode(", ", $services);
            

                echo "<div class='box'>";
                echo "<p><strong>Name :</strong> $name</p>";
                echo "<p><strong>Phone No :</strong> $number</p>";
                echo "<p><strong>Gender :</strong> $gender</p>";
                echo "<p><strong>Date :</strong> $date</p>";
                echo "<p><strong>Time :</strong> $time</p>";
                echo "<p><strong>Stylist :</strong> $stylist</p>";
                echo "<p><strong>Service(s) :</strong> $services_list</p>";
                echo "<p><strong>Total :</strong> RM $total</p>";
                echo "</div>";
?>
    </body>
</html>