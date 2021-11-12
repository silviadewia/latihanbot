<?php
require("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chating Bot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

        body {
            background: #EEEEEE;
            font-family: 'Roboto', sans-serif
        }

        .card {
            width: 300px;
            border: none;
            border-radius: 15px
        }

        .adiv {
            background: #04CB28;
            border-radius: 15px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            font-size: 12px;
            height: 46px
        }

        .chat {
            border: none;
            background: #E2FFE8;
            font-size: 10px;
            border-radius: 20px
        }

        .bg-white {
            border: 1px solid #E7E7E9;
            font-size: 10px;
            border-radius: 20px
        }

        .myvideo img {
            border-radius: 20px
        }

        .dot {
            font-weight: bold
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #F0F0F0;
            font-size: 8px
        }

        .form-control:focus {
            box-shadow: none
        }

        .form-control::placeholder {
            font-size: 8px;
            color: #C4C4C4
        }
    </style>
</head>
<div class="container d-flex justify-content-center">
    <div class="card mt-5">
        <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <i class="fas fa-chevron-left"></i>
            <span class="pb-3">Live chat</span> <i class="fas fa-times"></i>
        </div>
        <form action="bot.php" method="POST">
            <input type="hidden" name="tujuan" id="tujuan" value="feri">
            <input type="hidden" name="pengirim" id="pengirim" value="bot">
            <input type="hidden" name="is_bot" id="is_bot" value="1">
            <?php
            $query_mysql = mysqli_query($conn, "SELECT * FROM pesan ");
            while ($data = mysqli_fetch_array($query_mysql)) {
                if ($data['is_bot'] == 1) //1 isbot 
                {
            ?>
                    <div class="d-flex flex-row p-3">
                        <div class="bg-white mr-2 p-3"><span class="text-muted"><?php echo $data['isi']; ?>.</span>
                        </div> <img src="img/bot.png" width="30" height="30">
                    </div>
                <?php
                } else {
                ?>
                 <div class="d-flex flex-row p-3"> <img src="img/person.png" width="30" height="30">
                        <div class="chat ml-2 p-3"><?php echo  $data['isi']; ?>
                        </div>
                    </div>

            <?php
                }
            }
            ?>

            <div class="form-group px-3">
                <textarea name="pesan" id="pesan" class="form-control" rows="5" placeholder="Type your message"></textarea>
                <center><input type="submit" class="btn btn-sm btn-primary" value="Kirim"></center>
            </div>
        </form>
    </div>

</div>
</body>

</html>