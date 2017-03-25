<html>
    <head>
        <title>Alert Parser</title>
    </head>
    <body>
        <?php
            if($alert2Process->save($pdo, $bank)): ?>
                Alert added to database
            <?php else : ?>
               Failed to add alert to database
            <?php endif; ?>
    </body>
</html>