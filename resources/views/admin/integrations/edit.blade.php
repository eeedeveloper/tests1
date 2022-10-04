@extends('layouts.app')



@section('navigation')
    <x-nav current="integration"/>
@endsection

@section('content')
    <div class="max-w-7xl space-y-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Integrations</h1>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-8 space-y-2">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div
                                class="py-5 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg  px-5 px-2 bg-white">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')"/>

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                                <form class="space-y-8 divide-y divide-gray-200"
                                      action="{{ route('admin.integrations.update', $integration->id) }}" method="post">
                                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                        <div>
                                            <div>
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                    {{ __('Settings') }}
                                                </h3>
                                            </div>
                                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                                @method('PUT')
                                                @csrf
                                                <div
                                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                    <label for="name"
                                                           class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                        {{__('Name')}}
                                                    </label>
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <input id="name" name="name"
                                                               value="{{ old('name', $integration->name) }}" required
                                                               type="text" autocomplete="name"
                                                               class="block max-w-lg w-full px-4 py-3 pr-8 md:pr-4 rounded text-gray-900 border border-gray-200 focus:border-gray-200 focus:ring-2 focus:ring-gray-100">
                                                    </div>
                                                </div>

                                                <div
                                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                    <label for="desc"
                                                           class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                        {{__('Description')}}
                                                    </label>
                                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                        <input id="desc" name="desc"
                                                               value="{{ old('desc', $integration->desc) }}" required
                                                               type="text" autocomplete="desc"
                                                               class="block w-full px-4 py-3 pr-8 md:pr-4 rounded text-gray-900 border border-gray-200 focus:border-gray-200 focus:ring-2 focus:ring-gray-100">
                                                    </div>
                                                </div>

                                                @if($integration->type->equals(\App\Enums\Integrations\Type::email()))
                                                    <div
                                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                        <label for="email"
                                                               class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                            {{__('Send Email')}}
                                                        </label>
                                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                            <input id="email" name="email"
                                                                   value="{{ old('email', $integration->email) }}"
                                                                   required type="email" autocomplete="email"
                                                                   class="block w-full px-4 py-3 pr-8 md:pr-4 rounded text-gray-900 border border-gray-200 focus:border-gray-200 focus:ring-2 focus:ring-gray-100">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="pt-5">
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                        class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
