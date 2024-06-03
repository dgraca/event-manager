@php
    //is true when update the own profile and hide the sidebar
    if(empty($hideSidebar))
    {
        $hideSidebar = false;
    }
@endphp
<!-- BEGIN: User Content -->
<div class="intro-y col-span-12 {{ $hideSidebar ? "lg:col-span-12" : "lg:col-span-8" }}">
    <x-base.tab.group class="intro-y box overflow-hidden">
        <x-base.tab.list
            class="flex-col border-transparent bg-slate-200 dark:border-transparent dark:bg-darkmode-800 sm:flex-row"
        >
            <x-base.tab
                id="profile-tab"
                :fullWidth="false"
                selected
            >

                <x-base.tab.button
                    @class([
                        'flex items-center justify-center w-full px-0 py-0 sm:w-40 text-slate-500',
                        '[&:not(.active)]:hover:border-transparent [&:not(.active)]:hover:bg-transparent [&:not(.active)]:hover:text-slate-600 [&:not(.active)]:hover:dark:bg-transparent [&:not(.active)]:hover:dark:text-slate-300',
                        '[&.active]:text-primary [&.active]:border-transparent [&.active]:dark:bg-darkmode-600 [&.active]:dark:border-x-transparent [&.active]:dark:border-t-transparent [&.active]:dark:text-white',
                    ])
                    as="button"
                    type="button"
                >
                    <x-base.tippy
                        class="flex w-full items-center justify-center py-4"
                        aria-controls="profile"
                        aria-selected="true"
                        content="{{ __('Fill the profile info') }}"
                    >
                        <x-base.lucide
                            class="mr-2 h-4 w-4"
                            icon="FileText"
                        />
                        {{ __('Profile') }}
                    </x-base.tippy>
                </x-base.tab.button>
            </x-base.tab>
{{--            @if(!empty($user->id))--}}
{{--                <x-base.tab--}}
{{--                    id="password-tab"--}}
{{--                    :fullWidth="false"--}}
{{--                >--}}
{{--                    <x-base.tab.button--}}
{{--                        @class([--}}
{{--                            'flex items-center justify-center w-full px-0 py-0 sm:w-40 text-slate-500',--}}
{{--                            '[&:not(.active)]:hover:border-transparent [&:not(.active)]:hover:bg-transparent [&:not(.active)]:hover:text-slate-600 [&:not(.active)]:hover:dark:bg-transparent [&:not(.active)]:hover:dark:text-slate-300',--}}
{{--                            '[&.active]:text-primary [&.active]:border-transparent [&.active]:dark:bg-darkmode-600 [&.active]:dark:border-x-transparent [&.active]:dark:border-t-transparent [&.active]:dark:text-white',--}}
{{--                        ])--}}
{{--                        as="button"--}}
{{--                        type="button"--}}
{{--                    >--}}
{{--                        <x-base.tippy--}}
{{--                            class="flex w-full items-center justify-center py-4"--}}
{{--                            aria-selected="false"--}}
{{--                            content="{{ __('Change password') }}"--}}
{{--                        >--}}
{{--                            <x-base.lucide--}}
{{--                                class="mr-2 h-4 w-4"--}}
{{--                                icon="password"--}}
{{--                            /> {{ __('Password') }}--}}
{{--                        </x-base.tippy>--}}
{{--                    </x-base.tab.button>--}}

{{--                </x-base.tab>--}}
{{--            @endif--}}
        </x-base.tab.list>
        <x-base.tab.panels>
            <x-base.tab.panel
                class="p-5"
                id="profile"
                selected
            >
                @include('users._profile_tab')
            </x-base.tab.panel>
            @if(!empty($user->id))
                <x-base.tab.panel
                    class="p-5"
                    id="password"
                >
                    @include('users._password_tab')
                </x-base.tab.panel>
            @endif
        </x-base.tab.panels>

    </x-base.tab.group>

</div>
<!-- END: User Content -->
@if($hideSidebar == false)
    <!-- BEGIN: User Info -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y box p-5">
            @can(\App\Models\Permission::PERMISSION_ADMIN_APP)
                <!-- Role Field -->
                <div class="mb-3">
                    <x-base.form-label for="roles">{{ $user->getAttributeLabel('roles') }}</x-base.form-label>
                    <x-base.tom-select
                        class="w-full {{ ($errors->has('roles') ? 'border-danger' : '') }}"
                        id="roles"
                        name="roles[]"
                        data-remove-button="true"
                        data-placeholder="{{ __('Select the roles') }}"
                        :value="old('roles', $user->roles ?? '')"
                        multiple
                    >
                        <option ></option>
                        @foreach($roles as $key => $label)
                            <option value="{{ $key }}" {{ in_array($key, old('roles', $user->roles->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-base.tom-select>
                    @error('roles')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endcan
        </div>
    </div>
    <!-- END: User Info -->
@else
    {{-- ADD here some fields that must be readonly with is to hide the sidebar --}}
@endif


