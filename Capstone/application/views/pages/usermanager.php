</br>
<h2>User Manager</h2>
</br>
<body>

<table class="table table-responsive table-bordered">
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Full Name</th>
      <th>Type</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

<?php 
$i = 0;
foreach ($users as $user): ?>
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $user->username;?></td>
        <td><?php echo $user->first_name, $user->last_name;?></td>
        <td><?php echo $user->user_type;?></td>
        <td><?php echo $user->isActive;?></td>
        <td><b><a href ="<?php echo base_url(); ?>index.php/manager/singleuser">Edit</a></b></td>
    </tr>
<?php endforeach; ?>

</table>