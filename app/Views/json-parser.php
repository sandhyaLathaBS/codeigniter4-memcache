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
        <h2>Json Parser</h2><a href="<?= site_url('/'); ?> " class="btn btn-success">XML</a>
        <table class="table">
            <thead>
                <tr>
                    <th>slno</th>
                    <th>Client IP</th>
                    <th>HTTP UESER AGENT</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($json)) {
                    $i = 1;
                    foreach ($json as $jsonVal) {
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $jsonVal['client_ip']; ?></td>
                    <td><?= $jsonVal['http_user_agent']; ?></td>
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