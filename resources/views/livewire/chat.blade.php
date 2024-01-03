<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @foreach($dialog as $msg)

                        @if ($msg['typ'] == 'question')

                            <div class="p-2 text-cyan-500"><strong>Du fragst: </strong><br>{{$msg['msg']}}</div>
                        @else
                            <div class="p-2 text-amber-400"><strong>Antwort: </strong><br>{{$msg['msg']}}</div>
                        @endif


                    @endforeach

                    <div wire:loading>
                        Moment! Ich frag den Chef!
                    </div>

            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form wire:submit.prevent="sendToGPT">

                        <x-text-input class="w-full" wire:model="question"></x-text-input>
                        <x-secondary-button type="submit" >{{__('Senden')}}</x-secondary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
