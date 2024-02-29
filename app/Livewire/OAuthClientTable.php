<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Responsive;

final class OAuthClientTable extends PowerGridComponent
{
    public int $number = 1;
    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

        ];
    }

    public function datasource(): Builder
    {
        $cliens = DB::table('oauth_clients');

        return $cliens;
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('number', function () {
                return $this->number++;
            })
            ->add('id')
            ->add('name')
            ->add('redirect')
            ->add('secret')
            ->add('created_at')
            ->add('created_at_formatted', function ($row) {
                return Carbon::parse($row->created_at)->format('d M Y');
            });
    }

    public function columns(): array
    {
        return [
            Column::add()
                ->field('number')
                ->title('No'),
            Column::add()
                ->field('name')
                ->title('Name'),
            Column::add()
                ->field('id')
                ->title('ID'),
            Column::add()
                ->field('redirect')
                ->title('Redirect'),
            Column::add()
                ->field('secret')
                ->title('Secret'),
            Column::action('Actions')
        ];
    }

    public function filters(): array
    {
        return [
            // Filter::inputText('name'),
            // Filter::datepicker('created_at_formatted', 'created_at'),
        ];
    }

    public function header(): array
    {
        return [
            Button::make('add', 'Tambah')
                ->bladeComponent('add-button', ['modalId' => 'modal_1'])
        ];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }



    public function actions($row): array
    {
        return [
            Button::make('edit')
                ->bladeComponent('edit-button', ['modalId' => 'modal_edit_' . substr($row->id, 0, 8), 'rowId' => $row->id, 'model' => 'Laravel\Passport\Client']),
            Button::make('delete')
                ->bladeComponent('delete-button', ['modalId' => 'modal_delete_' . substr($row->id, 0, 8), 'rowId' => $row->id]),
        ];
    }

    /*
    public function actionRules(User $row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
