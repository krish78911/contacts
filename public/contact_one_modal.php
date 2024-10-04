<div class="modal fade" class="contactOneModal" 
    id="contactOneModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" id="contactForm" class="userContactForm">
                <div class="mb-3 d-none">
                    <label for="email_type" class="form-label">Email Form Type</label>
                    <input type="text" class="form-control" id="email_type" name="email_type" value="contactOneType" required>
                </div>
                <div class="mb-3 d-none">
                    <label for="receiver_id" class="form-label">Receiver Id</label>
                    <input type="text" class="form-control" id="receiver_id" name="receiver_id" 
                        value="<?php echo $row['id']; ?>" required>
                </div>
                <div class="mb-3 d-none">
                    <label for="sender_id" class="form-label">Sender Id</label>
                    <input type="text" class="form-control" id="sender_id" name="sender_id" value="<?php echo $userId ?>" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>

            <div class="successMessage text-success"></div>
            <div class="errorMessage text-dangerr"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>