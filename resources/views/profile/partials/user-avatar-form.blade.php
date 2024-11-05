<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Avatar') }}
        </h2>

        <img class="w-8 h-8 rounded-full" src="{{ "/storage/$user->avatar" }}" alt="user avatar">

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add User Avatar") }}
        </p>
    </header>

        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method ('patch')
            <div>
                <x-input-label for="avatar" :value="__('Avatar')" />
                <x-text-input id="avatar" accept="image/*" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" autofocus autocomplete="avatar" />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </div>
        </form>
</section>
@if (@session('message'))
<script>
    Swal.fire({
    title: "Success",
    text: "Updated Successfully",
    icon: "success"
    });
</script>
@endif
