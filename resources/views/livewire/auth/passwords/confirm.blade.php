<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('index') }}">
            <x-logo class="w-auto h-32 mx-auto text-green-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Confirma tu Identidad
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            Por favor ingresa tu contraseña para continuar
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="confirm" class="space-y-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Contraseña
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" name="password" type="password" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-green focus:border-green-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600" id="password-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full rounded-md shadow-sm">
                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                        Continuar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
