<div>
    <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('Transaction Id') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Payment Method') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('Approved') }}
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
            @if(sizeof($transactions) == 0)
                <td colspan="7">
                    <div class="flex justify-center items-center h-32">
                        <div class="text-gray-500 dark:text-gray-400">
                            {{ __('No transactions found.') }}
                        </div>
                    </div>
                </td>
            @endif
            @foreach($transactions as $key => $transaction)
                <tr id="transaction-{{ $key }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $transaction->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $transaction->payment_method }}
                    </td>
                    <td class="px-6 py-4">
                        <!-- Checkbox Field -->
                        <div class="mb-3">
                            <x-base.form-input
                                id="checkbox_hidden_approved_{{ $key }}"
                                name="approved_{{ $key }}"
                                :value="0"
                                type="hidden"
                            />
                            <x-base.form-switch>
                                <x-base.form-switch.input
                                    :tw-merge="true"
                                    class="{{ ($errors->has('approved') ? 'border-danger' : '') }}"
                                    wire:model.live="approved.{{ $key }}"
                                    :checked="old('approved_{{ $key }}', $transaction->approved ?? '') == 1"
                                    type="checkbox"
                                />
                            </x-base.form-switch>
                            @error('approved_{{ $key }}')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <!-- Checkbox Field -->
                        <div class="mb-3">
                            <x-base.form-input
                                id="checkbox_hidden_paid_{{ $key }}"
                                name="paid_{{ $key }}"
                                :value="0"
                                type="hidden"
                            />
                            <x-base.form-switch>
                                <x-base.form-switch.input
                                    :tw-merge="true"
                                    class="{{ ($errors->has('paid') ? 'border-danger' : '') }}"
                                    wire:model.live="paid.{{ $key }}"
                                    :checked="old('paid_{{ $key }}', $transaction->paid ?? '') == 1"
                                    type="checkbox"
                                />
                            </x-base.form-switch>
                            @error('paid_{{ $key }}')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $transaction->updated_at }}
                    </td>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@pushOnce('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.hook('request', ({ uri, options, payload, respond, succeed, fail }) => {
                succeed(({ status, json }) => {
                    setTimeout(() => {
                        window.applyTailwindMerge();
                    }, 100);
                })
            })
        });
    </script>
@endpushOnce

