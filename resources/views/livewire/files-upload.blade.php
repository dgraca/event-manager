<div x-data="fileUploadData()"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <x-base.form-label wire:ignore>{{ $label ?? __('Upload Files') }}</x-base.form-label>
    <div
        @drop.prevent="handleFileDrop"
        @dragover.prevent
        class="rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400">
        <div class="flex flex-wrap px-4">
            <div class="flex flex-wrap">
                <!-- Previous files -->
                @foreach ($previousFiles as $media)
                    <div class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                        @if(\App\Facades\HelperMethods::isImage($media))
                            <img class="rounded-md shadow" src="{{ $media->getUrl() }}" alt="Uploaded Image">
                        @else
                            <!-- Default div with a generic file icon -->
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center shadow ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate">{{ $media->name }}</span>
                            <span class="text-xs text-gray-900" x-text="humanFileSize({{ $media->size }})"></span>
                        </div>
                        <x-base.tippy
                            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                            as="div"
                            content="{{ __('Remove') }}"

                        >
                            <svg wire:click="removePreviousFile({{ $media->id }})"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </x-base.tippy>
                    </div>
                @endforeach
                <div >
                    @foreach ($removedPreviousFiles as $media)
                        <input type="hidden" name="{{ $inputName.'_delete'.($isMultiple ? '[]': '') }}" value="{{ $media->id }}">
                    @endforeach
                </div>
            </div>
            <!-- Uploaded Files Preview -->
            @if ($files)
                @foreach ($files as $file)
                    <input type="hidden" name="{{ $inputName.($isMultiple ? '[]': '') }}" value="{{ $file->getFilename() }}">
                    <input type="hidden" name="{{ $inputName.'_original_name'.($isMultiple ? '[]': '') }}" value="{{ $file->getClientOriginalName() }}">
                    <div class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                        @if(!empty($file->isPreviewable()))
                            <img class="rounded-md shadow" src="{{ $file->temporaryUrl() }}" alt="Uploaded Image">
                        @else
                            <!-- Default div with a generic file icon -->
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate">{{ $file->getClientOriginalName() }}</span>
                            <span class="text-xs text-gray-900" x-text="humanFileSize({{ $file->getSize() }})"></span>
                        </div>
                        <x-base.tippy
                            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                            as="div"
                            content="{{ __('Remove') }}"

                        >
                            <svg wire:click="removeFile('{{ $file->getFilename() }}')"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </x-base.tippy>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="relative flex cursor-pointer items-center px-4 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="image" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
            <span class="mr-1 text-primary">{{ !empty($uploadFieldMainLabel) ? $uploadFieldMainLabel : ($isMultiple ? __('Upload files') : __('Upload a file')) }}</span>
            {{ !empty($uploadFieldSecondaryLabel) ? $uploadFieldSecondaryLabel : __('or drag and drop') }}
            @if(false)
                <!-- Não funcionava bem por ser um component e o livewire rescrevia isto -->
                <x-base.form-input
                    class="absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer"
                    type="file"
                    wire:model="files"
                    accept="{{ $acceptedFileTypes }}"
                    :multiple="$isMultiple ? 'multiple' : false"
                />
            @endif
            <input
                x-ref="fileInput"
                type="file"
                wire:model="files"
                accept="{{ $acceptedFileTypes }}"
                {{ $isMultiple ? 'multiple' : '' }}
                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer">
        </div>
        <!-- Upload Progress -->
        <div x-show="isUploading" class="bg-slate-200 rounded dark:bg-black/20 h-4 mb-4 mx-4">
            <div role="progressbar" :style="`width: ${progress}%;`"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center">
                <span x-text="progress + '%'"></span>
            </div>
        </div>
        <!-- Error Message -->
        @error('files.*')
        <div class="mt-2 ps-4 mb-4 text-danger">{{ $message }}</div>
        @enderror
        @error('files')
        <div class="mt-2 ps-4 mb-4 text-danger">{{ $message }}</div>
        @enderror
        @if(!empty($hintLabel))
            <x-base.form-help>
                {{ $hintLabel }}
            </x-base.form-help>
        @endif
    </div>
</div>
<script>
    function fileUploadData() {
        return {
            isUploading: false,
            progress: 0,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            /*triggerFileUpload() {
                this.$refs.fileInput.click();
            },*/
            handleFileDrop(event) {
                const files = event.dataTransfer.files;
                this.uploadFiles(files);
            },
            uploadFiles(files) {
                this.isUploading = true;
                // Use Livewire to upload the files
                @this.uploadMultiple('files', files, () => {
                    //console.log('Upload Complete!');
                    this.isUploading = false;
                }, () => {
                    //console.log('Upload Failed!');
                    this.isUploading = false;
                }, (event) => {
                    //console.log('Upload Progress:', event.detail.progress);
                    this.progress = event.detail.progress;
                });
            }
            // Other data and methods...
        };
    }
