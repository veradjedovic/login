<table>
    <tr>
        <th>#</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Created At</th>
    </tr>

    <?php
    if(isset($data['users'])) {
        $i = 1;
        foreach ($data['users'] as $user) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo ($user->name) ? replace($user->name) : ''; ?></td>
                <td><?php echo ($user->surname) ? replace($user->surname) : ''; ?></td>
                <td><?php echo ($user->email) ? ($user->email) : ''; ?></td>
                <td><?php echo ($user->created_at) ? date('d\.m\.Y.', strtotime($user->created_at)) . ' at ' . date('G\:i\:s', strtotime($user->created_at)) : ''; ?></td>
            </tr>
            <?php
            $i++;
        }
    } else {

    ?>
        <tr><td colspan="5"><?php echo isset($data['message']) ? $data['message'] : ''; ?></td></tr>
    <?php
    }
    ?>
</table>
