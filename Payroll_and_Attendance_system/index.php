<?php session_start(); ?>
<?php include 'header.php'; ?>
<style>
    #date, #time {
        font-size: 50px; /* Adjust the font size as needed */
        margin-bottom: 10px; /* Add margin for separation */
        color: white;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8); /* Add text glow effect */
    }

    #date {
        line-height: 1; /* Ensure a single line for the date */
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <p id="date"></p>
        <p id="time" class="bold"></p>
    </div>

    <div class="login-box-body">
        <h4 class="login-box-msg">Enter Employee ID</h4>

        <form id="attendance">
            <div class="form-group">
                <select class="form-control" name="status">
                    <option value="in">Time In</option>
                    <option value="out">Time Out</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" id="employee" name="employee"  placeholder=" User ID" style=" font-size: 15px;" required>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
                </div>
            </div>
        </form>
    </div>
    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>

</div>

<?php include 'scripts.php' ?>
<script type="text/javascript">
    $(function () {
        var interval = setInterval(function () {
            var momentNow = moment();
            $('#date').html(momentNow.format('dddd').substring(0, 3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
            $('#time').html(momentNow.format('hh:mm:ss A'));
        }, 100);

        $('#attendance').submit(function (e) {
            e.preventDefault();
            var attendance = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'attendance.php', 
                data: attendance,
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        $('.alert').hide();
                        $('.alert-danger').show();
                        $('.message').html(response.message);
                    } else {
                        $('.alert').hide();
                        $('.alert-success').show();
                        $('.message').html(response.message);
                        $('#employee').val('');
                    }
                }
            });
        });

    });
</script>

<!-- Additional script -->
<script>
    $(document).ready(function () {
        // Function to change background color to a colorful gradient
        function changeBackgroundColor() {
            var colors = ['#0f2862', '#9e363a', '##091f36', '#4f5f76', '#393f4d', '#005995', '#161748']; // Add more colors if needed
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
            $('body').css('background', 'linear-gradient(to right, ' + randomColor + ',#2f4f4f)');
        }

        // Click event to change background color when clicking on the login-box
        $('.login-box').on('click', function () {
            changeBackgroundColor();
        });
    });
</script>
</body>
</html>
