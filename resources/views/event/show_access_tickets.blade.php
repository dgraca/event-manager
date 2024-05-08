<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Code') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Email') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Phone') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Description') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Tickets Count') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Approved') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Status') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Paid') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Created At') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Updated At') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($accessTickets as $accessTicket)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $accessTicket->code }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $accessTicket->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->tickets_count }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->approved }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->paid }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $accessTicket->updated_at }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
