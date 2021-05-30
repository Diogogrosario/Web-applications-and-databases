<table class="table">
    <thead>
        <tr>
            <th scope="col" class="d-none d-lg-table-cell">#</th>
            <th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col" class="d-none d-lg-table-cell">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody id="users">
        @include("partials.manageUsersCard",array("users" => $users))
    </tbody>
</table>