
<div>
    <div class="mt-4">
        <x-label for="role" value="{{ __('Register As:') }}" />
        <select name="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full" wire:model='role'>
            <option value="">Select Role</option>
            <option value="counselor">Counselor</option>
            <option value="staff">Staff</option>
            <option value="student">Student</option>
        </select>
    </div>

    @if ($role === 'counselor')
        <div class="mt-4">
            <x-label for="license_number" value="{{ __('License Number') }}" />
            <x-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')" autocomplete="license_number" wire:model='license_number' />
        </div>
    @endif
</div>
