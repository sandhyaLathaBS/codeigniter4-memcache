<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>XML Parser</h2>
        <a href="<?= site_url('json-parser'); ?> " class="btn btn-success">Json</a>
        <table class="table">
            <thead>
                <tr>
                    <th>slno</th>
                    <th>Title</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($xml)) {
                    $i = 1;
                    foreach ($xml as $xmlVal) {
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $xmlVal['title']; ?></td>
                    <td><?= $xmlVal['start_time']; ?></td>
                    <td><?= $xmlVal['end_time']; ?></td>
                    <td><?php if (!empty($xmlVal['description'])) {
                                    foreach ($xmlVal['description'] as $Description) {
                                        echo "<li> $Description</li>";
                                    }
                                } ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>