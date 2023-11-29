<textarea {{ $attributes->class(['editor'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    {{ $slot }}
</textarea>
@once
    @push('scripts')
        @livewire('wire-elements-modal')
    @endpush
@endonce
@once
    @push('vendors')
        <script src="{{ asset('build/js/ckeditor/ckeditor.js') }}"></script>
    @endpush
@endonce

@once
    @push('scripts')
        @vite('resources/js/components/classic-editor/index.js')
        <script>
            window.addEventListener('requestRepositoryForCKEditor', function(event) {
                const editor = event.detail.editor;  // Get the editor instance
                window.currentEditor = editor; // this is allways the last editor open
            });
            document.addEventListener('livewire:initialized', () => {
                Livewire.hook('morph.added',  ({ el }) => {
                    //this run when the page is rendered and apply again the tailwind merge
                    applyTailwindMerge();
                });
            });

        </script>
    @endpush
@endonce