</script>
@if(false)
<div x-data="fileUploadData()"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    <div class="mt-3">
        <x-base.form-label wire:ignore>{{ $label ?? __('Upload Files') }}</x-base.form-label>
        <div class="rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400">
            <div class="flex flex-wrap px-4">
                <div class="flex flex-wrap " wire:ignore>
                    <!-- Previous files -->
                    @foreach ($previousFiles as $media)
                        <div x-ref="file-{{ $media->id }}" class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                            @if(\App\Facades\HelperMethods::isImage($media))
                                <img class="rounded-md" src="{{ $media->getUrl() }}" alt="Uploaded Image">
                            @else
                                <!-- Default div with a generic file icon -->
                                <div class="bg-gray-100 w-full h-full flex items-center justify-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                                </div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                <span class="w-full font-bold text-gray-900 truncate">{{ $media->name }}</span>
                                <span class="text-xs text-gray-900" x-text="humanFileSize({{ $media->size }})"></span>
                            </div>
                            <x-base.tippy
                                class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                                as="div"
                                content="{{ __('Remove') }}"

                            >
                                <svg @click="removePreviousFile({{ $media->id }})"   xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </x-base.tippy>
                        </div>
                    @endforeach
                    <div  x-ref="hiddenInputs">

                    </div>
                </div>
                <!-- Uploaded Files Preview -->
                @if ($files)
                    @foreach ($files as $file)
                        <input type="hidden" name="{{ $inputName.($isMultiple ? '[]': '') }}" value="{{ $file->getFilename() }}">
                        <input type="hidden" name="{{ $inputName.'_original_name'.($isMultiple ? '[]': '') }}" value="{{ $file->getClientOriginalName() }}">
                        <div class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                            @if(!empty($file->isPreviewable()))
                                <img class="rounded-md" src="{{ $file->temporaryUrl() }}" alt="Uploaded Image">
                            @else
                                <!-- Default div with a generic file icon -->
                                <div class="bg-gray-100 w-full h-full flex items-center justify-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                                </div>
                            @endif
                            <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                <span class="w-full font-bold text-gray-900 truncate">{{ $file->getClientOriginalName() }}</span>
                                <span class="text-xs text-gray-900" x-text="humanFileSize({{ $file->getSize() }})"></span>
                            </div>
                            <x-base.tippy
                                class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                                as="div"
                                content="{{ __('Remove') }}"

                            >
                                <svg wire:click="removeFile('{{ $file->getFilename() }}')"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </x-base.tippy>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="relative flex cursor-pointer items-center px-4 pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="image" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                <span class="mr-1 text-primary">{{ !empty($uploadFieldMainLabel) ? $uploadFieldMainLabel : ($isMultiple ? __('Upload files') : __('Upload a file')) }}</span>
                {{ !empty($uploadFieldSecondaryLabel) ? $uploadFieldSecondaryLabel : __('or drag and drop') }}
                @if(false)
                    <!-- Não funcionava bem por ser um component e o livewire rescrevia isto -->
                    <x-base.form-input
                        class="absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer"
                        type="file"
                        wire:model="files"
                        accept="{{ $acceptedFileTypes }}"
                        :multiple="$isMultiple ? 'multiple' : false"
                    />
                @endif
                <input
                    type="file"
                    wire:model="files"
                    accept="{{ $acceptedFileTypes }}"
                    {{ $isMultiple ? 'multiple' : '' }}
                    class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer">
            </div>
            <!-- Upload Progress -->
            <div x-show="isUploading" class="bg-slate-200 rounded dark:bg-black/20 h-4 mb-4 mx-4">
                <div role="progressbar" :style="`width: ${progress}%;`"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center">
                    <span x-text="progress + '%'"></span>
                </div>
            </div>
            <!-- Error Message -->
            @error('files.*')
                <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
            @error('files')
                <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
            @if(!empty($hintLabel))
                <x-base.form-help>
                    {{ $hintLabel }}
                </x-base.form-help>
            @endif
        </div>
    </div>
</div>
<script>
    function fileUploadData() {
        return {
            isUploading: false,
            progress: 0,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            removePreviousFile: function(id) {
                this.$refs['file-' + id].remove();
                this.$refs.hiddenInputs.insertAdjacentHTML('beforeend', '<input type="hidden" name="{{$inputName.'_delete'.($isMultiple ? '[]': '')}}" value="' + id + '"/>');
            }
            // Other data and methods...
        };
    }
</script>
@endif
@if(false)
<div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">

        <!-- File Input -->
        <input type="file" wire:model="files" {{ $isMultiple ? 'multiple' : '' }} accept="{{ $acceptedFileTypes }}">

        <!-- Error Message -->
        @error('files.*') <span class="error">{{ $message }}</span> @enderror

        <!-- Upload Progress -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>

        <!-- Uploaded Files Preview -->
        @if ($files)
            @foreach ($files as $file)
                <input type="hidden" name="file[]" value="{{ $file->getFilename() }}">
                <input type="hidden" name="file_original_name[]" value="{{ $file->getClientOriginalName() }}">
                @if(!empty($file->temporaryUrl()))
                    <img src="{{ $file->temporaryUrl() }}" width="100">
                @else
                    <!-- Default div with a generic file icon -->
                @endif
            @endforeach
        @endif
