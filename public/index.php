        <?php include 'header.php'; ?>
        <?php include 'redirect_to_login.php'; ?>
        <?php include 'nav.php'; ?>
        <?php echo $isAdmin; ?>
        <div class="container mt-5">
            <a href="add.php" class="btn btn-primary btn-lg">Add New Contact</a>

            <h2 class="text-center mb-4">Employee Information Table</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Full Name</th>
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php while ($row = $result->fetch_assoc()): ?>
                <tr class='<?php echo ($userId == $row['id']) ? "showBold":""; ?>' >
                    <td><?php echo htmlspecialchars($row['first_name']) ." ". htmlspecialchars($row['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['department']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td>
                        <?php if($isAdmin || $userId == $row['id']): ?>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <div>
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?php echo $page - 1; ?>">Previous</a>
                <?php endif; ?>
                <?php if ($page < $totalPages): ?>
                    <a href="index.php?page=<?php echo $page + 1; ?>">Next</a>
                <?php endif; ?>
            </div>

        </div>

        <?php include 'footer.php' ?>

        
