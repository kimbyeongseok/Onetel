<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">

</head>

<body>
    <div class="wrap">
        <?php include "include/header.php" ?>

        <?php include "include/footer.php" ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>

    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>">
    </script>
    <script>
    $(document).ready(function() {
        $.getJSON("/onetel/data/community.json", function(data) {
            var items = [];
            $.each(data, function(i, item) {
                var inHTML = "<p>" + item.id + "</p>";
                items.push($(inHTML).get(0));
            });
            $(".json").append(items);
        });
    });
    </script>
</body>

</html>