<section>
    <header class="mb-6">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Photo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile photo.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update-avatar') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex items-center">
            <div class="mr-3">
                @if (auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                         class="rounded-full w-20 h-20 object-cover"
                         alt="Profile Photo"
                         id="avatar-preview">
                @else
                    <div class="bg-gray-200 border-2 border-dashed rounded-full w-20 h-20 flex items-center justify-center"
                         id="avatar-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif
            </div>
            
            <div>
                <label for="avatar" class="cursor-pointer inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Select Photo') }}
                </label>
                <input type="file" id="avatar" name="avatar" class="sr-only" accept="image/*">
                <div id="avatar-name" class="text-sm text-gray-500 mt-1"></div>
                @error('avatar')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                {{ __('Save Photo') }}
            </button>

            @if (session('avatar-status') === 'avatar-updated')
                <div class="text-green-600 text-sm">
                    {{ __('Photo updated successfully!') }}
                </div>
            @endif
        </div>
    </form>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const avatarInput = document.getElementById('avatar');
    const avatarName = document.getElementById('avatar-name');
    
    avatarInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            // Show file name
            avatarName.textContent = this.files[0].name;
            
            // Image preview
            const reader = new FileReader();
            reader.onload = function(e) {
                // Update existing image
                const preview = document.getElementById('avatar-preview');
                if (preview) {
                    preview.src = e.target.result;
                } 
                // Replace placeholder with image
                else {
                    const placeholder = document.getElementById('avatar-placeholder');
                    if (placeholder) {
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.className = 'rounded-full w-20 h-20 object-cover';
                        newImg.id = 'avatar-preview';
                        
                        placeholder.replaceWith(newImg);
                    }
                }
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>