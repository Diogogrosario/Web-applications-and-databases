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
                    <button data-id={{ $user["user_id"] }} type="button" class="promoteButton btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                        <div class="d-none d-lg-inline"> Promote to Admin
                        </div>
                    </button>
                </section>
            </td>
        @else
            <td>
                <section id={{ "actionButtons" . $user["user_id"]}}>
                    <button data-id={{ $user["user_id"] }} type="button" class="unbanButton btn btn-danger" onclick={{ "unbanUser(" . $user["user_id"] . ")" }}><i class="bi bi-person-check-fill"></i>
                        <div class="d-none d-lg-inline">Unban
                        </div>
                    </button>
                </section>
            </td>
        @endif

</tr>