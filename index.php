<!DOCTYPE html>
<html lang="en">

<style>
    .container-custom {
        width: 500px;
        margin: 0 auto;
    }

    .hole {
        width: 60px;
        height: 60px;
        background-color: brown;
        border-radius: 50px;
    }

    .grid-holes {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        padding: 10px;
    }

    img.mole {
        width: 50px;
        height: 50px;
        display: none;

    }

    .game-over {
        display: none;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuzzBar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <script>
        
        $(document).ready(function() {

            function getRandomInt(max) {
                return Math.floor(Math.random() * Math.floor(max));
            }
            var holes = document.querySelectorAll(".hole");
            var mole = document.querySelectorAll(".mole");
            let arr = [];
            let score = 0;

            $("img").on('click', () => {
                score = score + 1
                $(mole).hide();
            })

            var counter = 0;
            var interval = setInterval(function() {
                counter++;
                $('.timer').html(counter);
                if (counter == 30) {
                    clearInterval(interval);
                    clearInterval(moleInterval);
                    $('.row').hide();
                    $('.game-over').show();
                    $('.score').append(score);
                    document.getElementById('score').value = score;

                }
            }, 1000);

            var speed = 1500;

            function changeTimer() {
                speed = speed * 0.9;
            }

            var moleInterval = setInterval(() => {
                console.log(speed);
                var i = getRandomInt(6)
                var k = getRandomInt(30)
                if ($(mole).is(":visible")) {
                    $(mole).hide();
                } else {
                    $(mole[i]).show();
                    $(mole[k]).show();

                }
                changeTimer();
            }, speed)
        });

    </script>

    <div class="container-custom">
        <div class="row game-over">
            Your Score is: <div class="score"></div>
            <form action="includes/init.php" method="post">
                <input type="hidden" name="score" id="score" />
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <div class="row game-on">
            <div class="score"></div>
            <div class="timer"></div>
            <div class="grid-holes">
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
            </div>
            <div class="grid-holes">
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
                <div class="hole"><img class="mole" id="" src="img/mole.png" width="50" height="50" /> </div>
            </div>
        </div>
    </div>
</body>

</html>