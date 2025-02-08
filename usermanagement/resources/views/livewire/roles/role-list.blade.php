<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div>
        <h2 class="text-xl font-bold">Roles</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">#</th>
                    <th class="p-2">Role Name</th>
                    <th class="p-2">Permissions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $index => $role)
                    <tr class="border-b">
                        <td class="p-2">{{ $index + 1 }}</td>
                        <td class="p-2">{{ $role->name }}</td>
                        <td class="p-2">{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
