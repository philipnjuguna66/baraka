<?php

namespace App\Livewire\Cta;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class BookAppointment extends Component implements HasForms, HasActions
{
    use InteractsWithForms;

    use InteractsWithActions;

    public function render()
    {
        return view('livewire.cta.book-appointment');
    }


    public function submitAction() : Action
    {
        return  Action::make('submit')
            ->button()
            ->extraAttributes(["class" => 'mt-4 button'])
            ->action(function (){

            });
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                PhoneInput::make('phone')->initialCountry('ke'),
                DateTimePicker::make('visit_date')->label('Appointment Date')
                ->closeOnDateSelection()

            ]);
    }
}
