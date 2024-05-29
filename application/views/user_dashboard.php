<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h2>User Dashboard</h2>
    <p>Welcome, <?php echo $this->session->userdata('username'); ?></p>
    <a href="<?php echo base_url('auth/logout'); ?>">Logout</a>
</body>
</html>
