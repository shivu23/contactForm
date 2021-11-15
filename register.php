<?php
session_start();
if (empty($_SESSION['quiz'])) $_SESSION['quiz'] = date('Y-m-d H:i:s');
?>

<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();
if (isset($_POST['submit'])) {
    if ($_POST['captcha'] != $_SESSION['code']) {

        echo "<center><span style=color:red;font-size:15px>Invalid Captcha Code</center></span>";
    } else {

        echo "<pre>";
        print_r($_POST);

        header('Location:success.php'); // redirects the user instantaneously.

        exit;
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <title></title>
    <script language="javascript">
        <?php
        $start = $_SESSION['quiz'];
        $end = date('Y-m-d H:i:s', strtotime($_SESSION['quiz'] . ' +20 minutes'));
        echo "
                    var date_quiz_start='$start';
                    var date_quiz_end='$end';
                    var time_quiz_end=new Date('$end').getTime();";
        ?>
        var tim;
        var hour = 00;
        var min = 03;
        var sec = 60;
        var f = new Date();

        function f1() {
            f2();
            document.getElementById("starttime").innerHTML = "You started your Form Fill at " + f.getHours() + ":" + f.getMinutes();

        }

        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :" + hour + " hours:" + min + " Minutes :" + sec + " Seconds";
                tim = setTimeout("f2()", 1000);
            } else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        location.href = "index.php";
                    } else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                }

            }
        }
    </script>

    <script type="text/javascript">
        function noBack() {
            window.history.forward();
        }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) {
            if (evt.persisted) noBack();
        }
        window.onunload = function() {
            void(0);
        }
    </script>


</head>

<body onload="f1()">
    <form id="form1" runat="server">
        <div>
            <table width="100%" align="center">
                <tr>
                    <td colspan="2">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="starttime"></div><br />
                        <div id="endtime"></div><br />
                        <div id="showtime"></div>
                    </td>
                </tr>
                <tr>
                    <td>

                        <br />

                    </td>

                </tr>
            </table>
            <br />

        </div>
    </form>
</body>

</html>



<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<style type="text/css">
    #multistep_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>
</head>

<body style="background-color:#FAEBD7">
    <h3 class="text-success" align="center">Please Fill Up Your Registration Details Here</h3><br>
    <div class="container">

        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Register Form </div>
                <form class="form-horizontal" method="post" action="insert.php" style="background-color:000000; border-style:solid;border-color:yellow">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Name" style="color:red">Name:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email" style="color:red">Email:</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="dob" style="color:red">Date of Birth:</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="txtDate" name="dob" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="about" style="color:red">About:</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="about" name="about"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="captch" style="color:red">Captcha:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="captch" name="captcha" required>
                            </div>
                            <div class="col-sm-2"><img src="captcha.php" id="captcha_id"></div>
                            <div class="col-sm-2"><i class="fa fa-refresh" onclick="document.getElementById('captcha_id').src = 'captcha.php'; return false" style="font-size:25px;color:red;cursor:pointer"></i>
                            </div>
                        </div>

                        <input type="submit" name="submit" class="next btn btn-success" value="SUBMIT" id="submit" style='margin-left:30%' />

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>