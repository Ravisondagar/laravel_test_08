<table>
    <thead>
    <tr>
        <th>Department</th>
        <th>Designation</th>
        <th>Name</th>
        <th>Middle name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>age</th>
        <th>mobile</th>
        <th>phone</th>
        <th>address_1  </th>
        <th>address_2</th>
        <th>hobby</th>
        <th>city</th>
        <th>state</th>
        <th>country</th>
        <th>zipcode </th>
        <th>dob</th>
        <th>gender</th>
        <th>marital_status</th>
        <th>pan_number</th>
        <th>management_level</th>
        <th>join_date</th>
        <th>attach</th>
        <th>google</th>
        <th>facebook</th>
        <th>website</th>
        <th>skype</th>
        <th>linkedin</th>
        <th>Twitter</th>

    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->department->name }}</td>
            <td>{{ $user->designation->name }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->middle_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_profile->age }}</td>
            <td>{{ $user->user_profile->mobile }}</td>
            <td>{{ $user->user_profile->phone }}</td>
            <td>{{ $user->user_profile->address_1 }}</td>
            <td>{{ $user->user_profile->address_2 }}</td>
            <td>{{ $user->user_profile->city }}</td>
            <td>{{ $user->user_profile->state }}</td>
            <td>{{ $user->user_profile->country }}</td>
            <td>{{ $user->user_profile->zipcode }}</td>
            <td>{{ $user->user_profile->dob }}</td>
            <td>{{ $user->user_profile->gender }}</td>
            <td>{{ $user->user_profile->marital_status }}</td>
            <td>{{ $user->user_profile->pan_number }}</td>
            <td>{{ $user->user_profile->management_level }}</td>
            <td>{{ $user->user_profile->join_date }}</td>
            <td>{{ $user->user_profile->attach }}</td>
            <td>{{ $user->user_profile->google }}</td>
            <td>{{ $user->user_profile->facebook }}</td>
            <td>{{ $user->user_profile->website }}</td>
            <td>{{ $user->user_profile->skype }}</td>
            <td>{{ $user->user_profile->linkedin }}</td>
            <td>{{ $user->user_profile->Twitter }}</td>
        </tr>
    @endforeach
    </tbody>
</table>