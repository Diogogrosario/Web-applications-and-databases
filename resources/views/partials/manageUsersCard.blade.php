<tr class={{ "user" . $user["user_id"]}}>
    <th scope="row" class="d-none d-lg-table-cell">{{ $key + 1 }}</th>
    <td>{{ $user["first_name"] }}</td>
    <td>
         <a id="username-anchor"href={{ "/userProfile/" . $user["user_id"] }}>{{ $user["username"] }} </a>
    </td>
    <td class="d-none d-lg-table-cell">{{ $user["email"] }}</td>
        @if (!$user->isBanned())    
            <td>
                <section id={{ "actionButtons" . $user["user_id"]}}>
                    <button data-id={{ $user["user_id"] }} type="button" class="banButton btn btn-danger"><i class="bi bi-person-x-fill"></i>
                        <div class="d-none d-lg-inline">Ban &nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </button>
                    
                    <button data-id={{ $user["user_id"] }} type="button" class="promoteButton btn btn-success" data-bs-toggle="modal" data-bs-target="#promoteModal"><i class="bi bi-person-plus-fill"></i></i>
                        <div class="d-none d-lg-inline"> Promote to Admin
                        </div>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="promoteModal" tabindex="-1" aria-labelledby="promoteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="promoteModalLabel">Promote User</h5>
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
            </td>
        @else
            <td>
                <section id={{ "actionButtons" . $user["user_id"]}}>
                    <button data-id={{ $user["user_id"] }} type="button" class="unbanButton btn btn-danger" data-bs-toggle="modal" data-bs-target="#unbanModal"><i class="bi bi-person-check-fill"></i>
                        <div class="d-none d-lg-inline">Unban
                        </div>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="unbanModal" tabindex="-1" aria-labelledby="unbanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="unbanModalLabel">Unban User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{"Are you sure you want to unban " . $user["username"] . "?"}}</p>
                                <p>{{"Ban reason: pepepopo"}}</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick={{ "unbanUser(" . $user["user_id"] . ")" }}>Yes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
            </td>
        @endif
        
</tr>
