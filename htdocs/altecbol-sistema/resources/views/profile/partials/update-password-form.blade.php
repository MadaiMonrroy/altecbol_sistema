<section class="ui-form-card">
    <header class="space-y-1">
        <h2 class="text-lg font-medium ui-text">
            {{ __('Update Password') }}
        </h2>

        <p class="text-sm ui-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 ui-form">
        @csrf
        @method('put')

        <div class="ui-field">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="ui-label" />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 ui-input"
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 ui-error" />
        </div>

        <div class="ui-field">
            <x-input-label for="update_password_password" :value="__('New Password')" class="ui-label" />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 ui-input"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 ui-error" />
        </div>

        <div class="ui-field">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="ui-label" />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 ui-input"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 ui-error" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="ui-btn-primary">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm ui-muted"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
