<?php

namespace App\Http\Livewire;

use App\Models\Account;

use Livewire\Component;
use Alert;
// toastr https://github.com/yoeunes/toastr
// sweetalert https://github.com/uxweb/sweet-alert

class ListAccounts extends Component
{
    public $accounts = [];
    public $name = "Jobs";

    protected $rules = [
        'name' => 'required|string|min:6',
        // 'email' => ['required', 'email', 'not_in:'],
    ];
    protected $messages = [
        'name.min' => '６文字以上', // overwrite default message
        // 'email.email' => 'The Email Address format is not valid.',
    ];

    protected $listeners = ['reset' => 'reset_name'];

    public function mount()
    {
        $this->accounts = Account::all();
    }

    public function save()
    {
        // $this->validate();
        $this->name = "saved";
        // request()->session()->flash('flash.banner', 'Yay it works!');
        $this->emitUp('banner-message');
        // session()->flash('message', 'success');
        // return $this->redirect('/');
        // return view('livewire.list-accounts');
        // toastr()->info('Are you the 6 fingered man?'); // doesn't work
    }


    public function reset_name()
    {
        $this->name = "";
        return view('livewire.list-accounts');
    }

    public function render()
    {
        // return view('livewire.list-accounts', [
        //     'accounts' => $this->accounts,
        // ]);
        // request()->session()->flash('sweet_alert.alert', 'Yay it works!');
        // alert()->message('Message', 'Optional Title');

        // toastr()->success('Data has been saved successfully!');
        toastr()->info('Are you the 6 fingered man?');
        return view('livewire.list-accounts'); // public で宣言しておけば渡す必要が無い.
    }
}
