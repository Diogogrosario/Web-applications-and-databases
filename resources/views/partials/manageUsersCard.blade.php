<tr>
    <th scope="row" class="d-none d-lg-table-cell">{{ $key + 1 }}</th>
    <td>{{ $user["first_name"] }}</td>
    <td>
         <a id="username-anchor"href={{ "/userProfile/" . $user["user_id"] }}>{{ $user["username"] }} </a>
    </td>
    <td class="d-none d-lg-table-cell">{{ $user["email"] }}</td>
    <td>
        <button type="button" class="btn btn-danger"><i class="bi bi-person-x-fill"></i>
            <div class="d-none d-lg-inline">Ban
            </div>
        </button>
        <button type="button" class="btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
            <div class="d-none d-lg-inline"> Promote to Admin
            </div>
        </button>
    </td>
</tr>