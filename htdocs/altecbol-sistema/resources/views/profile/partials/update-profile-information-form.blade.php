<section class="ui-form-card">
    <header class="space-y-1">
        <h2 class="text-lg font-medium ui-text">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm ui-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 ui-form">
        @csrf
        @method('patch')

        <div class="ui-field">
            <x-input-label for="name" :value="__('Name')" class="ui-label" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 ui-input"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error class="mt-2 ui-error" :messages="$errors->get('name')" />
        </div>

        <div class="ui-field">
            <x-input-label for="email" :value="__('Email')" class="ui-label" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 ui-input"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2 ui-error" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-sm ui-text">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="ui-btn-link text-sm ms-1"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm ui-text" style="color:#22c55e;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button class="ui-btn-primary">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
