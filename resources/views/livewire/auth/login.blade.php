<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('index') }}">
            <x-logo class="w-auto h-32 mx-auto text-green-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            Inicia Sesión
        </h2>
        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                ¡Registrate!
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Email
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-green focus:border-green-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Contraseña
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-green focus:border-green-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-green-600 transition duration-150 ease-in-out focus:shadow-outline-green" />
                    <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                        Recuerdame
                    </label>
                </div>

                <div class="block w-full rounded-md shadow-sm">
                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition duration-150 ease-in-out">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
