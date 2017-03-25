
<html>
    <head>
        <title>Alert Parser</title>
    </head>
    <body>
        <form action="api" method="POST">
        <textarea name="text"></textarea><br />
        <button type="submit">Submit</button>
        </form><br />
        <table>
            <tr>
                <td>Alert ID</td>
                <td>Bank</td>
                <td>Lastname</td>
                <td>Other Names</td>
                <td>Transaction Type</td>
                <td>Account Number</td>
                <td>Location</td>
                <td>Description</td>
                <td>Amount</td>
                <td>Date</td>
                <td>Remarks</td>
                <td>Time</td>
                <td>Document Number</td>
                <td>Current Balance</td>
                <td>Account Balance</td>
            </tr>
            <?php
            if($result){
                if((count($result)) > 0){
                    foreach($result as $item) : ?>
                        <tr>
                            <td><?= $item->alertid; ?></td>
                            <td><?= $item->bankid; ?></td>
                            <td><?= $item->lastname; ?></td>
                            <td><?= $item->firstname; ?></td>
                            <td><?= $item->type; ?></td>
                            <td><?= $item->accountnumber; ?></td>
                            <td><?= $item->location; ?></td>
                            <td><?= $item->description; ?></td>
                            <td>&#8358;<?= $item->amount; ?></td>
                            <td><?= $item->date; ?></td>
                            <td><?= $item->remarks; ?></td>
                            <td><?= $item->time; ?></td>
                            <td><?= $item->documentnumber; ?></td>
                            <td><?= $item->currentbalance; ?></td>
                            <td><?= $item->accountbalance; ?></td>
                        </tr>

                    <?php endforeach;
                    
                } else {
                    echo "<tr><td colspan='15'>There is no alert in the database</td></tr>";
                }
            } else {
                echo "<tr><td colspan='15'>There was an error with the query</td></tr>";
            }
            ?>
        </table>
    </body>
    
</html>