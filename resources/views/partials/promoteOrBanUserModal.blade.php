<section id={{ "actionButtons" . $user["user_id"]}}>
    <button data-id={{ $user["user_id"] }} type="button" class="banButton btn btn-danger" data-bs-toggle="modal" data-bs-target={{"#banModal" . $user["user_id"]}}><i class="bi bi-person-x-fill"></i>
        <div class="d-none d-lg-inline">Ban &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </button>

    <!-- Modal -->
    <div class="modal fade" id={{"banModal" . $user["user_id"]}} tabindex="-1" aria-labelledby={{"banModalLabel" . $user["user_id"]}} aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id={{"banModalLabel" . $user["user_id"]}}>Promote User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    {{"Are you sure you want to ban " . $user["username"] . "?"}}
                    <form>
                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Reason:</label>
                          <textarea class="form-control" id={{ "banReason" . $user["user_id"]}} style="resize: none"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick={{ "banUser(" . $user["user_id"] . ")" }}>Yes</button>
                </div>
            </div>
        </div>
    </div>



    
    <button data-id={{ $user["user_id"] }} type="button" class="promoteButton btn btn-success" data-bs-toggle="modal" data-bs-target={{"#promoteModal" . $user["user_id"]}}><i class="bi bi-person-plus-fill"></i></i>
        <div class="d-none d-lg-inline"> Promote to Admin
        </div>
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id={{"promoteModal" . $user["user_id"]}} tabindex="-1" aria-labelledby={{"promoteModalLabel" . $user["user_id"]}} aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id={{"promoteModalLabel" . $user["user_id"]}}>Promote User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                {{"Are you sure you want to promote " . $user["username"] . "?"}}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick={{ "promoteUser(" . $user["user_id"] . ")" }}>Yes</button>
                </div>
            </div>
        </div>
    </div>

    
</section>