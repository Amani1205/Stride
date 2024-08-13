<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1 style="text-align: center;">Coach Registration</h1>

            <input type="hidden" id="usertype" name="usertype" value="Coach" />

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="contact_number" value="{{ __('Contact Number') }}" />
                <x-input id="contact_number" class="block w-full mt-1" type="text" name="contact_number" :value="old('contact_number')" required autocomplete="contact_number" />
            </div>

            <div class="mt-4">
                <x-label for="stadium_address" class="hidden" value="{{ __('Stadium Address') }}" />
                <x-input id="stadium_address" class="hidden" type="text" name="stadium_address" :value="old('stadium_address','null')" required autocomplete="stadium_address" />
            </div>


            <div class="mt-4">
                <x-label for="available_sports" class="hidden" value="{{ __('Available Sports') }}" />
                <select id="available_sports" name="available_sports[]" class="hidden" multiple>
                    <option value="null" selected>Null</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Swimming">Swimming</option>
                    <option value="Cricket">Cricket</option>
                    <option value="Football">Football</option>
                    <option value="Rugby">Rugby</option>
                    <option value="Boxing">Boxing</option>
                    <option value="Hockey">Hockey</option>
                    <option value="Volleyball">Volleyball</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Baseball">Baseball</option>
                    <option value="Table Tennis">Table Tennis</option>
                    <option value="Athletics">Athletics</option>
                    <option value="Karate">Karate</option>
                    <option value="Chess">Chess</option>



                    <!-- Add more sports as needed -->
                </select>
            </div>

            <div class="mt-4">
                <x-label for="coaching_sport" value="{{ __('Select Coaching Sport') }}" />
                <select id="coaching_sport" class="block w-full mt-1" name="coaching_sport">
                    <option value="Soccer">Soccer</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Swimming">Swimming</option>
                    <option value="Cricket">Cricket</option>
                    <option value="Football">Football</option>
                    <option value="Rugby">Rugby</option>
                    <option value="Boxing">Boxing</option>
                    <option value="Hockey">Hockey</option>
                    <option value="Volleyball">Volleyball</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Baseball">Baseball</option>
                    <option value="Table Tennis">Table Tennis</option>
                    <option value="Athletics">Athletics</option>
                    <option value="Karate">Karate</option>
                    <option value="Chess">Chess</option>

                    <!-- Add more sports as needed -->
                </select>
            </div>

                    <div class="mt-4">
                        <x-label for="years_of_experience" value="{{ __('Years of Experience') }}" />
                        <x-input id="years_of_experience" class="block w-full mt-1" type="number" name="years_of_experience" :value="old('years_of_experience')" required autocomplete="years_of_experience" />
                    </div>

                    <div class="mt-4">
                        <x-label for="level_of_experience" value="{{ __('Level of Experience') }}" />
                        <select id="level_of_experience" name="level_of_experience" class="block w-full mt-1">
                            <option value="District">District Level</option>
                            <option value="National">National Level</option>
                            <option value="International">International Level</option>
                        </select>
                    </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="preferred_sports" class="hidden" value="{{ __('Preferred Sports') }}" />
                <select id="preferred_sports" name="preferred_sports[]" class="hidden" multiple>
                    <option value="null" selected>Null</option>
                    <option value="soccer">Soccer</option>
                    <option value="basketball">Basketball</option>
                    <option value="tennis">Tennis</option>
                    <option value="swimming">Swimming</option>
                </select>
            </div>





            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