</div>
@endif
@if(false)
<div>
    <div class="bg-white rounded w-full mx-auto">
        <div x-data="fileUploadData()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
            <div x-ref="dnd"
                 class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                <input
                    id="files"
                    name="files"
                    type="file"
                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                    @change="addFiles($event)"
                    wire:model.defer="files"
                    {{ $isMultiple ? 'multiple' : '' }}
                    accept="{{ $acceptedFileTypes }}"
                />

                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="m-0">Drag your files here or click in this area.</p>
                </div>
            </div>

            <template x-if="files.length > 0">
                <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6">
                    <template x-for="file, index in files" :key="index">
                        <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                             style="padding-top: 100%;" draggable="true">
                            <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>

                            <template x-if="file.type.includes('image/')">
                                <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                     x-bind:src="loadFile(file)" />
                            </template>
                            <template x-if="file.type.includes('video/')">
                                <video class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                    <source x-bind:src="loadFile(file)" type="video/mp4">
                                </video>
                            </template>

                            <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                    <span class="w-full font-bold text-gray-900 truncate"
                          x-text="file.name">Loading</span>
                                <span class="text-xs text-gray-900" x-text="humanFileSize(file.size)">...</span>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
    function fileUploadData() {
        return {
            isUploading: true,
            progress: 30,
            remove(index) {
                this.files.splice(index, 1);
            },
            loadFile(file) {
                return URL.createObjectURL(file);
            },
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            addFiles(event) {
                this.files = [...this.files, ...event.target.files];
            }
        };
    }
</script>
@endif

@if(false)
<div>
    <div class="bg-white rounded w-full mx-auto">
        <div x-data="fileUploadData()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
            <div x-ref="dnd"
                 class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                <input
                    id="files"
                    name="files"
                    type="file"
                    class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                    @change="files = [...$event.target.files]"
                    wire:model="files"
                    {{ $isMultiple ? 'multiple' : '' }}
                    accept="{{ $acceptedFileTypes }}"
                />

                <div class="flex flex-col items-center justify-center py-10 text-center">
                    <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="m-0">Drag your files here or click in this area.</p>
                </div>
            </div>


            <template x-if="files.length > 0">
                <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6">
                    <template x-for="file, index in files" :key="index">
                        <template x-if="files.length > 0">
                            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6">
                                <template x-for="file, index in files" :key="index">
                                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                         style="padding-top: 100%;" draggable="true">
                                        <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="files.splice(index, 1)">
                                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>

                                        <template x-if="file.type.includes('image/')">
                                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                 x-bind:src="URL.createObjectURL(file)" />
                                        </template>
                                        <template x-if="file.type.includes('video/')">
                                            <video class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                <source x-bind:src="URL.createObjectURL(file)" type="video/mp4">
                                            </video>
                                        </template>
                                        <!-- Add more templates for other file types as needed -->

                                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                    <span class="w-full font-bold text-gray-900 truncate"
                          x-text="file.name">Loading</span>
                                            <span class="text-xs text-gray-900" x-text="humanFileSize(file.size)">...</span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>

                    </template>
                </div>
            </template>
        </div>
    </div>

</div>
<script>
    function fileUploadData() {
        return {
            files: [],
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            // Other data and methods...
        };
    }
</script>
@endif

@if(false)
    <div>
        <div
            class="flex h-screen justify-center items-center"
            x-data="drop_file_component()">
            <div
                class="py-6 w-96 rounded border-dashed border-2 flex flex-col justify-center items-center"
                x-bind:class="dropingFile ? 'bg-gray-400 border-gray-500' : 'border-gray-500 bg-gray-200'"
                x-on:drop="dropingFile = false"
                x-on:drop.prevent="
                    handleFileDrop($event)
                "
                x-on:dragover.prevent="dropingFile = true"
                x-on:dragleave.prevent="dropingFile = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <div class="text-center" wire:loading.remove wire.target="files">Drop Your Files Here</div>
                <div class="mt-1" wire:loading.flex wire.target="files">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <div>Processing Files</div>
                </div>
            </div>
        </div>

        <script>
            function drop_file_component() {
                return {
                    dropingFile: false,
                    handleFileDrop(e) {
                        if (event.dataTransfer.files.length > 0) {
                            const files = e.dataTransfer.files;
                        @this.uploadMultiple('files', files,
                            (uploadedFilename) => {}, () => {}, (event) => {}
                        )
                        }
                    }
                };
            }
        </script>
    </div>
@endif
