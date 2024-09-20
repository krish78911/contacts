<div class="modal fade" class="contactOneModal" 
    id="moreInfoModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- User Info Table -->
            <table class="table table-striped">
                <tr>
                    <th>First Name:</th>
                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                </tr>
                <tr>
                    <th>Last Name:</th>
                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                </tr>
                <tr>
                    <th>Birth Date:</th>
                    <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                </tr>
                <tr>
                    <th>Department:</th>
                    <td><?php echo htmlspecialchars($row['department']); ?></td>
                </tr>
                <tr>
                    <th>Job Type:</th>
                    <td><?php echo htmlspecialchars($row['job_type']); ?></td>
                </tr><tr>
                    <th>Address:</th>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                </tr>
                <?php if($isAdmin): ?>
                    <tr>
                        <th>Sick Leave:</th>
                        <td><?php echo htmlspecialchars($row['sick_leave']); ?></td>
                    </tr>
                    <tr>
                        <th>Child Sick Leave:</th>
                        <td><?php echo htmlspecialchars($row['child_sick_leave']); ?></td>
                    </tr>
                    <tr>
                        <th>Emergency Leave:</th>
                        <td><?php echo htmlspecialchars($row['emergency_leave']); ?></td>
                    </tr>
                    <tr>
                        <th>Salary:</th>
                        <td><?php echo htmlspecialchars($row['salary']); ?></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>