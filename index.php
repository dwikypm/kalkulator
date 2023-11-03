<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Styling untuk kalkulator */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding-bottom: 60px;
            /* Menyesuaikan ukuran footer */
        }

        .calculator {
            width: 45%;
            margin: 50px 10px 50px 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            float: left;
        }

        .date-info {
            width: 45%;
            margin: 50px 20px 50px 10px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            float: right;
        }

        .btn {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
        }

        .result {
            width: 300px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 20px;
        }

        /* Styling untuk footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        /* Tambahan styling */
        .date-info p {
            margin: 5px 0;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Kalkulator Sederhana
            $('.calculator .btn').click(function(e) {
                e.preventDefault();
                var num1 = $('input[name="num1"]').val();
                var num2 = $('input[name="num2"]').val();
                var operation = $(this).attr('name');

                $.ajax({
                    type: "POST",
                    url: "kalkulator.php",
                    data: {
                        num1: num1,
                        num2: num2,
                        operation: operation
                    },
                    success: function(result) {
                        $(".result").html(result);
                    }
                });
            });

            // Kalkulator Zodiak
            $('input[name="calculateZodiac"]').click(function() {
                var birthdate = new Date($('input[name="birthdate"]').val());
                if (!isNaN(birthdate.getTime())) {
                    var zodiacSign = getZodiacSign(birthdate);
                    $('.date-info .zodiac-info').text(zodiacSign);
                } else {
                    $('.date-info .zodiac-info').text("Masukkan tanggal lahir yang valid!");
                }
            });

            function getZodiacSign(date) {
                var day = date.getDate();
                var month = date.getMonth() + 1;

                if ((month === 3 && day >= 21) || (month === 4 && day <= 19)) {
                    return "Aries";
                } else if ((month === 4 && day >= 20) || (month === 5 && day <= 20)) {
                    return "Taurus";
                } else if ((month === 5 && day >= 21) || (month === 6 && day <= 20)) {
                    return "Gemini";
                } else if ((month === 6 && day >= 21) || (month === 7 && day <= 22)) {
                    return "Cancer";
                } else if ((month === 7 && day >= 23) || (month === 8 && day <= 22)) {
                    return "Leo";
                } else if ((month === 8 && day >= 23) || (month === 9 && day <= 22)) {
                    return "Virgo";
                } else if ((month === 9 && day >= 23) || (month === 10 && day <= 22)) {
                    return "Libra";
                } else if ((month === 10 && day >= 23) || (month === 11 && day <= 21)) {
                    return "Scorpio";
                } else if ((month === 11 && day >= 22) || (month === 12 && day <= 21)) {
                    return "Sagittarius";
                } else if ((month === 12 && day >= 22) || (month === 1 && day <= 19)) {
                    return "Capricorn";
                } else if ((month === 1 && day >= 20) || (month === 2 && day <= 18)) {
                    return "Aquarius";
                } else if ((month === 2 && day >= 19) || (month === 3 && day <= 20)) {
                    return "Pisces";
                } else {
                    return "Zodiak Tidak Diketahui";
                }
            }
        });
    </script>
</head>

<body>
    <!-- Navbar menggunakan Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Kalkulator Sederhana</a>
    </nav>
    <!-- Akhir Navbar -->

    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <input type="text" class="form-control" name="num1" placeholder="Angka pertama">
        <input type="text" class="form-control" name="num2" placeholder="Angka kedua">
        <input type="submit" class="btn btn-primary" name="add" value="Tambah (+)">
        <input type="submit" class="btn btn-danger" name="subtract" value="Kurang (-)">
        <input type="submit" class="btn btn-success" name="multiply" value="Kali (×)">
        <input type="submit" class="btn btn-warning" name="divide" value="Bagi (÷)">
    </div>

    <div class="date-info">
        <h2>Kalkulator Zodiak</h2>
        <input type="date" class="form-control" name="birthdate" placeholder="Tanggal Lahir">
        <input type="submit" class="btn btn-info" name="calculateZodiac" value="Hitung Zodiak">
        <p>Zodiak: <span class="zodiac-info"></span></p>
    </div>

    <div style="clear: both;"></div>

    <div class="result">
        <h2>Hasil Perhitungan</h2>
        <!-- Hasil perhitungan akan muncul di sini -->
    </div>

    <!-- Footer menggunakan Bootstrap -->
    <footer>
        <div class="container">
            <p>&copy; 2023 Kalkulator Sederhana</p>
        </div>
    </footer>
    <!-- Akhir Footer -->

</body>

</html>