<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chat extends Component
{
    public string $question = '';
    public array $dialog = [];

    /**
     * render.
     *
     * @return mixed
     */
    public function render()
    {
        return view('livewire.chat')->layout('layouts.app');
    }

    /**
     * add text to the dialog.
     *
     * @param string $msg
     * @param string $typ
     * @return void
     */
    public function addToDialog(string $msg, string $typ) : void {
        $this->dialog[] = ['msg' => $msg, 'typ' => $typ];
    }

    /**
     * Send a question to chat gpt.
     *
     * @return void
     */
    public function sendToGPT() {

        $this->addToDialog($this->question, 'question');

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $this->question],
            ],
        ]);

        $this->addToDialog($result->choices[0]->message->content, 'answere');
    }
}
