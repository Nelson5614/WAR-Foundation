
<div>
    <div class="mt-4">
        <x-label for="role_id" value="{{ __('Register As:') }}" />
        <select name="role_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 w-full" wire:model='role_id'>
            <option value="">Select Role</option>
            <option value="2">Counselor</option>
            <option value="3">Member</option>
            <option value="4">Student</option>
        </select>
    </div>

    @if ($role_id == 2)
        <div class="mt-4">
            <x-label for="license_number" value="{{ __('License Number') }}" />
            <x-input id="license_number" class="block mt-1 w-full" type="text" name="license_number" :value="old('license_number')" autocomplete="license_number" wire:model='license_number' />
        </div>
    @endif
</div>
