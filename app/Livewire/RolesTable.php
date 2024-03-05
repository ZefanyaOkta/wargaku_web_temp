<?php

namespace App\Livewire;

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
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class RolesTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('roles');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->headerAttribute(styleAttr: 'width: 80%;')
                ->sortable()
                ->searchable(),

            Column::action("Action")
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function header(): array
    {
        if(auth()->user()->can('tambah roles') === false){
            return [];
        }

        return [
            Button::make('add', 'Tambah')
                ->bladeComponent('roles.add', ['modalId' => 'modal_1'])
        ];
    }

    public function actions($row): array
    {
        return [
            Button::make('permissions')
                ->bladeComponent('roles.permission', ['modalId' => 'modal_permissions_' . $row->id, 'rowId' => $row->id, 'title' => 'Permissions']),
            Button::make('edit')
                ->bladeComponent('roles.edit', ['modalId' => 'modal_edit_' . $row->id, 'rowId' => $row->id, 'title' => 'Edit Roles']),
            Button::make('delete')
                ->bladeComponent('roles.delete', ['modalId' => 'modal_delete_' . $row->id, 'rowId' => $row->id, 'title' => 'Hapus Roles']),

        ];
    }

    public function actionRules($row): array
    {
        return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn () => auth()->user()->can('edit roles') === false)
                ->hide(),
            Rule::button('delete')
                ->when(fn () => auth()->user()->can('hapus roles') === false)
                ->hide(),
            Rule::button('permissions')
                ->when(fn () => auth()->user()->can('lihat roles permissions') === false)
                ->hide(),
        ];
    }
}
