<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $entity->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $entity->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3">
    <x-base.form-label for="slug">{{ $entity->getAttributeLabel('slug') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"
        id="slug"
        name="slug"
        :value="old('slug', $entity->slug ?? '')"
        type="text"
    />
    @error('slug')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
