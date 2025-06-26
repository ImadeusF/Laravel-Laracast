<x-layout>
    <x-slot:heading>
        Edit Job : {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" value="{{ $job->title }}" placeholder="CEO" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" value="{{ $job->salary }}" placeholder="$50,000 USD" required />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>

                </div>
                <!-- <div class="mt-10">
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-red-500 italic">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div> -->
            </div>

            <div class="mt-6 flex items-center justify-between gap-x-6">
                <div>
                    <x-form-delete-button>Delete</x-form-delete-button>
                </div>
                <div class="flex items-center gap-x-6">
                    <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                    <x-form-button>Update</x-form-button>
                </div>
            </div>
    </form>

<!-- Pour le delete, creer un form, l'id est relatif au nom du form du delete-->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>