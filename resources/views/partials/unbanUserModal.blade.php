
<section id={{ "actionButtons" . $user["user_id"]}}>
    <button data-id={{ $user["user_id"] }} type="button" class="d-none d-lg-inline unbanButton btn btn-danger" data-bs-toggle="modal" data-bs-target={{"#unbanModal" . $user["user_id"]}}><i class="bi bi-person-check-fill"></i>
        Unban
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id={{"unbanModal" . $user["user_id"]}} tabindex="-1" aria-labelledby={{"unbanModalLabel" . $user["user_id"]}} aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id={{"unbanModalLabel" . $user["user_id"]}}>Unban User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{"Are you sure you want to unban " . $user["username"] . "?"}}</p>
                <p>{{"Ban reason: " . $user->banReason($user["user_id"])}}</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick={{ "unbanUser(" . $user["user_id"] . ")" }}>Yes</button>
            </div>
        </div>
        </div>
    </div>
</section>
